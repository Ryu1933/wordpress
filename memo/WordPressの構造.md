# WordPressの構造
- [ワードプレスの仕組みを「構成」と「PHPの動き」から解説](https://daeuwordpress.com/wordpress-system/#PHP)
    - コア部
        - 直下のPHPファイル群 + wp-includes (WPが提供する関数がここ)
    - 管理画面生成部
        - wp-admin
    - コンテンツ生成部
        - wp-content (カスタマイズするのはここ)
    

- [WordPressの仕組みと構造](http://359ch.jp/helpdesk/wordpress/structure/)
    - 基本いじるのはテーマとプラグインのみ
    - テーマにより構成が違う。配布元の解説を確認するのが確実


- 起動時の流れ　(ソースを辿っていけば分かるが一応メモ)
    - > STEP.1
    Apache 等のウェブサーバーがindex.phpを実行

    - > STEP.2
    index.phpがwp-blog-header.phpを実行
    （同時にWordPress起動用のPHPも実行していくがそちらは省略）

    - > STEP.3
    wp-blog-header.phpがwp関数を実行
    このwp関数でメインクエリーが発行され投稿データが取得される

    - > STEP.4
    wp-blog-header.phpがtemplate-loader.phpを実行

    - > STEP.5
    template-loader.phpがテーマ内のsingle.phpファイルを実行

    このとき実行されるPHPは表示するページの種類によって異なる

    例えば
    投稿ページの場合：single.php
    固定ページの場合：page.php
    要求されたページがない場合：404.php

    - > STEP.6
    single.phpが投稿ページを構成するのに必要なPHPを実行してページを作成

    例えば
    ヘッダー：header.php
    サイドバー：sidebar.php
    フッター：footer.php

    記事本文は投稿データから取得して作成