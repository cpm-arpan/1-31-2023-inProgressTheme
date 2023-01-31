<?php

function theme_customizer_function($wp_customize)
{
    // For the navigation Start====================================================================================
    $wp_customize->add_panel(
        'arme-landing_panel',
        array(
            'title' => 'Header',
            'priority' => 10,
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_section(
        'arme-landing_panel_home',
        array(
            'title' => 'Left Main heading ',
            'desciption' => __('Main heading Customizer'),
            'panel' => 'arme-landing_panel'
        )
    );

//For the left main heading========================================================
 $wp_customize->add_setting(
        'arme-landing_panel_title',
        array(
          'sanitize_callback' => 'wp_filter_nohtml_kses', //removes all HTML from content
            'default' => __('Landing Panel heading')
        )
    );
    $wp_customize->add_control(
        'arme-landing_panel_title',
        array(
            'label' => 'Left Main heading ',
            'section' => 'arme-landing_panel_home',
            'priority' => 1,
        )
    );
//For the right heading button=============================================================
$wp_customize->add_setting('arme-right_button', array());
$wp_customize->add_control(
        'arme-right_button',
        array(
          'sanitize_callback' => 'wp_filter_nohtml_kses',//removes all HTML from content
            'label' => 'Button',
            'section' => 'arme-landing_panel_home',
            'priority' => 2,

        )
    );
//End of Navigation =========================================================================

 //Footer panel==============================================================================
 $wp_customize->add_panel(
    'arme-footer_panel',
    array(
      'title' => 'Footer',
      'priority' => 100,
      'capability' => 'edit_theme_options',
    )
  );
  $wp_customize->add_section(
    'arme-footer_panel_home',
    array(
      'title' => 'Footer content ',
      'desciption' => __('Footer Customizer'),
      'panel' => 'arme-footer_panel'
    )
  );
  $wp_customize->add_setting(
    'arme-footer_panel_title',
    array(
      'sanitize_callback' => 'wp_filter_nohtml_kses', //removes all HTML from content
      'default' => __('Footer pannel')
    )
  );
  $wp_customize->add_control(
    'arme-footer_panel_title',
    array(
      'label' => 'Footer content ',
      'section' => 'arme-footer_panel_home',
      'priority' => 3,
    )
  );
//Footer panel end==========================================================================================

//Starting site customize section
$wp_customize->add_panel(
    'arme-site-customize',
    array(
        'title' => 'Site Customization',
        'priority' => 10,
        'capability' => 'edit_theme_options',
    )
);
$wp_customize->add_section( 'arme-banner-section', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'Banner Section',
    'description'    =>  'Header elements configuration',
    'panel'  => 'arme-site-customize',
) );
//Banner Title==================================================================
$wp_customize->add_setting(
    'arme-banner-title',
    array(
      'sanitize_callback' => 'wp_filter_nohtml_kses', //removes all HTML from content
    )
  );
  $wp_customize->add_control(
    'arme-banner-title',
    array(
      'label' => 'Banner Title',
      'section' => 'arme-banner-section',
      'priority' => 3,
    )
  );
//Banne Title End=============================================================
//Banner Content==============================================================
$wp_customize->add_setting(
  'arme-banner-content',
  array(
    'sanitize_callback' => 'wp_filter_nohtml_kses', //removes all HTML from content
    'default' => __('Banner Content')
  )
);
$wp_customize->add_control(
  'arme-banner-content',
  array(
    'type'=>'textarea',
    'label' => 'Banner Content',
    'section' => 'arme-banner-section',
    'priority' => 3,
  )
);
//Banner Content End=============================================================
//Badges in Banner Section======================================================\
//badge 1==============================
$wp_customize->add_setting(
  'arme-banner-badge1',
  array(
    'default' =>'',
  )
);
$wp_customize->add_control( new WP_Customize_Image_Control(
  $wp_customize,
  'arme-banner-badge1',
  array(
    'label' => 'Badge 1',
    'section' => 'arme-banner-section',
    'priority' => 3,
  ))
);
$wp_customize->add_setting(
  'arme-banner-badge1-url',
  array(
    'default' =>'',
  )
);
$wp_customize->add_control(
  'arme-banner-badge1-url',
  array(
    'type'=>'url',
    'label' => 'Badge 1 link',
    'section' => 'arme-banner-section',
    'priority' => 3,
  ))
;
//badge 2===================================
$wp_customize->add_setting(
  'arme-banner-badge2',
  array(
    'default' =>'',
  )
);
$wp_customize->add_control( new WP_Customize_Image_Control(
  $wp_customize,
  'arme-banner-badge2',
  array(
    'label' => 'Badge 2',
    'section' => 'arme-banner-section',
    'priority' => 4,
  ))
);
$wp_customize->add_setting(
  'arme-banner-badge2-url',
  array(
    'default' =>'',
    'transport'=> 'refresh',
  )
);
$wp_customize->add_control( 
  'arme-banner-badge2-url',
  array(
    'label' => 'Badge 2 link',
    'section' => 'arme-banner-section',
    'priority' => 4,
  ))
;
//badges section end====================================================
//Phone Frame start===================================================
$wp_customize->add_setting(
    'phone-frame',
    array(
      'capability' => 'edit_theme_options',
      'default' => '',
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'phone-frame',
      array(
        'label' => __('Frame', 'text-domain'),
        'section' => 'arme-banner-section',
        'settings' => 'frame_logo',
        'priority' => 10,
      )
    )
  );

function arme_phone_generate_theme_option_css()
  {
    $phoneFrame= get_theme_mod('phone-frame');
    
    if (!empty($phoneFrame)):
    ?>
    <!-- style for particular colors -->
    <style type="text/css" id="diwp-theme-option-css">
      .device[data-device=iPhoneX][data-orientation=portrait][data-color=black]::after {
  content: "";
  background-image: url("<?php echo $phoneFrame?>");
} 
    </style>
<?php 
    endif;
  }
  add_action('wp_head', 'arme_phone_generate_theme_option_css');
//Phone frame End=========================================

//Video section for Phone================================
$wp_customize->add_setting(
  'phone-video',
  array(
    'default' => '',
    'type'=>'theme_mod',
  )
);
$wp_customize->add_control(
  new WP_Customize_Media_Control($wp_customize, 'phone-video', array(
    'label' => 'phone-video',
    'section' => 'arme-banner-section',
    'mime_type'=>'video',
    'priority' => 3,
  )
  )
);
$wp_customize->add_setting('set_main_img_pos');

        $wp_customize->add_control(
            'set_main_img_pos', 
            array(
              'priority'=> 2,
                'label' => __('Set image position'),
                'section' => 'arme-banner-section',
                'type' => 'radio',
                'choices' => array(
                    '2' => __( 'Right' ),
                    '4' => __( 'Left' ),
                ),
            )
        );
//Banner section end======================================================

//Quote Section=========================================================
//Quote content=========================================================
$wp_customize->add_section( 'arme-quote-section', array(
  'priority'       => 10,
  'capability'     => 'edit_theme_options',
  'theme_supports' => '',
  'title'          => 'Quote Section',
  'description'    =>  'Quote settings',
  'panel'  => 'arme-site-customize',
) );
$wp_customize->add_setting(
  'arme-quote-content',
  array(
    'sanitize_callback' => 'wp_filter_nohtml_kses', //removes all HTML from content
    'default' => 'Try Try...',
  )
);
$wp_customize->add_control(
  'arme-quote-content',
  array(
    'type'=>'textarea',
    'label' => 'Quote Content',
    'section' => 'arme-quote-section',
    'priority' => 3,
  )
);
//Quote logo================================================================
$wp_customize->add_setting(
  'arme-quote-logo',
  array(
    'default' =>'',
  )
);
$wp_customize->add_control( new WP_Customize_Image_Control(
  $wp_customize,
  'arme-quote-logo',
  array(
    'label' => 'Logo',
    'section' => 'arme-quote-section',
    'priority' => 4,
  ))
);
//Radio button for on/off quote section=====================================================
$wp_customize->add_setting(
  'Quote_section_radio',
  array(
    'type' => 'theme_mod',
    'default' => __('yes')
  )
);
$wp_customize->add_control(
  'Quote_section_radio',
  array(
    'label' => 'Show/Hide quote section ',
    'type' => 'radio',
    'section' => 'arme-quote-section',
    'priority' => 1,
    'choices' => array(
      'yes' => 'Yes',
      'no' => 'No'
    )
  )
);

//App featured section===========================================================
$wp_customize->add_section( 'arme-app-featured', array(
  'priority'       => 10,
  'capability'     => 'edit_theme_options',
  'theme_supports' => '',
  'title'          => 'App Features Section',
  'description'    =>  'Quote settings',
  'panel'  => 'arme-site-customize',
) );
$wp_customize->add_setting(
  'arme-first-title',
  array(
    'sanitize_callback' => 'wp_filter_nohtml_kses', //removes all HTML from content
    'default' => __('Try Try...')
  )
);
$wp_customize->add_control(
  'arme-first-title',
  array(
    'label' => 'Fist title',
    'section' => 'arme-app-featured',
    'priority' => 3,
  )
);
$wp_customize->add_setting(
  'arme-first-content',
  array(
    'sanitize_callback' => 'wp_filter_nohtml_kses', //removes all HTML from content
    'default' => __('Try Try...')
  )
);
$wp_customize->add_control(
  'arme-first-content',
  array(
    'type'=>'textarea',
    'label' => 'Fist content',
    'section' => 'arme-app-featured',
    'priority' => 3,
  )
);
//first feature end======================
$wp_customize->add_setting(
  'arme-second-title',
  array(
    'sanitize_callback' => 'wp_filter_nohtml_kses', //removes all HTML from content
    'default' => __('Try Try...')
  )
);
$wp_customize->add_control(
  'arme-second-title',
  array(
    'label' => 'Second title',
    'section' => 'arme-app-featured',
    'priority' => 3,
  )
);$wp_customize->add_setting(
  'arme-second-content',
  array(
    'sanitize_callback' => 'wp_filter_nohtml_kses', //removes all HTML from content
    'default' => __('Try Try...')
  )
);
$wp_customize->add_control(
  'arme-second-content',
  array(
    'type'=>'textarea',
    'label' => 'Second Content',
    'section' => 'arme-app-featured',
    'priority' => 3,
  )
);
//Second featured section end=========================
$wp_customize->add_setting(
  'arme-third-title',
  array(
    'sanitize_callback' => 'wp_filter_nohtml_kses', //removes all HTML from content
    'default' => __('Try Try...')
  )
);
$wp_customize->add_control(
  'arme-third-title',
  array(
    'label' => 'Third title',
    'section' => 'arme-app-featured',
    'priority' => 3,
  )
);$wp_customize->add_setting(
  'arme-third-content',
  array(
    'sanitize_callback' => 'wp_filter_nohtml_kses', //removes all HTML from content
    'default' => __('Try Try...')
  )
);
$wp_customize->add_control(
  'arme-third-content',
  array(
    'type'=>'textarea',
    'label' => 'Third Content',
    'section' => 'arme-app-featured',
    'priority' => 3,
  )
);
//Third features end=============================
$wp_customize->add_setting(
  'arme-fourth-title',
  array(
    'sanitize_callback' => 'wp_filter_nohtml_kses', //removes all HTML from content
    'default' => __('Try Try...')
  )
);
$wp_customize->add_control(
  'arme-fourth-title',
  array(
    'label' => 'Fourth title',
    'section' => 'arme-app-featured',
    'priority' => 3,
  )
);
$wp_customize->add_setting(
  'arme-fourth-content',
  array(
    'sanitize_callback' => 'wp_filter_nohtml_kses', //removes all HTML from content
    'default' => __('Try Try...')
  )
);
$wp_customize->add_control(
  'arme-fourth-content',
  array(
    'type'=>'textarea',
    'label' => 'Fourth Content',
    'section' => 'arme-app-featured',
    'priority' => 3,
  )
);
//Fourth features end====================================================
//APP features section end===============================================

//Basic featured section:================================================
$wp_customize->add_section( 'arme-basic-featured', array(
  'priority'       => 10,
  'capability'     => 'edit_theme_options',
  'theme_supports' => '',
  'title'          => 'Basic Features Section',
  'description'    =>  'Quote settings',
  'panel'  => 'arme-site-customize',
) );
$wp_customize->add_setting(
  'arme-basic-featured-title',
  array(
    'sanitize_callback' => 'wp_filter_nohtml_kses', //removes all HTML from content
    'default' => __('Try Try...')
  )
);
$wp_customize->add_control(
  'arme-basic-featured-title',
  array(
    'label' => 'Basic Featured Title',
    'section' => 'arme-basic-featured',
    'priority' => 3,
  )
);
$wp_customize->add_setting(
  'arme-basic-featured-content',
  array(
    'sanitize_callback' => 'wp_filter_nohtml_kses', //removes all HTML from content
    'default' => __('Try Try...')
  )
);
$wp_customize->add_control(
  'arme-basic-featured-content',
  array(
    'type'=>'textarea',
    'label' => 'Basic Featured Content',
    'section' => 'arme-basic-featured',
    'priority' => 3,
  )
);
//Basic Featured Section end========================================================

//Call to action=====================================================================
$wp_customize->add_section( 'arme-CTA', array(
  'priority'       => 10,
  'capability'     => 'edit_theme_options',
  'theme_supports' => '',
  'title'          => 'Call-to-action Section',
  'description'    =>  'CTA settings',
  'panel'  => 'arme-site-customize',
) );
$wp_customize->add_setting(
  'arme-CTA1',
  array(
    'sanitize_callback' => 'wp_filter_nohtml_kses', //removes all HTML from content
    'default' => __('Try Try...')
  )
);
$wp_customize->add_control(
  'arme-CTA1',
  array(
    'label' => 'heading-1',
    'section' => 'arme-CTA',
    'priority' => 3,
  )
);
$wp_customize->add_setting(
  'arme-CTA2',
  array(
    'sanitize_callback' => 'wp_filter_nohtml_kses', //removes all HTML from content
    'default' => __('Try Try...')
  )
);
$wp_customize->add_control(
  'arme-CTA2',
  array(
    'label' => 'heading-2',
    'section' => 'arme-CTA',
    'priority' => 3,
  )
);
//download for free button====================
$wp_customize->add_setting(
  'arme-CTA3',
  array(
    'sanitize_callback' => 'wp_filter_nohtml_kses', //removes all HTML from content
    'default' => __('Try Try...')
  )
);
$wp_customize->add_control(
  'arme-CTA3',
  array(
    'label' => 'Download button Content',
    'section' => 'arme-CTA',
    'priority' => 3,
  )
);
//download for free url============================
$wp_customize->add_setting(
  'arme-CTA4',
  array(
    'default' =>'',
  )
);
$wp_customize->add_control(
  'arme-CTA4',
  array(
    'type'=>'url',
    'label' => 'Download button URL',
    'section' => 'arme-CTA',
    'priority' => 3,
  )
);
//Get app/badge section============================================
$wp_customize->add_section( 'arme-get-app', array(
  'priority'       => 10,
  'capability'     => 'edit_theme_options',
  'theme_supports' => '',
  'title'          => 'Get App Section',
  'description'    =>  'Badge setting',
  'panel'  => 'arme-site-customize',
) );
$wp_customize->add_setting(
  'get-app-text',
  array(
    'default' =>'',
  )
);
$wp_customize->add_control(
  'get-app-text',
  array(
    'type'=>'text',
    'label' => 'Get App',
    'section' => 'arme-get-app',
    'priority' => 3,
  )
);
//Get-app badges section
//badge-1==============
$wp_customize->add_setting(
  'arme-getapp-badge-1',
  array(
    'default' =>'',
  )
);
$wp_customize->add_control( new WP_Customize_Image_Control(
  $wp_customize,
  'arme-getapp-badge-1',
  array(
    'label' => 'Badge 1',
    'section' => 'arme-get-app',
    'priority' => 4,
  ))
);
//badge-2===================
$wp_customize->add_setting(
  'arme-getapp-badge-2',
  array(
    'default' =>'',
  )
);
$wp_customize->add_control( new WP_Customize_Image_Control(
  $wp_customize,
  'arme-getapp-badge-2',
  array(
    'label' => 'Badge 2',
    'section' => 'arme-get-app',
    'priority' => 4,
  ))
);

//Repeater============================================================================================
//=====================================================================================================
$wp_customize->add_setting( 'customizer_repeater_example', array(
  'sanitize_callback' => 'customizer_repeater_sanitize'
));
$wp_customize->add_control( new Customizer_Repeater( $wp_customize, 'customizer_repeater_example', array(
'label'   => esc_html__('Example','customizer-repeater'),
'section' => 'arme-quote-section',
'priority' => 1,
'customizer_repeater_text_control' => true,
'customizer_repeater_repeater_control' => true
) ) );

}
//COLOR================================================================================================
//=====================================================================================================

//=========================================================
// Add New Colors Section :  Colors
//=========================================================

function diwp_customizer_add_colorPicker($wp_customize)
{

  // Add New Section: Colors

  $wp_customize->add_section('diwp_color_section', array(
    'title' => ' Colors',
    'description' => 'Set Colors For Background & Links',
    'priority' => '40'
  )
  );

  // Add Settings 
  $wp_customize->add_setting('diwp_theme_color', 
  array(
    'default' => '#ffffff',
    'sanitize_callback' => 'sanitize_hex_color' //validates 3 or 6 digit HTML hex color code
            )
  );
  

//Navigation background color===============================================
  $wp_customize->add_setting('diwp_header_bgcolor', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color' //validates 3 or 6 digit HTML hex color code
            )
  )
;
//Banner section color======================================================
  $wp_customize->add_setting('upper_section_bgcolor', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color' //validates 3 or 6 digit HTML hex color code
            )
  );
  //Quote color setting======================================================
  $wp_customize->add_setting('quote_color', array(
    'default' => '#140804',
    'sanitize_callback' => 'sanitize_hex_color' //validates 3 or 6 digit HTML hex color code
            )
    //'#212529',

  );


  // Add Controls
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'diwp_theme_color', array(
    'label' => 'App feature Color',
    'section' => 'diwp_color_section',
    'settings' => 'diwp_theme_color'

  )
  ));


  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'diwp_header_bgcolor', array(
    'label' => 'Header Background',
    'section' => 'diwp_color_section',
    'settings' => 'diwp_header_bgcolor'
  )
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'upper_section_bgcolor', array(
    'label' => 'Upper section background',
    'section' => 'diwp_color_section',
    'settings' => 'upper_section_bgcolor'
  )
  ));
  //Quote-Section color//=========================================
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'quote_color', array(
      'label' => 'Quote color',
      'section' => 'arme-quote-section',
      'settings' => 'quote_color',
      'priority' => 3,
    )
    ));



}

add_action('customize_register', 'diwp_customizer_add_colorPicker');

function diwp_generate_theme_option_css()
{



  $themeColor = get_theme_mod('diwp_theme_color');
  $header_bgcolor = get_theme_mod('diwp_header_bgcolor');
  $mastHead_bgcolor = get_theme_mod('upper_section_bgcolor');
  $quote1_color = get_theme_mod('quote_color');
  if (!empty($themeColor)):

    ?>
    <!-- style for particular colors -->

    <style type="text/css" id="diwp-theme-option-css">
      #mainNav {
        background:
          <?php echo $header_bgcolor; ?>
        ;
      }

      body {
        background:
          <?php echo $themeColor; ?>
        ;
      }

      .masthead {
        background:
          <?php echo $mastHead_bgcolor; ?>
        ;
      }

      .quotation_first {
        color:
          <?php echo $quote1_color; ?>
          !important;
      }
    </style>

    <?php

  endif;
}

add_action('wp_head', 'diwp_generate_theme_option_css');


add_action('customize_register', 'theme_customizer_function');