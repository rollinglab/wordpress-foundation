<?php


/*
 * Button Shortcode
 *
 */
function lab_button( $atts, $content = '' ) {
     extract( shortcode_atts ( array(
          'url'     => '',
          'size'    => 'medium',
          'shape'   => '',
          'type'    => 'primary'
     ), $atts ) );

     $size  = ( !empty( $size ) ? ' ' . $size : '' );
     $shape = ( !empty( $shape ) ? ' ' . $shape : '' );     
     $type  = ( !empty( $type ) ? ' ' . $type : '' );
     
     // build class string from input values     
     $class = 'button' . $type . $size . $shape;
     
     return '<a href="' . $url . '" class="' . $class . '">' . $content . '</a>';
         
}
add_shortcode( 'button', 'lab_button' );


/*
 * Creates <div class="row">
 *
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
 *
 * @params $columns, $size, $offset
 *
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
     
     return '<div class="' . $columns . '">' . do_shortcode( $content ) . '</div>';
         
}
add_shortcode( 'grid-column', 'lab_grid_column' );


/*
 * Used to display shortcode examples
 *
 */
function lab_code( $atts, $content = '' ) {
     
     return '<code>' . $content . '</code>';
         
}
add_shortcode( 'lab-code', 'lab_code' );