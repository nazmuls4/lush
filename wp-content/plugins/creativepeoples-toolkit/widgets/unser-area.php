<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Unser_Area_Widget extends \Elementor\Widget_Base {

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
		return 'unser-area';
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
		return __( 'Unser Area', 'plugin-name' );
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
			'unser_content',
			[
				'label' => __( 'Unser Area Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'Unser_area_bg',
			[
				'label' => __( 'Unser area background', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		); 

		$this->add_control(
			'section_title',
			[
				'label' => __( 'Section Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Unser Weiteres Angebot',
				'label_block' => true, 
			]
		);


		$this->add_control(
			'section_content',
			[
				'label' => __( 'Section description', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'Nulla faucibus rhoncus auctor. Nullam eget nisl purus. Mauris rutrum commodo fermentum. Maecenas ex lectus, auctor a elit sed, malesuada feugiat dui. Sed convallis, odio a tempus ornare, tellus augue feugiat est, eget hendrerit turpis nunc in tellus.',
				'label_block' => true, 
			]
		);
  

		 

		$this->end_controls_section();

		$this->start_controls_section(
			'unser_list_content',
			[
				'label' => __( 'Unser list content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater(); 

		$repeater->add_control(
			'unser_list_icon', [
				'label' => __( 'Unser list icon', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::ICON, 
				'label_block' => true,
				'default' => 'fa fa-hand-point-right',

			]
		); 
		$repeater->add_control(
			'Unser_list_title', [
				'label' => __( 'Unser list title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT, 
				'label_block' => true,
				'default' => 'Lorem ipsum dolor sit amet.',

			]
		); 
		 
		$this->add_control(
			'list',
			[
				'label' => __( 'Unser List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(), 
				'title_field' => '{{{ Unser_list_title }}}',
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

		$Unser_area_bg = $this->get_settings('Unser_area_bg');  
		$section_title = $this->get_settings('section_title');  
		$section_content = $this->get_settings('section_content');

		$list = $this->get_settings('list');   
		

?>

    <section class="unser-area all-bg position-relative" style="background-image: url(<?php echo $Unser_area_bg['url'] ?>);">
        <div class="container">
            <div class="row">
                <div class="col-xl-5"></div>
                <div class="col-xl-7">
                    <div class="section-title">
                        <h2><?php echo $section_title ?></h2>
                       <div>
                       	<?php echo $section_content ?>
                       </div>
                       <div>
                        <ul class="group-details">
                        	<?php foreach ($list as $key => $lists): ?>
                        		<li><i class="<?php echo $lists['unser_list_icon'] ?>"></i><?php echo $lists['Unser_list_title'] ?></li>
                        	<?php endforeach ?> 
                        </ul>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------ End Unser Area  ------------->




<?php

	}

}