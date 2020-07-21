<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class business_Area_Widget extends \Elementor\Widget_Base {

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
		return 'business-area';
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
		return __( 'Business Area', 'plugin-name' );
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
				'default' => 'You are in the',
				'label_block' => true, 
			]
		);

		$this->add_control(
			'section_bigtitle',
			[
				'label' => __( 'Section big titke', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'business for yourself but not by yourself.',
				'label_block' => true, 
			]
		);
 

		$this->end_controls_section(); 


		$this->start_controls_section(
			'business_area_content',
			[
				'label' => __( 'Business Area Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'business_area_thumbnail',
			[
				'label' => __( 'Business area thumbnail', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'business_area_thumbnail_small',
			[
				'label' => __( 'Business area small thumbnail', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);
  
  

		$this->add_control(
			'business_content', [
				'label' => __( 'Business Content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been software like Aldus PageMaker including Ipsum is simply dummy t' , 'plugin-domain' ),
				'show_label' => true,
			]
		); 

		$this->add_control(
			'btn_lebel',
			[
				'label' => __( 'Btn lebel', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Learn More',
				'label_block' => true, 
			]
		);
		$this->add_control(
			'btn_links',
			[
				'label' => __( 'Btn Link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
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



		$business_area_thumbnail = $this->get_settings('business_area_thumbnail'); 
		$business_area_thumbnail_small = $this->get_settings('business_area_thumbnail_small'); 
		$business_content = $this->get_settings('business_content');   


		// button 
		$btn_lebel = $this->get_settings('btn_lebel'); 
		$btn_links = $this->get_settings('btn_links'); 
		$target = $settings['btn_links']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_links']['nofollow'] ? ' rel="nofollow"' : '';
		

?>

    <section class="why-area business-area position-relative">
        <div class="container">
        	<div class="row align-items-center">
        		<div class="col-lg-6"> 
    				<div class="section-title">
    					<?php if (!empty($section_subtitle)): ?>
        					<h3 class="lato"><?php echo $section_subtitle ?></h3>
        				<?php endif ?> 
        				<?php if (!empty($section_bigtitle)): ?>
        					<h1><?php echo $section_bigtitle ?></h1>
        				<?php endif ?> 
    				</div> 

    				<div class="wee-need-content">
    					<div>
    						<?php echo $business_content ?>
    					</div>
    					<div class="site-btn">
    						<a <?php echo $target ?> <?php echo $nofollow ?> href="<?php echo $btn_links['url'] ?>"><?php echo $btn_lebel ?></a>
    					</div>
    				</div>
        		</div>

				<div class="col-lg-6">
					<div class="we-need-thumbnail business-area-thumbanail position-relative"> 
						<img src="<?php echo $business_area_thumbnail['url'] ?>" alt=""> 
						<img class="business-small-thumbnail" src="<?php echo $business_area_thumbnail_small['url'] ?>" alt="">
					</div>
				</div> 

        	</div> 
        </div>
         
    </section>
    <!------------ why area Section  ---------------->


<?php

	}

}