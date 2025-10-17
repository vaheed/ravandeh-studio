#!/usr/bin/env node
'use strict';

const fs = require('fs');
const path = require('path');

const LANGS = ['en', 'fa'];

function loadJSON(file){
  const fullPath = path.join(process.cwd(), file);
  if(!fs.existsSync(fullPath)){
    throw new Error(`Missing data file: ${file}`);
  }
  return JSON.parse(fs.readFileSync(fullPath, 'utf8'));
}

function assert(condition, message){
  if(!condition){
    throw new Error(message);
  }
}

function validateCollections(){
  const data = loadJSON('data/collections.json');
  assert(Array.isArray(data.collections), 'collections must be an array');

  data.collections.forEach((collection, idx) => {
    LANGS.forEach((lang) => {
      assert(collection.title && collection.title[lang], `collection[${idx}] missing title for ${lang}`);
      assert(collection.description && collection.description[lang], `collection[${idx}] missing description for ${lang}`);
    });

    assert(Array.isArray(collection.items) && collection.items.length > 0, `collection[${idx}] requires at least one item`);

    collection.items.forEach((item, itemIdx) => {
      assert(item.image, `collection[${idx}].items[${itemIdx}] missing image path`);
      LANGS.forEach((lang) => {
        assert(item.title && item.title[lang], `collection[${idx}].items[${itemIdx}] missing title for ${lang}`);
        assert(item.caption && item.caption[lang], `collection[${idx}].items[${itemIdx}] missing caption for ${lang}`);
      });
    });
  });
}

function validateArtists(){
  const data = loadJSON('data/artists.json');
  assert(Array.isArray(data.artists), 'artists must be an array');

  data.artists.forEach((artist, idx) => {
    assert(artist.name, `artist[${idx}] missing name`);
    assert(artist.avatar, `artist[${idx}] missing avatar`);
    LANGS.forEach((lang) => {
      assert(artist.role && artist.role[lang], `artist[${idx}] missing role for ${lang}`);
      assert(artist.bio && artist.bio[lang], `artist[${idx}] missing bio for ${lang}`);
    });
  });
}

function main(){
  validateCollections();
  validateArtists();
  console.info('[test] Data integrity checks passed.');
}

try {
  main();
} catch (error) {
  console.error('[test] Failure:', error.message);
  process.exit(1);
}
