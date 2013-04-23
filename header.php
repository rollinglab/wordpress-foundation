<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site"> 
     <header id="masthead" class="site-header" role="banner">
          <div class="row">
               <div id="logo" class="large-4 columns">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?>
                         <img src="">
     			</a>
     		</div><!--#logo-->
     
     		<nav id="site-navigation" class="navigation-main large-8 columns" role="navigation">
     			<h1 class="menu-toggle"><?php _e( 'Menu', 'lab' ); ?></h1>
     			<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'lab' ); ?>"><?php _e( 'Skip to content', 'lab' ); ?></a></div>
     
     			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
     		</nav><!-- #site-navigation -->
          </div>
	</header><!-- #masthead -->