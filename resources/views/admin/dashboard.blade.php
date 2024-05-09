@extends("layouts.app")

@section('title')
Admin Panel | Admyrer 
@endsection

@section("content")
<link rel="stylesheet" href="/css/app.css">

<div class="container-fluid">
    <div>
        <h3>DASHBOARD</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">DASHBOARD</li>
            </ol>
        </nav>
    </div>
    
    <div class="row clearfix">
        <div class="col-md-3">
          <div class="card">
              <div class="card-body">
                  <h6 class="card-title">Online Now</h6>
                  <div class="d-flex align-items-center mb-3">
                      <div>
                          <div class="avatar">
                              <span class="avatar-title bg-info-bright text-info rounded-pill">
                                  <i class="material-icons"></i>
                              </span>
                          </div>
                      </div>
                      <div class="font-weight-bold ml-1 font-size-30 ml-3 mx-2"></div>
                  </div>
              </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
              <div class="card-body">
                  <h6 class="card-title">MALE</h6>
                  <div class="d-flex align-items-center mb-3">
                      <div>
                          <div class="avatar">
                              <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                  <i class="material-icons"></i>
                              </span>
                          </div>
                      </div>
                      <div class="font-weight-bold ml-1 font-size-30 ml-3 mx-2">0</div>
                  </div>
              </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
              <div class="card-body">
                  <h6 class="card-title">FEMALE</h6>
                  <div class="d-flex align-items-center mb-3">
                      <div>
                          <div class="avatar">
                              <span class="avatar-title bg-main-bright text-main rounded-pill">
                                  <i class="material-icons"></i>
                              </span>
                          </div>
                      </div>
                      <div class="font-weight-bold ml-1 font-size-30 ml-3 mx-2">0</div>
                  </div>
              </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
              <div class="card-body">
                  <h6 class="card-title">ACTIVE USERS</h6>
                  <div class="d-flex align-items-center mb-3">
                      <div>
                          <div class="avatar">
                              <span class="avatar-title bg-warning-bright text-warning rounded-pill">
                                  <i class="material-icons"></i>
                              </span>
                          </div>
                      </div>
                      <div class="font-weight-bold ml-1 font-size-30 ml-3 mx-2">0</div>
                  </div>
              </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
              <div class="card-body">
                  <h6 class="card-title">INACTIVE USERS</h6>
                  <div class="d-flex align-items-center mb-3">
                      <div>
                          <div class="avatar">
                              <span class="avatar-title bg-info-bright text-info rounded-pill">
                                  <i class="material-icons"></i>
                              </span>
                          </div>
                      </div>
                      <div class="font-weight-bold ml-1 font-size-30 ml-3 mx-2">0</div>
                  </div>
              </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
              <div class="card-body">
                  <h6 class="card-title">TOTAL IMAGES</h6>
                  <div class="d-flex align-items-center mb-3">
                      <div>
                          <div class="avatar">
                              <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                  <i class="material-icons"></i>
                              </span>
                          </div>
                      </div>
                      <div class="font-weight-bold ml-1 font-size-30 ml-3 mx-2">0</div>
                  </div>
              </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
              <div class="card-body">
                  <h6 class="card-title">Messages</h6>
                  <div class="d-flex align-items-center mb-3">
                      <div>
                          <div class="avatar">
                              <span class="avatar-title bg-main-bright text-main rounded-pill">
                                  <i class="material-icons"></i>
                              </span>
                          </div>
                      </div>
                      <div class="font-weight-bold ml-1 font-size-30 ml-3 mx-2">0</div>
                  </div>
              </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
              <div class="card-body">
                  <h6 class="card-title">Reports</h6>
                  <div class="d-flex align-items-center mb-3">
                      <div>
                          <div class="avatar">
                              <span class="avatar-title bg-warning-bright text-warning rounded-pill">
                                  <i class="material-icons"></i>
                              </span>
                          </div>
                      </div>
                      <div class="font-weight-bold ml-1 font-size-30 ml-3 mx-2">0</div>
                  </div>
              </div>
          </div>
        </div>

    </div>
    <!-- #END# Widgets -->
    <div class="row clearfix">
        <!-- Bar Chart -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
					<div id="dashboard-daterangepicker" class="btn btn-outline-light pull-right">
                            <?php 
                            if (!empty($_GET['range']) && in_array($_GET['range'], array('Today','Yesterday','This Week','This Month','Last Month','This Year'))) {
                                echo $_GET['range'];
                            }else if (!empty($start) && !empty($end)){
                                echo $_GET['range'];
                            }else{
                                echo 'This Year';
                            } ?>
                        </div>
                    <h6 class="card-title">STATICS</h6>
                    <div id="admin-chart-container" style="min-width: 100%; height: 400px; margin: 0 auto;"></div>
                </div>
            </div>
        </div>
        <!-- #END# Bar Chart -->
    </div>
    <?php //}?>
