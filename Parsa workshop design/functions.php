<?php
	add_theme_support( 'post-thumbnails' );
	require_once (get_template_directory() . '/functions/post-types.inc.php');

	if ( ! function_exists( 'kargah_parsa_navigation_menus' ) ) {

	// Register Navigation Menus
	function kargah_parsa_navigation_menus() {

		$locations = array(
			'main_menu' => __( 'منو صفحه نخست', 'text_domain' ),
			'page_menu' => __( 'منو همه ی صفحات به جز صفحه نخست', 'text_domain' ),
		);
		register_nav_menus( $locations );

	}
	add_action( 'init', 'kargah_parsa_navigation_menus' );		
}

 function wp_corenavi() {
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = ($wp_rewrite->using_permalinks()) ? user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' ) : @add_query_arg('paged','%#%');
  if( !empty($wp_query->query_vars['s']) ) $a['add_args'] = array( 's' => get_query_var( 's' ) );
  $a['total'] = $max;
  $a['current'] = $current;

  $total = 1; //1 - display the text "Page N of N", 0 - not display
  $a['mid_size'] = 5; //how many links to show on the left and right of the current
  $a['end_size'] = 1; //how many links to show in the beginning and end
  $a['prev_text'] = 'صفحه بعد'; //text of the "Previous page" link
  $a['next_text'] = 'صفحه قبل'; //text of the "Next page" link

  if ($max > 1) echo '<div class="navigation">';
  echo $pages . paginate_links($a);
  if ($max > 1) echo '</div>';
}





?>
