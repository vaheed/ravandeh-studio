(function(){
  const qs = s => document.querySelector(s);
  const qsa = s => Array.from(document.querySelectorAll(s));
  const state = { lang: (localStorage.getItem('lang') || 'fa') };

  function setDir() {
    document.documentElement.lang = state.lang;
    document.documentElement.dir = state.lang === 'fa' ? 'rtl' : 'ltr';
    document.body.classList.toggle('rtl', state.lang === 'fa');
  }

  function t(key){
    return (window.I18N[state.lang]||{})[key] || key;
  }

  function applyTexts() {
    qsa("[data-t]").forEach(el => { el.textContent = t(el.dataset.t); });
    qs("#lang-toggle").textContent = window.I18N[state.lang].language;
  }

  function loadJSON(path){ return fetch(path).then(r=>r.json()); }

  function renderCollections(data){
    const wrap = qs("#collections");
    wrap.innerHTML = "";
    data.collections.forEach(col => {
      const card = document.createElement("section");
      card.className = "card";
      card.innerHTML = `
        <h3>${col.title[state.lang]}</h3>
        <p class="muted">${col.description[state.lang]||""}</p>
        <div class="grid">
          ${col.items.map(it=>`
            <figure class="art" tabindex="0">
              <img loading="lazy" src="${it.image}" alt="${(it.title[state.lang]||'Artwork')}" />
              <figcaption>
                <div class="title">${it.title[state.lang]||""}</div>
                <div class="caption">${it.caption[state.lang]||""}</div>
              </figcaption>
            </figure>
          `).join("")}
        </div>`;
      wrap.appendChild(card);
    });

    // Lightbox
    qsa(".art img").forEach(img => {
      img.addEventListener("click", () => openLightbox(img.src, img.alt));
      img.parentElement.addEventListener("keypress", (e) => {
        if(e.key === "Enter") openLightbox(img.src, img.alt);
      });
    });
  }

  function renderArtists(data){
    const wrap = qs("#artists");
    wrap.innerHTML = "";
    data.artists.forEach(a => {
      const card = document.createElement("div");
      card.className = "artist";
      card.innerHTML = `
        <img class="avatar" src="${a.avatar}" alt="${a.name}" />
        <div class="meta">
          <div class="name">${a.name}</div>
          <div class="role">${(a.role && a.role[state.lang])||""}</div>
          <p class="bio">${(a.bio && a.bio[state.lang])||""}</p>
          ${(a.links||[]).map(l=>`<a class="btn ghost" href="${l.href}" target="_blank" rel="noopener"> ${l.label} </a>`).join("")}
        </div>`;
      wrap.appendChild(card);
    });
  }

  function openLightbox(src, alt){
    const dlg = qs("#lightbox");
    qs("#lightbox img").src = src;
    qs("#lightbox img").alt = alt || "";
    dlg.showModal();
  }

  function initLightbox(){
    const dlg = qs("#lightbox");
    dlg.addEventListener("click", (e)=>{
      if(e.target === dlg) dlg.close();
    });
    qs("#lightbox [data-close]").addEventListener("click", ()=>dlg.close());
  }

  function initLinks(){
    // Ensure UTM params on key links
    const UTM = "utm_source=ravandeh.studio&utm_medium=website&utm_campaign=header";
    const shop = qs("#link-shop");
    const ig = qs("#link-ig");
    const yt = qs("#link-yt");
    [shop, ig, yt].forEach(a => {
      if(!a) return;
      const url = new URL(a.href);
      if(!url.searchParams.has("utm_source")){
        UTM.split("&").forEach(p=>{
          const [k,v] = p.split("=");
          url.searchParams.set(k,v);
        });
        a.href = url.toString();
      }
    });
  }

  function onToggleLang(){
    state.lang = state.lang === 'fa' ? 'en' : 'fa';
    localStorage.setItem('lang', state.lang);
    setDir();
    applyTexts();
    // reload content to reflect localized fields
    Promise.all([loadJSON('data/collections.json'), loadJSON('data/artists.json')]).then(([cols, arts])=>{
      renderCollections(cols);
      renderArtists(arts);
    });
  }

  function onReady(){
    setDir();
    applyTexts();
    initLightbox();
    initLinks();
    Promise.all([loadJSON('data/collections.json'), loadJSON('data/artists.json')]).then(([cols, arts])=>{
      renderCollections(cols);
      renderArtists(arts);
    });
    qs("#lang-toggle").addEventListener("click", onToggleLang);
  }

  document.addEventListener("DOMContentLoaded", onReady);
})();