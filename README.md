## LP用の新規リポジトリを作る

### 1.テンプレートを元にリポジトリを作成
<img width="502" alt="スクリーンショット 2022-01-25 19 11 17" src="https://user-images.githubusercontent.com/12563842/150957142-f42f7e31-6185-4666-8759-fb732f00f798.png">

#### リポジトリの命名規則は以下
- LP（静的ページのみ）の場合は冒頭に`lp_`をつける
- アプリケーションの場合は冒頭に`app_`をつける
- なんらかのCMSなどに組み込む場合はそのサービス名の後に`_`をつける
- 一旦テストなどで作っているものは冒頭に`test_`をつける
- 企業名は、ケバブケースで記載（koreha-kebab-case）
- 
#### ディスクリプションにはなんのリポジトリなのかを記載

```
例：
LP：　lp_koreha-kebab-case
APP:app_koreha-kebab-case
ECFORCE:ecforce_koreha-kebab-case
TEST:test_koreha-kebab-case
```

#### ※注意点※
- 公開設定は必ず`Public`にすること


作業環境作成

### 1.`npm`と`git`が使えるか確認する
- nodeのversionは`16.13.2`

### 2.リポジトリ配下で`npm i` を打ち、`package.json`を展開する

### 3.以下コマンドを、ターミナルを２枚開いて別で実行

```
//tailwindの監視開始
$ npm run dev

//ローカルサーバ立ち上げ（ブラウザの自動リロードが使えるようになります）
$ npm run watch

```

## 作業フォルダの説明

```
lp_template - dist: サーバーに上げるフォルダ
                └index.html: 作業HTML
                └images: 画像フォルダ
                └js: jsフォルダ
                └css: CSSフォルダ
                    └ style.min.css: tailwindを含めたminify済のファイル
                    └ style.css: 編集するCSS
```

## バージョン管理方法
弊社は基本的に`git-flow`に則ってタスク管理をしております。
https://cloudsmith.co.jp/blog/efficient/2020/08/1534208.html

### 1.`develop`ブランチを最新にする

```
$ git checkout develop
$ git pull origin develop
```

### 2.issueを作成

### 3.作成したissue番号を元にブランチを作成

```
$ git checkout -b feature/#1
```

### 4.作業

### 5.作業が終わったらコミットメッセージの作成

```
$ git add .
$ git commit -m "ヘッダーの修正"
```

### 6.リモートリポジトリに修正をプッシュ

```
$ git push origin feature/#1
```

### 7.`develop`に向けた`pullRequest`の作成

### 8.管理者がいる場合は`PullReqest`を管理者に共有。いない場合はセルフマージする


## サーバアップの方法
### 1.リポジトリのSettings/Secretsを開いて以下を作成
それぞれの情報はエンジニアにヒアリングお願いします。
```
FTP_PASSWORD
FTP_SERVER
FTP_USERNAME
```
### 2.mainブランチに最新のデータをマージ

### 3.以下で確認(反映に１-5分ほどかかります)

### 4.（社内のみ）完了したらSlackに通知が飛びますので、そちらをご確認ください
