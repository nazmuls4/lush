<?php if ( ! defined( 'ABSPATH' ) ) { die; } 

function lush_webmakerbd_metabox_options( $options ) {

  $options      = array(); 

 // -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => 'lush_webmakerbd_page_option',
  'title'     => esc_html__( 'Page Breadcum Options', 'lush-creativepeoples' ),
  'post_type' => 'page',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'  => 'lush_webmakerbd_page_content',     

      'fields' => array(
         array(
          'id'    => 'enable_breadcum',
          'type'  => 'switcher',
          'title' => esc_html__('Enable Breadcum', 'lush-creativepeoples'),
          'default' => false,
          'desc' => esc_html__('Enable Custom Breadcum Area', 'lush-creativepeoples'),
        ),      
        array(
          'id'    => 'custom_page_title',
          'type'  => 'text',
          'title' => esc_html__('Custom Title','lush-creativepeoples'),        
          'desc' =>  esc_html__('Type your Custom Title : Exam: Service Content','lush-creativepeoples'),
          'dependency'   => array( 'enable_breadcum', '==', 'true' ),
        ),  

      ), 
    ), 
  ),

);

 // -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => 'lush_webmakerbd_slider_metabox_option',
  'title'     => esc_html__( 'Slider Metabox Options', 'lush-creativepeoples' ),
  'post_type' => 'slider',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'  => 'lush_slider_metabox_content',   
      'fields' => array(

         array(
          'id'              => 'lush_slider_btn',
          'type'            => 'group',
          'title'           => esc_html__('Slider Button', 'lush-creativepeoples'),
          'button_title'    => 'Add New',
          'accordion_title' => esc_html__( 'Add New Button', 'lush-creativepeoples' ),
          'fields'          => array(

            array(
              'id'    => 'button_text',
              'type'  => 'text',
              'title' => esc_html__('Button Text','lush-creativepeoples'),
              'default' =>  esc_html__('View Project','lush-creativepeoples'),       
              'desc' =>  esc_html__('Type Button Text','lush-creativepeoples'),
            ), 
            array(
              'id'    => 'button_type',
              'type'  => 'select',
              'title' => esc_html__('Button Type','lush-creativepeoples'),
              'default' =>  esc_html__('filled-btn','lush-creativepeoples'),       
              'desc' =>  esc_html__('Select Button Type','lush-creativepeoples'),
              'options'        => array(
                'filled-btn' => esc_html__( 'Filled Button', 'lush-creativepeoples' ),
                'bordared-btn' => esc_html__( 'Bordared Button', 'lush-creativepeoples' ),
              ),
            ),
            array(
              'id'    => 'button_link_type',
              'type'  => 'select',
              'title' => esc_html__('Button Link Type','lush-creativepeoples'),
              'default' =>  esc_attr__('1','lush-creativepeoples'),       
              'desc' =>  esc_html__('Select Button Type','lush-creativepeoples'),
              'options'        => array(
                '1' => esc_html__( 'Page To Link', 'lush-creativepeoples' ),
                '2' => esc_html__( 'External Link', 'lush-creativepeoples' ),
              ),
            ),
            array(
              'id'    => 'button_page_link',
              'type'  => 'select',
              'title' => esc_html__('Button Page Link','lush-creativepeoples'),       
              'desc' =>  esc_html__('Select internal page link','lush-creativepeoples'),
              'options'        => 'page',
              'dependency'   => array( 'button_link_type', '==', '1' ),
            ),
            array(
              'id'    => 'button_external_link',
              'type'  => 'text',
              'title' => esc_html__('Button External Link','lush-creativepeoples'),       
              'desc' =>  esc_html__('Type External Link','lush-creativepeoples'),
              'default' =>  esc_html__('https://static.webmakerbd.net','lush-creativepeoples'),
              'dependency'   => array( 'button_link_type', '==', '2' ),
            ),


          )
        ),

         array(
            'id'    => 'slider_ovelay',
            'type'  => 'switcher',
            'title' => esc_html__('Slider Ovelay','lush-creativepeoples'),       
            'desc' =>  esc_html__('Turn On Switcher If You Want To enable Slider Overlay.','lush-creativepeoples'),
            'default' =>  true,
          ),

         array(
            'id'    => 'slider_ovelay_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Slider Ovelay Color','lush-creativepeoples'),       
            'desc' =>  esc_html__('Select Slider Ovelay Color','lush-creativepeoples'),
            'default' =>  esc_attr__('#222','lush-creativepeoples'),
            'dependency'   => array( 'slider_ovelay', '==', 'true' ),
          ),

         array(
            'id'    => 'slider_ovelay_opacity',
            'type'  => 'text',
            'title' => esc_html__('Slider Opacity','lush-creativepeoples'),       
            'desc' =>  esc_html__('Type Slider Opacity In Floating Number Only, Like: .4','lush-creativepeoples'),
            'default' =>  esc_attr__('.4','lush-creativepeoples'),
            'dependency'   => array( 'slider_ovelay', '==', 'true' ),
          ),
      ), 
    ), 
  ),

);

  return $options;

}
add_filter( 'cs_metabox_options', 'lush_webmakerbd_metabox_options' );



