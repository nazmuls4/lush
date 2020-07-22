<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Hero_Area_Widget extends \Elementor\Widget_Base {

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
		return 'hero-area';
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
		return __( 'Hero Area', 'plugin-name' );
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
			'hero_area_content',
			[
				'label' => __( 'Hero Area Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'hero_area_bg',
			[
				'label' => __( 'Hero area background', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);

		$this->add_control(
			'hero_area_thumbnail',
			[
				'label' => __( 'Hero area thumbnail', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);


		$this->add_control(
			'hero_sub_title',
			[
				'label' => __( 'Hero Sub Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'We Offer you for',
				'label_block' => true, 
			]
		);

		$this->add_control(
			'hero_big_title',
			[
				'label' => __( 'Hero Big Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Lush Franchise',
				'label_block' => true, 
			]
		);


		$this->add_control(
			'hero_description',
			[
				'label' => __( 'Hero description', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'Lorem Ipsum is simply dummy text of the printing and',
				'label_block' => true, 
			]
		);
 

		$this->add_control(
			'btn_lebel',
			[
				'label' => __( 'Btn lebel', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Get Started now',
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

		$hero_area_bg = $this->get_settings('hero_area_bg'); 
		$hero_area_thumbnail = $this->get_settings('hero_area_thumbnail'); 


		$hero_sub_title = $this->get_settings('hero_sub_title'); 
		$hero_big_title = $this->get_settings('hero_big_title'); 
		$hero_description = $this->get_settings('hero_description'); 

		$btn_lebel = $this->get_settings('btn_lebel'); 
		$btn_links = $this->get_settings('btn_links'); 

		$target = $settings['btn_links']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_links']['nofollow'] ? ' rel="nofollow"' : '';
		

?>

    <section class="hero-area vh-100 d-flex align-items-center" style="background-image: url(<?php echo $hero_area_bg['url'] ?>)">
        <div class="container-fluid"> 
        	<div class="hero-area-outer-row">
        		<div class="row align-items-center">
        			<div class="col-lg-6">
        				<div class="hero-area-inner-content position-relativ">
        					<div class="hero-area-shape">
				        		<img src="<?php echo $hero_area_thumbnail['url'] ?>" alt="">
				        	</div>
        					<h1 class="subtitle Lato"><?php echo $hero_sub_title ?></h1>
        					<h1 class="big-title"><?php echo $hero_big_title ?></h1>
        					<div class="heo-content">
        						<?php echo $hero_description ?>
        					</div>
        					<div class="site-btn hero-btn">
        						<a <?php echo $target ?> <?php echo $nofollow ?> href="<?php echo $btn_links['url'] ?>"><?php echo $btn_lebel ?></a>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
    </section>
    <!------------ End Hero Section  ---------------->


<?php

	}

}