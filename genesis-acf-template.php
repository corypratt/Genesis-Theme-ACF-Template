<?php
/*
Template Name: Genesis - ACF template
*/

// Force full width page layout
add_filter( ‘genesis_pre_get_option_site_layout’, ‘__genesis_return_full_width_content’ );

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs');

//* Remove the default Genesis loop
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

//* Remove the entry header markup (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );

//* Remove the content box since we are using ACF
remove_action( 'genesis_entry_content', 'genesis_do_post_content');

//* Add custom body class to the head
add_filter( 'body_class', 'inner_add_body_class' );
function inner_add_body_class( $classes ) {
   $classes[] = 'acf-template';
   return $classes;
}

?>


<?php
//* Custom post content to loop through the ACF fields
add_action('genesis_entry_content', 'acf_post_content');
function acf_post_content() {
  // Put your ACF loops and checks in here
}
?>

<?php
  //* Run the Genesis loop
  genesis();
?>