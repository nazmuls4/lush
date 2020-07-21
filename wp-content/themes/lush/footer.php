<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lush
 */

?>

<!-- footer area start -->
<fotoer class="footer-area position-relative">


	<?php if (is_active_sidebar( 'footer-sidebar' )): ?> 
		<div class="footer-widget-area pt-110 position-relative">
			<div class="container">
				<div class="row"> 
					<?php  dynamic_sidebar( 'footer-sidebar' ); ?>
					<div class="col-lg-3">
						<div class="footer-widget">
							<h3 class="text-capitalize">Social Links</h3>
							<p>Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply </p>
							<div class="footer-social-list">
								<a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
								<a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
								<a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
								<a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
							</div>
						</div>
					</div> 
				</div>
			</div>
		</div> 
	<?php endif; ?>

	<div class="footer-copyright-area">
		<div class="container">
			<div class="row-foter-copyright-area">
				<div class="row">
					<div class="col-lg-12">
						<p class="Karla">Copyright 2020 LUSHBEAUTY SPA</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-right-shape">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-right-shape.png" alt="">
	</div>
</fotoer>
<!-- footer area end -->
 
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
