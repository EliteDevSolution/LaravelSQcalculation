<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">

    <link rel="stylesheet" href="{{URL::asset('assets/css/nicdark_style.css')}}"> <!--style-->
    <link rel="stylesheet" href="{{URL::asset('assets/css/nicdark_responsive.css')}}"> <!--nicdark_responsive-->
    <link rel="stylesheet" href="{{URL::asset('assets/css/responsive.css')}}">
    <script src="{{URL::asset('assets/js/main/jquery.min.js')}}"></script> <!--Jquery-->
    <script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
</head>
<body class="bng-body-report">
	<div class="nicdark_container bng-report">
		<?php if($let_share) : ?>
		<div class="grid grid_6">
			<h1>
				Social Quotient
				<span class="bng-text-red">&#174;</span>
				report
				<?php if ($user->is_download == 0) : ?>
				<a href='<?php echo action("QuizController@downloadPdf", ["member_id"=>$user->token]); ?>' class="nicdark_btn_icon nicdark_bg_violet small nicdark_radius_circle white" title="Download Report" id="button_download">
					<i class="icon-download-cloud"></i>
				</a>
				<?php endif;?>
			</h1>
		</div>
		<div class="grid grid_6" id="box_send_email">
			<div class="nicdark_textevidence">
                <div class="nicdark_focus nicdark_width_percentage80">
                    <input class="nicdark_bg_grey2 nicdark_radius nicdark_shadow black medium subtitle" type="text" placeholder="LEAVE YOUR @MAIL" value="" size="250" id="target_email">       
                </div>
                <div class="nicdark_focus nicdark_width_percentage20">
                    <div class="nicdark_marginleft20 nicdark_disable_marginleft_iphoneland nicdark_disable_marginleft_iphonepotr">
                        <input class="nicdark_btn fullwidth nicdark_bg_blue medium nicdark_shadow nicdark_radius white" type="submit" id="button_submit" value="SEND">
                    </div>
                </div>

            </div>
		</div>
    <?php else : ?>
    <div class="grid grid_12">
      <h1>
        Social Quotient
        <span class="bng-text-red">&#174;</span>
        traist report
      </h1>
    </div>
    <?php endif;?>

		<div class="grid grid_12">
			<div class="grid grid_3">
				<span>Form:</span><span class="bng-text-red"><?php echo ucwords($user->name); ?></span>
			</div>
			<div class="grid grid_5" style="text-align: center;">
				<span>Group : <?php echo ucwords($group->name); ?></span>
			</div>
			<div class="grid grid_3" style="text-align: right;">
				<span>Zip Code <?php echo $group->zip; ?></span>
			</div>
		</div>
		<div class="grid grid_12" style="text-align: center;">
			<span>Your group of <?php echo $total_members;?> gave you as <span class="bng-text-red">SQ rating of <?php echo $score_report['total']; ?></span> or "<?php echo $user->getScore('first');?>" on <?php echo $group->format_date('end_date');?></span>
		</div>
		<div class="grid grid_12" style="text-align: center;">
			<span>Your SQ rating is above <?php echo $percent;?>% of other in your group</span>
		</div>

		<?php foreach($questions as $question) : ?>
		<div class="grid grid_12">
			<p>"<?php echo $question->text; ?>"</p>
		</div>
		<?php endforeach;?>
		<?php
		$end_texts = ['Your male peers gave you', 'an average SQ of '.$score_report['male'], '', 'Your female peers gave you', 'an average SQ of '.$score_report['female']];
		$start_text = ['Your peers marked you:', '', '', '', ''];
		?>
		<table class="bng-table-rang">
			<?php foreach($presses  as $key=>$press): ?>
			<tr>
				<td><?php echo $start_text[$key];?></td>
				<td><?php echo $press->qty;?></td>
				<td><?php echo $press->text;?>'s</td>
				<td><?php echo $end_texts[$key];?></td>
			</tr>
			<?php endforeach;?>
		</table>
		<p>SQ ratings,like IQ scores, are based on 100 being average</p>
		<table class="bng-table-scores">
			<tr>
				<td>Scores of 130's</td>
				<td>+</td>
				<td>=</td>
				<td>Absolutely superb</td>
			</tr>
			<tr>
				<td>120's</td>
				<td></td>
				<td>=</td>
				<td>Excellent</td>
			</tr>
			<tr>
				<td>110's</td>
				<td></td>
				<td>=</td>
				<td>Very good</td>
			</tr>
			<tr>
				<td>100's</td>
				<td></td>
				<td>=</td>
				<td>Slightly above average</td>
			</tr>
			<tr>
				<td>90's</td>
				<td></td>
				<td>=</td>
				<td>Slightly bellow average</td>
			</tr>
			<tr>
				<td>bellow 90</td>
				<td></td>
				<td>=</td>
				<td>Bellow average</td>
			</tr>

		</table>
		<div class="grid grid_12">
			<div id="graph"></div>
		</div>

	<script>
  var my_chart;
  var user_name = "<?php echo ucwords($user->name); ?>";
		$(function () {

		/**
 * Sand-Signika theme for Highcharts JS
 * @author Torstein Honsi
 */

// Load the fonts
Highcharts.createElement('link', {
   href: '//fonts.googleapis.com/css?family=Signika:400,700',
   rel: 'stylesheet',
   type: 'text/css'
}, null, document.getElementsByTagName('head')[0]);

// Add the background image to the container
Highcharts.wrap(Highcharts.Chart.prototype, 'getContainer', function (proceed) {
   proceed.call(this);
   this.container.style.background = 'url(http://www.highcharts.com/samples/graphics/sand.png)';
});


Highcharts.theme = {
   colors: ["#f45b5b", "#8085e9", "#8d4654", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
      "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
   chart: {
      backgroundColor: null,
      style: {
         fontFamily: "Signika, serif"
      }
   },
   title: {
      style: {
         color: 'black',
         fontSize: '16px',
         fontWeight: 'bold'
      }
   },
   subtitle: {
      style: {
         color: 'black'
      }
   },
   tooltip: {
      borderWidth: 0
   },
   legend: {
      itemStyle: {
         fontWeight: 'bold',
         fontSize: '13px'
      }
   },
   xAxis: {
      labels: {
         style: {
            color: '#6e6e70'
         }
      }
   },
   yAxis: {
      labels: {
         style: {
            color: '#6e6e70'
         }
      }
   },
   plotOptions: {
      series: {
         shadow: true
      },
      candlestick: {
         lineColor: '#404048'
      },
      map: {
         shadow: false
      }
   },

   // Highstock specific
   navigator: {
      xAxis: {
         gridLineColor: '#D0D0D8'
      }
   },
   rangeSelector: {
      buttonTheme: {
         fill: 'white',
         stroke: '#C0C0C8',
         'stroke-width': 1,
         states: {
            select: {
               fill: '#D0D0D8'
            }
         }
      }
   },
   scrollbar: {
      trackBorderColor: '#C0C0C8'
   },

   // General
   background2: '#E0E0E8'

};

// Apply the theme
Highcharts.setOptions(Highcharts.theme);
(function (H) {
    H.wrap(H.Tooltip.prototype, 'hide', function (defaultCallback) {
      /**/
    });
}(Highcharts));

  $('#graph').highcharts({
        chart: {
          events: {
            load: function(){
                var points = <?php echo json_encode(array_keys($grouped));?>;
                console.log(points);
                var point = "<?php echo $user->getScore('first');?>"
                      var p = this.series[0].points[points.indexOf(point)];
                      this.tooltip.refresh(p);
            }
          }
        },

        title: {
            text: user_name+ '\'s Score'
        },
        xAxis: {
            categories: <?php echo json_encode( array_keys($grouped) );?>,
            labels: {
                //rotation: -15,
                style: {
                    fontSize: '12px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            title: {
                text: 'Percents',
            },
            labels:{
                format:"{value} %"
            }
        },
        labels: {
            items: [{
                //html: 'Total fruit consumption',
                style: {
                    left: '50px',
                    top: '18px',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                }
            }]
        },
        series: [{
            type: 'column',
            name: 'Percent Scores',
            data: <?php echo json_encode( array_values($grouped) ); ?>
        },
        /*
        {
            type: 'spline',
            name: 'Average',
            data: <?php echo json_encode( array_values($grouped) ); ?>,
            marker: {
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[3],
                fillColor: 'white'
            }
        },
        {
            type: 'pie',
            name: 'Total consumption',
            data: <?php echo json_encode($pie_data); ?>,
            center: [150, 0],
            size: 80,
            showInLegend: false,
            dataLabels: {
                enabled: false
            }
        }
        */
        ],
        tooltip: {

  		    formatter: function(){
            if( this.x == "<?php echo $user->getScore('first');?>" ){
                var box = '<span style="text-align:center; display:block;">My Score</span><br>'+
                '<div style="width:100%; display:table; text-align:center;">'+
                  '<div style="display:table-cell; vertical-align:middle;"><img src="<?php echo $user->getPhoto();?>" style="width:48px; height:48px;" /></div>'+
                  '<div style="display:table-cell; text-aling:justify; padding:3px;">'+
                    '<span style="display:block;" ><?php echo $user->name;?></span><br>'+
                    '<span style="display:block; margin-top:-15px;" ><?php echo $score_report["total"]; ?></span><br>'+
                    '<span style="display:block; margin-top:-15px;" >'+this.x+'</span>'+
                  '</div>'+
                '</div>';
                /*
                '<table>' +
                '<tr><td rowspan="3"><img src="<?php echo $user->getPhoto();?>" style="width:48px; height:48px;"/></td><td><?php echo $user->name;?></td></tr>'+
                '<tr><td><?php echo $user->gender; ?></td></tr>'+
                '<tr><td><?php echo $score_report["total"]; ?></td></tr>'+
                '<tr><td>'+this.x+'</td></tr>'+
                '</table>';
                */
                return box;
            }else{
              return '';
            }
          },
          useHTML: true,
          /*
          headerFormat: '<small>My Score</small><table>',
          pointFormat: '<tr><td rowspan="3"><img src="<?php echo $user->getPhoto();?>" style="width:48px; height:48px;"/></td><td><?php echo $user->name;?></td></tr>'+
				'<tr><td><?php echo $user->gender; ?></td></tr>'+
				'<tr><td><?php echo $score_report["total"]; ?></td></tr>',
            footerFormat: '</table>',
        */
		},
		credits: {
			enabled: false
		},

    exporting: {
      enabled: false
    },

    plotOptions: {
        column: {
            dataLabels: {
                enabled: false,
                crop: false,
                overflow: 'none',
                formatter : function(){
                    if( this.x == "<?php echo $user->getScore('first');?>")
                      return this.x;
                    else
                      return '';

                }
            }
        }
    }

    });

});

jQuery(document).ready(function($){
	$('#button_submit').on('click', function(e){
		e.preventDefault();
    $.ajax({
			beforeSend:function(){
				$('#button_submit').attr('disabled', 'disabled');
        alert('please wait while email is sent');
			},
			url : '<?php echo action("QuizController@shareReport", ["member_id"=>$user->token]); ?>',
			type : "post",
			data : {email : $('#target_email').val()},
			dataType: "json",
		}).done(function(response){
			if(response.success){
       $('#target_email').val('');
				alert('Email sent!');
			}else{
				alert("Email didn't sent!");
			}
		}).fail(function(err) {
			 console.log(err);
		});

	});

  $('#button_download').on('click', function(e){
    e.preventDefault();
    my_chart = $('#graph').highcharts();
    my_chart = my_chart.getSVG();
    console.log(my_chart);
    my_chart = btoa( my_chart );
    $.ajax({
      url : '<?php echo action("QuizController@setSessionImage", ["member_id"=>$user->token]); ?>',
      type : 'post',
      data : {image : my_chart}
    }).done(function(response){
        document.location.href= response;
    }).fail(function(error){
      console.log(error);
    });

  });


});

	</script>
</body>
</html>
