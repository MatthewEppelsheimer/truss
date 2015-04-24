<?php
/**
 * The template part for displaying standard post content.
 *
 * This file is normally loaded in these situations.
 * Each time is an archive (list of posts) and is inside The Loop:
 *     - From `archive.php`: A post with standard ('false') post format
 *     - From `search.php`: Any post (a `content-search.php` partial doesn't exist)
 *     - From `index.php`: A post with standard ('false') post format
 *
 * @package truss
 */
?>

<?php tha_entry_before(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); echo apply_filters( 'truss_content_article_html_params', '' ); ?>>
	<?php tha_entry_top(); ?>
	<?php truss_entry(); ?>
	<?php tha_entry_bottom(); ?>
</article>
<?php tha_entry_after();
