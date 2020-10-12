### Laravel環境構築
[Laravel環境構築](https://qiita.com/dai_designing/items/6fe5f678bf5a05e27c05)


```bash
#〜
$ vagrant up
$ vagrant ssh
vagrant@homestead:~$ cd code
# 上記記事からここまで進める
```

### クローンファイルを動かす
下記をどこでも良いのでクローン
使うのは中身のファイルのみ

```bash
$ git clone https://github.com/dai-570415/laravel-crud-api.git
```

ローカルのcodeフォルダにクローンファイル中身を移動

```bash
# マイグレート
$ php artisan migrate

# ストレージリンク作成（画像読み込みに使用）
$ php artisan storage:link 
```