// Framework Options

function lush_webmakerbd_framework_options( $options ) {

  $options      = array(); 
    // ------------------------------
    $options[]   = array(
      'name'     => 'lush_webmakerbd_header_options',
      'title'    => esc_html__( 'Header Setting', 'lush-creativepeoples' ),
      'icon'     => 'fa fa-h-square',
      'fields'      => array(

          // begin: a field 
          array(
            'id'              => 'header_info_box',
            'type'            => 'group',
            'title'           => esc_html__( 'Header Info Box', 'lush-creativepeoples' ),
            'button_title'    => 'Add New',
            'accordion_title' => esc_html__( 'Add New Info Box', 'lush-creativepeoples'),
            'fields'          => array(

              array(
                'id'      => 'box_info_icon',
                'type'    => 'icon',
                'title'   => esc_html__( 'Box Icon', 'lush-creativepeoples' ),
                'desc'   => esc_html__( 'Select Box Icon', 'lush-creativepeoples' ),
                'default'    => esc_attr__( 'fa fa-globe', 'lush-creativepeoples' ),
              ),
              array(
                'id'      => 'box_info_big_title',
                'type'    => 'text',
                'title'   => esc_html__( 'Box Big Title', 'lush-creativepeoples' ),
                'desc'   => esc_html__( 'Type Box Big Title', 'lush-creativepeoples' ),
                'default'    => esc_html__( 'MAIN OFFICE', 'lush-creativepeoples' ),
              ),
              
              array(
                'id'      => 'box_info_long_content',
                'type'    => 'textarea',
                'title'   => esc_html__( 'Box long content', 'lush-creativepeoples' ),
                'desc'   => esc_html__( 'Type Box long content', 'lush-creativepeoples' ),
                'default'    => esc_html__( '3826 Turnpike Drive, Athens, AL, 35613', 'lush-creativepeoples' ),
              ),
              
             
            )
          ),
          

        ), // end: fields
    );
    $options[]   = array(
      'name'     => 'lush_webmakerbd_general_options',
      'title'    => esc_html__( 'General Setting', 'lush-creativepeoples' ),
      'icon'     => 'fa fa-square',
      'fields'      => array(

          // begin: a field 
           array(
              'id'      => 'blog_breadcum_image',
              'type'    => 'image',
              'title'   => esc_html__( 'Blog Breadcum', 'lush-creativepeoples' ),
              'desc'   => esc_html__( 'Uplaod Archive Breadcum Background image', 'lush-creativepeoples' ),
            ),

           array(
              'id'      => 'blog_archive_image',
              'type'    => 'image',
              'title'   => esc_html__( 'Archive Breadcum', 'lush-creativepeoples' ),
              'desc'   => esc_html__( 'Uplaod Archive Breadcum Background image', 'lush-creativepeoples' ),
            ),
           
           array(
              'id'      => 'search_off_canvas_menu',
              'type'    => 'switcher',
              'title'   => esc_html__( 'Search Off canvas menu turn off', 'lush-creativepeoples' ),
              'desc'   => esc_html__( 'Search Turn of the Off canvas menu', 'lush-creativepeoples' ),
              'default'   => true,
            ),
           
          

        ), // end: fields
    );

    $options[]   = array(
      'name'     => 'lush_webmakerbd_logo_options',
      'title'    => esc_html__( 'Logo Setting', 'lush-creativepeoples' ),
      'icon'     => 'fa fa-camera',
      'fields'      => array(

          // begin: a field
          array(
            'id'      => 'enable_logo',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Enable Site Logo', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Do you want Enable Site Logo? If you want yes ? Just Enable the Switcher', 'lush-creativepeoples' ),
            'default'    => false,
          ),

          array(
            'id'      => 'upload_logo',
            'type'    => 'image',
            'title'   => esc_html__( 'Uplaod Logo', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Do you want to Uplaod Logo? If you want Just Enable the Switcher', 'lush-creativepeoples' ),
            'help'   => esc_html__( 'Make sure your image size is : 120 By 62 px', 'lush-creativepeoples' ),
            'dependency'   => array( 'enable_logo', '==', 'true' ),
          ),

          array(
            'id'      => 'text_logo',
            'type'    => 'text',
            'title'   => esc_html__( 'Text Logo', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Type Text Logo', 'lush-creativepeoples' ),
            'default'    => esc_html__( 'lush', 'lush-creativepeoples' ),
            'dependency'   => array( 'enable_logo', '==', 'false' ),
          ),
          

        ), // end: fields
    );

    $options[]   = array(
      'name'     => 'lush_webmakerbd_preloade_options',
      'title'    => esc_html__( 'Prealoader Setting', 'lush-creativepeoples' ),
      'icon'     => 'fa fa-spinner',
      'fields'      => array(

          // begin: a field
          array(
            'id'      => 'enable_site_prealoade',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Enable Site prealoader', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Do you want Enable Site prealoader? If you want yes ? Just Enable the Switcher', 'lush-creativepeoples' ),
            'default'    => true,
          ),
          array(
            'id'      => 'enable_slider_prealoade',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Enable slider prealoader', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Do you want Enable slider prealoader? If you want yes ? Just Enable the Switcher', 'lush-creativepeoples' ),
            'default'    => false,
          ),        
          

        ), // end: fields
    );

    $options[]   = array(
      'name'     => 'lush_webmakerbd_social_link_options',
      'title'    => esc_html__( 'Social Link Setting', 'lush-creativepeoples' ),
      'icon'     => 'fa fa-signal',
      'fields'      => array(

          // begin: a field
          array(
            'id'              => 'social_link',
            'type'            => 'group',
            'title'           => esc_html__( 'Social link', 'lush-creativepeoples' ),
            'button_title'    => 'Add New',
            'accordion_title' => esc_html__( 'Add New Social link', 'lush-creativepeoples'),
            'fields'          => array(

              array(
                'id'      => 'social_link_icon',
                'type'    => 'icon',
                'title'   => esc_html__( 'Social link Icon', 'lush-creativepeoples' ),
                'desc'   => esc_html__( 'Select Social link Icon', 'lush-creativepeoples' ),
                'default'    => esc_attr__( 'fa fa-facebook', 'lush-creativepeoples' ),
              ),
              array(
                'id'      => 'social_link',
                'type'    => 'text',
                'title'   => esc_html__( 'Social link', 'lush-creativepeoples' ),
                'desc'   => esc_html__( 'Type Social link', 'lush-creativepeoples' ),
                'default'    => esc_html__( 'http://facebook.com/', 'lush-creativepeoples' ),
              ),              
                           
             
            )
          ),
          

        ), // end: fields
    );

  
    $options[]   = array(
      'name'     => 'lush_webmakerbd_style_options',
      'title'    => esc_html__( 'Style setting', 'lush-creativepeoples' ),
      'icon'     => 'fa fa-heart',
      'fields'      => array(

          // begin: a field
          array(
            'id'      => 'primary_color',
            'type'    => 'color_picker',
            'title'   => esc_html__( 'Theme Primary Color', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Select Theme Primary Color', 'lush-creativepeoples' ),
            'default'    => esc_attr__( '#f6ba0b', 'lush-creativepeoples' ),
          ),
          array(
            'id'      => 'secondary_color',
            'type'    => 'color_picker',
            'title'   => esc_html__( 'Theme Secondary Color', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Select Theme Secondary Color', 'lush-creativepeoples' ),
            'default'    => esc_attr__( '#212121', 'lush-creativepeoples' ),
          ),
          array(
            'id'      => 'font_color',
            'type'    => 'color_picker',
            'title'   => esc_html__( 'Theme Font Color', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Select Theme Font Color', 'lush-creativepeoples' ),
            'default'    => esc_attr__( '#202428', 'lush-creativepeoples' ),
          ),
          
           array(
            'id'      => 'footer_top_bg_color',
            'type'    => 'color_picker',
            'title'   => esc_html__( 'Footer top background color', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Select footer top background color', 'lush-creativepeoples' ),
            'default'    => esc_attr__( '#212121', 'lush-creativepeoples' ),
          ),

          array(
            'id'      => 'footer_bottom_bg_color',
            'type'    => 'color_picker',
            'title'   => esc_html__( 'Footer bottom background color', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Select footer bottom background color', 'lush-creativepeoples' ),
            'default'    => esc_attr__( '#000000', 'lush-creativepeoples' ),
          ),
          array(
            'id'      => 'box_layout',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Box Layout', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Do you want enable Box Layout? If yes , Enable Switcher.', 'lush-creativepeoples' ),
            'default'    => false,
          ),
          array(
            'id'      => 'box_layout_bg_image',
            'type'    => 'image',
            'title'   => esc_html__( 'Background image', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Upload Box Layout Background image.', 'lush-creativepeoples' ), 
            'dependency'   => array( 'box_layout', '==', 'true' ),
          ),          
          array(
            'id'      => 'box_layout_bg_color',
            'type'    => 'color_picker',
            'title'   => esc_html__( 'Background color', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Select Background color', 'lush-creativepeoples' ),
            'default'    => esc_attr__( '', 'lush-creativepeoples' ),
            'dependency'   => array( 'box_layout', '==', 'true' ),
          ),

          array(
            'id'      => 'box_layout_bg_repeat',
            'type'    => 'select',
            'title'   => esc_html__( 'Background Reaoeat', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Select Box Layout Background Reaoeat', 'lush-creativepeoples' ), 
            'options'      => array(
              'repeat'    => esc_html__( 'Background Repeat', 'lush-creativepeoples' ),
              'no-repeat'    => esc_html__( 'Background No Repeat', 'lush-creativepeoples' ),
            ),  
            'dependency'   => array( 'box_layout', '==', 'true' ),
          ),
          array(
            'id'      => 'box_layout_bg_attachment',
            'type'    => 'select',
            'title'   => esc_html__( 'Background attachment', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Select Box Layout Background attachment', 'lush-creativepeoples' ), 
            'options'      => array(
              'fixed'    => esc_html__( 'Background attachment fixed', 'lush-creativepeoples' ),
              'scroll'    => esc_html__( 'Background attachment scroll', 'lush-creativepeoples' ),
              'initial'    => esc_html__( 'Background attachment initial', 'lush-creativepeoples' ),
              'inherit'    => esc_html__( 'Background attachment inherit', 'lush-creativepeoples' ),
            ),  
            'dependency'   => array( 'box_layout', '==', 'true' ),
          ),

        ), // end: fields
    );

    $options[]   = array(
      'name'     => 'lush_webmakerbd_typhography_options',
      'title'    => esc_html__( 'Typography setting', 'lush-creativepeoples' ),
      'icon'     => 'fa fa-fonticons',
      'fields'      => array(

          // begin: a field
          
          array(
            'id'      => 'body_font',
            'type'    => 'typography',
            'title'   => esc_html__( 'Body font', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Select Body font', 'lush-creativepeoples' ),
            'default'   => array(
              'family'  => 'Roboto',
              'font'    => 'google', // this is helper for output ( google, websafe, custom )
              'variant' => '400',
            ),
          ),

          array(
            'id'      => 'body_font_variant',
            'type'    => 'checkbox',
            'title'   => esc_html__( 'Body font variant', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Select Body font variant', 'lush-creativepeoples' ),
            'options'   => array(
              '100'    => esc_html__( '100', 'lush-creativepeoples' ),
              '100i'    => esc_html__( '100 italic', 'lush-creativepeoples' ),               
              '300'    => esc_html__( '300', 'lush-creativepeoples' ),
              '300i'    => esc_html__( '300 italic', 'lush-creativepeoples' ),
              'regular'    => esc_html__( 'regular', 'lush-creativepeoples' ),
              'italic'    => esc_html__( 'italic', 'lush-creativepeoples' ),
              '500'    => esc_html__( '500', 'lush-creativepeoples' ), 
              '500i'    => esc_html__( '500 italic', 'lush-creativepeoples' ),              
              '700'    => esc_html__( '700', 'lush-creativepeoples' ),
              '700i'    => esc_html__( '700 italic', 'lush-creativepeoples' ),
              '800'    => esc_html__( '800', 'lush-creativepeoples' ),
              '800i'    => esc_html__( '800 italic', 'lush-creativepeoples' ),
              '900'    => esc_html__( '900', 'lush-creativepeoples' ),
              '900i'    => esc_html__( '900 italic', 'lush-creativepeoples' ),
            ),
            'default'   => array('regular','italic'),
          ),

          array(
            'id'      => 'heading_font',
            'type'    => 'typography',
            'title'   => esc_html__( 'Heading font', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Select Heading font', 'lush-creativepeoples' ),
            'default'   => array(
              'family'  => 'Roboto',
              'font'    => 'google', // this is helper for output ( google, websafe, custom )
              'variant' => '700',
            ),
          ),
          array(
            'id'      => 'heading_font_variant',
            'type'    => 'checkbox',
            'title'   => esc_html__( 'Heading font variant', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Select Heading font variant', 'lush-creativepeoples' ),
            'options'   => array(
              '100'    => esc_html__( '100', 'lush-creativepeoples' ),
              '100i'    => esc_html__( '100 italic', 'lush-creativepeoples' ),               
              '300'    => esc_html__( '300', 'lush-creativepeoples' ),
              '300i'    => esc_html__( '300 italic', 'lush-creativepeoples' ),
              'regular'    => esc_html__( 'regular', 'lush-creativepeoples' ),
              'italic'    => esc_html__( 'italic', 'lush-creativepeoples' ),
              '500'    => esc_html__( '500', 'lush-creativepeoples' ), 
              '500i'    => esc_html__( '500 italic', 'lush-creativepeoples' ),              
              '700'    => esc_html__( '700', 'lush-creativepeoples' ),
              '700i'    => esc_html__( '700 italic', 'lush-creativepeoples' ),
              '800'    => esc_html__( '800', 'lush-creativepeoples' ),
              '800i'    => esc_html__( '800 italic', 'lush-creativepeoples' ),
              '900'    => esc_html__( '900', 'lush-creativepeoples' ),
              '900i'    => esc_html__( '900 italic', 'lush-creativepeoples' ),
            ),
            'default'   => array('500','700'),
          ),

          
          array(
            'id'      => 'body_font_size',
            'type'    => 'text',
            'title'   => esc_html__( 'Body font size', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Type Body font size, Number Only Example: 16', 'lush-creativepeoples' ), 
            'default'   => esc_attr__( '15', 'lush-creativepeoples' ),
          ),
          array(
            'id'      => 'body_font_line_height',
            'type'    => 'text',
            'title'   => esc_html__( 'Body font line height', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Type Body font line height, Number Only Example: 28', 'lush-creativepeoples' ), 
            'default'   => esc_attr__( '28', 'lush-creativepeoples' ),
          ),
          array(
            'id'      => 'heading_font_size',
            'type'    => 'text',
            'title'   => esc_html__( 'Heading font size', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Type Heading font size, Number Only Example: 25', 'lush-creativepeoples' ), 
          ),
          array(
            'id'      => 'heading_font_line_height',
            'type'    => 'text',
            'title'   => esc_html__( 'Heading font line height', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Type Heading font line height, Number Only Example: 35', 'lush-creativepeoples' ), 
          ),

         

        ), // end: fields
    );


    $options[]   = array(
      'name'     => 'lush_webmakerbd_blog_options',
      'title'    => esc_html__( 'Blog setting', 'lush-creativepeoples' ),
      'icon'     => 'fa fa-bold',
      'fields'      => array(

          // begin: a field
          array(
            'id'      => 'blog_post_date',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Post Date', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Do you hide blog post date? If yes? Just Deactive the switch.', 'lush-creativepeoples' ),
            'default'    => true,
          ),
          array(
            'id'      => 'blog_post_by',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Post By', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Do you hide blog post by? If yes? Just Deactive the switch.', 'lush-creativepeoples' ),
            'default'    => true,
          ),
          array(
            'id'      => 'blog_post_category',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Post Category', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Do you hide blog post Category? If yes? Just Deactive the switch.', 'lush-creativepeoples' ),
            'default'    => true,
          ),
          array(
            'id'      => 'blog_post_tag',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Post Tag', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Do you hide blog post Tag? If yes? Just Deactive the switch.', 'lush-creativepeoples' ),
            'default'    => true,
          ),
          array(
            'id'      => 'blog_post_single_navigation',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Post single navigation', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Do you hide blog post single navigation? If yes? Just Deactive the switch.', 'lush-creativepeoples' ),
            'default'    => true,
          ),

        ), // end: fields
    );

    $options[]   = array(
      'name'     => 'lush_webmakerbd_footer_options',
      'title'    => esc_html__( 'Footer setting', 'lush-creativepeoples' ),
      'icon'     => 'fa fa-flag',
      'fields'      => array(

          // begin: a field
          
         
          array(
            'id'      => 'footer_copyright_text',
            'type'    => 'textarea',
            'sanitize'    => false,
            'title'   => esc_html__( 'Footer Copyright text', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Type Footer Copyright text', 'lush-creativepeoples' ),
            'default'    => esc_html__( '2019 Your Site Name.', 'lush-creativepeoples' ),
          ),

        ), // end: fields
    );
  

    $options[]   = array(
      'name'     => 'lush_webmakerbd_script_options',
      'title'    => esc_html__( 'Script setting', 'lush-creativepeoples' ),
      'icon'     => 'fa fa-subscript',
      'fields'      => array(

          // begin: a field
          
          array(
            'id'      => 'head_script',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Header Script', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Header Script, Goes to before colosing the < / head > tag', 'lush-creativepeoples' ),
            'default'    => esc_attr__( '', 'lush-creativepeoples' ),
            'sanitize'    => false,
          ),
          array(
            'id'      => 'footer_script',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Footer Script', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Footer Script, Goes to before colosing the < / body > tag', 'lush-creativepeoples' ),
            'default'    => esc_attr__( '', 'lush-creativepeoples' ),
            'sanitize'    => false,
          ),


          array(
            'id'      => 'custom_css',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Custom Css', 'lush-creativepeoples' ),
            'desc'   => esc_html__( 'Type Custom Css, Goes to before colosing the < / body > tag', 'lush-creativepeoples' ),
            'default'    => esc_attr__( '', 'lush-creativepeoples' ),
            'sanitize'    => false,
          ),

          

        ), // end: fields
    );
  

  return $options;

}
add_filter( 'cs_framework_options', 'lush_webmakerbd_framework_options' );


// Framework Setting

function lush_webmakerbd_framework_settings( $settings ) {

  $settings      = array(); 

  $settings           = array(
    'menu_title'      => esc_html__( 'Theme Options', 'lush-creativepeoples'),
    'menu_type'       => 'theme', // menu, submenu, options, theme, etc.
    'menu_slug'       => 'lush-theme-option',
    'ajax_save'       => true,
    'show_reset_all'  => true,
    'framework_title' => esc_html__( 'lush Theme Options by Webmakerbd', 'lush-creativepeoples'),
  );
  return $settings;

}
add_filter( 'cs_framework_settings', 'lush_webmakerbd_framework_settings' );




// Shortcode Setting
function lush_webmakerbd_shortcode_options( $options ) {

  $options      = array(); 

  return $options;

}
add_filter( 'cs_shortcode_options', 'lush_webmakerbd_shortcode_options' );

// Customize Setting
function lush_webmakerbd_customize_options( $options ) {

  $options      = array(); 

  return $options;

}
add_filter( 'cs_customize_options', 'lush_webmakerbd_customize_options' );


