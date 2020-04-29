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
    Main.loadDashboard = function () {
        
        var data = {
            action: 'dashboard'
        };
        // Make ajax call
        Main.ajax_call(url + 'user/app-ajax/phpanalyzer', 'GET', data, 'dashboard');
        
    };

    Main.methods.dashboard = function ( status, data ) { 
            
        if ( status === 'success' ) {
            $('#dashboard').html(data.dashboard);
        }
        
    };
    
    Main.loadInstagramFavourites = function () {
        
        var data = {
            action: 'instagram_favourite_report'
        };
        // Make ajax call
        Main.ajax_call(url + 'user/app-ajax/phpanalyzer', 'GET', data, 'instagram_favourite_report');
        
    };

    // -------------------searchbox ------------------------
      

        $('#username').keyup(function(){  
            var query = $(this).val();
            var site = $('#site').val();
            
            if(site =="instagram" && query != "") {
                var data = {
                    action: 'search_instagram_user',
                    username: query
                };
                // Make ajax call
                Main.ajax_call(url + 'user/app-ajax/phpanalyzer', 'GET', data, 'search_instagram_user');
                // Display loading animation
                $('.page-loading').fadeIn('slow');
            }

            Main.methods.search_instagram_user = function ( status, data ) { 
            
                if ( status === 'success' ) {
                    //alert(data);
                    $('#usernameList').html('');
                    $('#usernameList').show();
                    $('#usernameList').html(data.users);
                }
                
            };

        });  

        $(document).on('click', '#usernameList li', function(){  
             $('#username').val($(this).text());  
             $('#usernameList').hide();  
        });  

        //compare search
        $('.compare_instagram_user').keyup(function(){  
            var query = $(this).val();
            var id = $(this).attr("id");
            var site = $('#compare_site').val();

            if(site =="instagram" && query != "") {
                var data = {
                    action: 'search_instagram_user',
                    username: query
                };
                
                // Make ajax call
                Main.ajax_call(url + 'user/app-ajax/phpanalyzer', 'GET', data, 'search_instagram_user');
                // Display loading animation
                $('.page-loading').fadeIn('slow');
            }

            Main.methods.search_instagram_user = function ( status, data ) { 
            
                if ( status === 'success' ) {

                    if(id=="f_username") {
                        $('#usernameList1').html('');
                        $('#usernameList1').show();
                        $('#usernameList1').html(data.users);
                    }

                    if(id=="s_username") {
                        $('#usernameList2').html('');
                        $('#usernameList2').show();
                        $('#usernameList2').html(data.users);
                    }
                    //alert(data);
                    
                }                
            };

        });  

        $(document).on('click', '#usernameList1 li', function(){  
            var f_user = $(this).text();

            var s_user = $('#s_username').val();
            if(f_user == s_user) {
                alert('You can not compare same user, please select different user to compare');
            } else {
                $('#f_username').val(f_user);  
                $('#usernameList1').hide();  
            }

            
       });

       $(document).on('click', '#usernameList2 li', function(){  
            // $('#s_username').val($(this).text());  
            // $('#usernameList2').hide();  

            var s_user = $(this).text();

            var f_user = $('#f_username').val();
            if(f_user == s_user) {
                alert('You can not compare same user, please select different user to compare');
            } else {
                $('#s_username').val(s_user);  
                $('#usernameList2').hide();  
            }
        });
        //compare search

        $(document).on('click','#favourite_report',function(e){
            var data = {
                action: 'instagram_favourite_report'
            };
            // Make ajax call
            Main.ajax_call(url + 'user/app-ajax/phpanalyzer', 'GET', data, 'instagram_favourite_report');
            $('.page-loading').fadeIn('slow');
        });

        //add to favorite
        $(document).on('click','#favourite', function(e){
            //console.log($(this).children('.class'));
            var fav = $(this).find("i").attr('class');
            var userid = $(this).attr('userid');
            if(fav=='fa fa-heart-o') {
                var option = "add";
                var data = {
                    action: 'favourite',
                    userid: userid,
                    option: option
                }
            }

            if(fav=='fa fa-heart') {
                var option = "remove";
                var data = {
                    action: 'favourite',
                    userid: userid,
                    option: option
                }
            }

             // Make ajax call
             Main.ajax_call(url + 'user/app-ajax/phpanalyzer', 'GET', data, 'favourite');
             // Display loading animation
             $('.page-loading').fadeIn('slow');
        });

        Main.methods.favourite = function ( status, data ) { 
        
            if ( status === 'success' ) {
                if($("#fav_heart_icon").hasClass("fa-heart-o")) {
                    $('#fav_heart_icon').removeClass("fa-heart-o");
                    $('#fav_heart_icon').addClass("fa-heart");
                } else {
                    $('#fav_heart_icon').removeClass("fa-heart");
                    $('#fav_heart_icon').addClass("fa-heart-o");
                }
            }
        };
        //add to favorite
      
      //----- search user--------------------

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
            $('#profile_card').html('');
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
    Main.loadInstagramFavourites();
    Main.loadDashboard();
    //$('#example').DataTable();

    Main.methods.instagram_favourite_report = function ( status, data ) { 
        
        if ( status === 'success' ) {
               $('#instagram_fav_list').html(data.fav_report);
               $('.instagram_fav_list_count').html(data.count);
        }
        
    };
    
    
});