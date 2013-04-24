<?php

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
 *
 * @params $columns, $size, $offset
 *
 */
function lab_grid_column( $atts, $content = '' ) {
     extract( shortcode_atts ( array(
          'columns' => '12',
          'offset'  => '',
          'size'    => 'large'
     ), $atts ) );
     
     $columns = $size . '-' . $columns;
     $offset = $size . '-offset-' . $offset;     
     
     return '<div class="' . $columns . ' columns ' . $offset . '">' . do_shortcode( $content ) . '</div>';
         
}
add_shortcode( 'grid-column', 'lab_grid_column' );


/*
 * Used to display shortcode examples
 */
function lab_code( $atts, $content = '' ) {
     
     return '<code>' . $content . '</code>';
         
}
add_shortcode( 'lab-code', 'lab_code' );