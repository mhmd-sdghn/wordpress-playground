<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<?php get_header(); ?>
		<link href="<?php echo get_template_directory_uri(); ?>/css/category.css" rel="stylesheet" type="text/css" >
		<?php wp_head(); ?>
	</head>
	<body>
		<menu>
			<button id="menu_btn" onClick="SH_menu()"><i id="menu_icon" class="fas fa-align-justify fa-lg"></i></button>
			<h1>کارگاه طراحی پارسا</h1>			
				<?php wp_nav_menu( array( 'theme_location' => 'page_menu' ) ); ?>
		</menu>
		<div class="clear"></div>
		<header id="header_1"><p><?php wp_title(" "); ?></p></header> 
		<nav class="wp-pagenavi">
		<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
	</nav>
		<section>
			<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		//
		?>
		<article class="post">
				
				<div class="img_post"><p>بدون عکس</p><?php the_post_thumbnail(); ?></div>
				
				<div class="post_info">
				
					<header>
						<h2><?php echo wp_trim_words( get_the_title(), 10, '...' );?></h2>
						<p class="aouter">نویسنده: <?php the_author(); ?> </p>
						<p class="date">تاریخ : <?php  echo get_the_date("d F y"); ?> </p>
						<a href="<?php the_permalink(); ?>">نمایش بیشتر</a>
						<hr>
					</header>	
					<p><?php the_content_rss('', TRUE, '', 120); ?></p>				
					
					
				</div>
		<div class="clear"></div>	
</article>		

			<?php
	} // end while
} // end if <?php posts_nav_link(); 
			
?>
		</section>
	<nav class="wp-pagenavi">
		<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
	</nav>
		<footer>
		<?php wp_footer(); ?>
		</footer>
	</body>
</html>