</div>

@push("javascript")
<script>
    jQuery(document).ready(function($) {
            var range = { "Today": [moment() , moment()], 
                          "Yesterday": [moment().subtract(1, 'days') , moment().subtract(1, 'days')], 
                          "This_Week": [moment().subtract(6, 'days') , moment()],
                          "This_Month": [moment().startOf('month') , moment().endOf('month')],
                          "Last_Month": [moment().subtract(1, 'month').startOf('month') , moment().subtract(1, 'month').endOf('month')],
                          "This_Year": [moment().subtract(1, 'year').startOf('year') , moment().subtract(1, 'year').endOf('year')]}; 
            <?php 
            if (!empty($_GET['range']) && in_array($_GET['range'], array('Today','Yesterday','This Week','This Month','Last Month','This Year'))) { 
                if ($_GET['range'] == 'Today') { ?>
                    var start = range.Today[0];
                    var end = range.Today[1];
                <?php }elseif ($_GET['range'] == 'Yesterday') { ?>
                    var start = range.Yesterday[0];
                    var end = range.Yesterday[1];
                <?php }elseif ($_GET['range'] == 'This Week') { ?>
                    var start = range.This_Week[0];
                    var end = range.This_Week[1];
                <?php }elseif ($_GET['range'] == 'This Month') { ?>
                    var start = range.This_Month[0];
                    var end = range.This_Month[1];
                <?php }elseif ($_GET['range'] == 'Last Month') { ?>
                    var start = range.Last_Month[0];
                    var end = range.Last_Month[1];
                <?php }elseif ($_GET['range'] == 'This Year') { ?>
                    var start = range.This_Year[0];
                    var end = range.This_Year[1];
                <?php } ?>
            <?php } elseif (!empty($_GET['range']) && !empty($start) && !empty($end)) { ?>
                var start = "<?php echo($start) ?>";
                var end = "<?php echo($end) ?>";
            <?php } else{ ?>
                var start = range.This_Year[0];
                var end = range.This_Year[1];
            <?php } ?>
    
            function cb(start, end) {
                //$('#dashboard-daterangepicker span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            $('#dashboard-daterangepicker').daterangepicker({
                startDate: start,
                endDate: end,
                opens: $('body').hasClass('rtl') ? 'right' : 'left',
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'This Week': [moment().subtract(6, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    'This Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
                }
            }, cb);
    
            
    
            cb(start, end);
    
            // setTimeout(function (argument) {
            //     $('.ranges ul li').removeClass('active');
            // },800);
            
            $(document).on('click', '.ranges ul li', function(event) {
                event.preventDefault();
                if ($(this).attr('data-range-key') != 'Custom Range') {
                    $(document).off('click', '.ranges ul li');
                    $('#redirect_link').attr('href', "range="+$(this).attr('data-range-key'));
                    $('#redirect_link').attr('data-ajax', "?path=dashboard&range="+$(this).attr('data-range-key'));
                    $('#redirect_link').click();
                }
            });
            $(document).on('click', '.applyBtn', function(event) {
                event.preventDefault();
                $(document).off('click', '.applyBtn');
                $('#redirect_link').attr('href', "&range="+$(this).parent('.drp-buttons').find('.drp-selected').html());
                $('#redirect_link').attr('data-ajax', "?path=dashboard&range="+$(this).parent('.drp-buttons').find('.drp-selected').html());
                $('#redirect_link').click();
            });
        var rgbToHex = function (rgb) {
            var hex = Number(rgb).toString(16);
            if (hex.length < 2) {
                hex = "0" + hex;
            }
            return hex;
        };
    
        var fullColorHex = function (r, g, b) {
            var red = rgbToHex(r);
            var green = rgbToHex(g);
            var blue = rgbToHex(b);
            return red + green + blue;
        };
    
        var colors = {
            primary: $('.colors .bg-primary').css('background-color'),
            primaryLight: $('.colors .bg-primary-bright').css('background-color'),
            secondary: $('.colors .bg-secondary').css('background-color'),
            secondaryLight: $('.colors .bg-secondary-bright').css('background-color'),
            info: $('.colors .bg-info').css('background-color'),
            infoLight: $('.colors .bg-info-bright').css('background-color'),
            success: $('.colors .bg-success').css('background-color'),
            successLight: $('.colors .bg-success-bright').css('background-color'),
            danger: $('.colors .bg-danger').css('background-color'),
            dangerLight: $('.colors .bg-danger-bright').css('background-color'),
            warning: $('.colors .bg-warning').css('background-color'),
            warningLight: $('.colors .bg-warning-bright').css('background-color'),
        };
        //console.log(colors.primary[1]);
        colors.primary = '#' + fullColorHex(colors.primary[0], colors.primary[1], colors.primary[2]);
        colors.secondary = '#' + fullColorHex(colors.secondary[0], colors.secondary[1], colors.secondary[2]);
        colors.info = '#' + fullColorHex(colors.info[0], colors.info[1], colors.info[2]);
        colors.success = '#' + fullColorHex(colors.success[0], colors.success[1], colors.success[2]);
        colors.danger = '#' + fullColorHex(colors.danger[0], colors.danger[1], colors.danger[2]);
        colors.warning = '#' + fullColorHex(colors.warning[0], colors.warning[1], colors.warning[2]);
    });
    
    
    
    function users() {
        if ($('#admin-chart-container').length) {
            var options = {
                chart: {
                    type: 'bar',
                    fontFamily: "Inter",
                    offsetX: -26,
                    stacked: false,
                    height: 265,
                    width: '102%',
                    toolbar: {
                        show: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                series: [{
            name: 'Users',
            data: []
    
            }],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '50%',
                        endingShape: 'rounded'
                    },
                },
                colors: ['#6abd46', '#ce3d3d', '#f2b92b', '#ff7373'],
                xaxis: {
                    <?php if (true) { ?>
                            categories: [
                                '00 AM',
                                '1 AM',
                                '2 AM',
                                '3 AM',
                                '4 AM',
                                '5 AM',
                                '6 AM',
                                '7 AM',
                                '8 AM',
                                '9 AM',
                                '10 AM',
                                '11 AM',
                                '12 PM',
                                '1 PM',
                                '2 PM',
                                '3 PM',
                                '4 PM',
                                '5 PM',
                                '6 PM',
                                '7 PM',
                                '8 PM',
                                '9 PM',
                                '10 PM',
                                '11 PM'
                            ]
                        <?php }elseif (true) { ?>
                        categories: [
                            'Saturday',
                            'Sunday',
                            'Monday',
                            'Tuesday',
                            'Wednesday',
                            'Thursday',
                            'Friday'
                        ]
                        <?php }elseif (true) { ?>
                            <?php if (true) { ?>
                                categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]
                            <?php }elseif (true) { ?>
                                categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]
                            <?php }elseif (true) { ?>
                                categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29]
                            <?php }elseif (true) {  ?>
                                categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28]
                            <?php } ?>
                        <?php }elseif (true) { ?>
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec']
                        <?php }elseif (true) {
                            echo "categories: [".implode(',',array_keys($array))."]";
                        } ?>
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val
                        }
                    }
                }
            };
    
            var chart = new ApexCharts(
                document.querySelector("#admin-chart-container"),
                options
            );
    
            chart.render();
        }
    }
    
    users();
    </script>
@endpush

@endsection