@extends('layouts.managers')

@section('content')


<div class="page-container ">
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper ">
      <!-- START PAGE CONTENT -->
      <div class="content sm-gutter">
        <!-- START JUMBOTRON -->
        <div data-pages="parallax">
          <div class=" container no-padding    container-fixed-lg">
            <div class="inner">
              <!-- START BREADCRUMB -->
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div>
        <!-- END JUMBOTRON -->
        <!-- START CONTAINER FLUID -->
        <div class="container sm-padding-10 no-padding">
          <!-- START ROW -->
          <div class="row">
            <div class="col-lg-3 col-sm-6 d-flex flex-column">

              <!-- START WIDGET widget_weekly_sales_card-->
              <div class="card no-border widget-loader-bar m-b-10">
                <div class="container-xs-height full-height">
                  <div class="row-xs-height">
                    <div class="col-xs-height col-top">
                      <div class="card-header  top-left top-right">
                        <div class="card-title">
                          <span class="font-montserrat fs-11 all-caps">Visitas Semanales<i class="fa fa-chevron-right"></i>
                              </span>
                        </div>
                        <div class="card-controls">
                          <ul>
                            <li><a href="#" class="portlet-refresh text-black" data-toggle="refresh"><i class="portlet-icon portlet-icon-refresh"></i></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row-xs-height">
                    <div class="col-xs-height col-top">
                      <div class="p-l-20 p-t-50 p-b-40 p-r-20">
                        <h3 class="no-margin p-b-5">{{$viewsWeekly}}</h3>
                        <span class="small hint-text pull-left">71% of total goal</span>
                      </div>
                    </div>
                  </div>
                  <div class="row-xs-height">
                    <div class="col-xs-height col-bottom">
                      <div class="progress progress-small m-b-0">
                        <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                        <div class="progress-bar progress-bar-primary" style="width:71%"></div>
                        <!-- END BOOTSTRAP PROGRESS -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END WIDGET -->
              <!-- START WIDGET widget_weekly_sales_card-->
              <div class="card no-border widget-loader-bar m-b-10">
                <div class="container-xs-height full-height">
                  <div class="row-xs-height">
                    <div class="col-xs-height col-top">
                      <div class="card-header  top-left top-right">
                        <div class="card-title">
                          <span class="font-montserrat fs-11 all-caps">Visitas Mensuales<i class="fa fa-chevron-right"></i>
                              </span>
                        </div>
                        <div class="card-controls">
                          <ul>
                            <li><a href="#" class="portlet-refresh text-black" data-toggle="refresh"><i class="portlet-icon portlet-icon-refresh"></i></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row-xs-height">
                    <div class="col-xs-height col-top">
                      <div class="p-l-20 p-t-50 p-b-40 p-r-20">
                        <h3 class="no-margin p-b-5">{{$viewsMonthly}}</h3>
                        <span class="small hint-text pull-left">71% of total goal</span>
                      </div>
                    </div>
                  </div>
                  <div class="row-xs-height">
                    <div class="col-xs-height col-bottom">
                      <div class="progress progress-small m-b-0">
                        <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                        <div class="progress-bar progress-bar-danger" style="width:15%"></div>
                        <!-- END BOOTSTRAP PROGRESS -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END WIDGET -->
            </div>
            <div class="col-lg-9 m-b-10 d-flex flex-column">
              <!-- START WIDGET widget_tableRankings-->
               <div class="widget-11-2 card no-border card-condensed no-margin widget-loader-circle d-flex flex-column align-self-stretch">
                <div class="card-header top-right">
                  <div class="card-controls">
                    <ul>
                      <li><a data-toggle="refresh" class="portlet-refresh text-black" href="#"><i
                  class="portlet-icon portlet-icon-refresh"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="padding-25">
                  <div class="pull-left">
                    <h2 class="text-success no-margin">Resultado</h2>
                    <p class="no-margin">Paginas Visitadas</p>
                  </div>

                  <div class="clearfix"></div>
                </div>
                <div class="auto-overflow widget-11-2-table">
                  <table class="table table-condensed table-hover">
                    <tbody>
                      @foreach($pagesWeekly as $page)
                      <tr>
                        <td class="text-center font-montserrat b-r b-dashed b-grey all-caps fs-12 w-50">{{$page['pageTitle']}}</td>
                        <td class="text-center  font-montserrat b-r b-dashed b-grey all-caps fs-12 w-50">
                            {{$page['url']}}
                        </td>
                        <td class="text-center  w-25">
                          <span class="font-montserrat fs-18">{{$page['pageViews']}}</span>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="padding-10 mt-auto">

                </div>
              </div>  </div>
          </div>
          <!-- END ROW -->
          <!-- START ROW -->
          <div class="row m-b-30">

            <div class="col-lg-12 sm-m-t-12 d-flex align-items-stretch widget-11-2-chartjs">
              <!-- START WIDGET widget_pendingComments.tpl-->
              <div class="card no-border widget-loader-circle no-margin ">
                  <div class="card-body d-flex flex-column">
                      <div class="containers chart-container" >
                          <canvas id="myChart" width="500" height="1100" class="chartjs-render-monitor"  aria-label="Analytics Chart" role="img"></canvas>
                      </div>
                  </div>
                </div>
              <!-- END WIDGET -->
            </div>
          </div>
          <!-- END ROW -->
        </div>
        <!-- END CONTAINER FLUID -->
      </div>
      <!-- END PAGE CONTENT -->
      <!-- START COPYRIGHT -->
      <!-- START CONTAINER FLUID -->
      <!-- START CONTAINER FLUID -->
      <div class=" container   container-fixed-lg footer">
        <div class="copyright sm-text-center">
          <p class="small no-margin pull-left sm-pull-reset">
            <span class="hint-text">Copyright &copy; 2017 </span>
            <span class="font-montserrat">REVOX</span>.
            <span class="hint-text">All rights reserved. </span>
            <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> <span class="muted">|</span> <a href="#" class="m-l-10">Privacy Policy</a></span>
          </p>
          <p class="small no-margin pull-right sm-pull-reset">
            Hand-crafted <span class="hint-text">&amp; made with Love</span>
          </p>
          <div class="clearfix"></div>
        </div>
      </div>
      <!-- END COPYRIGHT -->
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
  </div>


  <script src="{{ asset('/manager/assets/plugins/jquery/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manager/assets/plugins/chart.min.js') }}" type="text/javascript"></script>


  <script>

      $(document).ready(function() {

          function createConfig() {

              return {
                  type: 'line',
                  data: {
                      labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Seoptiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                      datasets: [{
                          label: 'Visitas',
                          borderColor: 'rgba(0, 0, 0, 1)',
                          backgroundColor: 'rgba(10, 95, 131, 1)',
                          data: <?php echo json_encode($viewsMonthlys); ?>,
                      }]
                  },
                  options: {
                      responsive: true,
                      title: {
                          display: true,
                          text: 'Grafica de visitas'
                      },
                      tooltips: {
                          position: 'nearest',
                          mode: 'index',
                          intersect: false,
                          yPadding: 10,
                          xPadding: 10,
                          caretSize: 8,
                          backgroundColor: 'rgba(255, 255, 255, 1)',
                          titleFontColor:'rgba(1, 1, 1, 1)',
                          bodyFontColor: 'rgba(1, 1, 1, 1)',
                          borderColor: 'rgba(0,0,0,1)',
                          borderWidth: 4
                      },
                  }
              };
          }

          window.onload = function() {
              var container = document.querySelector('.containers');
              var div = document.createElement('div');
              div.classList.add('chart-container');

              var canvas = document.createElement('canvas');
              div.appendChild(canvas);
              container.appendChild(div);

              var ctx = canvas.getContext('2d');
              var config = createConfig();
              new Chart(ctx, config);
          };

      });

  </script>


@endsection

