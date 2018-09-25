<?php 
if( ! function_exists( 'portfolio_post_type' ) ) :
	function portfolio_post_type() {
		$labels = array(
			'name' => 'نمونه کار ها',
			'singular_name' => 'نمونه کار',
			'add_new' => 'افزودن نمونه کار',
			'all_items' => 'همه نمونه کار',
			'add_new_item' => 'افزودن نمونه کار جدید',
			'edit_item' => 'ویرایش نمونه کار',
			'new_item' => 'نمونه کار جدید',
			'view_item' => 'نمایش نمونه کار',
			'search_items' => 'جست و جوی نمونه کار',
			'not_found' => 'نمونه کار یافت نشد',
			'not_found_in_trash' => 'نمونه کار یافت نشد',
			'parent_item_colon' => 'نمونه کار والد'
			//'menu_name' => default to 'name'
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'has_archive' => true,
			'publicly_queryable' => true,
			'query_var' => true,
			'rewrite' => true,
			//'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				//'author',
				//'trackbacks',
				//'custom-fields',
				//'comments',
				'revisions',
				//'page-attributes', // (menu order, hierarchical must be true to show Parent option)
				//'post-formats',
			),
			//'taxonomies' => array( 'category', 'post_tag' ), // add default post categories and tags
			'menu_position' => 5,
			'exclude_from_search' => false
		);
		register_post_type( 'portfolio', $args );
		//flush_rewrite_rules();
 
		register_taxonomy( 'portfolio_category', // register custom taxonomy - category
			'portfolio',
			array(
				'hierarchical' => true,
				'labels' => array(
					'name' => 'نمونه کار ها ،',
					'singular_name' => 'دسته بندی نمونه کار',
				)
			)
		);
		register_taxonomy( 'portfolio_tag', // register custom taxonomy - tag
			'portfolio',
			array(
				'hierarchical' => false,
				'labels' => array(
					'name' => 'برچسب های نمونه کار ها',
					'singular_name' => 'برچسب های نمونه کار',
				)
			)
		);
	}
	add_action( 'init', 'portfolio_post_type' );
		// تعریف متا باکس ها
	add_action( 'add_meta_boxes', 'cd_meta_box_add' );
	function cd_meta_box_add()
	{
		add_meta_box( 'my-meta-box-id', 'لینک اسلاید', 'cd_meta_box_cb', 'slider', 'normal', 'high' );
		add_meta_box( 'my-meta-box-id', 'جزئیات کار', 'sample_meta_box', 'portfolio', 'side', 'high' );
	}
		//متا باکس نمونه کار
	function sample_meta_box( $post )
	{
		$name = get_post_meta($post->ID, 'name', true);
		$customer = get_post_meta($post->ID, 'customer', true);
		$date = get_post_meta($post->ID, 'date', true);
		$category = get_post_meta($post->ID, 'category', true);
		$partners = get_post_meta($post->ID, 'partners', true);
		wp_nonce_field( 'my_sample_meta_box_nonce', 'sample_meta_box_nonce' ); ?>

		<p>
			<label for="name">نام پروژه</label>
			<input type="text" name="name" id="name" value="<?php echo $name; ?>" />
			
			<label for="customer">طرف قرارداد</label>
			<input type="text" name="customer" id="customer" value="<?php echo $customer; ?>" />
			
			<label for="date">تاریخ پروژه</label>
			<input type="text" name="date" id="date" value="<?php echo $date; ?>" />
			
			<label for="category">دسته بندی</label>
			<input type="text" name="category" id="category" value="<?php echo $category; ?>" />
			
			<label for="partners">همکاران</label>
			<input type="text" name="partners" id="partners" value="<?php echo $partners; ?>" />
		</p>

		<?php	
	}
	
	add_action( 'save_post', 'sample_metabox_save' );
	function sample_metabox_save( $post_id )
	{
		// Bail if we're doing an auto save
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

		// if our nonce isn't there, or we can't verify it, bail
		if( !isset( $_POST['sample_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['sample_meta_box_nonce'], 'my_sample_meta_box_nonce' ) ) return;

		// if our current user can't edit this post, bail
		if( !current_user_can( 'edit_post' ) ) return;

		// now we can actually save the data
		$allowed = array( 
			'a' => array( // on allow a tags
				'href' => array() // and those anchors can only have href attribute
			)
		);

		// Probably a good idea to make sure your data is set
		if( isset( $_POST['name'] ) )
			update_post_meta( $post_id, 'name', wp_kses( $_POST['name'], $allowed ) );
		
		if( isset( $_POST['customer'] ) )
			update_post_meta( $post_id, 'customer', wp_kses( $_POST['customer'], $allowed ) );
		
		if( isset( $_POST['date'] ) )
			update_post_meta( $post_id, 'date', wp_kses( $_POST['date'], $allowed ) );
		
		if( isset( $_POST['name'] ) )
			update_post_meta( $post_id, 'name', wp_kses( $_POST['name'], $allowed ) );
		
		if( isset( $_POST['category'] ) )
			update_post_meta( $post_id, 'category', wp_kses( $_POST['category'], $allowed ) );
		
		if( isset( $_POST['partners'] ) )
			update_post_meta( $post_id, 'partners', wp_kses( $_POST['partners'], $allowed ) );
	}
	
endif;

if( ! function_exists( 'slider_post_type' ) ) :
	function slider_post_type() {
		$labels = array(
			'name' => 'اسلایدر',
			'singular_name' => 'اسلاید',
			'add_new' => 'افزودن اسلاید',
			'all_items' => 'همه اسلاید ها',
			'add_new_item' => 'افزودن اسلاید جدید',
			'edit_item' => 'ویرایش اسلاید',
			'new_item' => 'نمونه کار جدید',
			'view_item' => 'نمایش اسلاید',
			'search_items' => 'جست و جوی اسلاید',
			'not_found' => 'اسلاید یافت نشد',
			'not_found_in_trash' => 'اسلاید یافت نشد',
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'query_var' => true,
			'rewrite' => true,
			//'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array('title', 'thumbnail'),
			'menu_position' => 6,
			'exclude_from_search' => true
		);
		register_post_type( 'slider', $args );
	}
	add_action( 'init', 'slider_post_type' );

	//Add Meta Boxes
	//http://wp.tutsplus.com/tutorials/plugins/how-to-create-custom-wordpress-writemeta-boxes/
	function cd_meta_box_cb( $post )
	{
		$url = get_post_meta($post->ID, 'url', true);
		wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); ?>

		<p>
			<label for="url">آدرس</label>
			<input type="text" name="url" id="url" value="<?php echo $url; ?>" style="width:350px" />
		</p>

		<?php	
	}
	
	add_action( 'save_post', 'cd_meta_box_save' );
	function cd_meta_box_save( $post_id )
	{
		// Bail if we're doing an auto save
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

		// if our nonce isn't there, or we can't verify it, bail
		if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

		// if our current user can't edit this post, bail
		if( !current_user_can( 'edit_post' ) ) return;

		// now we can actually save the data
		$allowed = array( 
			'a' => array( // on allow a tags
				'href' => array() // and those anchors can only have href attribute
			)
		);

		// Probably a good idea to make sure your data is set
		if( isset( $_POST['url'] ) )
			update_post_meta( $post_id, 'url', wp_kses( $_POST['url'], $allowed ) );
	}
	

	
endif;

?>