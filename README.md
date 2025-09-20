<div align="center">

![](https://img.shields.io/badge/php-8.3.13-blue)
![](https://img.shields.io/badge/laravel-v10.37.1-red)
![](https://img.shields.io/badge/composer-2.8.12-orange)
![](https://img.shields.io/badge/node-20.10-green)


# laravel-orien

</div>

## VSCodeの拡張
拡張をインストールしてください。
### 必須
- PHP Intelephense
- Laravel Pint
- Pretter
- TailWind CSS IntelliSense
- Tailwind class sorter

### お好みで
- Laravel Artisan
- Laravel Blade Snippets
- Laravel Blade Spacer
- Laravel Extra Intellisense
- Laravel goto view
- Laravel Ide Helper
- Laravel Snippets
- laravel-goto-components
- laravel-goto-controller

<br>

# 初期設定と起動
## 初期設定

```
make init
```
`http://localhost/login` にアクセスして ログイン画面が表示されることを確認。
 
## 画面の自動更新


### 自動更新開始コマンド

```
make dev

  ➜  Local:   http://localhost:5173/
  ➜  Network: http://192.168.128.6:5173/
  ➜  press h to show help
  LARAVEL v10.43.0  plugin v0.7.8
  ➜  APP_URL: http://localhost
```


bladeを保存するとブラウザが自動で更新され、リアルタイムに反映されます。

### 自動更新の停止方法

ctrl + c（cmd + c）

<br>

## コンテナ

### mailpit（めーるぴっと）
http://localhost:8025/<br>
送信した全メールはmailpitが受信します。<br>
コンテナから外部へは一切送信されないので安心して使用してください。<br>

### minio（みんあいおー）
http://localhost:9090/login<br>
Username : admin<br>
password : password<br>

AWSのS3と同じ挙動する外部ストレージです。<br>
privateやpublicディレクトリはサーバーが終了すると消滅してしまうので、アップロードされた画像などは外部ストレージに保存するようにしましょう。<br>


## コード整形
.vscode/setting.jsonに自動保存とコード整形の設定が書かれています。
- PHPファイルを保存時に、Laravel Pintによるコードを整形します。
- Bladeファイル保存時に、Prittierによるコード整形をします。

## ドキュメント
### Laravel Docs（日本語ドキュメント）
https://laravel-jp.toolboxforweb.xyz/docs/category/%E3%81%AF%E3%81%98%E3%82%81%E3%81%AB