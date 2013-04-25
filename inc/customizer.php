<?php

$theme_options = get_option('lab_options');

/**
 * Define default styles
 */
 
function lab_default_options() {
     
     $args = array(
          'color_scheme' => 'default'
     );
     
     add_option( 'lab_options', $args );
          
}
add_action( 'after_setup_theme', 'lab_default_options' );



/**
 * Adds link in WordPress Admin Menu to the theme customizer
 */

function lab_customizer_link() {
    // add the Customize link to the admin menu
    add_menu_page( 'Theme Options', 'Theme Options', 'edit_theme_options', 'customize.php', '', '', 120 );
}
add_action( 'admin_menu', 'lab_customizer_link' );



/**
 * Setup Theme Customizer
 */
 
function mytheme_customize_register( $wp_customize ) {

     // Section for most theme colors
     $wp_customize->add_section( 'lab_theme_colors', array(
         'title'          => __( 'Color Scheme', 'lab' ),
         'priority'       => 100,
     ) );

     $wp_customize->add_setting( 'lab_options[color_scheme]', array(
         'default'        => 'default',
         'type'           => 'option',
         'capability'     => 'edit_theme_options',
     ) );
     
     $wp_customize->add_control( 'lab_options[color_scheme]', array(
          'label'   => 'Select Color Scheme',
          'section' => 'lab_theme_colors',
          'type'    => 'select',
          'choices'    => array(
               'default' => 'Light',
               'dark'    => 'Dark',
               'red'     => 'Red',               
               'green'   => 'Green',               
               'blue'    => 'Blue',
          ),
     ) );
     
     // Section for header image
     $wp_customize->add_section( 'lab_header_image', array(
         'title'          => __( 'Header', 'lab' ),
         'priority'       => 105,
     ) );     
     
     $wp_customize->add_setting( 'lab_options[header_image]', array(
         'default'        => '',
         'type'           => 'option',
         'capability'     => 'edit_theme_options',
     ) );
     
     $wp_customize->add_control( 
          new WP_Customize_Image_Control( $wp_customize, 'lab_header_image', array(
     		'label'      => __( 'Header Image', 'mytheme' ),
     		'section'    => 'lab_header_image',
     		'settings'   => 'lab_options[header_image]',
     	) ) 
     );
     
     $wp_customize->add_setting( 'lab_options[header_position_x]', array(
         'default'        => 'center',
         'type'           => 'option',
         'capability'     => 'edit_theme_options',
     ) );
     
     $wp_customize->add_control( 'lab_options[header_position_x]', array(
          'label'   => 'Select Image Position (X-axis)',
          'section' => 'lab_header_image',
          'type'    => 'select',
          'choices'    => array(
               'center' => 'Center',               
               'left'   => 'Left',
               'right'  => 'Right',               
          ),
     ) ); 
     
     $wp_customize->add_setting( 'lab_options[header_position_y]', array(
         'default'        => 'center',
         'type'           => 'option',
         'capability'     => 'edit_theme_options',
     ) );
     
     $wp_customize->add_control( 'lab_options[header_position_y]', array(
          'label'   => 'Select Image Position (Y-axis)',
          'section' => 'lab_header_image',
          'type'    => 'select',
          'choices'    => array(
               'center' => 'Center',
               'top'    => 'Top',
               'bottom' => 'Bottom',
          ),
     ) ); 
     
     $wp_customize->add_setting( 'lab_options[header_overlay_color]', array(
         'default'        => '#000',
         'type'           => 'option',
         'capability'     => 'edit_theme_options',
     ) );         
     
     $wp_customize->add_control( 
          new WP_Customize_Color_Control( 
          $wp_customize, 
          'lab_options[header_overlay_color]', 
     	array(
     		'label'      => __( 'Header Color', 'lab' ),
     		'section'    => 'lab_header_image',
     		'settings'   => 'lab_options[header_overlay_color]',
     	) ) 
     );    
     
     $wp_customize->add_setting( 'lab_options[header_overlay_opacity]', array(
         'default'        => '0.4',
         'type'           => 'option',
         'capability'     => 'edit_theme_options',
     ) );       
     
     $wp_customize->add_control( 'lab_options[header_overlay_opacity]', array(
          'label'   => __( 'Overlay Opacity', 'lab' ),
          'section' => 'lab_header_image',
          'type'    => 'text',
     ) );
     
     
     // Section for logo image
     $wp_customize->add_section( 'lab_logo_image', array(
         'title'          => __( 'Logo', 'lab' ),
         'priority'       => 110,
     ) );
     
     $wp_customize->add_setting( 'lab_options[logo_image]', array(
         'default'        => '',
         'type'           => 'option',
         'capability'     => 'edit_theme_options',
     ) );
     
     $wp_customize->add_control( 
          new WP_Customize_Image_Control( $wp_customize, 'lab_logo_image', array(
     		'label'      => __( 'Loog Image', 'mytheme' ),
     		'section'    => 'lab_logo_image',
     		'settings'   => 'lab_options[logo_image]',
     	) ) 
     );
     
     // Section for theme details
     $wp_customize->add_section( 'lab_theme_options', array(
         'title'          => __( 'Theme Options', 'lab' ),
         'priority'       => 115,
     ) );
     
     // Twitter Handle
     $wp_customize->add_setting( 'lab_social[twitter]', array(
         'default'        => '',
         'type'           => 'option',
         'capability'     => 'edit_theme_options',
     ) );
     
     $wp_customize->add_control( 'lab_social[twitter]', array(
          'label'   => 'Twitter Handle',
          'section' => 'lab_theme_options',
          'type'    => 'text',
     ) );   
     
     // Facebook Page
     $wp_customize->add_setting( 'lab_social[facebook]', array(
         'default'        => '',
         'type'           => 'option',
         'capability'     => 'edit_theme_options',
     ) );
     
     $wp_customize->add_control( 'lab_social[facebook]', array(
          'label'   => 'Facebook Account',
          'section' => 'lab_theme_options',
          'type'    => 'text',
     ) );   

     // Github page
     $wp_customize->add_setting( 'lab_social[github]', array(
         'default'        => '',
         'type'           => 'option',
         'capability'     => 'edit_theme_options',
     ) );
     
     $wp_customize->add_control( 'lab_social[github]', array(
          'label'   => 'Github Account',
          'section' => 'lab_theme_options',
          'type'    => 'text',
     ) ); 
     
     // Dribbble Page
     $wp_customize->add_setting( 'lab_social[dribbble]', array(
         'default'        => '',
         'type'           => 'option',
         'capability'     => 'edit_theme_options',
     ) );
     
     $wp_customize->add_control( 'lab_social[dribbble]', array(
          'label'   => 'Dribbble Account',
          'section' => 'lab_theme_options',
          'type'    => 'text',
     ) );                    
}
add_action( 'customize_register', 'mytheme_customize_register' );



