<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class cotnact_us_Area_Widget extends \Elementor\Widget_Base {

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
		return 'contact-us-area';
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
		return __( 'Contact Us Area', 'plugin-name' );
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
			'contact_us_content',
			[
				'label' => __( 'Contact Us Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'contact_us_thumbnail',
			[
				'label' => __( 'Contact us area thubnail', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);
 


		$this->add_control(
			'section_title',
			[
				'label' => __( 'Hero Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Learn To Lead With Horsemanship',
				'label_block' => true, 
			]
		);


		$this->add_control(
			'contact_form_shortcode',
			[
				'label' => __( 'Contacr form shortcod', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT, 
				'label_block' => true, 
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

		$contact_us_thumbnail = $this->get_settings('contact_us_thumbnail');  
		$section_title = $this->get_settings('section_title');  
		$contact_form_shortcode = $this->get_settings('contact_form_shortcode');  
		

?>
 
            <section class="contact-us-area position-relative">
                <div class="shape">
                    <img src="<?php echo $contact_us_thumbnail['url'] ?>" class="img-fluid" alt="">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="section-title text-center">
                                <h2><?php echo $section_title ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 contact-form-wrap"> 
                        	<?php echo do_shortcode( $contact_form_shortcode); ?>   
                        </div> 
                    </div>
                </div>
            </section>


<?php

	}

}