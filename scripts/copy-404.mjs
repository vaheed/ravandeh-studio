#!/usr/bin/env node
import { copyFile, access } from 'fs/promises';
import { constants } from 'fs';
import path from 'path';
import url from 'url';

const __dirname = path.dirname(url.fileURLToPath(import.meta.url));
const buildDir = path.resolve(__dirname, '..', 'build');
const indexFile = path.join(buildDir, 'index.html');
const notFoundFile = path.join(buildDir, '404.html');

async function ensureFileExists(filePath) {
  try {
    await access(filePath, constants.F_OK);
    return true;
  } catch (error) {
    console.error(`[copy-404] Missing required file: ${filePath}`);
    console.error(error instanceof Error ? error.message : error);
    return false;
  }
}

async function run() {
  console.info('[copy-404] Preparing GitHub Pages fallback.');

  const indexExists = await ensureFileExists(indexFile);
  if (!indexExists) {
    process.exitCode = 1;
    return;
  }

  try {
    await copyFile(indexFile, notFoundFile);
    console.info(`[copy-404] Created fallback ${notFoundFile}`);
  } catch (error) {
    console.error('[copy-404] Unable to create 404.html');
    console.error(error instanceof Error ? error.stack ?? error.message : error);
    process.exitCode = 1;
  }
}

run();
