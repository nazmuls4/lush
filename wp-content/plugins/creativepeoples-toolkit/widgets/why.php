<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Why_Area_Widget extends \Elementor\Widget_Base {

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
		return 'why-area';
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
		return __( 'Why Area', 'plugin-name' );
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
				'default' => 'Why Franchise',
				'label_block' => true, 
			]
		);

		$this->add_control(
			'section_bigtitle',
			[
				'label' => __( 'Section big titke', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'With Lush Beauty Spa	',
				'label_block' => true, 
			]
		);
 

		$this->end_controls_section(); 


		$this->start_controls_section(
			'why_area_content',
			[
				'label' => __( 'Why Area Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'why_area_thumbnail',
			[
				'label' => __( 'Why area thumbnail', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);
 


		$this->add_control(
			'why_area_shape',
			[
				'label' => __( 'Why area shape', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);
 


		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'why_title', [
				'label' => __( 'Why Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Training & support:' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'why_icon', [
				'label' => __( 'Why icon', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA, 
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'why_content', [
				'label' => __( 'Why Content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ' , 'plugin-domain' ),
				'show_label' => true,
			]
		); 

		$this->add_control(
			'list',
			[
				'label' => __( 'Why List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(), 
				'title_field' => '{{{ why_title }}}',
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



		$why_area_thumbnail = $this->get_settings('why_area_thumbnail');  
		$why_area_shape = $this->get_settings('why_area_shape');  
		$list = $this->get_settings('list');  
		

?>

    <section class="why-area position-relative">
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-lg-12"> 
    				<div class="section-title">
    					<?php if (!empty($section_subtitle)): ?>
        					<h3 class="lato"><?php echo $section_subtitle ?></h3>
        				<?php endif ?> 
        				<?php if (!empty($section_bigtitle)): ?>
        					<h1><?php echo $section_bigtitle ?></h1>
        				<?php endif ?> 
    				</div> 
        		</div>
        	</div>

        	<div class="row">
				<?php foreach ($list as $key => $single_list): ?>
					<div class="col-lg-4">
	        			<div class="why-list">
	        				<div class="why-header d-flex align-items-center">
	        					<div class="whuy-icon">
	        						<div class="why-icon-inner">
	        							<img src="<?php echo $single_list['why_icon']['url'] ?>" alt="">
	        						</div>
	        					</div>
	        					<div class="whuy-title">
	        						<h3><?php echo $single_list['why_title']?></h3>
	        					</div>
	        				</div>
	        				<div class="why-inner-content">
	        					<?php echo $single_list['why_content']?>
	        				</div>
	        			</div>
	        		</div>
				<?php endforeach; ?>
        		

        	</div>

        </div>
        <div class="why-area-footer-thumbanail">
        	<img src="<?php echo $why_area_thumbnail['url'] ?>" alt="">
        </div>
        <div class="why-area-footer-shape">
        	<img src="<?php echo $why_area_shape['url'] ?>" alt="">
        </div>
    </section>
    <!------------ why area Section  ---------------->


<?php

	}

}