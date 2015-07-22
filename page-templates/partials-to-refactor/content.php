<?php
/**
 * The template part for displaying standard post content.
 *
 * This file is normally loaded in these situations.
 * Each time is an archive (list of posts) and is inside The Loop:
 *     - From `archive.php`: A post with standard ('false') post format
 *     - From `search.php`: Any post (a `content-search.php` partial doesn't exist)
 *
 * @deprecated Migrating away from using this pattern; its contents are duplicated
 *             in truss-loop.php.
 *
 * @notice     Port any changes here into truss-loop.php
 *
 * @package truss
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); echo apply_filters( 'truss_content_article_html_params', '' ); ?>>
	<?php tha_entry_top(); ?>
	<?php truss_entry(); ?>
	<?php tha_entry_bottom(); ?>
</article>
