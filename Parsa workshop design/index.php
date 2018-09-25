		<!doctype html>
	<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<?php get_header(); ?>
			<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">			
			<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.min.css">
			<script type="text/javascript"  src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.min.js"></script>
			<?php wp_head(); ?>
		</head>
		<body>
			<!-- START Slide Show -->
			<div id="SlideShow">
				  <div class="owl-carousel">
					<?php 
					  $slider = new WP_Query(array('post_type' => 'slider', 'posts_per_page'=>-1 /*, 'orderby'=> 'ASC'*/));
					  if($slider->have_posts()):
						while ($slider->have_posts()):
						  $slider->the_post();
					 ?>
					 <div class="slide">
					   <?php the_post_thumbnail(); ?>
					  <div class="slide-title">
						<header><?php the_title() ?></header>
						<a href="<?php echo get_post_meta($post->ID, "url", true); ?>">بیشتر</a>  
					  </div>

					 </div>
				   <?php endwhile; endif; ?>
				  </div>
				</div>	
			<script type="text/javascript">
		  $(document).ready(function(){
			$("#SlideShow > .owl-carousel").owlCarousel({
			  rtl: true,
			  nav: true,
			  singleItem: true,
			  items:1,
			  lazyLoad: true,
			});
		  });
			</script>
			
			<!-- END Slide Show -->	
			
			<div id="Menu">
				<menu>	
						<?php wp_nav_menu( array( 'theme_location' => 'main_menu' ) ); ?>
				</menu>
			</div>

			<main>
				<section id="container">
					<article>
						<a href="<?php echo site_url(); ?>/portfolio_category/decor/">
							<img src="<?php echo get_template_directory_uri(); ?>/Picture/1.jpg" alt="">
							<h2>دکور</h2>
						</a>
					</article>
					<article>
						<a href="<?php echo site_url(); ?>/portfolio_category/poster/">
																							   
							<img src="<?php echo get_template_directory_uri(); ?>/Picture/2.jpg" alt="">
							<h2>پوستر</h2>
						</a>
					</article>
					<article>
						<a href="<?php echo site_url(); ?>/portfolio_category/motion-graphic/">
							<img src="<?php echo get_template_directory_uri(); ?>/Picture/3.jpg" alt="">
							<h2>موشن گرافیک</h2>
						</a>
					</article>
					<article>
						<a href="<?php echo site_url(); ?>/portfolio_category/typography/">
							<img src="<?php echo get_template_directory_uri(); ?>/Picture/4.jpg" alt="">
							<h2>تایپوگرافی</h2>
						</a>
					</article>
					<article>
						<a href="<?php echo site_url(); ?>/portfolio_category/illustration/">
							<img src="<?php echo get_template_directory_uri(); ?>/Picture/5.jpg" alt="">
							<h2>تصویر سازی</h2>
						</a>
					</article>
					<article>
						<a href="<?php echo site_url(); ?>/portfolio_category/نشر/">
							<img src="<?php echo get_template_directory_uri(); ?>/Picture/6.jpg" alt="">
							<h2>نشر</h2>
						</a>
					</article>
					<article>
						<a href="<?php echo site_url(); ?>/portfolio_category/visual-identity/">
							<img src="<?php echo get_template_directory_uri(); ?>/Picture/7.jpg" alt="">
							<h2>هویت بصری</h2>
						</a>
					</article>
					<article>
						<a href="<?php echo site_url(); ?>/portfolio_category/photography/">
							
							<img src="<?php echo get_template_directory_uri(); ?>/Picture/8.jpg" alt="">
							<h2>عکاسی</h2>
						</a>
					</article>
					<article>
						<a href="<?php echo site_url(); ?>/portfolio_category/other/">
							<img src="<?php echo get_template_directory_uri(); ?>/Picture/9.jpg" alt="">
							<h2>سایر</h2>
						</a>
					</article>
				</section>
				<!-- Blog Slider-->
				<section id="Slider-blog">
						<div class="owl-carousel">
							<?php 
								if ( have_posts() ) {
									while ( have_posts() ) {
										the_post(); 
										// ?>
										<article class="card">
											<header>
												<div id="post_img"><?php the_post_thumbnail(); ?></div>
												<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
												<hr>
											</header>
												<p class="card-text">
													<?php the_content_rss('', TRUE, '', 50); ?>
											</p>
											<hr>
											<footer>
												<a href="<?php the_permalink(); ?>">مطالعه ی بیشتر</a>
											</footer>
										</article>
							<?php
										//
									} // end while
								} // end if
								?>
						</div>
					<a href="<?php echo site_url(); ?>/category/blog" id="blog_more">نمایش  مطالب وبلاگ</a>
			  </section>

					</main>
			<script>
				$(document).ready(function() {
											  $('.owl-carousel').owlCarousel({
												  loop:true,
												  margin:10,
												  nav:true,
												  rtl: true,
												  items: 4,
												  autoplay:true,
												  autoplayTimeout:2000,
												  autoplayHoverPause:true,
												  singleItem:true,

												  responsive:{
													  0:{
														  items:1,
														  nav:true
													  },
													  600:{
														  items:2,
														  nav:true
													  },
													  1000:{
														  items:3,
														  nav:true,
														  loop:true
													  },
													  1440:{
														  items:4,
														  nav:true,
														  loop:true
													  }
												  }
											  });							
				});
			</script>
			<footer id="footer">
				<?php get_footer(); ?>
			</footer>
		</body>
	</html>
