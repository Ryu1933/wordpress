<?php
/**
 * Template part for displaying page content in page-demo.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

// DBアクセスモジュールをインポート
require_once ABSPATH . 'wp-load.php';
global $wpdb;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header alignwide">
		<?php 
		echo('Tables_in_wordpress')
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		// クエリを用意
		$query = "show tables;";
		// クエリを実行
		$results = $wpdb->get_results($wpdb->prepare($query), "ARRAY_A");
		// 結果を描画
		$has_header = false;
		foreach ($results as $row) {
			// 初回だけカラム名を描画
			if (!$has_header) {
				$has_header = true;
				echo("<div><b>");
				foreach (array_keys($row) as $column) {
					echo($column . "&nbsp;");
				}
				echo("</b></div>");
			}
			// 値を描画
			// ※Htmlタグをphpタグの外で書いてみる
			foreach ($row as $value) {
		?>
		<div>
			<?php
				echo($value . "&nbsp;");
			?>
		</div>
		<?php
			}
		}
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
