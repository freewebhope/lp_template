## LP作成時の使い方

### 1.clone（初回だけ）
ソースコードを持ってくる
```
$ git clone git@github.com:freewebhope/lp_template.git
```

### 2.最新データに更新
```
$ git checkout develop
$ git pull origin develop
```

### 3.LP用リポジトリを作成

### 4.LPリポジトリにlp_templateをpush
```
$ cd lp_template
$ git push --mirror git@github.com:freewebhope/コピー先リポジトリ名.git
```

### 5.LPのリポジトリをクローンして`npm i`して作業開始


## 作業フォルダの説明

```
lp_template - dist: サーバーに上げるフォルダ
                └index.html: minify済HTML
                └_index.html: 編集するHTML
                └images: 画像フォルダ
                └js: jsフォルダ
                └css: CSSフォルダ
                    └ style.css: tailwindを含めたminify済のファイル
            - src: 作業フォルダ
                └css: CSSの元データが入っているフォルダ
```


