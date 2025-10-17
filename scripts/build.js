#!/usr/bin/env node
'use strict';

const fs = require('fs');
const path = require('path');

const distDir = path.join(process.cwd(), 'dist');
const itemsToCopy = ['index.html', 'assets', 'data', 'CNAME', '.nojekyll'];

function copyRecursive(src, dest){
  const stats = fs.statSync(src);
  if(stats.isDirectory()){
    if(!fs.existsSync(dest)){
      fs.mkdirSync(dest, { recursive: true });
    }
    fs.readdirSync(src).forEach((entry) => {
      copyRecursive(path.join(src, entry), path.join(dest, entry));
    });
  } else {
    fs.copyFileSync(src, dest);
  }
}

function main(){
  fs.rmSync(distDir, { recursive: true, force: true });
  fs.mkdirSync(distDir, { recursive: true });

  itemsToCopy.forEach((item) => {
    const sourcePath = path.join(process.cwd(), item);
    if(!fs.existsSync(sourcePath)){
      console.warn(`[build] Skipping missing item: ${item}`);
      return;
    }
    const destPath = path.join(distDir, item);
    console.info(`[build] Copying ${item}`);
    copyRecursive(sourcePath, destPath);
  });

  console.info('[build] Static bundle ready in dist/.');
}

try {
  main();
} catch (error) {
  console.error('[build] Error:', error.message);
  process.exit(1);
}
