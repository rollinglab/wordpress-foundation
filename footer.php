	<footer id="colophon" class="site-footer" role="contentinfo">
     	<div class="row">
          	<div class="large-3 columns">
               	<?php dynamic_sidebar( 'footer-1' ); ?>
          	</div>
          	<div class="large-3 columns">
               	<?php dynamic_sidebar( 'footer-2' ); ?>
          	</div>
          	<div class="large-3 columns">
               	<?php dynamic_sidebar( 'footer-3' ); ?>
          	</div>
          	<div class="large-3 columns">
               	<?php dynamic_sidebar( 'footer-4' ); ?>
          	</div>          	          	          	
     	</div>
     	<div class="row">
          	<div class="site-info large-12 columns">
<!--
     			<?php do_action( '_s_credits' ); ?>
     			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'lab' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'lab' ), 'WordPress' ); ?></a>
     			<span class="sep"> | </span>
     			<?php printf( __( 'Theme: %1$s by %2$s.', 'lab' ), 'lab', '<a href="http://automattic.com/" rel="designer">Automattic</a>' ); ?>
-->
     		</div><!-- .site-info -->
     	</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>