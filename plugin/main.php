<?php

include("../includes/header.php");
include("../includes/sidebar.php");
include("../includes/nav.php");
include("get_data.php");




?>

<div class="content" id="content">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Reports</p>
                      <p class="card-title"><?php echo $total_numreports?><p>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-money-coins text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Accepted</p>
                      <p class="card-title"><?php echo $pending_count; ?><p>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-vector text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">In Progress</p>
                      <p class="card-title"><?php echo $in_progress_count; ?><p>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-favourite-28 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Completed</p>
                      <p class="card-title"><?php echo $completed_count; ?><p>
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">App Users Behavior</h5>
                <p class="card-category">24 Hours performance</p>
              </div>
              <div class="card-body ">
                <canvas id=chartHours width="400" height="100"></canvas>
              </div>
             
            </div>
          </div>
        </div> -->
        <div class="row">
          <div class="col-md-6">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Pothole Status Statistics</h5>
                <p class="card-category">Donut Chart</p>
              </div>
              <div class="card-body">
          <div id="donutchart" ></div>

        </div>
              <!-- <div class="card-body ">
                <canvas id="chartEmail"></canvas>
              </div> -->
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-calendar"></i> Number of Potholes
                  <p class="float-right"><?php echo $total_numreports; ?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">Types of Users in Systems</h5>
                <p class="card-category">Bar Chart</p>
              </div>
              <div class="card-body">
              <div id="barchart_values" style="width: 200; height: 100;"></div>

              </div>
              <div class="card-footer">
                <hr />
                <div class="card-stats">
                  <i class="fa fa-check"></i> Data information certified
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Accepted', <?php echo $pending_count;?>],
          ['In Progress', <?php echo $in_progress_count;?>],
          ['Completed',  <?php echo $completed_count;?>]
        ]);

        var options = {
          title: 'Status of Potholes',
          width: 500,
        height: 340,
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }


      google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart2);
    function drawChart2() {
      var data = google.visualization.arrayToDataTable([
        ["Type of Users", "Density", { role: "style" } ],
        ["Land Surveyors", <?php echo count($landsur_fetchdata);?>, "#b87333"],
        ["Contractors", <?php echo count($contractor_fetchdata);?>, "silver"],
        ["Motorist/Pedestrians",<?php echo count($users_fetchdata);?>, "gold"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Density of Precious Metals, in g/cm^3",
        width: 520,
        height: 370,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }

      
    </script>

<?php

include("../includes/footer.php");


?>