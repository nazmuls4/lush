<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Kurs_Area_Widget extends \Elementor\Widget_Base {

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
		return 'kurs-area';
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
		return __( 'Kurs Area', 'plugin-name' );
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
			'kurse_area_content',
			[
				'label' => __( 'Kurse Area Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'kurse_area_bg',
			[
				'label' => __( 'Kurse area background', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);
 

		$this->add_control(
			'section_title',
			[
				'label' => __( 'Section Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Der Kurs – Alles Wissenswerte',
				'label_block' => true, 
			]
		);


		$this->add_control(
			'section_description',
			[
				'label' => __( 'Section description', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'Nulla faucibus rhoncus auctor. Nullam eget nisl purus. Mauris rutrum commodo fermentum. Maecenas ex lectus, auctor a elit sed, malesuada feugiat dui. Sed convallis, odio a tempus ornare, tellus augue feugiat est, eget hendrerit turpis nunc in tellus. Duis in purus et nisl tristique consectetur.',
				'label_block' => true, 
			]
		);
 




		$this->add_control(
			'btn_lebel',
			[
				'label' => __( 'Section Btn lebel', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'contact us',
				'label_block' => true, 
			]
		);
		$this->add_control(
			'btn_links',
			[
				'label' => __( 'Section Btn Link', 'plugin-domain' ),
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

		$this->start_controls_section(
			'kurse_hourseman_area_slider_content',
			[
				'label' => __( 'Kurse slider Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'kurse_slider_title',
			[
				'label' => __( 'Kurse Section Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Details Kurs',
				'label_block' => true, 
			]
		);	


		$repeater = new \Elementor\Repeater(); 

		$repeater->add_control(
			'kurse_details', [
				'label' => __( 'Kurse Slider Content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG, 
				'label_block' => true,
			]
		); 
		 
		$this->add_control(
			'list',
			[
				'label' => __( 'Service List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(), 
				'title_field' => '{{{ kurse_details }}}',
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

		$kurse_area_bg = $this->get_settings('kurse_area_bg'); 
		$section_title = $this->get_settings('section_title'); 
		$section_description = $this->get_settings('section_description'); 


		$btn_lebel = $this->get_settings('btn_lebel'); 
		$btn_links = $this->get_settings('btn_links'); 

		$target = $settings['btn_links']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_links']['nofollow'] ? ' rel="nofollow"' : '';
		


		$kurse_slider_title = $this->get_settings('kurse_slider_title'); 
		$list = $this->get_settings('list'); 
		
		

?>

 <section class="details-kurs-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="section-title text-center">
                                <h2><?php echo $section_title; ?></h2>
                                <div>
                                	<?php echo $section_description; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="details-slider-area all-bg" style="background-image: url(<?php echo $kurse_area_bg['url'] ;?>);">
                                <div class="details-slider-active">
                                    <h3><?php echo $kurse_slider_title; ?></h3>
                                    <div class="details-active owl-carousel">


										<?php foreach ($list as $key => $listitems): ?>

											<div class="details-content">
	                                            <?php echo $listitems['kurse_details']; ?>
	                                        </div>
											
										<?php endforeach; ?> 

                                    </div>
                                    <a <?php echo $target; ?> <?php echo $nofollow; ?>  href="<?php echo $btn_links['url'] ?>" class="btn kurs-btn"><?php echo $btn_lebel; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-------------- End Details Kurci Area  --------------->


<?php

	}

}