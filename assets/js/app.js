(function(){
  'use strict';

  const qs = (selector) => document.querySelector(selector);
  const qsa = (selector) => Array.from(document.querySelectorAll(selector));
  const LANGS = Object.keys(window.I18N);
  const DEFAULT_LANG = 'en';

  const state = {
    lang: (localStorage.getItem('lang') && LANGS.includes(localStorage.getItem('lang')))
      ? localStorage.getItem('lang')
      : DEFAULT_LANG,
    quoteIndex: 0,
    quoteTimer: null
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

  function updateLangToggle(){
    const btn = qs('#lang-toggle');
    if(!btn) return;
    const targetLang = state.lang === 'fa' ? 'en' : 'fa';
    btn.textContent = window.I18N[targetLang]?.language_short || targetLang.toUpperCase();
    btn.setAttribute('aria-label', window.I18N[targetLang]?.language_full || 'Switch language');
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
      }, 400);
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
      const title = col.title?.[state.lang] || '';
      const description = col.description?.[state.lang] || '';
      const items = Array.isArray(col.items) ? col.items : [];

      card.innerHTML = `
        <div class="collection-meta">
          <h3>${title}</h3>
          <p>${description}</p>
        </div>
        <div class="collection-gallery">
          ${items.map((item, index) => {
            const itemTitle = item.title?.[state.lang] || '';
            const itemCaption = item.caption?.[state.lang] || '';
            return `
              <figure class="collection-item" tabindex="0" data-index="${index}">
                <img loading="lazy" src="${item.image}" alt="${itemTitle || 'Artwork'}">
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
        const titleText = item.title?.[state.lang] || '';
        const captionText = item.caption?.[state.lang] || '';
        const open = () => openLightbox(img.src, titleText, captionText);
        img.addEventListener('click', open);
        figure.addEventListener('keypress', (evt) => {
          if(evt.key === 'Enter'){ open(); }
        });
      });
    });
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
      const role = artist.role?.[state.lang] || '';
      const bio = artist.bio?.[state.lang] || '';
      card.innerHTML = `
        <div class="artist-header">
          <img class="artist-avatar" src="${artist.avatar}" alt="${artist.name}">
          <div class="artist-info">
            <h3 class="artist-name">${artist.name}</h3>
            <span class="artist-role">${role}</span>
          </div>
        </div>
        <p class="artist-bio">${bio}</p>
        <div class="artist-links">
          ${(artist.links || []).map((link) => `<a class="btn ghost" href="${link.href}" target="_blank" rel="noopener">${link.label}</a>`).join('')}
        </div>
      `;
      wrap.appendChild(card);
    });
  }

  function openLightbox(src, title, caption){
    const dlg = qs('#lightbox');
    if(!dlg) return;
    qs('#lightbox-image').src = src;
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
    }, { threshold: 0.12 });

    qsa('[data-animate]').forEach((el) => observer.observe(el));
  }

  function onToggleLang(){
    const previous = state.lang;
    state.lang = state.lang === 'fa' ? 'en' : 'fa';
    localStorage.setItem('lang', state.lang);
    document.body.classList.add('lang-switching');
    setTimeout(() => document.body.classList.remove('lang-switching'), 600);
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
