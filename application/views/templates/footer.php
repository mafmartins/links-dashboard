
              </div>
              
            </div>
                        
          </div> 
              <!-- project team & activity end -->

          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

     <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);
      
    function drawChart() {
      var jsonData = $.ajax({
          url: window.location.origin + "/stats/top_eps_stats/",
          dataType: "json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      var options = {
        width: 1000,
        height: 400,
        bar: {groupWidth: "50%"},
        legend: { position: "none" },
        colors: ['orange'],
        chartArea: {top: 50, width: '30%'},
        hAxis: { gridlines: { count: 5 } }
      };

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.BarChart(document.getElementById("chart_div"));

      chart.draw(data, options);

    }

        // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart1);
      
    function drawChart1() {
      var jsonData = $.ajax({
          url: window.location.origin + "/stats/top_proj_downs/",
          dataType: "json",
          async: false
          }).responseText;

      var arr=JSON.parse(jsonData);

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.arrayToDataTable(arr);

      var options = {
        pieSliceText: 'value'
      };

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById("chart_div1"));

      chart.draw(data, options);

    }

            // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart2);

    function drawChart2() {
      var jsonData = $.ajax({
          url: window.location.origin + "/stats/top_proj_avg/",
          dataType: "json",
          async: false
          }).responseText;

      console.log(jsonData);

      var arr=JSON.parse(jsonData);

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.arrayToDataTable(arr);

      var options = {
        pieSliceText: 'value'
      };

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById("chart_div2"));

      chart.draw(data, options);

    }

              // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart3);

    function drawChart3() {
      var jsonData = $.ajax({
          url: window.location.origin + "/stats/last_days/",
          dataType: "json",
          async: false
          }).responseText;

      console.log(jsonData);

      var arr=JSON.parse(jsonData);

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.arrayToDataTable(arr);

      var options = {
        colors: ['green'],
        legend: { position: "none" },
        title: 'Downloads dos Últimos 30 Dias'
      };

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.LineChart(document.getElementById("chart_div3"));

      chart.draw(data, options);

    }

    </script>


    <!-- javascripts -->
    <script src="<?php echo base_url('includes/theme/js/jquery.js') ?>"></script>
	<script src="<?php echo base_url('includes/theme/js/jquery-ui-1.10.4.min.js') ?>"></script>
    <script src="<?php echo base_url('includes/theme/js/jquery-1.8.3.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('includes/theme/js/jquery-ui-1.9.2.custom.min.js') ?>"></script>
    <!-- bootstrap -->
    <script src="<?php echo base_url('includes/theme/js/bootstrap.min.js') ?>"></script>
    <!-- nice scroll -->
    <script src="<?php echo base_url('includes/theme/js/jquery.scrollTo.min.js') ?>"></script>
    <script src="<?php echo base_url('includes/theme/js/jquery.nicescroll.js') ?>" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="<?php echo base_url('includes/theme/assets/jquery-knob/js/jquery.knob.js') ?>"></script>
    <script src="<?php echo base_url('includes/theme/js/jquery.sparkline.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('includes/theme/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') ?>"></script>
    <script src="<?php echo base_url('includes/theme/js/owl.carousel.js') ?>" ></script>
    <!-- jQuery full calendar -->
    <<script src="<?php echo base_url('includes/theme/js/fullcalendar.min.js') ?>"></script> <!-- Full Google Calendar - Calendar -->
	<script src="<?php echo base_url('includes/theme/assets/fullcalendar/fullcalendar/fullcalendar.js') ?>"></script>
    <!--script for this page only-->
    <script src="<?php echo base_url('includes/theme/js/calendar-custom.js') ?>"></script>
	<script src="<?php echo base_url('includes/theme/js/jquery.rateit.min.js') ?>"></script>
    <!-- custom select -->
    <script src="<?php echo base_url('includes/theme/js/jquery.customSelect.min.js') ?>" ></script>
	<script src="<?php echo base_url('includes/theme/assets/chart-master/Chart.js') ?>"></script>
   
    <!--custome script for all page-->
    <script src="<?php echo base_url('includes/theme/js/scripts.js') ?>"></script>
    <!-- custom script for this page-->
    <script src="<?php echo base_url('includes/theme/js/sparkline-chart.js') ?>"></script>
    <script src="<?php echo base_url('includes/theme/js/easy-pie-chart.js') ?>"></script>
	<script src="<?php echo base_url('includes/theme/js/jquery-jvectormap-1.2.2.min.js') ?>"></script>
	<script src="<?php echo base_url('includes/theme/js/jquery-jvectormap-world-mill-en.js') ?>"></script>
	<script src="<?php echo base_url('includes/theme/js/xcharts.min.js') ?>"></script>
	<script src="<?php echo base_url('includes/theme/js/jquery.autosize.min.js') ?>"></script>
	<script src="<?php echo base_url('includes/theme/js/jquery.placeholder.min.js') ?>"></script>
	<script src="<?php echo base_url('includes/theme/js/gdp-data.js') ?>"></script>	
	<script src="<?php echo base_url('includes/theme/js/morris.min.js') ?>"></script>
	<script src="<?php echo base_url('includes/theme/js/sparklines.js') ?>"></script>	
	<script src="<?php echo base_url('includes/theme/js/charts.js') ?>"></script>
	<script src="<?php echo base_url('includes/theme/js/jquery.slimscroll.min.js') ?>"></script>
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});



  </script>

  </body>
</html>
