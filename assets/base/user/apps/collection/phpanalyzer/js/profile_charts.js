$(document).ready(function(){  
       
    $('#username').keyup(function(){  
         var query = $(this).val(); 
         if(query.length > 3)  
         {  
              $.ajax({
                  url: base_url+"admin/instagramuserajax",
                  type: 'POST',
                  data: {username: query},
                  success: 
                  function(data){
                      console.log(data);  //as a debugging message.
                      $('#usernameList').fadeIn();  
                      $('#usernameList').html(data);
                  }
              });
         }  
    });  
    $(document).on('click', 'li', function(){  
         $('#username').val($(this).text());  
         $('#usernameList').fadeOut();  
    });  
  });  
  //----- search user--------------------
  $("form").submit(function(e){
      e.preventDefault();
      var username = $('#username').val();
      
      window.location.href = base_url+"admin/instagram/"+username;
  });
  //--------------------search box----------------------------
  Chart.defaults.global.elements.line.borderWidth = 4;
  Chart.defaults.global.elements.point.radius = 3;
  Chart.defaults.global.elements.point.borderWidth = 7;


  let followers_chart_context = document.getElementById('followers_chart').getContext('2d');

  let gradient = followers_chart_context.createLinearGradient(0, 0, 0, 250);
  gradient.addColorStop(0, 'rgba(43, 227, 155, 0.6)');
  gradient.addColorStop(1, 'rgba(43, 227, 155, 0.05)');

  new Chart(followers_chart_context, {
      type: 'line',
      data: {
          labels: [<?php echo "'".implode("','", array_reverse($map_dates))."'"; ?>],
          datasets: [{
              label: "Followers",
              data: [<?php echo implode(",", array_reverse($followers)); ?>],
              backgroundColor: gradient,
              borderColor: '#2BE39B',
              fill: true
          }]
      },
      options: {
          tooltips: {
              mode: 'index',
              intersect: false,
              callbacks: {
                  label: (tooltipItem, data) => {
                      let value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];

                      return `${number_format(value, 0, '.',  ',')} ${data.datasets[tooltipItem.datasetIndex].label}`;
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
                              return number_format(value, 0, '.', ',');
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

  let following_chart_context = document.getElementById('following_chart').getContext('2d');

  gradient1 = following_chart_context.createLinearGradient(0, 0, 0, 250);
  gradient1.addColorStop(0, 'rgba(62, 193, 255, 0.6)');
  gradient1.addColorStop(1, 'rgba(62, 193, 255, 0.05)');

  new Chart(following_chart_context, {
      type: 'line',
      data: {
          labels: [<?php echo "'".implode("','", array_reverse($map_dates))."'"; ?>],
          datasets: [{
              label: "Following",
              data: [<?php echo implode(",", array_reverse($following)); ?>],
              backgroundColor: gradient1,
              borderColor: '#3ec1ff',
              fill: true
          }]
      },
      options: {
          tooltips: {
              mode: 'index',
              intersect: false,
              callbacks: {
                  label: (tooltipItem, data) => {
                      let value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];

                      return `${number_format(value, 0, '.',  ',')} ${data.datasets[tooltipItem.datasetIndex].label}`;
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
                              return number_format(value, 0, '.',  ',');
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

  let average_engagement_rate_chart_context = document.getElementById('average_engagement_rate_chart').getContext('2d');

  gradient2 = average_engagement_rate_chart_context.createLinearGradient(0, 0, 0, 250);
  gradient2.addColorStop(0, 'rgba(237, 73, 86, 0.4)');
  gradient2.addColorStop(1, 'rgba(237, 73, 86, 0.05)');

  let average_engagement_rate_chart = new Chart(average_engagement_rate_chart_context, {
      type: 'line',
      data: {
          labels: [<?php echo "'".implode("','", array_reverse($map_dates))."'"; ?>],
          datasets: [{
              data: [<?php echo implode(",", array_reverse($average_engagement_rate)); ?>],
              backgroundColor: gradient2,
              borderColor: '#ED4956',
              fill: true
          }]
      },
      options: {
          tooltips: {
              mode: 'index',
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
                              return number_format(value, 0, '.',  ',');
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

  new Chart(document.getElementById('media_chart').getContext('2d'), {
      type: 'line',
      data: {
          labels: <?= $media_chart['labels'] ?>,
          datasets: [{
              label: "Likes",
              data: <?= $media_chart['likes'] ?>,
              backgroundColor: '#ED4956',
              borderColor: '#ED4956',
              fill: false
          },
              {
                  label: "Comments",
                  data: <?= $media_chart['comments'] ?>,
                  backgroundColor: '#2caff7',
                  borderColor: '#2caff7',
                  fill: false
              },
              {
                  label: "Caption Word Count",
                  data: <?= $media_chart['captions'] ?>,
                  backgroundColor: '#25f7b1',
                  borderColor: '#25f7b1',
                  fill: false
              }]
      },
      options: {
          tooltips: {
              mode: 'index',
              intersect: false,
              callbacks: {
                  label: (tooltipItem, data) => {
                      let value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];

                      return `${number_format(value, 0, '.',  ',')} ${data.datasets[tooltipItem.datasetIndex].label}`;
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
                              return number_format(value, 0, '.',  ',');
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