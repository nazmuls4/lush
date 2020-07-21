<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Our_team_member_Area_Widget extends \Elementor\Widget_Base {

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
		return 'our-member-area';
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
		return __( 'Our Member Area', 'plugin-name' );
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
			'team_area_content',
			[
				'label' => __( 'Team Area Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'teamn_area_bg',
			[
				'label' => __( 'Team area background', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);
 

		$this->add_control(
			'section_title',
			[
				'label' => __( 'Section Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Wer Wir Sind, Das Unternehmen, Warum Wir Das Machen',
				'label_block' => true, 
			]
		);


		$this->add_control(
			'section_description',
			[
				'label' => __( 'Section description', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'Nulla faucibus rhoncus auctor. Nullam eget nisl purus. Mauris rutrum commodo fermentum. Maecenas ex lectus, auctor a elit sed, malesuada feugiat dui. Sed convallis, odio a tempus ornare, Ut et dapibus nisl. Quisque maxi mus risus lorem ipsum.',
				'label_block' => true, 
			]
		);
  		$this->add_control(
			'section_sub_title',
			[
				'label' => __( 'Section Sub Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Our Team',
				'label_block' => true, 
			]
		);  
		$this->end_controls_section();



		$this->start_controls_section(
			'team_list_content',
			[
				'label' => __( 'Team list', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
 
		$repeater = new \Elementor\Repeater(); 


		$repeater->add_control(
			'team_thumbanail', [
				'label' => __( 'Team thumbnail', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA, 
				'label_block' => true, 

			]
		); 

		$repeater->add_control(
			'team_name', [
				'label' => __( 'Team name', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT, 
				'label_block' => true,
				'default' => 'Mark Parker',

			]
		); 
		$repeater->add_control(
			'team_designation', [
				'label' => __( 'Team member designation', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT, 
				'label_block' => true,
				'default' => 'Course-Leaders',

			]
		);  
		 
		$repeater->add_control(
			'team_member_speach', [
				'label' => __( 'Team member speach', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG, 
				'label_block' => true,
				'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus condimentum purus ante, ut efficitur magna fermentum ut.',

			]
		); 

		$repeater->add_control(
			'fb_link', [
				'label' => __( 'Facebook link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT, 
				'label_block' => true, 

			]
		);
		$repeater->add_control(
			'tw_link', [
				'label' => __( 'Twitter link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT, 
				'label_block' => true, 

			]
		);
		$repeater->add_control(
			'inst_link', [
				'label' => __( 'Instagram link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT, 
				'label_block' => true, 

			]
		);
		$repeater->add_control(
			'mbl_number', [
				'label' => __( 'Mobile number', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT, 
				'label_block' => true, 

			]
		);

		$repeater->add_control(
			'email', [
				'label' => __( 'Email', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT, 
				'label_block' => true, 

			]
		);


		 
		$this->add_control(
			'list',
			[
				'label' => __( 'Team List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(), 
				'title_field' => '{{{ team_name }}}',
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

		$teamn_area_bg = $this->get_settings('teamn_area_bg');  
		$section_title = $this->get_settings('section_title');  
		$section_description = $this->get_settings('section_description');  
		$section_sub_title = $this->get_settings('section_sub_title');  
		$list = $this->get_settings('list');  
		

?>
	 <section class="team-area all-bg" style="background-image: url(<?php echo $teamn_area_bg['url'] ?>);">
                <div class="container">
                    <div class="row ami">
                        <div class="col-xl-6">
                            <div class="section-title">
                                <h2><?php echo $section_title ?></h2>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="section-title">
                                <?php echo $section_description ?>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center team-boxes">
                        <div class="col-xl-8 offset-xl-2 col-md-12 col-lg-12">
                            <h2 class="text-center"><?php echo $section_sub_title ?></h2>
                            <div class="row d-flex justify-content-center align-items-center">
                                
								<?php foreach ($list as $key => $listitem): ?>
										 <div class="col-xl-4 col-md-6 col-lg-6">
		                                    <div class="single-team-box text-center">
		                                        <div class="team-wrapper all-bg" style="background-image: url(<?php echo $listitem['team_thumbanail']['url'] ?>);">

		                                            <div class="team-wrapper-preview">
		                                                <ul>
		                                                	<?php if (!empty($listitem['mbl_number'])): ?>
		                                                		<li><i class="fas fa-phone-volume"></i><a href="tel:<?php echo $listitem['mbl_number'] ?>"><?php echo $listitem['mbl_number'] ?></a></li>
		                                                	<?php endif ?>
		                                                	<?php if (!empty($listitem['email'])): ?>
		                                                		  <li><i class="fas fa-envelope"></i><a href="mailto:<?php echo $listitem['email'] ?>"><?php echo $listitem['email'] ?></a></li>
		                                                	<?php endif ?>

		                                                    
		                                                   
		                                                </ul>
		                                                <ul class="team-social-links">
		                                                	<?php if (!empty($listitem['fb_link'])): ?>
		                                                		 <li><a href="<?php echo $listitem['fb_link'] ?>"><i class="fab fa-facebook-f"></i></a></li>
		                                                	<?php endif ?>
		                                                	<?php if (!empty($listitem['tw_link'])): ?>
		                                                		  
		                                                		 <li><a href="<?php echo $listitem['tw_link'] ?>"><i class="fab fa-twitter"></i></a></li>
		                                                	<?php endif ?>
		                                                   
		                                                	<?php if (!empty($listitem['inst_link'])): ?> 
		                                                		 <li><a href="<?php echo $listitem['inst_link'] ?>"><i class="fab fa-instagram"></i></a></li>
		                                                	<?php endif ?>
		                                                   
		                                                    
		                                                    
		                                                </ul>
		                                            </div>
		                                        </div>
		                                        <div class="team-member-details separator">
		                                            <h4><?php echo $listitem['team_name'] ?></h4>
		                                            <span><?php echo $listitem['team_designation'] ?> </span>
		                                        </div>
		                                       <div>
		                                       	<?php echo $listitem['team_member_speach'] ?> 
		                                       </div>
		                                    </div>
		                                </div>
    
								<?php endforeach; ?>
 


                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!------ End Our Team Section ----------->
<?php

	}

}