<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package truss
 */
?>
		<?php tha_content_bottom(); ?>
		</div><?php /* .site-content */ ?>
		<?php tha_content_after(); ?>
   		<?php tha_footer_before(); ?>
		<footer id="colophon" class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
			<?php tha_footer_top(); ?>
			<div class="site-info">
				<?php do_action( 'truss_credits' ); ?>
				<a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Proudly powered by <span class="genericon genericon-wordpress"></span> %s', 'truss' ), 'WordPress' ); ?></a>
			</div>
			<?php tha_footer_bottom(); ?>
		</footer>
		<?php tha_footer_after(); ?>
	</div><?php /* .wrap */ ?>
</div><?php /* .site */ ?>

<?php tha_body_bottom(); ?>
<?php wp_footer(); ?>
</body>
</html>
