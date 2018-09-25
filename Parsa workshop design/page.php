<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<?php get_header(); ?>
		<link href="<?php echo get_template_directory_uri(); ?>/css/page.css" rel="stylesheet" type="text/css" >
		<?php wp_head(); ?>
	</head>

<body>
	<?php if (have_posts()): the_post(); ?>
	<menu>
			<button id="menu_btn" onClick="SH_menu()"><i id="menu_icon" class="fas fa-align-justify fa-lg"></i></button>
			<h1>کارگاه طراحی پارسا</h1>		
				<?php wp_nav_menu( array( 'theme_location' => 'page_menu' ) ); ?>
		</menu>
	<main>
		<div class="clear"></div>
		<article class="post">
			<header>
				<div class="post_img_box"><p>بدون تصویر</p><?php the_post_thumbnail(); ?></div>
				<a href="<?php the_permalink(); ?>"><h2><?php the_title() ?></h2></a>	
			</header>
			<div class="content_post">
				
					<?php the_content(); ?>
					  </div>
		</article>
	</main>
	<footer id="footer">
				<?php get_footer(); ?>
	</footer>
	<?php endif; ?>
</body>
</html>
