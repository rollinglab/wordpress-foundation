<?php



/*
 * Buttons!
 *
 */

/*
 * Button Shortcode
 */
function lab_button( $atts, $content = '' ) {
     extract( shortcode_atts ( array(
          'url'     => '',
          'icon'    => '',
          'size'    => 'medium',
          'shape'   => '',
          'type'    => 'primary'
     ), $atts ) );

     $icon  = ( !empty( $icon ) ? ' icon-' . $icon : '' );
     $size  = ( !empty( $size ) ? ' ' . $size : '' );
     $shape = ( !empty( $shape ) ? ' ' . $shape : '' );     
     $type  = ( !empty( $type ) ? ' ' . $type : '' );
     
     // build class string from input values     
     $class = 'button' . $size . $icon . $shape . $type;
     
     return '<a href="' . $url . '" class="' . $class . '">' . $content . '</a>';
         
}
add_shortcode( 'button', 'lab_button' );

/*
 * Button Group Shortcode
 */
function lab_button_group( $atts, $content = '' ) {
     extract( shortcode_atts( array(
          'shape' => ''
     ), $atts ) );
     
     $shape = ( !empty( $shape ) ? ' ' . $shape : '' );
     
     // build class string from input values
     $class = 'button-group' . $shape;
     
     return '<div class="' . $class . '">' . lab_clean_shortcode( $content ) . '</div>';
}
add_shortcode( 'button-group', 'lab_button_group' );



/*
 * Grids!
 *
 */

/*
 * Creates <div class="row">
 */
function lab_grid_row( $atts, $content = '' ) {
     extract( shortcode_atts ( array(
          '' => ''
     ), $atts ) );
     
     return '<div class="row">' . do_shortcode( $content ) . '</div>';
         
}
add_shortcode( 'grid-row', 'lab_grid_row' );

/*
 * Creates <div class="columns">

 */
function lab_grid_column( $atts, $content = '' ) {
     extract( shortcode_atts ( array(
          'columns'  => '12',
          'offset'   => '',
          'pull'     => '',
          'push'     => '',
          'center'   => '',
          'size'     => 'large'
     ), $atts ) );
     
     $columns  = $size . '-' . $columns;
     $offset   = ( !empty( $offset ) ? ' ' . $size . '-offset-' . $offset : '');
     $center   = ( !empty( $center ) ? ' ' . $size . '-centered' : '' );
     $push     = ( !empty( $push ) ? ' push-' . $push : '' );
     $pull     = ( !empty( $pull ) ? ' pull-' . $pull : '' );
     
     // build class string from input values
     $class = $columns . ' columns' . $offset . $center . $push . $pull;
     
     return '<div class="' . $class . '">' . do_shortcode( $content ) . '</div>';
         
}
add_shortcode( 'grid-column', 'lab_grid_column' );



/*
 * Panels!
 *
 */

/*
 * Content panel
 */
function lab_panel( $atts, $content = '' ) {
     extract( shortcode_atts( array(
          'type' => ''
     ), $atts ) );
     
     $type = ( !empty( $type ) ? ' ' . $type : '' );
     
     // build class string from input values
     $class = 'panel' . $type;
     
     return '<div class="' . $class . '">' . lab_clean_shortcode( $content, '<p></p>' ) . '</div>';
         
}
add_shortcode( 'panel', 'lab_panel' );

/*
 * Pricing Table
 */
function lab_pricing_table( $atts, $content = '' ) {
     
     return '<div class=""><ul class="pricing-table">' . lab_clean_shortcode( $content ) . '</ul></div>';
         
}
add_shortcode( 'pricing-table', 'lab_pricing_table' );
/*
 * Pricing Table Title
 */
function lab_pricing_table_title( $atts, $content = '' ) {
     
     return '<li class="title">' . $content . '</li>';
         
}
add_shortcode( 'pricing-title', 'lab_pricing_table_title' );

/*
 * Pricing Table Price
 */
function lab_pricing_table_price( $atts, $content = '' ) {
     
     return '<li class="price">' . $content . '</li>';
         
}
add_shortcode( 'pricing-price', 'lab_pricing_table_price' );

/*
 * Pricing Table Description
 */
function lab_pricing_table_description( $atts, $content = '' ) {
     
     return '<li class="description">' . $content . '</li>';
         
}
add_shortcode( 'pricing-desc', 'lab_pricing_table_description' );

/*
 * Pricing Table Bullet Item
 */
function lab_pricing_table_bullet( $atts, $content = '' ) {
     
     return '<li class="bullet-item">' . $content . '</li>';
         
}
add_shortcode( 'pricing-bullet', 'lab_pricing_table_bullet' );

