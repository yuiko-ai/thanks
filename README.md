<div align="center">

![](https://img.shields.io/badge/php-8.2.13-blue)
![](https://img.shields.io/badge/preline-1.9.0-liteblue)
![](https://img.shields.io/badge/laravel-v10.37.1-red)
![](https://img.shields.io/badge/composer-2.6.4-orange)
![](https://img.shields.io/badge/node-20.10-green)


# living-kumamoto

</div>

# 概要

- 認証には Breeze を使用しています。
- アルサーガログインセキュリティ V2 を実装してます。
  <br>

## 基本機能

### **アルサーガログインセキュリティ V2 実装**

- 初めてログインする端末（ブラウザ）などでのログインがあった場合メールで通知
- パスワードを 10 回以上間違えた場合 1 時間のロック状態（管理画面で解除可能）
- メールアドレスの変更。パスワードの変更が発生した場合、メール通知
- ログインしたデバイスリストを確認できる UI。またそこから使っていないデバイス（ブラウザ）の削除
- デバイスリストから削除されたデバイスのログイン状態を解除する
- デバイスリストにないデバイスからログインされた場合、登録されているメールに通知する
- パスワードを変更した場合、全てのログイン済みデバイスの削除（セッション削除）

  ※マルチ認証には対応していません。
  <br>

### **実装済みのログ**

- **管理者のみ閲覧可能**
  - 全アカウントのログインログ<br>
    (id, user_id, ip_address, user_agent, session_id, login_at, updated_at, created_at)
- **全権限で閲覧可能**
  - アカウント毎のデバイスログ<br>
    (id, user_id, ip_address, user_agent, updated_at, created_at)

# VSCodeの拡張
## 必須
- PHP Intelephense
- Laravel Pint
- Pretter
- TailWind CSS IntelliSense
- Tailwind class sorter

## お好みで
- Laravel Artisan
- Laravel Blade Snippets
- Laravel Blade Spacer
- Laravel Extra Intellisense
- Laravel goto view
- Laravel Ide Helper
- Laravel Snippets
- laravel-goto-components
- laravel-goto-controller

# docker 起動 & インストール

```
$ make init
```

<br>

# 画面の自動更新を開始

## 自動更新開始コマンド

```
$ make dev
```

```
VITE v4.3.9  ready in 330 ms

  ➜  Local:   http://localhost:5173/
  ➜  Network: use --host to expose
  ➜  press h to show help

  LARAVEL v9.52.4  plugin v0.7.8

  ➜  APP_URL: http://localhost/

```

1. `http://localhost/` にアクセスして ログイン画面が表示されることを確認。
2. resources/views/※※※※※※.blade.php を編集して保存すると、ブラウザが自動で更新され、修正が反映されることを確認。

## 停止コマンド

ctrl + c

# 情報

## ログイン

ID : test@example.com<br>
PS : password<br>

<br>

# 本番へのデプロイ（コンテナ環境）

### 前提

- AWS
- CodePipeline
- CodeBuild
- ECS

### .env.production の内容を調整する

- 本番に必要な環境変数を記載する
- DB への接続情報など、秘匿性の高いものは、SecretManager での管理を検討する
- ↑ そこまでセキュリティにこだわる必要がなければ、ECS の環境変数設定へのベタ書き、S3 からの env ファイル読み込みなども検討

### buildspec.yml へ必要な設定を記載する

- 下記３箇所に、本番環境の情報を入れる

```
# 環境変数の設定。your_...の部分に環境に応じた値を入れること
- AWS_ACCOUNT_ID=your_aws_account_id
- REPOSITORY_URI=${ECR_URI}/your_ecr_repository_path
- CONTAINER_NAME=your_ecs_container_name
```

### CodeBuild と CodePipeline の設定は下記参照

- [Backlog:wiki-Fargate に Laravel 環境をデプロイする](https://vitgear.backlog.com/alias/wiki/850465)

<br>

# References

[Laravel](https://readouble.com/laravel/9.x/ja/installation.html) <br>
[Preline](https://preline.co/index.html) <br>
[Figma](https://www.figma.com/file/HEQLlvPN0vej33csmYmump/FVS_%E7%AE%A1%E7%90%86%E7%94%BB%E9%9D%A2%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88?type=design&node-id=0-1&mode=design&t=WEYDhbsuaYCYdaIo-0) <br>


## 2要素認証

- .env の TWO_FACTOR_AUTHENTICATION を true にすると有効になる
- config\auth.php two_factor で有効期限と桁数の設定ができる

## Loggerの使い方

### slack通知の設定

.envのLOG_SLACK_WEBHOOK_URLにSLACK_IDを入力

### 記述方法

```
use App\Library\Logger;

try {
    処理
} catch (\Exception $e) {
    Logger::info($e, __FILE__);
    Logger::slack($e, __FILE__);
}
```