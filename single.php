<?php get_header(); ?>

	<article id="main" <?php post_class( 'row' ); ?>>
     	<div class="columns large-12">
     	
		<?php if ( have_posts() ) : ?>
		
			<?php while ( have_posts() ) : the_post(); ?>

     		     <header class="page-header">
        		          <h1 class="page-title"><?php the_title(); ?></h1>
        		          
        		          <?php if ( 'post' == get_post_type() ) : ?>
        		          <div class="entry-meta">
        		          	<?php lab_posted_on(); ?>
        		          </div><!-- .entry-meta -->
        		          <?php endif; ?>        		          
        		     </header><!-- .entry-header -->
        		     
        		     <div class="page-meta">        		     
        		          <?php breadcrumb_trail( array( 'separator' => '>', 'before' => '' ) ); ?>
        		     </div>
        		     
        		     <div class="row content-area">
        		          <div id="primary" class="large-8 columns">
        		          	<div id="content">
        		          	    
             		          	<?php get_template_part( 'content', 'single' ); ?>
        		          	    
        		          	</div><!--#content-->
             		     </div>
             		     
             		     <?php get_sidebar(); ?>
             		     
        		     </div>
        		     
			<?php endwhile; ?>

		<?php endif; ?>

		</div><!-- #content -->
	</article><!-- #primary -->

<?php get_footer(); ?>