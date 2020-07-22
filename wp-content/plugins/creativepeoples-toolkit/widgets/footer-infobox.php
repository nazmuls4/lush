<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class footer_info_Area_Widget extends \Elementor\Widget_Base {

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
		return 'footer-infobox-area';
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
		return __( 'Footer infobox Area', 'plugin-name' );
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
		$this->add_control(
			'section_details',
			[
				'label' => __( 'Section description', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'We have a team of dedicated professional, who will assist many of the back-oce function to help you run a smooth operation. Our comprehensive training and support for franchisees focused on building a protable business, and brand identity',
				'label_block' => true, 
			]
		);
 

		$this->end_controls_section();  


		$this->start_controls_section(
			'contact_infobox_area_content',
			[
				'label' => __( 'Contact Infobox Area Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
 

		$this->add_control(
			'contact_info_area_shape', [
				'label' => __( 'Contact area shape', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA, 
				'show_label' => true,
			]
		); 

 		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'infobox_title', [
				'label' => __( 'Infobox Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Franchise Fee' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'infobox_content', [
				'label' => __( 'Infobox Content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG, 
				'label_block' => true,
			]
		);

		 

		$this->add_control(
			'list',
			[
				'label' => __( 'Infobox List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(), 
				'title_field' => '{{{ infobox_title }}}',
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
		$section_details = $this->get_settings('section_details');  


		// section variable

		$contact_info_area_shape = $this->get_settings('contact_info_area_shape');    
		$list = $this->get_settings('list');    
		

?>

    <section class="footer-infobox-area position-relative">
    	<div class="infobox-shape">
    		<img src="<?php echo $contact_info_area_shape['url'] ?>" alt="">
    	</div>
    	 <div class="container">
    	 	<div class="row">
    	 		<div class="col-lg-12">
    	 			<div class="section-title footer-infobox-title text-center">
    					<?php if (!empty($section_subtitle)): ?>
        					<h3 class="lato"><?php echo $section_subtitle ?></h3>
        				<?php endif ?> 
        				<?php if (!empty($section_bigtitle)): ?>
        					<h1><?php echo $section_bigtitle ?></h1>
        				<?php endif ?>  
        				<div>
        					<?php echo $section_details; ?>
        				</div>
    				</div> 
    	 		</div>
    	 	</div>

    	 	<div class="row">
				<?php $count = 0; foreach ($list as $key => $list_infobox): $count++; ?>
					<div class="col-lg-4">
	    	 			<div class="foonter-infobox text-center infobox-items-<?php echo $count ?>">
	    	 				<div class="infobox-title">
	    	 					<h2><?php echo $list_infobox['infobox_title'] ?></h2>
	    	 				</div>
	    	 				<div class="infobox-content">
	    	 					<?php echo $list_infobox['infobox_content'] ?>
	    	 				</div>
	    	 			</div>
	    	 		</div>
				<?php endforeach; ?> 
    	 	</div>

    	 </div>
         
    </section>
    <!------------ why area Section  ---------------->


<?php

	}

}