# クエリ
- [ワードプレスのクエリとは？メインクエリとサブクエリの違いは？](https://daeuwordpress.com/query/)
    - メインクエリ
        - WPによって自動作成 / 発行
        - URL に基づく
        - WP起動直後に発行
            > そのため single.php や archive.php などのテーマのテンプレートファイルが実行される時点で投稿データの取得が完了しています。
    - サブクエリ
        - 自前で作成するクエリ
        - 使い方
            - 引数定義  
                > $args = array(
	                'comment_count' => array(
		                'value'   => 0,
		                'compare' => '>',
	                ),
                );
            - クエリ発行
                > $my_query = new WP_Query( $args );
            - 結果取得
                > while ( $my_query->have_posts() ) {  
                    $the_query->the_post();  
                    ...  
                }
                - [ワードプレスの「have_posts・the_post ループ」について徹底的に解説](https://daeuwordpress.com/have_posts_the_post/#have_posts)
                    - have_posts()
                        - current_post + 1 がpost_count より小さいがどうかをチェック
                    - the_post()
                        - current_post が +1 
                        - posts 配列 からデータを取ってpostに格納
            - リセット
                > wp_reset_postdata();
        - [手引き](https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/WP_Query#.E3.83.91.E3.83.A9.E3.83.A1.E3.83.BC.E3.82.BF)
        - デモ作成（コミット：f9fc8c3）時に使った$wpdbとはどう違う？
            - [how does $wpdb differ to WP_Query?](https://wordpress.stackexchange.com/questions/53819/how-does-wpdb-differ-to-wp-query)
                - Use WP_Query when dealing with the native WordPress tables.
                - Use wpdb directly when you need to access data in your own tables.
