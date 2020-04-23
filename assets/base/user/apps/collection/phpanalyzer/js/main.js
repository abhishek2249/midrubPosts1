/*
 * Main javascript file
*/

jQuery(document).ready( function ($) {
    
    'use strict';

    //$('#example').DataTable();

    /*
     * Get the website's url
     */
    var url =  $('meta[name=url]').attr('content');
    
    /*******************************
    METHODS
    ********************************/
      
    /*
     * Load media's employees
     * 
     * @since   0.0.7.6
    //  */
    // Main.loadPHPAnalyzer = function () {
        
    //     var data = {
    //         action: 'phpanalyzer_user'
    //     };
    //     // Make ajax call
    //     Main.ajax_call(url + 'user/app-ajax/phpanalyzer', 'GET', data, 'phpanalyzer_user');
        
    // };    


    $(document).on('submit', '#get-user-detail', function (e) {
        e.preventDefault();
        var username = $('#username').val();
        // Get category's name

        // Create an object with form data
        var data = {
            action: 'user_detail',
            username: username
        };

        // Set CSRF
        data[$(this).attr('data-csrf')] = $('input[name="' + $(this).attr('data-csrf') + '"]').val();

        // Make ajax call
       Main.ajax_call(url + 'user/app-ajax/phpanalyzer', 'POST', data, 'user_detail');

        // Display loading animation
        $('.page-loading').fadeIn('slow');
        
    });

    

    Main.methods.user_detail = function ( status, data ) { 
        
        if ( status === 'success' ) {
            //console.log(data);
               $('#profile_card').html(data.user);
        }
        
    };

    $(document).on('submit', '#compare-user-detail', function (e) {
        e.preventDefault();
        var f_username = $('#f_username').val();
        var s_username = $('#s_username').val();
        // Get category's name

        //console.log(f_username+s_username);
        // Create an object with form data
        var data = {
            action: 'compare_user_detail',
            f_username: f_username,
            s_username: s_username
        };

        // Set CSRF
        data[$(this).attr('data-csrf')] = $('input[name="' + $(this).attr('data-csrf') + '"]').val();

        // Make ajax call
       Main.ajax_call(url + 'user/app-ajax/phpanalyzer', 'POST', data, 'compare_user_detail');

        // Display loading animation
        $('.page-loading').fadeIn('slow');
        
    });
    
    Main.methods.compare_user_detail = function ( status, data ) { 
        
        if ( status === 'success' ) {
            //console.log(data.compare);
               $('#compare_top').html(data.compare);
        }
        
    };

        
    /*
     * Display delete media category response
     * 
     * @param string status contains the response status
     * @param object data contains the response content
     * 
     * @since   0.0.7.6
     */
    
        
    /*******************************
    DEPENDENCIES
    ********************************/
   
    // Load all media's categories
    //Main.loadPHPAnalyzer();
    //$('#example').DataTable();
    
    
});