## 概要
DrupalのentityをReactのビルド後のjsでレンダリング.
Reactのroutingの実装.
開発環境(HMR)の実装.
UIライブラリの実装.(MUI/JOYUI)

## 開発
js/で
``` bash
npm run dev
```
→ 開発サーバーの構築（HMRが機能します）
※HMRが機能する条件はlocal環境かつlocalhost:5173が立っている場合。

HMRが機能しない場合はキャッシュのクリアを行なってください。
``` bash
drush cr
```

静的ファイルのビルド
``` bash
npm run build
```
/distに静的ファイルが生成されます。


