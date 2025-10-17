(function(){
  'use strict';

  const qs = (selector) => document.querySelector(selector);
  const qsa = (selector) => Array.from(document.querySelectorAll(selector));
  const LANGS = Object.keys(window.I18N);
  const DEFAULT_LANG = 'en';
  const MOTION_MEDIA = window.matchMedia('(prefers-reduced-motion: reduce)');

  const state = {
    lang: (localStorage.getItem('lang') && LANGS.includes(localStorage.getItem('lang')))
      ? localStorage.getItem('lang')
      : DEFAULT_LANG,
    quoteIndex: 0,
    quoteTimer: null
  };

  const motion = {
    pointer: { x: 0.5, y: 0.5 },
    scroll: 0,
    elements: [],
    raf: null
  };

  function t(key){
    const bundle = window.I18N[state.lang] || {};
    return bundle[key] !== undefined ? bundle[key] : key;
  }

  function setDir(){
    const html = document.documentElement;
    html.lang = state.lang;
    const isFA = state.lang === 'fa';
    html.dir = isFA ? 'rtl' : 'ltr';
    document.body.classList.toggle('rtl', isFA);
  }

  function animateLangToggle(){
    const btn = qs('#lang-toggle');
    if(!btn) return;
    btn.dataset.mirror = 'true';
    setTimeout(() => { btn.dataset.mirror = 'false'; }, 680);
  }

  function updateLangToggle(){
    const btn = qs('#lang-toggle');
    if(!btn) return;
    const targetLang = state.lang === 'fa' ? 'en' : 'fa';
    const currentLabel = window.I18N[state.lang]?.language_short || state.lang.toUpperCase();
    const nextLabel = window.I18N[targetLang]?.language_short || targetLang.toUpperCase();
    const currentEl = btn.querySelector('[data-role="current"]');
    const targetEl = btn.querySelector('[data-role="target"]');
    if(currentEl){ currentEl.textContent = currentLabel; }
    if(targetEl){ targetEl.textContent = nextLabel; }
    btn.setAttribute('aria-label', window.I18N[state.lang]?.language_toggle_label || 'Switch language');
    btn.dataset.lang = state.lang;
    if(btn.dataset.mirror !== 'true'){
      btn.dataset.mirror = 'false';
    }
  }

  function applyTexts(){
    qsa('[data-t]').forEach((el) => {
      const value = t(el.dataset.t);
      if(value !== undefined){
        el.textContent = value;
      }
    });
    updateLangToggle();
    refreshHeroQuoteCycle();
    const closeLabel = t('lightbox_close');
    const closeButton = qs('#lightbox [data-close]');
    if(closeButton){
      closeButton.textContent = closeLabel;
    }
  }

  function getHeroQuotes(){
    return [t('hero_quote_1'), t('hero_quote_2'), t('hero_quote_3')].filter(Boolean);
  }

  function refreshHeroQuoteCycle(){
    const quotes = getHeroQuotes();
    const target = qs('#hero-quote');
    if(!target || !quotes.length){
      clearInterval(state.quoteTimer);
      state.quoteTimer = null;
      return;
    }

    state.quoteIndex = 0;
    target.textContent = quotes[state.quoteIndex];
    target.classList.remove('fade-out');
    target.classList.add('fade-in');

    if(state.quoteTimer){
      clearInterval(state.quoteTimer);
    }

    state.quoteTimer = setInterval(() => {
      state.quoteIndex = (state.quoteIndex + 1) % quotes.length;
      target.classList.remove('fade-in');
      target.classList.add('fade-out');
      setTimeout(() => {
        target.textContent = quotes[state.quoteIndex];
        target.classList.remove('fade-out');
        target.classList.add('fade-in');
      }, 360);
    }, 5200);
  }

  function loadJSON(path){
    return fetch(path, { cache: 'no-store' })
      .then((response) => {
        if(!response.ok){
          throw new Error(`Failed to load ${path}: ${response.status}`);
        }
        return response.json();
      })
      .catch((error) => {
        console.error('[ravandeh] Unable to fetch JSON', { path, error });
        const wrap = path.includes('collections') ? qs('#collections-grid') : qs('#artists-grid');
        if(wrap){
          const fallback = document.createElement('p');
          fallback.className = 'section-sub';
          fallback.textContent = t('error_loading');
          wrap.replaceChildren(fallback);
        }
        throw error;
      });
  }

  function renderCollections(data){
    const wrap = qs('#collections-grid');
    if(!wrap){
      console.warn('[ravandeh] Missing collections grid container');
      return;
    }
    wrap.innerHTML = '';

    (data.collections || []).forEach((col) => {
      const card = document.createElement('article');
      card.className = 'collection-card';
      card.setAttribute('data-animate', '');
      card.setAttribute('data-depth', '0.08');

      const title = col.title?.[state.lang] || col.title?.en || '';
      const summary = col.summary?.[state.lang] || col.summary?.en || '';
      const description = col.description?.[state.lang] || col.description?.en || '';
      const meta = Array.isArray(col.meta) ? col.meta : [];
      const items = Array.isArray(col.items) ? col.items : [];
      const palette = Array.isArray(col.palette) ? col.palette : [];

      if(palette.length){
        const [a, b = a, c = a] = palette;
        card.style.background = `linear-gradient(150deg, ${a}33, ${b}22)`;
        card.style.boxShadow = `0 30px 80px ${c}44`;
      }

      card.innerHTML = `
        ${summary ? `<p class="collection-card__summary">${summary}</p>` : ''}
        <h3>${title}</h3>
        <p class="collection-card__description">${description}</p>
        ${meta.length ? `
          <ul class="collection-card__meta">
            ${meta.map((entry) => {
              const label = entry.label?.[state.lang] || entry.label?.en || '';
              const value = entry.value?.[state.lang] || entry.value?.en || '';
              return `<li class="collection-card__meta-item"><span>${label}</span><span>${value}</span></li>`;
            }).join('')}
          </ul>
        ` : ''}
        <div class="collection-gallery">
          ${items.map((item, index) => {
            const itemTitle = item.title?.[state.lang] || item.title?.en || '';
            const itemCaption = item.caption?.[state.lang] || item.caption?.en || '';
            const altText = item.alt?.[state.lang] || item.alt?.en || itemTitle || 'Artwork';
            return `
              <figure class="collection-item" tabindex="0" data-index="${index}">
                <img loading="lazy" src="${item.image}" alt="${altText}">
                <div class="overlay">
                  <h4>${itemTitle}</h4>
                  <p>${itemCaption}</p>
                </div>
              </figure>
            `;
          }).join('')}
        </div>
      `;

      wrap.appendChild(card);

      const figures = card.querySelectorAll('.collection-item');
      figures.forEach((figure, idx) => {
        const item = items[idx];
        if(!item) return;
        const img = figure.querySelector('img');
        const titleText = item.title?.[state.lang] || item.title?.en || '';
        const captionText = item.caption?.[state.lang] || item.caption?.en || '';
        const open = () => openLightbox(img.src, titleText, captionText, img.alt);
        img.addEventListener('click', open);
        figure.addEventListener('keypress', (evt) => {
          if(evt.key === 'Enter'){ open(); }
        });
      });
    });

    refreshMotionTargets();
  }

  function renderArtists(data){
    const wrap = qs('#artists-grid');
    if(!wrap){
      console.warn('[ravandeh] Missing artists grid container');
      return;
    }
    wrap.innerHTML = '';

    (data.artists || []).forEach((artist) => {
      const card = document.createElement('article');
      card.className = 'artist-card';
      card.setAttribute('data-animate', '');
      card.setAttribute('data-depth', '0.06');
      const role = artist.role?.[state.lang] || artist.role?.en || '';
      const bio = artist.bio?.[state.lang] || artist.bio?.en || '';
      const highlights = Array.isArray(artist.highlights) ? artist.highlights : [];

      card.innerHTML = `
        <div class="artist-header">
          <img class="artist-avatar" src="${artist.avatar}" alt="${artist.name}">
          <div class="artist-info">
            <h3 class="artist-name">${artist.name}</h3>
            <span class="artist-role">${role}</span>
          </div>
        </div>
        <p class="artist-bio">${bio}</p>
        ${highlights.length ? `
          <ul class="artist-highlights">
            ${highlights.map((hl) => `<li>${(hl?.[state.lang] || hl?.en || '')}</li>`).join('')}
          </ul>
        ` : ''}
        <div class="artist-links">
          ${(artist.links || []).map((link) => `<a class="btn ghost" href="${link.href}" target="_blank" rel="noopener">${link.label}</a>`).join('')}
        </div>
      `;
      wrap.appendChild(card);
    });

    refreshMotionTargets();
  }

  function openLightbox(src, title, caption, alt){
    const dlg = qs('#lightbox');
    if(!dlg) return;
    qs('#lightbox-image').src = src;
    qs('#lightbox-image').alt = alt || title || '';
    qs('#lightbox-title').textContent = title || '';
    qs('#lightbox-text').textContent = caption || '';
    document.body.classList.add('dialog-open');
    dlg.showModal();
  }

  function closeLightbox(){
    const dlg = qs('#lightbox');
    if(!dlg) return;
    dlg.close();
    document.body.classList.remove('dialog-open');
  }

  function initLightbox(){
    const dlg = qs('#lightbox');
    if(!dlg) return;
    dlg.addEventListener('close', () => {
      document.body.classList.remove('dialog-open');
    });
    dlg.addEventListener('click', (evt) => {
      if(evt.target === dlg){
        closeLightbox();
      }
    });
    const closeBtn = qs('#lightbox [data-close]');
    if(closeBtn){
      closeBtn.addEventListener('click', closeLightbox);
    }
  }

  function initLinks(){
    const ensureUTM = (el, campaign) => {
      if(!el) return;
      const url = new URL(el.href);
      url.searchParams.set('utm_source', 'ravandeh.studio');
      url.searchParams.set('utm_medium', 'website');
      url.searchParams.set('utm_campaign', campaign);
      el.href = url.toString();
    };

    ensureUTM(qs('#link-shop'), 'hero');
    ensureUTM(qs('#link-ig'), 'hero');
    ensureUTM(qs('#link-yt'), 'hero');

    qsa('a[href*="instagram.com"]').forEach((link) => {
      if(link.id === 'link-ig') return;
      ensureUTM(link, link.href.includes('contact_section') ? 'contact_section' : 'footer');
    });
    qsa('a[href*="maqaze.shop"]').forEach((link) => {
      if(link.id === 'link-shop') return;
      ensureUTM(link, link.href.includes('contact_section') ? 'contact_section' : 'footer');
    });
    qsa('a[href*="youtube.com"]').forEach((link) => {
      if(link.id === 'link-yt') return;
      ensureUTM(link, 'footer');
    });
  }

  function initReveals(){
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if(entry.isIntersecting){
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.16 });

    qsa('[data-animate]').forEach((el) => observer.observe(el));
  }

  function applyMotionFrame(){
    motion.raf = null;
    if(MOTION_MEDIA.matches){
      return;
    }
    const centerX = motion.pointer.x - 0.5;
    const centerY = motion.pointer.y - 0.5;

    motion.elements.forEach((el) => {
      const depth = parseFloat(el.dataset.depth || '0');
      if(!depth){ return; }
      const x = centerX * depth * 160;
      const y = centerY * depth * 120 + motion.scroll * depth * -60;
      const rotate = centerX * depth * 8;
      el.style.setProperty('--parallax-x', `${x.toFixed(2)}px`);
      el.style.setProperty('--parallax-y', `${y.toFixed(2)}px`);
      el.style.setProperty('--parallax-rotate', `${rotate.toFixed(3)}deg`);
    });
  }

  function scheduleMotionFrame(){
    if(motion.raf || MOTION_MEDIA.matches){
      return;
    }
    motion.raf = requestAnimationFrame(applyMotionFrame);
  }

  function refreshMotionTargets(){
    motion.elements = qsa('[data-depth]');
    if(MOTION_MEDIA.matches){
      motion.elements.forEach((el) => {
        el.style.removeProperty('--parallax-x');
        el.style.removeProperty('--parallax-y');
        el.style.removeProperty('--parallax-rotate');
      });
      return;
    }
    scheduleMotionFrame();
  }

  function onPointerMove(evt){
    motion.pointer.x = evt.clientX / window.innerWidth;
    motion.pointer.y = evt.clientY / window.innerHeight;
    scheduleMotionFrame();
  }

  function onScroll(){
    const maxHeight = window.innerHeight;
    motion.scroll = Math.min(1, window.scrollY / Math.max(maxHeight, 1));
    scheduleMotionFrame();
  }

  function onResize(){
    refreshMotionTargets();
    scheduleMotionFrame();
  }

  function initMotion(){
    refreshMotionTargets();
    window.addEventListener('pointermove', onPointerMove, { passive: true });
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onResize);
    MOTION_MEDIA.addEventListener('change', () => {
      if(MOTION_MEDIA.matches){
        refreshMotionTargets();
      } else {
        scheduleMotionFrame();
      }
    });
  }

  function onToggleLang(){
    const previous = state.lang;
    state.lang = state.lang === 'fa' ? 'en' : 'fa';
    localStorage.setItem('lang', state.lang);
    document.body.classList.add('lang-switching');
    animateLangToggle();
    setTimeout(() => document.body.classList.remove('lang-switching'), 720);
    setDir();
    applyTexts();
    Promise.all([
      loadJSON('data/collections.json'),
      loadJSON('data/artists.json')
    ]).then(([cols, artists]) => {
      renderCollections(cols);
      renderArtists(artists);
      initReveals();
      console.info('[ravandeh] Language switched', { from: previous, to: state.lang });
    }).catch(() => {
      console.warn('[ravandeh] Language switch completed with fetch errors');
    });
  }

  function hydrate(){
    setDir();
    applyTexts();
    initLinks();
    initLightbox();
    initMotion();
    Promise.all([
      loadJSON('data/collections.json'),
      loadJSON('data/artists.json')
    ]).then(([cols, artists]) => {
      renderCollections(cols);
      renderArtists(artists);
      initReveals();
      console.info('[ravandeh] Content hydrated', { lang: state.lang });
    }).catch(() => {
      console.warn('[ravandeh] Hydration completed with fetch errors');
    });

    const toggle = qs('#lang-toggle');
    if(toggle){
      toggle.addEventListener('click', onToggleLang);
    }
  }

  document.addEventListener('DOMContentLoaded', hydrate);
})();
