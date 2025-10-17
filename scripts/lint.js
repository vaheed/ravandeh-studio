#!/usr/bin/env node
'use strict';

const fs = require('fs');
const path = require('path');

const filesToCheck = [
  'index.html',
  'assets/css/styles.css',
  'assets/js/app.js',
  'assets/js/i18n.js',
  'README.md',
  'docs/README.md',
  'docs/OWNER_GUIDE_FA.md',
  'docs/RAVANDEH_SITE_PROMPT.md',
  'docs/RAVANDEH_UI_UX_PROMPT_APPLE.md',
  'CHANGELOG.md'
];

function hasTrailingWhitespace(line){
  return /\s$/.test(line);
}

function run(){
  const issues = [];

  filesToCheck.forEach((file) => {
    const filePath = path.join(process.cwd(), file);
    if(!fs.existsSync(filePath)){
      issues.push(`Missing file: ${file}`);
      return;
    }
    const lines = fs.readFileSync(filePath, 'utf8').split(/\r?\n/);
    lines.forEach((line, index) => {
      if(hasTrailingWhitespace(line)){
        issues.push(`${file}:${index + 1} has trailing whitespace`);
      }
    });
  });

  if(issues.length){
    console.error('[lint] Issues found:', issues.join('\n'));
    process.exitCode = 1;
    throw new Error('Lint failed');
  }

  console.info('[lint] All files passed trailing whitespace check.');
}

try {
  run();
} catch (error) {
  console.error('[lint] Error while running lint:', error.message);
  process.exit(1);
}
