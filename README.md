# <a href="https://tweet-seeker.net/twitter">TweetSeeker</a>
## 履歴
- 2022.08.25：tailwindの導入、ページネーション機能を追加しました。
- 2022.08.24：チェックボックスの一斉チェック/解除機能を追加しました。
- 2022.08.23：チェックボックスに一つもチェックが入っていない場合にエラーメッセージが表示されるように修正しました。
## ログイン
初回は以下の画面からログイン。テストIDとパスワードは以下の通り。
https://tweet-seeker.net/login
- ID:admin@gmail.com
- Pass:admin1234
## 概要
TweetSeekerは，TwitterのAPIを利用し，キーワードに合致するTweetを検索・保存できるWebアプリです。<br>
https://tweet-seeker.net/twitter
## 使用技術
1. PHP 8.0.20
2. Laravel 9.24.0
3. JavaScript
4. AWS
5. tailwind css
## 環境(AWS)
1. VPCで仮想ネットワークを構築。
2. パブリックサブネットにEC2でWebサーバーを設置。
3. プライベートサブネットにRDSでデータベースサーバーを設置。
4. ElasticアドレスでIPアドレスを固定。
5. Route53でホストゾーンを作成。
6. ドメインを取得し，WebサイトをHttps化。
7. ELBロードバランサーで負荷分散。
## 機能
1. Twitterを検索し，100件のTweetを表示することができます。
2. 検索したTweetをデータベースに保存できます。チェックボックスにチェックし，一度に複数のTweetを保存することができます。
3. 保存したTweetを閲覧できます。
4. 保存したTweetを削除できます。チェックボックスにチェックし，一度に複数のTweetを削除することができます。
