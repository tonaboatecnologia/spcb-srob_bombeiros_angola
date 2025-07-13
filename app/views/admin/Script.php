
   <!-- Required Jqurey -->
   <script src="<?php echo DIRADMINPLUGINS.'Jquery/dist/jquery.min.js';?>"></script>
   <script src="<?php echo DIRADMINJS.'jquery-3.6.0.min.js'?>"></script>
   <script src="<?php echo DIRADMINJS.'jquery.dataTables.min.js'?>"></script>

   <script src="<?php echo DIRADMINPLUGINS.'jquery-ui/jquery-ui.min.js';?>"></script>
   <script src="<?php echo DIRADMINPLUGINS.'tether/dist/js/tether.min.js';?>"></script>
   <script src="<?php echo DIRADMINPLUGINS.'sweetalert/sweetalert2.min.js';?>"></script>

   <!-- Required Fremwork -->
   <script src="<?php echo DIRADMINPLUGINS.'bootstrap/js/bootstrap.min.js';?>"></script>
   <script src="<?php echo DIRADMINJS.'bootstrap.budle.min.js';?>"></script>
   <script src="<?php echo DIRADMINJS.'dataTables.bootstrap5.min.js';?>"></script>

   <!-- Scrollbar JS-->
   <script src="<?php echo DIRADMINPLUGINS.'jquery-slimscroll/jquery.slimscroll.js';?>"></script>
   <script src="<?php echo DIRADMINPLUGINS.'jquery.nicescroll/jquery.nicescroll.min.js';?>"></script>

   <!--classic JS-->
   <script src="<?php echo DIRADMINPLUGINS.'classie/classie.js';?>"></script>

   <!-- notification -->
   <script src="<?php echo DIRADMINPLUGINS.'notification/js/bootstrap-growl.min.js';?>"></script>

   <!-- Sparkline charts -->
   <script src="<?php echo DIRADMINPLUGINS.'jquery-sparkline/dist/jquery.sparkline.js';?>"></script>

   <!-- Counter js  -->
   <script src="<?php echo DIRADMINPLUGINS.'waypoints/jquery.waypoints.min.js';?>"></script>
   <script src="<?php echo DIRADMINPLUGINS.'countdown/js/jquery.counterup.js';?>"></script>

   <!-- Echart js -->

   <script src="<?php echo DIRADMINPLUGINS.'highcharts-exporting/highcharts.js';?>"></script>
   <script src="<?php echo DIRADMINPLUGINS.'highcharts-exporting/exporting.js';?>"></script>
   <script src="<?php echo DIRADMINPLUGINS.'highcharts-exporting/highcharts-3d.js';?>"></script>

   <!--dataTables-->
  <script src="<?php echo DIRADMINVENDOR.'datatables/js/jquery.dataTables.min.js'?>"></script>
   <script src="<?php echo DIRADMINVENDOR.'datatables/js/datatables.init.js'?>"></script>

   <!-- custom js -->
   
   <script type="text/javascript" src="<?php echo DIRADMINJS.'main.min.js'?>"></script>
   <script src="<?php echo DIRADMINJS.'custom.js'?>"></script>

   <script type="text/javascript" src="<?php echo DIRADMINPAGES.'dashboard.js'?>"></script>
   <script type="text/javascript" src="<?php echo DIRADMINPAGES.'elements.js'?>"></script>
   <script src="<?php echo DIRADMINJS.'menu.min.js'?>"></script>
<script>
var $window = $(window);
var nav = $('.fixed-button');
$window.scroll(function(){
    if ($window.scrollTop() >= 200) {
       nav.addClass('active');
    }
    else {
       nav.removeClass('active');
    }
});
</script>


