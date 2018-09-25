<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<?php get_header(); ?>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/portfilo-single.css">
		<script type="text/javascript">
								$(document).ready(function(){
									var a = false;
									$("#p").hide(0);
									$(".p1").hide(0);
									$("#partner_btn").click(function(){
										if(!a)
											{
												$(".other").slideToggle(0);
												$("#p").slideToggle(500);
												$(".p1").slideToggle(500);
												$("#partner_btn").html("بازگشت به جزئیات")
												a = true;
											}
										else
											{
												$("#p").slideToggle(0);
												$(".p1").slideToggle(0);
												$(".other").show(0);
												$("#partner_btn").html("نمایش همکاران")
												a = false;
											}
										
									});
								});
							</script>
		<?php wp_head(); ?>	
	</head>
	<body>		
		<menu>
			<button id="menu_btn" onClick="SH_menu()"><i id="menu_icon" class="fas fa-align-justify fa-lg"></i></button>
			<h1>کارگاه طراحی پارسا</h1>		
				<?php wp_nav_menu( array( 'theme_location' => 'page_menu' ) ); ?>
		</menu>
		<main>
			<div id="pageAdress">شما اینجا هستید: کارگاه طراحی پارسا / نمونه کارها / <?php the_title(); ?></div>
			<div id="postInfo">نویسنده : <?php the_author(); ?> | تاریخ : <?php echo get_the_date("y/m/d"); ?></div>	
			<div id="sample_info">
				<?php  if (have_posts()): the_post(); ?>	
				<div id="sample_sample_info_picture">			
					<?php the_post_thumbnail(); ?>	
				</div>
				
					<table>
						<tr class="other">
							<td><i class="fas fa-info-circle "></i></td>
							<td>نام پروژه</td>
							<td><?php echo get_post_meta(get_the_ID(), 'name', true); ?></td>
						</tr>
						<tr class="other">
							<td><i class="fas fa-address-book"></i></td>
							<td>طرف قرارداد</td>
							<td><?php echo get_post_meta(get_the_ID(), 'customer', true); ?></td>
						</tr>	
						<tr class="other">
							<td><i class="far fa-calendar-alt"></i></td>
							<td>تاریخ سفارش</td>
							<td><?php echo get_post_meta(get_the_ID(), 'date', true); ?></td>
						</tr>
						<tr class="other">
							<td><i class="fas fa-align-justify"></i></td>
							<td>دسته بندی</td>
							<td><?php echo get_post_meta(get_the_ID(), 'category', true); ?></td>
						</tr>
						
							<tr>
							<td class="p1" ><i class="fas fa-grin-alt"></i></td>
							
							<td><p id="p"><?php echo get_post_meta(get_the_ID(), 'partners', true); ?></p></td>	
						</tr>
							<td><button id="partner_btn">نمایش همکاران</button></td>
					</table>
					
			</div>

			<div id="sample_info_more">
				<?php the_content(); ?>
			</div>
		</main>
		<footer id="footer">
				<?php get_footer(); ?>
			</footer>
		<?php endif; ?>
	</body>
	
</html>
