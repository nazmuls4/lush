<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class About_Area_Widget extends \Elementor\Widget_Base {

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
		return 'about-area';
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
		return __( 'About Area', 'plugin-name' );
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
				'default' => 'Would you know',
				'label_block' => true, 
			]
		);

		$this->add_control(
			'section_bigtitle',
			[
				'label' => __( 'Section big titke', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'About  Our Lush Story',
				'label_block' => true, 
			]
		);
 

		$this->end_controls_section(); 


		$this->start_controls_section(
			'about_area_content',
			[
				'label' => __( 'About Area Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'about_area_shape',
			[
				'label' => __( 'About area shape', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);
 


		$this->add_control(
			'about_content',
			[
				'label' => __( 'About content', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap',
				'label_block' => true, 
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

		$section_subtitle = $this->get_settings('section_subtitle'); 
		$section_bigtitle = $this->get_settings('section_bigtitle'); 


		$about_area_shape = $this->get_settings('about_area_shape');  
		$about_content = $this->get_settings('about_content');  



		$btn_lebel = $this->get_settings('btn_lebel'); 
		$btn_links = $this->get_settings('btn_links');  
		$target = $settings['btn_links']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_links']['nofollow'] ? ' rel="nofollow"' : '';
		

?>

    <section class="about-area position-relative">
        <div class="container">
        	<div class="row">
        		<div class="col-lg-12">
        			<div class="about-area-inner-content text-center">
        				<div class="section-title">
        					<?php if (!empty($section_subtitle)): ?>
	        					<h3 class="lato"><?php echo $section_subtitle ?></h3>
	        				<?php endif ?> 
	        				<?php if (!empty($section_bigtitle)): ?>
	        					<h1><?php echo $section_bigtitle ?></h1>
	        				<?php endif ?> 
        				</div>
        				
        				<div class="about-description">
        					<div>
        						<?php echo $about_content ?>
        					</div>
        					<div class="site-btn">
        						<a <?php echo $target ?> <?php echo $nofollow ?> href="<?php echo $btn_links['url'] ?>"><?php echo $btn_lebel ?></a>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="about-area-footer-shape">
        	<img src="<?php echo $about_area_shape['url'] ?>" alt="">
        </div>
    </section>
    <!------------ about area Section  ---------------->


<?php

	}

}