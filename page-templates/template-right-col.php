<?php
/**
 * Template Name: Two Column, Right-Sidebar
 *
 * @package truss
 */

get_header(); ?>

	<main class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'page-templates/partials/content', 'page' );
				?>

			<?php endwhile; ?>

			<?php truss_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'partials/content', 'none' ); ?>

		<?php endif; ?>

	</main>

<?php get_sidebar(); ?>
<?php get_footer();
