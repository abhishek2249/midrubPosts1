<?php
/**
 * User Controller
 *
 * This file loads the facebook app in the user panel
 *
 * @author Abhey
 * @package Midrub
 * @since 0.0.7.6
 */

// Define the page namespace
namespace MidrubBase\User\Apps\Collection\PHPAnalyzer\Controllers;

// Define the constants
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * User class loads the Facebook app loader
 * 
 * @author Abhey
 * @package Midrub
 * @since 0.0.7.6
 */
class User {
    
    /**
     * Class variables
     *
     * @since 0.0.7.6
     */
    protected $CI;

    /**
     * Initialise the Class
     *
     * @since 0.0.7.6
     */
    public function __construct() {
        
        // Get codeigniter object instance
        $this->CI =& get_instance();
        
        // Load language
        $this->CI->lang->load( 'phpanalyzer_user', $this->CI->config->item('language'), FALSE, TRUE, MIDRUB_BASE_USER_APPS_PHPANALYZER );
        
    }
    
    /**
     * The public method view loads the app's template
     * 
     * @since 0.0.7.6
     * 
     * @return void
     */
    public function view() {

        // Set the page's title
        set_the_title($this->CI->lang->line('phpanalyzer'));
        
        //------------------custom theme css---------------------------------------
        set_css_urls(array('stylesheet', base_url('assets/base/user/apps/collection/phpanalyzer/custom/plugins/chartist/css/chartist.min.css?ver=' . MIDRUB_BASE_USER_APPS_PHPANALYZER_VERSION), 'text/css', 'all'));

        set_css_urls(array('stylesheet', base_url('assets/base/user/apps/collection/phpanalyzer/custom/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css?ver=' . MIDRUB_BASE_USER_APPS_PHPANALYZER_VERSION), 'text/css', 'all'));

        set_css_urls(array('stylesheet', base_url('assets/base/user/apps/collection/phpanalyzer/custom/css/style.css?ver=' . MIDRUB_BASE_USER_APPS_PHPANALYZER_VERSION), 'text/css', 'all'));

        set_css_urls(array('stylesheet', base_url('assets/base/user/apps/collection/phpanalyzer/custom/css/custom.css?ver=' . MIDRUB_BASE_USER_APPS_PHPANALYZER_VERSION), 'text/css', 'all'));
        //------------------custom theme css---------------------------------------

        //------------------custom theme js---------------------------------------        
        set_js_urls(array('https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js'));

        set_js_urls(array(base_url('assets/base/user/apps/collection/phpanalyzer/custom/js/common.min.js?ver=' . MIDRUB_BASE_USER_APPS_PHPANALYZER_VERSION)));

        set_js_urls(array(base_url('assets/base/user/apps/collection/phpanalyzer/custom/js/custom.min.js?ver=' . MIDRUB_BASE_USER_APPS_PHPANALYZER_VERSION)));
        set_js_urls(array(base_url('assets/base/user/apps/collection/phpanalyzer/custom/js/settings.js?ver=' . MIDRUB_BASE_USER_APPS_PHPANALYZER_VERSION)));
        set_js_urls(array(base_url('assets/base/user/apps/collection/phpanalyzer/custom/js/gleek.js?ver=' . MIDRUB_BASE_USER_APPS_PHPANALYZER_VERSION)));
        set_js_urls(array(base_url('assets/base/user/apps/collection/phpanalyzer/custom/js/styleSwitcher.js?ver=' . MIDRUB_BASE_USER_APPS_PHPANALYZER_VERSION)));
        set_js_urls(array(base_url('assets/base/user/apps/collection/phpanalyzer/custom/js/dashboard/dashboard-1.js?ver=' . MIDRUB_BASE_USER_APPS_PHPANALYZER_VERSION)));





        set_js_urls(array(base_url('assets/base/user/apps/collection/phpanalyzer/custom/js/functions.js?ver=' . MIDRUB_BASE_USER_APPS_PHPANALYZER_VERSION)));



        //------------------custom theme js---------------------------------------




        // Set Achieve's styles
        set_css_urls(array('stylesheet', base_url('assets/base/user/apps/collection/phpanalyzer/styles/css/styles.css?ver=' . MIDRUB_BASE_USER_APPS_PHPANALYZER_VERSION), 'text/css', 'all'));


        
       set_js_urls(array(base_url('assets/base/user/apps/collection/phpanalyzer/js/main.js?ver=' . MIDRUB_BASE_USER_APPS_PHPANALYZER_VERSION)));
        
       
        // Set Media's Js
        set_js_urls(array(base_url('assets/user/js/media.js?ver=' . MIDRUB_BASE_USER_APPS_PHPANALYZER_VERSION)));
        
        // Set views params
        set_user_view(
            $this->CI->load->ext_view(
                MIDRUB_BASE_USER_APPS_PHPANALYZER. 'views',
                'main',
                array(
                ),
                true
            )
        );
        
    }
    
    
}
