<?php get_header(); ?>

	<article id="main" class="row">
     	<div class="columns large-12">
			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'lab' ); ?></h1>
			</header><!-- .entry-header -->
   		     
   		     <div class="page-meta">        		     
   		          <?php breadcrumb_trail( array( 'separator' => '>', 'before' => '' ) ); ?>
   		     </div>
   		     
   		     <div class="row content-area">
   		          <div id="primary" class="large-8 columns">
   		          	<div id="content">
        		          	<div class="entry-content">
        		          	     <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'lab' ); ?></p>
        		          	
        		          	     <?php get_search_form(); ?>
        		          	
        		          	</div><!-- .entry-content -->             		     
   		          	</div><!--#content-->
        		     </div><!--#primary-->
        		     
        		     <?php get_sidebar(); ?>
        		     
   		     </div>
		</div>
	</article>

<?php get_footer(); ?>