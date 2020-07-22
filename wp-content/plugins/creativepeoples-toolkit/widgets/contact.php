<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class contact_Area_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'contact-area';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Contact Area', 'plugin-name' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-banner';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'creative-peoples' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Section Title', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'section_subtitle',
			[
				'label' => __( 'Section sub titke', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Are you ready',
				'label_block' => true, 
			]
		);

		$this->add_control(
			'section_bigtitle',
			[
				'label' => __( 'Section big titke', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'To Own your Own Lush Beauty Spa',
				'label_block' => true, 
			]
		);
 

		$this->end_controls_section();  


		$this->start_controls_section(
			'contact_area_content',
			[
				'label' => __( 'Contact Area Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
 

		$this->add_control(
			'contact_area_background', [
				'label' => __( 'Contact area background', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA, 
				'show_label' => true,
			]
		); 


		$this->add_control(
			'contact_area_shape_top', [
				'label' => __( 'Contact area top shape', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA, 
				'show_label' => true,
			]
		); 


		$this->add_control(
			'contact_area_shape_bottom', [
				'label' => __( 'Contact area bottom shape', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA, 
				'show_label' => true,
			]
		); 

		$this->add_control(
			'contact_area_form_shortcode', [
				'label' => __( 'Contact Form 7 Shortcode', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA, 
				'show_label' => true,
			]
		); 
 
		$this->end_controls_section();

	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {


		$settings = $this->get_settings_for_display();


		// common title
		$section_subtitle = $this->get_settings('section_subtitle'); 
		$section_bigtitle = $this->get_settings('section_bigtitle');  


		// section variable

		$contact_area_background = $this->get_settings('contact_area_background'); 
		$contact_area_shape_top = $this->get_settings('contact_area_shape_top'); 
		$contact_area_shape_bottom = $this->get_settings('contact_area_shape_bottom');   
		$contact_area_form_shortcode = $this->get_settings('contact_area_form_shortcode');   
		

?>

    <section class="contact-area position-relative" style="background-image: url(<?php echo $contact_area_background['url'] ?>);">
    	<div class="contact-form-area-top-left-shape">
    		<img src="<?php echo $contact_area_shape_top['url'] ?>" alt="">
    	</div>
        <div class="container-fluid">
        	<div class="row justify-content-lg-end">
        		<div class="col-lg-6"> 
    				<div class="section-title">
    					<?php if (!empty($section_subtitle)): ?>
        					<h3 class="lato"><?php echo $section_subtitle ?></h3>
        				<?php endif ?> 
        				<?php if (!empty($section_bigtitle)): ?>
        					<h1><?php echo $section_bigtitle ?></h1>
        				<?php endif ?> 
    				</div> 

    				<div class="contact-form-area-inner">

    					


    					<?php echo do_shortcode( $contact_area_form_shortcode ); ?>
    				</div> 
        		</div> 
        	</div> 
        </div>

        <div class="contact-form-area-top-shape">
    		<img src="<?php echo $contact_area_shape_bottom['url'] ?>" alt="">
    	</div>
         
    </section>
    <!------------ why area Section  ---------------->


<?php

	}

}