/*
 * Pricing Table Description
 */
function lab_pricing_table_cta( $atts, $content = '' ) {
     extract( shortcode_atts( array(
          'href' => '',
          'type' => ''
     ), $atts ) );
     
     $href  = ( !empty( $href ) ? $href : '' );
     $type  = ( !empty( $type ) ? ' ' . $type : '' );
     
     // build class string from input values     
     $class = 'button' . $type; 
       
     
     return '<li class="cta-button"><a href="' . $href . '" class="' . $class . '">' . $content . '</a></li>';
         
}
add_shortcode( 'pricing-cta', 'lab_pricing_table_cta' );



/*
 * Tables
 *
 */
function lab_table( $atts, $content = '' ) {
     extract( shortcode_atts( array(
          'type' => ''
     ), $atts ) );
     
     $type = ( !empty( $type ) ? ' ' . $type : '' );
     
     // build class string from input values     
     $class = 'table' . $type; 
     
     return '<table class="' . $class . '">' . lab_clean_shortcode( $content ) . '</table>';
}
add_shortcode( 'table', 'lab_table' );

/*
 * Tables
 */
function lab_thead( $atts, $content = '' ) {
     extract( shortcode_atts( array(
          
     ), $atts ) );
     
     // build class string from input values     
     $class = '';
     
     return '<thead class="' . $class . '">' . lab_clean_shortcode( $content ) . '</thead>';
}
add_shortcode( 'thead', 'lab_thead' );

/*
 * Tables
 */
function lab_tbody( $atts, $content = '' ) {
     extract( shortcode_atts( array(
          
     ), $atts ) );
     
     // build class string from input values     
     $class = '';
     
     return '<tbody class="' . $class . '">' . lab_clean_shortcode( $content ) . '</tbody>';
}
add_shortcode( 'tbody', 'lab_tbody' );

/*
 * Tables
 */
function lab_tr( $atts, $content = '' ) {
     extract( shortcode_atts( array(
          
     ), $atts ) );
     
     // build class string from input values     
     $class = '';
     
     return '<tr>' . do_shortcode( $content ) . '</tr>';
}
add_shortcode( 'tr', 'lab_tr' );

/*
 * Tables
 */
function lab_th( $atts, $content = '' ) {
     extract( shortcode_atts( array(
          
     ), $atts ) );
     
     // build class string from input values     
     $class = '';
     
     return '<th>' . do_shortcode( $content ) . '</th>';
}
add_shortcode( 'th', 'lab_th' );
/*
 * Tables
 */
function lab_td( $atts, $content = '' ) {
     extract( shortcode_atts( array(
          
     ), $atts ) );
     
     // build class string from input values     
     $class = '';
     
     return '<td>' . do_shortcode( $content ) . '</td>';
}
add_shortcode( 'td', 'lab_td' );



/*
 * Typography!
 *
 */
 
/*
 * Dropcap
 */
function lab_dropcap( $atts, $content = '' ) {
     extract( shortcode_atts( array(
          'type' => ''
     ), $atts ) );
     
     $type = ( !empty( $type ) ? ' ' . $type : '' );
     
     // build class string from input values     
     $class = 'dropcap' . $type; 
     
     return '<span class="' . $class . '">' . lab_clean_shortcode( $content ) . '</span>';
}
add_shortcode( 'dropcap', 'lab_dropcap' );
 
/*
 * label
 */
function lab_label( $atts, $content = '' ) {
     extract( shortcode_atts( array(
          'type' => ''
     ), $atts ) );
     
     $type = ( !empty( $type ) ? ' ' . $type : '' );
     
     // build class string from input values     
     $class = 'label' . $type; 
     
     return '<span class="' . $class . '">' . lab_clean_shortcode( $content ) . '</span>';
}
add_shortcode( 'label', 'lab_label' );



/*
 * Helpers
 *
 */
function lab_code( $atts, $content = '' ) {
     
     return '<code>' . $content . '</code>';
         
}
add_shortcode( 'lab-code', 'lab_code' );

function lab_clean_shortcode( $content, $strip = '' ) {
     
     /* Parse nested shortcodes and add formatting. */ 
     $content = trim( wpautop( do_shortcode( $content ) ) ); 
     
     $args = ( !empty( $strip ) ? $strip : array ( '<p></p>', '<br>', '<br/>', '<br />', '<p>', '</p>' ) );
     
     /* Remove any instances of '<p></p>'. */ 
     $content = str_replace( $args, '', $content ); 
     
     return $content;
} 