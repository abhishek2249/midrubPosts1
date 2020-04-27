<?php
/**
 * Employees Helpers
 *
 * This file contains the class employees
 * with methods to process the employees data
 *
 * @author Brijesh
 * @package Midrub
 * @since 0.0.7.6
 */

// Define the page namespace
namespace MidrubBase\User\Apps\Collection\PHPAnalyzer\Helpers;

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Employees class provides the methods to process the employees data
 * 
 * @author Scrisoft
 * @package Midrub
 * @since 0.0.7.6
*/
class PHPAnalyzer {
    
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
        
        // Load the lists model
        $this->CI->load->ext_model( MIDRUB_BASE_USER_APPS_PHPANALYZER . 'models/', 'PHPAnalyzer', 'phpanalyzer' );
        
    }
    
    /**
     * The public method achieve_create_new_employee creates a new employee
     * 
     * @since 0.0.7.5
     * 
     * @return void
     */ 
    //Start View Facebook Settings//
    // public function phpanalyzer_user() 
    // {
    //     //$username = 'Facebook';

    //     $user= $this->CI->phpanalyzer->get_all_users();
         
    //     $data = array(
    //             'success' => TRUE,
    //             'user' => $user,
    //             //'user_log' => $user['logs']
    //         );

    //     echo json_encode($data); 
        
        
    // }

    public function search_instagram_user() {
        
        $username = $this->CI->input->get('username');

        if($username) {
            $all_username = $this->CI->phpanalyzer->get_users_name($username);
            $users_list = "";
            foreach ($all_username as $key => $user) {
                
                $users_list .= '<li>'.$user->username.'</li>';
            }
            
            $data = array(
                        'success' => TRUE,
                        'users' => $users_list,
                        );
            echo json_encode($data);
        }
    }

    public function user_detail() { 
        
        $username = $this->CI->input->post('username');
        
        if ($username) {
            $user_detail = $this->CI->phpanalyzer->get_user_detail($username);
                // if(empty($user_detail) || $user_detail == false || $user_detail ==null) {

                // }

            $user_media = $this->CI->phpanalyzer->get_all_user_media($user_detail['detail']->id);

            $user = $user_detail['detail'];
            $user_logs = $user_detail['logs'];
            $details = [];
            $details = json_decode($user_detail['detail']->details);


            if(count($details->top_posts)) {
                // echo count($details->top_posts);
                $top_media = [];
                foreach($details->top_posts as $shortcode => $value) {
                    //echo $shortcode."</br>";
                    $top_media .= '<div class="col-sm-12 col-md-6 col-lg-4">'.$this->get_embed_html($shortcode).'</div>';
                }
            }

            //user media
            foreach ($user_media as $media_data) {
                $media_date[] = $media_data->date;
                $user_media_rows .= "<tr>";
                $user_media_rows .= "<td>".$media_data->date."</td>";
                $user_media_rows .= "<td><p title='$media_data->caption'>".substr($media_data->caption, 0, 20)."</p></td>";
                $user_media_rows .= "<td><span class='badge badge-primary px-2'>".$media_data->likes."</span></td>";
                $user_media_rows .= "<td>".$media_data->date."</td>";
                $user_media_rows .= "<td><span class='badge badge-primary px-2'>".$media_data->comments."</span></td>";
                $user_media_rows .= "<td>".$media_data->date."</td>";
                $user_media_rows .= "</tr>";
             }

             //user media chart
                for($i = 0; $i < count($user_media); $i++) {
                    $media_chart_data['labels'][] = (new \DateTime())->setTimestamp($user_media[$i]->created_date)->format('Y-m-d');
                    $media_chart_data['date'][] = $user_media[$i]->date;
                    $media_chart_data['likes'][] = $user_media[$i]->likes;
                    $media_chart_data['comments'][] = $user_media[$i]->comments;
                    $media_chart_data['captions'][] = str_word_count($user_media[$i]->caption);
                }
                
                foreach($media_chart_data as $key => $value) {
                    $media_chart[$key] = '["' . implode('", "', array_reverse($value)) . '"]';
                }
            //user media end

             //average engagement
             if($user->followers < 1000) {

             }

             $report_engagement = '<img src="'.$user->profile_picture_url.'" class="img-responsive rounded-circle instagram-avatar-small" alt="' . $user->full_name . '" style="height:20%;width:6%;" />&nbsp;' . '<strong>' . $user->average_engagement_rate . '%</strong>';

             
             if($user->followers < 1000) {
                $eng_rows .= '
                                <tr class="bg-light">
                                    <td>< 1,000</td><td>8%</td><td>'.$report_engagement.'</td>
                                </tr>
                                ';
             } else {
                $eng_rows .= '
                                <tr>
                                    <td>< 1,000</td><td>8%</td><td></td>
                                </tr>
                                ';
             }

             if($user->followers >= 1000 && $user->followers < 5000) {
                $eng_rows .= '
                                <tr class="bg-light">
                                    <td>< 5,000</td><td>5.7%</td><td>'.$report_engagement.'</td>
                                </tr>
                                ';
             } else {
                $eng_rows .= '
                                <tr>
                                    <td>< 5,000</td><td>5.7%</td><td></td>
                                </tr>
                                ';
             }

             if($user->followers >= 5000 && $user->followers < 10000) {
                $eng_rows .= '
                                <tr class="bg-light">
                                    <td>< 10,000</td><td>4%</td><td>'.$report_engagement.'</td>
                                </tr>
                                ';
             } else {
                $eng_rows .= '
                                <tr>
                                    <td>< 10,000</td><td>4%</td><td></td>
                                </tr>
                                ';
             }

             if($user->followers >= 10000 && $user->followers < 100000) {
                $eng_rows .= '
                                <tr class="bg-light">
                                    <td>< 100,000</td><td>2.4%</td><td>'.$report_engagement.'</td>
                                </tr>
                                ';
             } else {
                $eng_rows .= '
                                <tr>
                                    <td>< 100,000</td><td>2.4%</td><td></td>
                                </tr>
                                ';
             }

             if($user->followers >= 100000) {
                $eng_rows .= '
                                <tr class="bg-light">
                                    <td>100,000+</td><td>1.7%</td><td>'.$report_engagement.'</td>
                                </tr>
                                ';
             } else {
                $eng_rows .= '
                                <tr>
                                    <td>100,000+</td><td>1.7%</td><td></td>
                                </tr>
                                ';
             }

             
             //average engagement
            
            foreach ($details->top_mentions as $mention => $mention_count) {
                $top_mentions .=  '<h6 class="hash_tg">'.$mention.'<span class="text-right">'.$mention_count.'</span><h6>';
             } 

            foreach ($details->top_hashtags as $hastag => $hashtag_count) {
                $top_hashtags .= '<h6 class="hash_tg">'.$hastag.'<span class="text-right">'.$hashtag_count.'</span><h6>';
            } 

            $logs = [];
            $logs = array_reverse($user_detail['logs']) ;
            $logs_chart = [
                'labels'                    => [],
                'followers'                 => [],
                'following'                 => [],
                'average_engagement_rate'   => []
            ];
            
            $total_new = [
                'followers' => [],
                'uploads'   => []
            ];
            
        
            for($i = 0; $i < count($logs); $i++) {
                
                $logs_chart['labels'][] = (new \DateTime($logs[$i]->date))->format('Y-m-d H:i:s');
                $logs_chart['followers'][] = $logs[$i]->followers;
                $logs_chart['following'][] = $logs[$i]->following;
                $logs_chart['average_engagement_rate'][] = $logs[$i]->average_engagement_rate;
                
                if($i != 0) {
                    
                    $total_new['followers'][] = $logs[$i]->followers - $logs[$i - 1]->followers;
                    $total_new['uploads'][] = $logs[$i]->uploads - $logs[$i - 1]->uploads;
                }
            }
            
            $total_days = count($logs) > 1 ? (new \DateTime($logs[count($logs)-1]->date))->diff((new \DateTime($logs[1]->date)))->format('%a') : 0;
    
            $average = [
                'followers' => $total_days > 0 ? (int) ceil(array_sum($total_new['followers']) / $total_days) : 0,
                'uploads'   => $total_days > 0 ? (int) ceil((array_sum($total_new['uploads']) / $total_days)) : 0
            ];

            $future_projection = '
                                <tr>
                                    <td>Current Stats</td>
                                    <td>'.(new \DateTime())->format("Y-m-d").'</td>
                                    <td>'.$user->followers.'</td>
                                    <td>'.$user->uploads.'</td>
                                </tr>
                                <tr>
                                <tr>
                                <td>30 days</td>
                                <td>'.((new \DateTime())->modify("+30 day")->format("Y-m-d")).'</td>
                                <td>'.($user->followers + ($average["followers"] * 30)).'</td>
                                <td>'.($user->uploads + ($average["uploads"] * 30)).'</td>
                            </tr>
                            <tr>
                                <td>60 days</td>
                                <td>'.((new \DateTime())->modify("+60 day")->format("Y-m-d")).'</td>
                                <td>'.($user->followers + ($average["followers"] * 60)).'</td>
                                <td>'.($user->uploads + ($average["uploads"] * 60)).'</td>
                            </tr>
                            <tr>
                                <td>3 months</td>
                                <td>'.((new \DateTime())->modify("+90 day")->format("Y-m-d")).'</td>
                                <td>'.($user->followers + ($average["followers"] * 90)).'</td>
                                <td>'.($user->uploads + ($average["uploads"] * 90)).'</td>
                            </tr>
                            <tr>
                                <td>6 months</td>
                                <td>'.((new \DateTime())->modify("+180 day")->format("Y-m-d")).'</td>
                                <td>'.($user->followers + ($average["followers"] * 180)).'</td>
                                <td>'.($user->uploads + ($average["uploads"] * 180)).'</td>
                            </tr>
                            <tr>
                                <td>9 months</td>
                                <td>'.((new \DateTime())->modify("+270 day")->format("Y-m-d")).'</td>
                                <td>'.($user->followers + ($average["followers"] * 270)).'</td>
                                <td>'.($user->uploads + ($average["uploads"] * 270)).'</td>
                            </tr>
                            <tr>
                                <td>1 year</td>
                                <td>'.((new \DateTime())->modify("+365 day")->format("Y-m-d")).'</td>
                                <td>'.($user->followers + ($average["followers"] * 365)).'</td>
                                <td>'.($user->uploads + ($average["uploads"] * 365)).'</td>
                            </tr>
                            <tr>
                                <td>1 year and half</td>
                                <td>'.((new \DateTime())->modify("+547 day")->format("Y-m-d")).'</td>
                                <td>'.($user->followers + ($average["followers"] * 547)).'</td>
                                <td>'.($user->uploads + ($average["uploads"] * 547)).'</td>
                            </tr>
                            <tr>
                                <td>2 years</td>
                                <td>'.((new \DateTime())->modify("+730 day")->format("Y-m-d")).'</td>
                                <td>'.($user->followers + ($average["followers"] * 730)).'</td>
                                <td>'.($user->uploads + ($average["uploads"] * 730)).'</td>
                            </tr>
                            <tr>
                                <td colspan="2">Based on an average of</td>
                                <td>+ '.$average['followers'].'followers /day</td>
                                <td>+'.$average['uploads'].'uploads /day</td>
                            </tr>
                                ';
           

            
            $followers = [];
            foreach ($user_logs as $summary) {
                $i = 0;
                $average_engagement_rate[] = $summary->average_engagement_rate;
                $followers[] = $summary->followers;
                $following[] = $summary->following;
                $uploads[] = $summary->uploads;
                $dates[] = $summary->date;
                
                $i++;
            }
            $acc_stats_summary = "";
            foreach ($dates as $f_date) {
               $map_dates[] = date("Y-m-d", strtotime($f_date));
            }                                         
            
           for($i=0;$i<count($user_logs);$i++) {

               if($i==(count($user_logs)-1)) {
               break;
               } else {
                   $followers_diff[] = $followers[$i]-$followers[$i+1];
                   $following_diff[] = $following[$i]-$following[$i+1];
                   $uploads_diff[] = $uploads[$i]-$uploads[$i+1];
               }
           }
           
               $j = 0;

               foreach ($user_logs as $log) { 
                   $followers_diff_total += $followers_diff[$j];
                   $acc_stats_summary .= '<tr><td>'.$log->date.'</td>';
                   $acc_stats_summary .=  '<td>'.date("D", strtotime($log->date)).'</td>';
                   $acc_stats_summary .=  '<td>'.$log->followers.'</td>';
                   $acc_stats_summary .=  '<td><span class="badge badge-primary px-2">'.$followers_diff[$j].'</td>';
                   $acc_stats_summary .= "<td>".$log->following."</td>";
                   $acc_stats_summary .= '<td><span class="badge badge-primary px-2">'.$following_diff[$j].'</span></td>';
                   $acc_stats_summary .= "<td>".$log->uploads."</td>";
                   $acc_stats_summary .= "<td>".$uploads_diff[$j]."</td></tr>";
                   $j++;
               }
               $acc_stats_summary .= '<tr><td colspan="2">Total Summary</td><td><span class="badge badge-primary px-2">'.$followers_diff_total.'</td><td colspan="6"></td></tr>';
            
            
            $all_map_dates = "'".implode("','", array_reverse($map_dates))."'";

            //-----------------user profile card------------------
                $user_profile_card = '
                <div class="card">
                    <div class="card-body">
                        <div class="pHP_ana_up">	
                            <!--top detail-->						
                            <h4 class="color">Profile 
                                        <button type="button" class="btn btn-primary action-button2"> <i class="fa fa-file-pdf-o"></i> PDF Export</button>
                                        </h4>
                                        <div class="col-lg-6  col-sm-6 float-left">
                                            <div class="float-left">
                                                <img src="'.$user_detail['detail']->profile_picture_url.'" class="img-fluid right_margin">
                                            </div>
                                            <div class="float-left color">
                                                <h1>@'.$user_detail['detail']->username.'</h1>
                                                <h2>'.$user_detail['detail']->full_name.'</h2>
                                                <h3>'.$user_detail['detail']->description.'</h3>
                                                <a href="javascript:void(0)" alt="Add to favourites" username="'.$user_detail['detail']->username.'" id="favourite" style="text-decoration:none;"><i class="fa fa-heart-o"></i></a>
                                            </div>
                                        </div>							
                                        <div class="col-lg-6  col-sm-6 float-right">
                                            <div class="float-left color right_margin">
                                                <h1>Followers</h1>
                                                <h2>'.$user_detail['detail']->followers.'</h2>							
                                            </div>							
                                            <div class="float-left color right_margin">
                                                <h1>Uploads</h1>
                                                <h2>'.$user_detail['detail']->uploads.'</h2>
                                            </div>                            
                                            <div class="float-left color">
                                                <h1>Engagement</h1>
                                                <h2>'.$user_detail['detail']->average_engagement_rate.'</h2>
                                            </div>
                                        </div>
                            <!--top detail-->
                                <div class="border-bottom"></div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="col-lg-12 stats">
                            <div class="col-lg-12 float-left">
                                <h4 class="color">Followers Chart </h4>
                                <div class="chart-container">
                                    <canvas id="followers_chart"></canvas>
                                </div>
                            </div>
                        
                            
                            <div class="col-lg-12">
                                <h4 class="color">Following Chart </h4>
                                <div class="chart-container">
                                    <canvas id="following_chart"></canvas>
                                </div>
                            </div>							
                        </div>
                        
                        <div class="border-bottom"></div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12 stats">
                                    <h4 class="color">Account Stats Summary <em>Showing Last 15 Enteries</em><span><a href="javascript:void(0);"><i class="fa fa-download"></i>Export to CSV</a></span></h4>
                                    <div class="col-lg-12 float-left">
                                        <div class="table-responsive">
                                            <table class="table header-border">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Day</th>
                                                        <th>Likes</th>
                                                        <th>Likes Difference </th>
                                                        <th>Followers</th>
                                                        <th>Followers Difference</th>
                                                        <th>Uploads</th>
                                                        <th>Uploads Difference</th>
                                                    </tr>
                                                </thead>
                                                <tbody>'.$acc_stats_summary.'</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="border-bottom"></div>
                                <div class="col-lg-12 stats">
                                    <h4 class="color">Average Engagement Rate Chart <em>Each value in this chart is equal to the average engagement rate of the account in that specific day.</em></h4>
                                    <div class="chart-container">
                                    <canvas id="average_engagement_rate_chart"></canvas>
                                    </div>
                                    
                                </div> 
                                <div class="clearfix"></div>
                                <div class="border-bottom"></div>
                                <div class="col-lg-12 stats">
                                    <h4 class="color">Future Projection <em>Here you can see the future projection based on your previuos days average.</em></h4>
                                    <div class="col-lg-12 float-left">
                                        <div class="table-responsive">
                                            <table class="table header-border">
                                                <thead>
                                                <tr>
                                                    <th>Time Until</th>
                                                    <th>Date</th>
                                                    <th>Followers</th>
                                                    <th>Uploads</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    '.$future_projection.'
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>   
                                <div class="clearfix"></div>
                                <div class="border-bottom"></div>
                                <div class="col-lg-12 stats">
                                    <h4 class="color">Top Posts <em>Top posts from the last 6 posts</em></h4>
                                    '.$top_media.'
                                </div>  
                                <div class="clearfix"></div>
                                <div class="border-bottom"></div>
                                <div class="col-lg-6 col-md-6 stats float-left">
                                    <h4 class="color">Top @Mentions <em>Top mentions from the last some posts</em></h4>
                                    '.$top_mentions.'
                                </div>  
                                <div class="col-lg-6 col-md-6 stats float-left">
                                    <h4 class="color">Top @hashtags <em>Top mentions from the last some posts</em> </h4>
                                    '.$top_hashtags.'
                                </div>  
                                <div class="clearfix"></div>
                                <div class="border-bottom"></div>
                                <div class="col-lg-12 stats">
                                    <h4 class="color">Engagement Rates on Instagram<em>These are overall / average engagement rates found on Instagram. Statistics based on analysis of more than 1 million influencer profiles.</em></h4>
                                    <div class="col-lg-12 float-left">
                                        <div class="table-responsive">
                                                <table class="table header-border">
                                                    <thead>
                                                        <tr>
                                                            <th>Followers</th>
                                                            <th>Other Average Engagement </th>
                                                            <th>Profile Engagement</th>
                                                        
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        '.$eng_rows.'
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="border-bottom"></div>
                                    <div class="col-lg-12 stats">
                                        <h4 class="color">Media Stats Summary<em>Showing Last 15 enteries</em></h4>
                                        <div class="col-lg-12 float-left">
                                            <div class="table-responsive">
                                                    <table class="table header-border">
                                                        <thead>
                                                            <tr>
                                                                <th>Posted On</th>
                                                                <th>Caption</th>
                                                                <th>Likes</th>
                                                                <th>Growth</th>
                                                                <th>Comments</th>
                                                                <th>Comments Growth</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            '.$user_media_rows.'
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="border-bottom"></div>
                                        <div class="col-lg-12 stats">
                                            <h4 class="color">Media Stats Chart </h4>
                                            <div class="chart-container">
                                                <canvas id="media_chart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <script>
                            Chart.defaults.global.elements.line.borderWidth = 4;
                            Chart.defaults.global.elements.point.radius = 3;
                            Chart.defaults.global.elements.point.borderWidth = 7;
                        
                            //followers
                                let followers_chart_context = document.getElementById("followers_chart").getContext("2d");

                                let gradient = followers_chart_context.createLinearGradient(0, 0, 0, 250);
                                gradient.addColorStop(0, "rgba(43, 227, 155, 0.6)");
                                gradient.addColorStop(1, "rgba(43, 227, 155, 0.05)");

                                new Chart(followers_chart_context, {
                                    type: "line",
                                    data: {
                                        labels: ['.$all_map_dates.'],
                                        datasets: [{
                                            label: "Followers",
                                            data: ['.implode(",", array_reverse($followers)).'],
                                            backgroundColor: gradient,
                                            borderColor: "#2BE39B",
                                            fill: true
                                        }]
                                    },
                                    options: {
                                        tooltips: {
                                            mode: "index",
                                            intersect: false,
                                            callbacks: {
                                                label: (tooltipItem, data) => {
                                                    let value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];

                                                    return `${number_format(value, 0, ".",  ",")} ${data.datasets[tooltipItem.datasetIndex].label}`;
                                                }
                                            }
                                        },
                                        title: {
                                            text: "Followers evolution chart",
                                            display: true
                                        },
                                        legend: {
                                            display: false
                                        },
                                        responsive: true,
                                        maintainAspectRatio: false,
                                        scales: {
                                            yAxes: [{
                                                gridLines: {
                                                    display: false
                                                },
                                                ticks: {
                                                    userCallback: (value, index, values) => {
                                                        if(Math.floor(value) === value) {
                                                            return number_format(value, 0, ".", ",");
                                                        }
                                                    }
                                                }
                                            }],
                                            xAxes: [{
                                                gridLines: {
                                                    display: false
                                                }
                                            }]
                                        }
                                    }
                                });

                            let following_chart_context = document.getElementById("following_chart").getContext("2d");

                            gradient1 = following_chart_context.createLinearGradient(0, 0, 0, 250);
                            gradient1.addColorStop(0, "rgba(62, 193, 255, 0.6)");
                            gradient1.addColorStop(1, "rgba(62, 193, 255, 0.05)");
                        
                            new Chart(following_chart_context, {
                                type: "line",
                                data: {
                                    labels: ['.$all_map_dates.'],
                                    datasets: [{
                                        label: "Following",
                                        data: ['.implode(",", array_reverse($following)).'],
                                        backgroundColor: gradient1,
                                        borderColor: "#3ec1ff",
                                        fill: true
                                    }]
                                },
                                options: {
                                    tooltips: {
                                        mode: "index",
                                        intersect: false,
                                        callbacks: {
                                            label: (tooltipItem, data) => {
                                                let value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                        
                                                return `${number_format(value, 0, ".",  ",")} ${data.datasets[tooltipItem.datasetIndex].label}`;
                                            }
                                        }
                                    },
                                    title: {
                                        text: "Following evolution chart",
                                        display: true
                                    },
                                    legend: {
                                        display: false
                                    },
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    scales: {
                                        yAxes: [{
                                            gridLines: {
                                                display: false
                                            },
                                            ticks: {
                                                userCallback: (value, index, values) => {
                                                    if(Math.floor(value) === value) {
                                                        return number_format(value, 0, ".",  ",");
                                                    }
                                                }
                                            }
                                        }],
                                        xAxes: [{
                                            gridLines: {
                                                display: false
                                            }
                                        }]
                                    }
                                }
                            });

                            let average_engagement_rate_chart_context = document.getElementById("average_engagement_rate_chart").getContext("2d");

                    gradient2 = average_engagement_rate_chart_context.createLinearGradient(0, 0, 0, 250);
                    gradient2.addColorStop(0, "rgba(237, 73, 86, 0.4)");
                    gradient2.addColorStop(1, "rgba(237, 73, 86, 0.05)");

                let average_engagement_rate_chart = new Chart(average_engagement_rate_chart_context, {
                    type: "line",
                    data: {
                        labels: ['.$all_map_dates.'],
                        datasets: [{
                            data: ['.implode(",", array_reverse($average_engagement_rate)).'],
                            backgroundColor: gradient2,
                            borderColor: "#ED4956",
                            fill: true
                        }]
                    },
                    options: {
                        tooltips: {
                            mode: "index",
                            intersect: false
                        },
                        title: {
                            text: "Average Engagement Rate",
                            display: true
                        },
                        legend: {
                            display: false
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    display: false
                                },
                                ticks: {
                                    userCallback: (value, index, values) => {
                                        if(Math.floor(value) === value) {
                                            return number_format(value, 0, ".",  ",");
                                        }
                                    }
                                }
                            }],
                            xAxes: [{
                                gridLines: {
                                    display: false
                                }
                            }]
                        }
                    }
                });
                //media chart

                new Chart(document.getElementById("media_chart").getContext("2d"), {
                    type: "line",
                    data: {
                        labels: '.$media_chart["labels"].',
                        datasets: [{
                            label: "Likes",
                            data: '.$media_chart["likes"] .',
                            backgroundColor: "#ED4956",
                            borderColor: "#ED4956",
                            fill: false
                        },
                            {
                                label: "Comments",
                                data: '.$media_chart["comments"] .',
                                backgroundColor: "#2caff7",
                                borderColor: "#2caff7",
                                fill: false
                            },
                            {
                                label: "Caption Word Count",
                                data: '.$media_chart["captions"].',
                                backgroundColor: "#25f7b1",
                                borderColor: "#25f7b1",
                                fill: false
                            }]
                    },
                    options: {
                        tooltips: {
                            mode: "index",
                            intersect: false,
                            callbacks: {
                                label: (tooltipItem, data) => {
                                    let value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            
                                    return `${number_format(value, 0, ".",  ",")} ${data.datasets[tooltipItem.datasetIndex].label}`;
                                }
                            }
                        },
                        title: {
                            display: false
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    display: false
                                },
                                ticks: {
                                    userCallback: (value, index, values) => {
                                        if(Math.floor(value) === value) {
                                            return number_format(value, 0, ".",  ",");
                                        }
                                    }
                                }
                            }],
                            xAxes: [{
                                gridLines: {
                                    display: false
                                }
                            }]
                        }
                    }
                });
               </script>
                ';
            //-----------------user profile card----------------

            // print_r($user_profile_card);die;

            $data = array(
                'success' => TRUE,
                'user' => $user_profile_card
            );

            echo json_encode($data);

        }

        
    }

    public function get_embed_html($shortcode) {
        $url = 'https://api.instagram.com/oembed/?url=http://instagr.am/p/' . $shortcode . '/&hidecaption=true&maxwidth=450';

        /* Initiate curl */
        $ch = curl_init();

        /* Disable SSL verification */
        curl_setopt($ch, 64, false);

        /* Will return the response */
        curl_setopt($ch, 19913, true);

        /* Set the Url */
        curl_setopt($ch, 10002, $url);

        /* Execute */
        $data = curl_exec($ch);

        /* Close */
        curl_close($ch);

        $response = json_decode($data);

        return $response ? $response->html : false;
    }
    
    public function compare_user_detail() 
    {
        $f_username = $this->CI->input->post('f_username');
        $s_username = $this->CI->input->post('s_username');
     
        $source_account_one = $this->CI->phpanalyzer->get_user_detail($f_username);
        $source_account_two = $this->CI->phpanalyzer->get_user_detail($s_username);

        $source_account_one_details = json_decode($source_account_one['detail']->details);
        $source_account_two_details = json_decode($source_account_two['detail']->details);
        
        $logs = [];
        
        // echo "<pre>";
        // print_r($source_account_one['logs']);die;
        //print_r();die;
        foreach ($source_account_one['logs'] as $column => $value) {
            
            $date = (new \DateTime($value->date))->format('Y-m-d');
            
            $logs[$date][$value->username] = [
                'followers'                 => $value->followers,
                'average_engagement_rate'   => $value->average_engagement_rate
            ];
        }

        foreach ($source_account_two['logs'] as $column => $value) {
            
            $date = (new \DateTime($value->date))->format('Y-m-d');
            
            $logs[$date][$value->username] = [
                'followers'                 => $value->followers,
                'average_engagement_rate'   => $value->average_engagement_rate
            ];
        }

       
        /* Sort the logs by date */
        ksort($logs);

        /* Generate data for the charts and retrieving the average followers /uploads per day */
        $chart_labels_array = [];
        $chart_followers_one_array = $chart_followers_two_array = $chart_average_engagement_rate_one_array = $chart_average_engagement_rate_two_array = [];

        foreach($logs as $key => $log) { 
            $chart_labels_array[] = $key;

            $chart_followers_one_array[] = array_key_exists($f_username, $log) ? $log[$f_username]['followers'] : false;
            $chart_followers_two_array[] = array_key_exists($s_username, $log) ? $log[$s_username]['followers'] : false;
        
            $chart_average_engagement_rate_one_array[] = array_key_exists($f_username, $log) ? $log[$f_username]['average_engagement_rate'] : false;
            $chart_average_engagement_rate_two_array[] = array_key_exists($s_username, $log) ? $log[$s_username]['average_engagement_rate'] : false;        
        }

        /* Defining the chart data */
        $chart_labels = '["' . implode('", "', $chart_labels_array) . '"]';
        $chart_followers_one = '[' . implode(', ', $chart_followers_one_array) . ']';
        $chart_followers_two = '[' . implode(', ', $chart_followers_two_array) . ']';
        $chart_average_engagement_rate_one = '[' . implode(', ', $chart_average_engagement_rate_one_array) . ']';
        $chart_average_engagement_rate_two = '[' . implode(', ', $chart_average_engagement_rate_two_array) . ']';

        $compare_top_posts = "";
        foreach($source_account_one_details->top_posts as $shortcode => $engagement_rate) {
            $compare_top_posts .= '<div class="col-lg-4 col-md-4 col-sm-6 float-left">'.$this->get_embed_html($shortcode).'</div>';
        }

        foreach($source_account_two_details->top_posts as $shortcode => $engagement_rate) {
            $compare_top_posts .= '<div class="col-lg-4 col-md-4 col-sm-6 float-left">'.$this->get_embed_html($shortcode).'</div>';
        }


        $compare_top = '
                <div class="col-lg-6  col-sm-12 float-left">
                    <div class="col-lg-4 col-md-4 col-sm-6 float-left">
                        <div class="float-left color right_margin">
                            <h1>Following</h1>
                            <h2>'.$source_account_one['detail']->following.'</h2>
                        </div>
                        <div class="float-left color">
                            <h1>Followers</h1>
                            <h2>'.$source_account_one['detail']->followers.'</h2>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 float-left">
                        <div class="float-left color">
                            <h1>@'.$source_account_one['detail']->username.'</h1>
                            <h2>'.$source_account_one['detail']->full_name.'</h2>
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary action-button2">View Report</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 float-left">
                        <div class="float-left">
                            <img src="'.$source_account_one['detail']->profile_picture_url.'" class="img-fluid right_margin">
                        </div>
                    </div>
                </div>			
                <div class="col-lg-6  col-sm-12 float-left">
                    <div class="col-lg-4 col-md-4 col-sm-6 float-left">
                        <div class="float-left">
                            <img src="'.$source_account_two['detail']->profile_picture_url.'" class="img-fluid right_margin">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 float-left">
                        <div class="float-left color right_margin">
                            <h1>Following</h1>
                            <h2>'.$source_account_two['detail']->following.'</h2>
                        </div>
                        <div class="float-left color">
                            <h1>Followers</h1>
                            <h2>'.$source_account_two['detail']->followers.'</h2>							
                        </div>
                    </div>				
                    <div class="col-lg-4 col-md-4 col-sm-6 float-left">
                        <div class="float-left color">
                            <h1>@'.$source_account_two['detail']->username.'</h1>
                            <h2>'.$source_account_two['detail']->full_name.'</h2>
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary action-button2">View Report</button>                        
                            </div>
                        </div>
                    </div>        
                </div>
                <div class="border-bottom"></div>
                <div class="clearfix"></div>
                <div class="col-lg-12 stats">
                    <h4 class="color">Statistics Summary</h4>
                    <div class="col-lg-12 float-left">
                        <div class="table-responsive">
                        <table class="table header-border">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>@'.$source_account_one['detail']->username.'</th>
                                    <th>@'.$source_account_two['detail']->username.'</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Engagement Rate</td>
                                    <td>'.$source_account_one['detail']->average_engagement_rate.'%</td>
                                    <td>'.$source_account_two['detail']->average_engagement_rate.'%</td>
                                </tr>
                                <tr>
                                    <th>Average Likes</td>
                                    <td>'.$source_account_one_details->average_likes.'</td>
                                    <td>'.$source_account_two_details->average_likes.'</td>
                                </tr>
                                <tr>
                                    <th>Average Comments </td>
                                    <td>'.$source_account_one_details->average_comments.'</td>
                                    <td>'.$source_account_two_details->average_comments.'</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="border-bottom"></div>		
                <div class="clearfix"></div>
                <div class="col-lg-12">
                    <h4 class="color">Followers Chart</h4>
                    <div class="chart-container">
                        <canvas id="compare_followers_chart"></canvas>
                    </div>
                </div>
                <div class="border-bottom"></div>
				<div class="clearfix"></div>
                <div class="col-lg-12">
                    <h4 class="color">Average Engagement Rate Chart</h4>
                    <div class="chart-container">
                        <canvas id="compare_average_engagement_rate_chart"></canvas>
                    </div>
                </div>
                <div class="border-bottom"></div>
                <div class="clearfix"></div>
                <div class="col-lg-12 stats">
                    <h4 class="color">Top Posts <em>Top posts from the last 6 posts</em></h4>
                    '.$compare_top_posts.'
                </div>
                <script>
                    Chart.defaults.global.elements.line.borderWidth = 4;
                    Chart.defaults.global.elements.point.radius = 3;
                    Chart.defaults.global.elements.point.borderWidth = 7;

                    new Chart(document.getElementById("compare_followers_chart").getContext("2d"), {
                        type: "line",
                        data: {
                            labels: '.$chart_labels.',
                            datasets: [{
                                label: "'.$source_account_one['detail']->username.'",
                                data: '.$chart_followers_one.',
                                backgroundColor: "#ED4956",
                                borderColor: "#ED4956",
                                fill: false
                            },
                                {
                                    label: "'.$source_account_two['detail']->username.'",
                                    data: '.$chart_followers_two.',
                                    backgroundColor: "#2caff7",
                                    borderColor: "#2caff7",
                                    fill: false
                                }]
                        },
                        options: {
                            spanGaps: true,
                            tooltips: {
                                mode: "index",
                                intersect: false,
                            },
                            title: {
                                display: false
                            },
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:true,
                                        userCallback: (value, index, values) => {
                                            if(Math.floor(value) === value) {
                                                return number_format(value, 0, ".", ",");
                                            }
                                        }
                                    }
                                }],
                                xAxes: [{
                                    ticks: {
                                    }
                                }]
                            }
                        }
                    });

                    new Chart(document.getElementById("compare_average_engagement_rate_chart").getContext("2d"), {
                        type: "line",
                        data: {
                            labels: '.$chart_labels.' ,
                            datasets: [{
                                label: "'.$source_account_one['detail']->username.'",
                                data: '.$chart_average_engagement_rate_one.',
                                backgroundColor: "#ED4956",
                                borderColor: "#ED4956",
                                fill: false
                            },
                                {
                                    label: "'.$source_account_two['detail']->username.'",
                                    data: '.$chart_average_engagement_rate_two.',
                                    backgroundColor: "#2caff7",
                                    borderColor: "#2caff7",
                                    fill: false
                                }]
                        },
                        options: {
                            spanGaps: true,
                            tooltips: {
                                mode: "index",
                                intersect: false
                            },
                            title: {
                                display: false
                            },
                            responsive: true,
                            maintainAspectRatio: false
                        }
                    });
                   

                </script>
                        ';

        // $udata = array(
        //     'f'=>$source_account_one,
        //     's'=>$source_account_two
        // );
        if($f_username && $s_username) 
        {
            $data = array(
                'success' => TRUE,
                'compare' => $compare_top
            );

            echo json_encode($data);
        }
        

    }

    public function favourite() {
        $username = $this->input->get('username');
        $option = $this->input->get('option');
        echo $username."--".$option; die;

    }

    public function phpanalyzer_user_ajax() 
    {
        // Check if the session exists and if the login user is admin
      
        $username = $this->input->post('username');
        $user_detail = $this->facebook->get_users_name($username);
        
        $user_list = "<ul>";
        if(isset($user_detail)) 
        { 
            foreach($user_detail as $list) 
            {
                $user_list .= '<li>'.$list->username.'</li>';
            }
        } 
        else 
        {
            $user_list .= '<li>No User Found</li>';
        }
        $user_list .= '</ul>';
        echo $user_list;
    }
    
    
}

