<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Steps_Area_Widget extends \Elementor\Widget_Base {

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
		return 'steps-area';
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
		return __( 'Steps Area', 'plugin-name' );
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
				'default' => 'Step to your ',
				'label_block' => true, 
			]
		);

		$this->add_control(
			'section_bigtitle',
			[
				'label' => __( 'Section big titke', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Lush Beauty Spa dream!',
				'label_block' => true, 
			]
		);
 

		$this->end_controls_section(); 


		$this->start_controls_section(
			'steps_area_content',
			[
				'label' => __( 'Steps Area Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
 
		$this->add_control(
			'steps_shape',
			[
				'label' => __( 'Steps area Shape', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);
  		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'steps_title', [
				'label' => __( 'Steps Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Franchise Request Form' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'steps_icon', [
				'label' => __( 'Seps icon', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA, 
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'steps_content', [
				'label' => __( 'Steps Content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Complete the Lush Beauty Spa Franchise Request for Information Form (See Below for form)' , 'plugin-domain' ),
				'show_label' => true,
			]
		); 

		$this->add_control(
			'list',
			[
				'label' => __( 'Steps List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(), 
				'title_field' => '{{{ steps_title }}}',
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


		$steps_shape = $this->get_settings('steps_shape');  
		$list = $this->get_settings('list');  
 
		

?>

    <section class="steps-area position-relative">
    	<div class="steps-area-shape">
        	<img src="<?php echo $steps_shape['url'] ?>" alt="">
        </div> 
        <div class="container">
        	<div class="row"> 
        		<div class="col-lg-12"> 
    				<div class="section-title text-center">
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
				<?php $count = 0; foreach ($list as $key => $steps_list):

					$count++; 

				?>
					<div class="col-lg-4">
	        			<div class="steps-list-area  steps-list-area-<?php echo $count ?>	text-center position-realtive">
	        				<div class="steps-counte-number">
	        					<h2 class="Karla">0<?php echo $count ?></h2>
	        				</div>
	        				<div class="stepos-icon">
	        					<img src="<?php echo $steps_list['steps_icon']['url'] ?>" alt="">
	        					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/steps-arrow.png" alt="">
	        				</div>
	        				<h3><?php echo $steps_list['steps_title']?></h3>
	        				<div class="stpes-inner-content">
	        					<?php echo $steps_list['steps_content']?>
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