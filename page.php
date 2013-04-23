<?php get_header(); ?>

	<article id="main" <?php post_class( 'row' ); ?>>
     	<div class="columns large-12">
     	
		<?php if ( have_posts() ) : ?>
		
			<?php while ( have_posts() ) : the_post(); ?>

     		     <header class="page-header">
        		          <h1 class="page-title"><?php the_title(); ?></h1>
        		     </header><!-- .entry-header -->
        		     
        		     <div class="page-meta">        		     
        		          <?php breadcrumb_trail( array( 'separator' => '>', 'before' => '' ) ); ?>
        		     </div>
        		     
        		     <div class="row content-area">
        		          <div id="primary" class="large-12 columns">
        		          	<div id="content">
                       		     <div class="entry-content">
                       		          <?php the_content(); ?>
                       		          <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', '_s' ), 'after' => '</div>' ) ); ?>
                       		     </div><!-- .entry-content -->             		     
        		          	</div><!--#content-->
             		     </div>
        		     </div>
        		     
			<?php endwhile; ?>

		<?php endif; ?>

		</div><!-- #content -->
	</article><!-- #primary -->

<?php get_footer(); ?>