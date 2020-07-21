<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class der_kurs_Area_Widget extends \Elementor\Widget_Base {

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
		return 'der-kurs-area';
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
		return __( 'Der Kurs Area', 'plugin-name' );
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
			'der_kurse_area_content',
			[
				'label' => __( 'Der Kurse Area Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'der_kurse_area_bg',
			[
				'label' => __( 'Der Kurse area background', 'plugin-name' ),
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
				'default' => 'Nulla faucibus rhoncus auctor. Nullam eget nisl purus. Mauris rutrum commodo fermentum. Maecenas ex lectus, auctor a elit sed, malesuada feugiat dui. Sed convallis, odio a tempus ornare, tellus augue feugiat est, eget hendrerit turpis nunc in tellus.',
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
			'der_kurse_hourseman_area_left_list_item',
			[
				'label' => __( 'Der Kurse left side list', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
 
		$repeater = new \Elementor\Repeater(); 

		$repeater->add_control(
			'der_kurse_left_list_icon', [
				'label' => __( 'Der kurse left side list icon', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::ICON, 
				'label_block' => true,
				'default' => 'fa fa-hand-point-right',

			]
		); 
		$repeater->add_control(
			'der_kurse_left_list_title', [
				'label' => __( 'Der kurse left side list title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT, 
				'label_block' => true,
				'default' => 'Lorem ipsum dolor sit amet.',

			]
		); 
		 
		$this->add_control(
			'left_list',
			[
				'label' => __( 'Dur kurse left List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(), 
				'title_field' => '{{{ der_kurse_left_list_title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'der_kurse_hourseman_area_right_list_item',
			[
				'label' => __( 'Der Kurse right side list', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
 
		$repeater = new \Elementor\Repeater(); 

		$repeater->add_control(
			'der_kurse_right_list_icon', [
				'label' => __( 'Der kurse right side list icon', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::ICON, 
				'label_block' => true,
				'default' => 'fa fa-hand-point-right',

			]
		); 
		
		$repeater->add_control(
			'der_kurse_right_list_title', [
				'label' => __( 'Der kurse right side list title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT, 
				'label_block' => true,
				'default' => 'Lorem ipsum dolor sit amet.',

			]
		); 
		 
		$this->add_control(
			'right_list',
			[
				'label' => __( 'Dur kurse right List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(), 
				'title_field' => '{{{ der_kurse_right_list_title }}}',
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

		$der_kurse_area_bg = $this->get_settings('der_kurse_area_bg'); 
		$section_title = $this->get_settings('section_title'); 
		$section_description = $this->get_settings('section_description'); 


		$btn_lebel = $this->get_settings('btn_lebel'); 
		$btn_links = $this->get_settings('btn_links'); 

		$target = $settings['btn_links']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_links']['nofollow'] ? ' rel="nofollow"' : ''; 

		$left_list = $this->get_settings('left_list'); 	 
		$right_list = $this->get_settings('right_list'); 	 
		
		

?>
	
	
            <section class="der-kurs-area position-relative all-bg" style="background-image: url(<?php echo $der_kurse_area_bg['url'] ?>);">

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="details-slider-area">
                                <div class="details-slider-active der-kurus">
                                    <div class="details-content text-left">
                                        <h3><?php echo $section_title; ?></h3>
                                        <div>
                                        	<?php echo $section_description ?>
                                        </div>
                                        

                                        <ul class="group-details">
                                        	<?php foreach ($left_list as $key => $leftlist): ?>
                                        		<li><i class="<?php echo $leftlist['der_kurse_left_list_icon'] ?>"></i><?php echo $leftlist['der_kurse_left_list_title'] ?></li>
                                        	<?php endforeach ?> 
                                        </ul>
                                        <ul class="group-details group-2">
                                            <?php foreach ($right_list as $key => $rightlist): ?>
                                        		<li><i class="<?php echo $rightlist['der_kurse_right_list_icon'] ?>"></i><?php echo $rightlist['der_kurse_right_list_title'] ?></li>
                                        	<?php endforeach ?> 
                                        </ul>
                                        <a <?php echo $target ?> <?php echo $nofollow ?>  href="<?php echo $btn_links['url'] ?>" class="btn kurs-btn"><?php echo $btn_lebel ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!----------- End Der Kurs Area  ----------->

<?php

	}

}