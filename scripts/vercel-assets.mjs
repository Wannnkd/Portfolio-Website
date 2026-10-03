import {
  cpSync,
  existsSync,
  mkdirSync,
  rmSync,
} from "node:fs";

const output = "dist";

rmSync(output, { recursive: true, force: true });
mkdirSync(output, { recursive: true });

const publicAssets = [
  "build",
  "files",
  "favicon.ico",
  "robots.txt",
];

for (const asset of publicAssets) {
  const source = `public/${asset}`;

  if (existsSync(source)) {
    cpSync(source, `${output}/${asset}`, { recursive: true });
  }
}