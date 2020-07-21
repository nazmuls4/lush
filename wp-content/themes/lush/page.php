<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lush
 */



get_header();


if (get_post_meta( get_the_ID(), 'lush_webmakerbd_page_option', true )) {
	$page_meta =  get_post_meta( get_the_ID(), 'lush_webmakerbd_page_option', true );
}else{
	$page_meta = array();
}
if (array_key_exists('enable_breadcum', $page_meta)) {
	$enable_breadcum = $page_meta['enable_breadcum'];
}else{
	$enable_breadcum = false;
}
if (array_key_exists('custom_page_title', $page_meta)) {
	$custom_page_title = $page_meta['custom_page_title'];
}else{
	$custom_page_title = '';
}

while ( have_posts() ) :



?>

<?php if ($enable_breadcum == true): ?>
	<div class="breadcum-area position-relative">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="readcum-custom-title">
						<?php if (!empty($custom_page_title)): ?>
								<h1><?php echo $custom_page_title; ?></h1>
							<?php else: ?>
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<?php endif ?>

						 
					</div>
					<div class="breadcum-navxt">
						<?php if(function_exists('bcn_display'))
						    {
						        bcn_display();
						 }?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif ;?> 

<div class="site-internal-page-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="site-internal-area-inner-content">
					<?php
						
							the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						
						?>

				</div>
			</div>
			 
		</div>
	</div>
</div>


 
<?php
 endwhile; // End of the loop.
get_footer();
