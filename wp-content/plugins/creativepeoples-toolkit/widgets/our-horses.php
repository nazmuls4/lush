<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Our_Horses_Widget extends \Elementor\Widget_Base {

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
		return 'our-horses';
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
		return __( 'Our Horses', 'plugin-name' );
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
		return 'eicon-services';
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
		return [ 'our-horses' ];
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
			'hors_contet',
			[
				'label' => __( 'Hors Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		

		$this->add_control(
			'section_title',
			[
				'label' => __( 'Section Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Arbeiten mit Pferden',
				'label_block' => true, 
			]
		);

		
		$this->add_control(
			'sub_section_title',
			[
				'label' => __( 'Sub Section Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Our Horses',
				'label_block' => true, 
			]
		);


        $this->add_control(
			'section_description',
			[
				'label' => __( 'Section Description', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Default description', 'plugin-domain' ),
				'placeholder' => __( 'Type your description here', 'plugin-domain' ),
			]
		);



		$repeater = new \Elementor\Repeater();


		$repeater->add_control(
			'hors_image', [
				'label' => __( 'Hors Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);



		$repeater->add_control(
			'hors_title', [
				'label' => __( 'Hors Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'hors_content', [
				'label' => __( 'Hors Content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,

			]
		);


		$this->add_control(
			'hors_boxes',
			[
				'label' => __( 'Repeater List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ hors_title }}}',
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
?>


		 <!------ End Our Team Section ----------->
		 <section class="our-hors">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="section-title text-center">
								<h2><?php echo $settings['section_title']; ?></h2>
                                <div class="desription">
									<?php echo $settings['section_description']; ?>
								</div>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-center"><?php echo $settings['sub_section_title']; ?></h3>
                    <div class="row justify-content-center">


					<?php foreach($settings['hors_boxes'] as $hors) : ?>
                        <div class="col-xl-4 col-md-6">
                            <div class="single-hors-item text-center">
								<img src="<?php echo $hors['hors_image']['url']; ?>" class="img-fluids" alt="">
                               <h4><?php echo $hors['hors_title']; ?></h4>
                                <div class="horses-content">
									<?php echo wpautop($hors['hors_content']); ?>
								</div>
                            </div>
                        </div>

						<?php endforeach; ?>
                    </div>
                </div>
            </section>
            <!----------- End Horses ------------>

<?php

	}

}