/**
 * Print out proper stylesheet
 */


function lab_theme_default_options() {  
     
     global $theme_options;
     $color_scheme = $theme_options['color_scheme']; 
     
     wp_register_style( $color_scheme, get_template_directory_uri() . '/stylesheets/' . $color_scheme . '.css' );
     wp_enqueue_style( $color_scheme );
          
}
add_action( 'wp_enqueue_scripts', 'lab_theme_default_options' );

function lab_theme_header() {

     global $theme_options; ?>

     <style type="text/css">
          #masthead { background: url('<?php echo $theme_options['header_image']; ?>') no-repeat <?php echo $theme_options['header_position_x']; ?> <?php echo $theme_options['header_position_y']; ?>; }
          #masthead .wrapper { 
               background: <?php echo $theme_options['header_overlay_color']; ?>;
               background: <?php echo lab_hex_to_rgb( $theme_options['header_overlay_color'], $theme_options['header_overlay_opacity'] ); ?>;
          }
          .footer .twitter-feed { background: url('<?php echo $theme_options['header_image']; ?>') no-repeat <?php echo $theme_options['header_position_x']; ?> <?php echo $theme_options['header_position_y']; ?>;  }          
     </style><?php

}
add_action( 'wp_head', 'lab_theme_header' );



/**
 * Converts hexidecimal to rgb format
 */

function lab_hex_to_rgb( $hex, $opacity = 1 ) {
     
     $hex = str_replace( '#', '', $hex );
     
     // if in 3 digit format
     if( strlen( $hex ) == 3) {
          $r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
          $g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
          $b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
     } else {
          $r = hexdec( substr( $hex, 0, 2 ) );
          $g = hexdec( substr( $hex, 2, 2 ) );
          $b = hexdec( substr( $hex, 4, 2 ) );
     }
     
     return "rgba( $r, $g, $b, $opacity )";

} 
