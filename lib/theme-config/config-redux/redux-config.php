<?php 

    //Adding custom fucntion to reudx
    if ( file_exists( CASSANDRA_DIR . '/lib/theme-config/config-redux/_custom-config.php' )) { 
        require CASSANDRA_DIR . '/lib/theme-config/config-redux/_custom-config.php';
    }

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */ 
    if ( ! class_exists( 'Redux' ) ) { 
        return; 
    } 

    // This is your option name where all the Redux data is stored.
    $opt_name = "cassandra"; 

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */ 

    $theme = wp_get_theme(); // For use with some settings. Not necessary. 
    $args = array(

        // TYPICAL -> Change these values as you need/desire

        'opt_name'             => $opt_name,

        // This is where your data is stored in the database and also becomes your global variable name.

        'display_name'         => $theme->get( 'Name' ),

        // Name that appears at the top of your panel

        'display_version'      => $theme->get( 'Version' ),

        // Version that appears at the top of your panel

        'menu_type'            => 'menu',

        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)

        'allow_sub_menu'       => true,

        // Show the sections below the admin menu item or not

        'menu_title'           => esc_html__( 'Cassandra Options','cassandra-lite' ),

        'page_title'           => esc_html__( 'Cassandra Options','cassandra-lite' ),

        // You will need to generate a Google API key to use this feature.

        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth

        'google_api_key'       => '',

        // Set it you want google fonts to update weekly. A google_api_key value is required.

        'google_update_weekly' => false,

        // Must be defined to add google fonts to the typography module

        'async_typography'     => true,

        // Use a asynchronous font on the front end or font string

        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader

        'admin_bar'            => true,

        // Show the panel pages on the admin bar

        'admin_bar_icon'       => 'dashicons-portfolio',

        // Choose an icon for the admin bar menu

        'admin_bar_priority'   => 50,

        // Choose an priority for the admin bar menu

        'global_variable'      => '',

        // Set a different name for your global variable other than the opt_name

        'dev_mode'             => true,

        // Show the time the page took to load, etc

        'update_notice'        => true,

        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo

        'customizer'           => true,

        // Enable basic customizer support

        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.

        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field



        // OPTIONAL -> Give you extra features

        'page_priority'        => null,

        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.

        'page_parent'          => 'themes.php',

        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters

        'page_permissions'     => 'manage_options',

        // Permissions needed to access the options panel.

        'menu_icon'            => '',

        // Specify a custom URL to an icon

        'last_tab'             => '',

        // Force your panel to always open to a specific tab (by id)

        'page_icon'            => 'icon-themes',

        // Icon displayed in the admin panel next to your menu_title

        'page_slug'            => 'cassandra_options',

        // Page slug used to denote the panel

        'save_defaults'        => true,

        // On load save the defaults to DB before user clicks save or not

        'default_show'         => false,

        // If true, shows the default value next to each field that is not the default value.

        'default_mark'         => '',

        // What to print by the field's title if the value shown is default. Suggested: *

        'show_import_export'   => true,

        // Shows the Import/Export panel when not used as a field.



        // CAREFUL -> These options are for advanced use only

        'transient_time'       => 60 * MINUTE_IN_SECONDS,

        'output'               => true,

        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output

        'output_tag'           => true,

        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head

        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.



        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.

        'database'             => '',

        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!



        'use_cdn'              => true,

        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.



        //'compiler'             => true,

 

    );



   

    // Panel Intro text -> before the form

    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {

        if ( ! empty( $args['global_variable'] ) ) {

            $v = $args['global_variable'];

        } else {

            $v = str_replace( '-', '_', $args['opt_name'] );

        }

        $args['intro_text'] = sprintf( esc_html__( '','cassandra-lite' ), $v );

    } else {

        $args['intro_text'] = esc_html__( '','cassandra-lite' );

    }



    // Add content after the form.

    $args['footer_text'] = esc_html__( '','cassandra-lite' );



    Redux::setArgs( $opt_name, $args );



    /*

     * ---> END ARGUMENTS

     */



    /*

     * ---> START HELP TABS

     */



    $tabs = array(

        array(

            'id'      => 'redux-help-tab-1',

            'title'   => esc_html__( 'Theme Information 1','cassandra-lite' ),

            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>','cassandra-lite' )

        ),

        array(

            'id'      => 'redux-help-tab-2',

            'title'   => esc_html__( 'Theme Information 2','cassandra-lite' ),

            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>','cassandra-lite' )

        )

    );

    Redux::setHelpTab( $opt_name, $tabs );



    // Set the help sidebar

    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>','cassandra-lite' );

    Redux::setHelpSidebar( $opt_name, $content );


    // -> START Basic Fields

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Demo Switcher','cassandra-lite' ), 
        'id'         => 'demo-choose-opt', 
        'fields'     => array(
            array(
                'id'       => 'demo-chose',
                'type'     => 'select',
                'title'    => esc_html__( 'Select Demo','cassandra-lite' ),
                'options'  => array(
                    '1' => esc_html__( 'Fashion 1','cassandra-lite' ),
                    '2' => esc_html__( 'Fashion 2','cassandra-lite' ),
                    '3' => esc_html__( 'Fashion 3','cassandra-lite' ),
                ),
                'default'  => '1'  
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Top Header','cassandra-lite' ), 
        'id'         => 'top-header', 
        'fields'     => array(
            array(
                'id'       => 'tophd-switch',
                'type'     => 'switch',
                'title'    => esc_html__( 'Top Header','cassandra-lite' ), 
                'default'  => 0,
                'on'       => 'Show',
                'off'      => 'Hide',
            ),
            array(
                'id'       => 'phone-txt',
                'type'     => 'text', 
                'required' => array( 'tophd-switch', '=', '1' ),
                'title'    => esc_html__( 'Phone','cassandra-lite' ),
                'default'  => '' 
            ),
            array(
                'id'       => 'email-txt',
                'type'     => 'text', 
                'validate' => 'email',
                'required' => array( 'tophd-switch', '=', '1' ),
                'title'    => esc_html__( 'Email','cassandra-lite' ),
                'default'  => ''
            ) 
        )
    ) );

    Redux::setSection( $opt_name, array(

        'title'      => esc_html__( 'Main Header','cassandra-lite' ), 

        'id'         => 'main-header', 

        'fields'     => array(

            array(
                'id'       => 'logo-up',
                'type'     => 'media', 
                'compiler' => true, 
                'title'    => esc_html__( 'Upload Logo','cassandra-lite' ), 
                'desc'    => esc_html__( 'Best Size is (158 X 52) px','cassandra-lite' ), 
            ),

            array(

                'id'       => 'logo-width',

                'type'     => 'text',  

                'title'    => esc_html__( 'Logo Width','cassandra-lite' ), 

                'desc'    => esc_html__( 'Put a numeric value with px. Such As: 113px ','cassandra-lite' ), 

                'default'    => '158px' 

            ),

            array(

                'id'       => 'logo-height',

                'type'     => 'text',  

                'title'    => esc_html__( 'Logo Height','cassandra-lite' ), 

                'desc'    => esc_html__( 'Put a numeric value with px. Such As: 33px ','cassandra-lite' ), 

                'default'    => '52px' 

            ), 

            array(

                'id'       => 'cart-ico',

                'type'     => 'switch',  

                'title'    => esc_html__( 'Cart Icon','cassandra-lite' ), 

                'default'  => 0,

                'on'       => esc_html__( 'Show','cassandra-lite' ), 

                'off'      => esc_html__( 'Hide','cassandra-lite' )

            )
        )

    ) );

  

    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Page Settings','cassandra-lite' ),
        'id'    => 'wp-fremework-page',
        'desc'  => esc_html__( 'Multiple page settings support from here','cassandra-lite' ) 
    ) );
 

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Banner Options','cassandra-lite' ), 
        'id'         => 'bnr-trns',
        'subsection' => true,
        'fields'     => array( 
            array(
                'id'       => 'bnrtrnsys',
                'type'     => 'select',
                'title'    => esc_html__( 'Banner Style','cassandra-lite' ),
                'options'  => array(
                    'bnrtrns' => esc_html__( 'Transparent','cassandra-lite' ),
                    'nor' => esc_html__( 'Normal','cassandra-lite' ),
                ),
                'default'  => 'nor'  
            )
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog Page','cassandra-lite' ), 
        'id'         => 'blog-page',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'blog-enable',
                'type'     => 'checkbox',
                'title'    => esc_html__( 'Enable Banner ?','cassandra-lite' ),
                'desc'     => esc_html__('If yes, then click the checkbox.','cassandra-lite'),
                'default'  => false
            ),
            array(
                'id'       => 'blog-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Blog Title','cassandra-lite' ),  
                'default'  => esc_html__( '','cassandra-lite' ), 
                'desc'    => esc_html__( 'Write blog title 1','cassandra-lite' ), 
            ),
            array(
                'id'       => 'blog-title2',
                'type'     => 'text',
                'title'    => esc_html__( 'Blog Title 2','cassandra-lite' ),  
                'default'  => esc_html__( 'Blog Posts','cassandra-lite' ), 
                'desc'    => esc_html__( 'Write blog title 2','cassandra-lite' ), 
            ),
            array(
                'id'       => 'blog-banner',
                'type'     => 'media',
                'title'    => esc_html__( 'Banner Image','cassandra-lite' )  
            ),
            array(
                'id'       => 'blog-sidebar',
                'type'     => 'select',
                'title'    => esc_html__( 'Blog Sidebar','cassandra-lite' ),
                'options'  => array(
                    'left' => esc_html__( 'Left','cassandra-lite' ),
                    'right' => esc_html__( 'Right','cassandra-lite' ),
                ),
                'default'  => 'right'  
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Single Post','cassandra-lite' ), 
        'id'         => 'single-page',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'single-enable',
                'type'     => 'checkbox',
                'title'    => esc_html__( 'Enable Banner ?','cassandra-lite' ),
                'desc'     => esc_html__('If yes, then click the checkbox.','cassandra-lite'),
                'default'  => false
            ),
            array(
                'id'       => 'single-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Single Title','cassandra-lite' ),  
                'default'  => esc_html__( '','cassandra-lite' ), 
                'desc'    => esc_html__( 'Write title 1 here','cassandra-lite' ), 
            ),
            array(
                'id'       => 'single-title2',
                'type'     => 'text',
                'title'    => esc_html__( 'Single Title 2','cassandra-lite' ),  
                'default'  => esc_html__( 'Single Post','cassandra-lite' ), 
                'desc'    => esc_html__( 'Write title 2','cassandra-lite' ), 
            ),
            array(
                'id'       => 'single-banner',
                'type'     => 'media',
                'title'    => esc_html__( 'Banner Image','cassandra-lite' )  
            ),
            array(
                'id'       => 'single-sidebar',
                'type'     => 'select',
                'title'    => esc_html__( 'Single Post Sidebar','cassandra-lite' ),
                'options'  => array(
                    'left' => esc_html__( 'Left','cassandra-lite' ),
                    'right' => esc_html__( 'Right','cassandra-lite' ),
                ),
                'default'  => 'right'  
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Search Page','cassandra-lite' ), 
        'id'         => 'search-page',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'search-enable',
                'type'     => 'checkbox',
                'title'    => esc_html__( 'Enable Banner ?','cassandra-lite' ),
                'desc'     => esc_html__('If yes, then click the checkbox.','cassandra-lite'),
                'default'  => false
            ),

            array(
                'id'       => 'srch-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Search Title','cassandra-lite' ),  
                'default'  => esc_html__( '','cassandra-lite' ), 
                'desc'    => esc_html__( 'Write title 1','cassandra-lite' ), 
            ),
            array(
                'id'       => 'srch-title2',
                'type'     => 'text',
                'title'    => esc_html__( 'Search Title 2','cassandra-lite' ),  
                'default'  => esc_html__( 'Search Post','cassandra-lite' ), 
                'desc'    => esc_html__( 'Write title 2','cassandra-lite' ), 
            ),
            array(
                'id'       => 'srch-banner',
                'type'     => 'media',
                'title'    => esc_html__( 'Banner Image','cassandra-lite' )  
            ),
            array(
                'id'       => 'srch-sidebar',
                'type'     => 'select',
                'title'    => esc_html__( 'Search Sidebar','cassandra-lite' ),
                'options'  => array(
                    'left' => esc_html__( 'Left','cassandra-lite' ),
                    'right' => esc_html__( 'Right','cassandra-lite' ),
                ),
                'default'  => 'right'  
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Archive Page','cassandra-lite' ), 
        'id'         => 'archive-page',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'archive-enable',
                'type'     => 'checkbox',
                'title'    => esc_html__( 'Enable Banner ?','cassandra-lite' ),
                'desc'     => esc_html__('If yes, then click the checkbox.','cassandra-lite'),
                'default'  => false
            ),
            array(
                'id'       => 'archv-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Archive Title','cassandra-lite' ),  
                'default'  => esc_html__( '','cassandra-lite' ),  
                'desc'    => esc_html__( 'Write title 1','cassandra-lite' ),
            ),
            array(
                'id'       => 'archv-title2',
                'type'     => 'text',
                'title'    => esc_html__( 'Archive Title 2','cassandra-lite' ),  
                'default'  => esc_html__( 'Archive Post','cassandra-lite' ),  
                'desc'    => esc_html__( 'Write title 2','cassandra-lite' ),
            ),
            array(
                'id'       => 'archv-banner',
                'type'     => 'media',
                'title'    => esc_html__( 'Banner Image','cassandra-lite' )  
            ),
            array(
                'id'       => 'archv-sidebar',
                'type'     => 'select',
                'title'    => esc_html__( 'Archive Sidebar','cassandra-lite' ),
                'options'  => array(
                    'left' => esc_html__( 'Left','cassandra-lite' ),
                    'right' => esc_html__( 'Right','cassandra-lite' ),
                ),
                'default'  => 'right'  
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Shop Page','cassandra-lite' ), 
        'id'         => 'shop-page',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'shop-enable',
                'type'     => 'checkbox',
                'title'    => esc_html__( 'Enable Banner ?','cassandra-lite' ),
                'desc'     => esc_html__('If yes, then click the checkbox.','cassandra-lite'),
                'default'  => false
            ),
            array(
                'id'       => 'shop-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Archive Title','cassandra-lite' ),  
                'default'  => esc_html__( '','cassandra-lite' ),  
                'desc'    => esc_html__( 'Write title 1','cassandra-lite' ),
            ),
            array(
                'id'       => 'shop-title2',
                'type'     => 'text',
                'title'    => esc_html__( 'Archive Title 2','cassandra-lite' ),  
                'default'  => esc_html__( 'Archive Post','cassandra-lite' ),  
                'desc'    => esc_html__( 'Write title 2','cassandra-lite' ),
            ),
            array(
                'id'       => 'shop-banner',
                'type'     => 'media',
                'title'    => esc_html__( 'Banner Image','cassandra-lite' )  
            )
        )
    ) );

 
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Advanced Options','cassandra-lite' ), 
        'id'         => 'atrd-options', 
        'fields'     => array(
            array(
                'id'       => 'custom_css',
                'type'     => 'ace_editor',
                'title'    => esc_html__('Custom CSS','cassandra-lite'),
                'subtitle' => esc_html__('Paste your CSS code here.','cassandra-lite'),
                'mode'     => 'css',
                'theme'    => 'monokai',
                'default'  => "#example{\n  margin: 0 auto;\n}"
            ), 
            array(
                'id'       => 'custom_js',
                'type'     => 'ace_editor',
                'title'    => esc_html__('Custom JS','cassandra-lite'),
                'subtitle' => esc_html__('Paste your JS code here.','cassandra-lite'),
                'mode'     => 'javascript',
                'theme'    => 'monokai',
                'default'  => "jQuery(document).ready(function(){\n  //code goes here\n});",
                'desc'  => "Write js code within jQuery(document).ready(function(){}) code block"
            ) 
        )
    ) ); 

    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Footer Options','cassandra-lite' ),
        'id'    => 'footer-options',
        'desc'  => esc_html__( 'Multiple page settings support from here','cassandra-lite' ) 
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Subscribe','cassandra-lite' ), 
        'id'         => 'footer-subscribe',
        'subsection' => true, 
        'fields'     => array(  
            array(
                'id'       => 'subscr-switch',
                'type'     => 'switch',
                'title'    => esc_html__( 'Brand Logo','cassandra-lite' ), 
                'default'  => 0,
                'on'       => 'Show',
                'off'      => 'Hide',
            ), 
            array(
                'id'       => 'sub-msg',
                'type'     => 'textarea',   
                'required' => array( 'subscr-switch', '=', '1' ),
                'title'    => esc_html__( 'Short Message','cassandra-lite' )  ,
                'desc'     => esc_html__( 'Write a short message here.','cassandra-lite' )  ,
                'default'  => '' 
            ),
            array(
                'id'       => 'sub-scode',
                'type'     => 'text',   
                'required' => array( 'subscr-switch', '=', '1' ),
                'title'    => esc_html__( 'Form Shortcode','cassandra-lite' )  ,
                'desc'     => esc_html__( 'Input mailchimp shortcode here.','cassandra-lite' )  ,
                'default'  => '' 
            ) 
        ) 
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Brand Logo','cassandra-lite' ), 
        'id'         => 'footer-brandlogo',
        'subsection' => true, 
        'fields'     => array( 
            array(
                'id'       => 'brnd-switch',
                'type'     => 'switch',
                'title'    => esc_html__( 'Brand Logo','cassandra-lite' ), 
                'default'  => 0,
                'on'       => 'Show',
                'off'      => 'Hide',
            ), 
            array(
                'id'       => 'brand-1',
                'type'     => 'media', 
                'compiler' => true, 
                'required' => array( 'brnd-switch', '=', '1' ),
                'title'    => esc_html__( 'Brand Image 1','cassandra-lite' ), 
                'desc'    => esc_html__( 'Best Size is (157 X 45) px','cassandra-lite' ), 
            ),
            array(
                'id'       => 'brand-2',
                'type'     => 'media', 
                'compiler' => true, 
                'required' => array( 'brnd-switch', '=', '1' ),
                'title'    => esc_html__( 'Brand Image 2','cassandra-lite' ), 
                'desc'    => esc_html__( 'Best Size is (157 X 45) px','cassandra-lite' ), 
            ),
            array(
                'id'       => 'brand-3',
                'type'     => 'media', 
                'compiler' => true, 
                'required' => array( 'brnd-switch', '=', '1' ),
                'title'    => esc_html__( 'Brand Image 3','cassandra-lite' ), 
                'desc'    => esc_html__( 'Best Size is (157 X 45) px','cassandra-lite' ), 
            ),
            array(
                'id'       => 'brand-4',
                'type'     => 'media', 
                'compiler' => true, 
                'required' => array( 'brnd-switch', '=', '1' ),
                'title'    => esc_html__( 'Brand Image 4','cassandra-lite' ), 
                'desc'    => esc_html__( 'Best Size is (157 X 45) px','cassandra-lite' ), 
            ),
            array(
                'id'       => 'brand-5',
                'type'     => 'media', 
                'compiler' => true, 
                'required' => array( 'brnd-switch', '=', '1' ),
                'title'    => esc_html__( 'Brand Image 5','cassandra-lite' ), 
                'desc'    => esc_html__( 'Best Size is (157 X 45) px','cassandra-lite' ), 
            ),
            array(
                'id'       => 'brand-6',
                'type'     => 'media', 
                'compiler' => true, 
                'required' => array( 'brnd-switch', '=', '1' ),
                'title'    => esc_html__( 'Brand Image 6','cassandra-lite' ), 
                'desc'    => esc_html__( 'Best Size is (157 X 45) px','cassandra-lite' ), 
            ),
        ) 
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Widget Section','cassandra-lite' ), 
        'id'         => 'footer-widget',
        'subsection' => true, 
        'fields'     => array( 
            array(
                'id'       => 'wdgt-switch',
                'type'     => 'switch',
                'title'    => esc_html__( 'Widget Section','cassandra-lite' ), 
                'default'  => 0,
                'on'       => 'Show',
                'off'      => 'Hide',
            ), 
            array(
                'id'       => 'wdgt-txt-clr',
                'type'     => 'color',  
                'required' => array( 'wdgt-switch', '=', '1' ),
                'title'    => esc_html__( 'Section Text Color','cassandra-lite' ), 
                'output'    => array('color'  => '.footer-area .footer_bx1 p,.footer-area .footer_bx h3,.footer-area .footer_bx .menu li'),
                'desc'    => esc_html__( 'Pick a color from here.','cassandra-lite' ), 
            ),
            array(
                'id'       => 'wdgt-txt-hvrclr',
                'type'     => 'color',  
                'required' => array( 'wdgt-switch', '=', '1' ),
                'title'    => esc_html__( 'Section Text Hover Color','cassandra-lite' ), 
                'output'    => array('color'  => '.footer-area .footer_bx .menu li a:hover'),
                'desc'    => esc_html__( 'Pick a color from here.','cassandra-lite' ), 
            ),
            array(
                'id'       => 'wdgt-bg-clr',
                'type'     => 'color',  
                'required' => array( 'wdgt-switch', '=', '1' ),
                'title'    => esc_html__( 'Section Background Color','cassandra-lite' ), 
                'desc'    => esc_html__( 'Pick a color from here.','cassandra-lite' ), 
            ),
            array(
                'id'       => 'wdgt-bg-img',
                'type'     => 'media',  
                'required' => array( 'wdgt-switch', '=', '1' ),
                'title'    => esc_html__( 'Section Background IMage','cassandra-lite' ), 
                'desc'    => esc_html__( 'Upload an image from here.','cassandra-lite' ), 
            ),
            array(
                'id'       => 'wdgt-scl-bgc',
                'type'     => 'color',  
                'required' => array( 'wdgt-switch', '=', '1' ),
                'title'    => esc_html__( 'Social Icon BG Color','cassandra-lite' ), 
                'desc'    => esc_html__( 'Pick a color from here.','cassandra-lite' ), 
            ),
            array(
                'id'       => 'wdgt-scl-clr',
                'type'     => 'color',  
                'required' => array( 'wdgt-switch', '=', '1' ),
                'title'    => esc_html__( 'Social Icon Color','cassandra-lite' ), 
                'desc'    => esc_html__( 'Pick a color from here.','cassandra-lite' ), 
            ),
            array(
                'id'       => 'wdgt-scl-hvrclr',
                'type'     => 'color',  
                'required' => array( 'wdgt-switch', '=', '1' ),
                'title'    => esc_html__( 'Social Icon Hover Color','cassandra-lite' ), 
                'desc'    => esc_html__( 'Pick a color from here.','cassandra-lite' ), 
            ),            
            array(
                'id'    => 'opt-notice-info1',
                'type'  => 'info',
                'style' => 'info',
                'required' => array( 'wdgt-switch', '=', '1' ),
                'title'  => esc_html__( 'Widget Background ','cassandra-lite' ), 
                'desc'    => esc_html__( 'Count from left, according to (nth-child).','cassandra-lite' ),
            ),
            array(
                'id'       => 'fwdgt-1',
                'type'     => 'media', 
                'compiler' => true,  
                'required' => array( 'wdgt-switch', '=', '1' ),
                'title'    => esc_html__( 'Wdiget 1 BG Image','cassandra-lite' ), 
                'desc'    => esc_html__( 'Upload a verticle image like demo.','cassandra-lite' ), 
            ),
            array(
                'id'       => 'fwdgt-2',
                'type'     => 'media', 
                'compiler' => true,  
                'required' => array( 'wdgt-switch', '=', '1' ),
                'title'    => esc_html__( 'Wdiget 2 BG Image','cassandra-lite' ), 
                'desc'    => esc_html__( 'Upload a verticle image like demo.','cassandra-lite' ), 
            ),
            array(
                'id'       => 'fwdgt-3',
                'type'     => 'media', 
                'compiler' => true,  
                'required' => array( 'wdgt-switch', '=', '1' ),
                'title'    => esc_html__( 'Wdiget 3 BG Image','cassandra-lite' ), 
                'desc'    => esc_html__( 'Upload a verticle image like demo.','cassandra-lite' ), 
            ),
            array(
                'id'       => 'fwdgt-4',
                'type'     => 'media', 
                'compiler' => true,  
                'required' => array( 'wdgt-switch', '=', '1' ),
                'title'    => esc_html__( 'Wdiget 4 BG Image','cassandra-lite' ), 
                'desc'    => esc_html__( 'Upload a verticle image like demo.','cassandra-lite' ), 
            ),
        ) 
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Copyright','cassandra-lite' ), 
        'id'         => 'footer-copyright',
        'subsection' => true, 
        'fields'     => array(  
            array(
                'id'       => 'copyright-text',
                'type'     => 'editor',
                'title'    => esc_html__( 'Copyright Text','cassandra-lite' ),
                'subtitle' => esc_html__( 'Write Copyright Text Here','cassandra-lite' ), 
                'default'  => '<span>Cassandra</span> - Copyright 2017. Developed by <span><a href="#" target="_blank">digitalcenturysf</a></span>',
                'args'   => array(
                    'teeny'            => true,
                    'textarea_rows'    => 5
                )
            ),
            array(
                'id'       => 'copyrightbg',
                'type'     => 'color',   
                'title'    => esc_html__( 'BG Color','cassandra-lite' ), 
                'output'    => array('background-color'  => '.copyright_area'),
                'desc'    => esc_html__( 'Pick a color from here.','cassandra-lite' ), 
            ),
            array(
                'id'       => 'copyrighthighlit',
                'type'     => 'color',   
                'title'    => esc_html__( 'Highlight Color','cassandra-lite' ), 
                'output'    => array('color'  => '.copyright_area span'),
                'desc'    => esc_html__( 'Pick a color from here. highlight text should be wrapped by (span) tag','cassandra-lite' ), 
            ),
        ) 
    ) );

