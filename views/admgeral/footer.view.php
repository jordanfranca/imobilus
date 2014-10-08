</div>

<!-- Plugins - Via CDN -->
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/flot/0.8.1/jquery.flot.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.min.js"></script>

<!-- Plugins - Via Local Storage
<script type="text/javascript" src="vendor/plugins/jqueryflot/jquery.flot.min"></script>
<script type="text/javascript" src="vendor/plugins/sparkline/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="vendor/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="vendor/plugins/calendar/fullcalendar.min.js"></script>
-->

<!-- Plugins -->
<script type="text/javascript" src="/web/js/adm/vendor/plugins/globalize/globalize.js"></script> 
<script type="text/javascript" src="/web/js/adm/vendor/plugins/chosen/chosen.jquery.min.js"></script> 
<script type="text/javascript" src="/web/js/adm/vendor/plugins/calendar/gcal.js"></script><!-- Calendar Addon -->
<script type="text/javascript" src="/web/js/adm/vendor/plugins/jqueryflot/jquery.flot.resize.min.js"></script><!-- Flot Charts Addon -->
<script type="text/javascript" src="/web/js/adm/vendor/plugins/datatables/js/datatables.js"></script><!-- Datatable Bootstrap Addon -->
<script type="text/javascript" src="/web/js/adm/vendor/plugins/colorpicker/bootstrap-colorpicker.js"></script> 
<script type="text/javascript" src="/web/js/adm/vendor/plugins/formswitch/js/bootstrap-switch.min.js"></script> 

<!-- Plugins - Via CDN --> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.0.1/ckeditor.js"></script> 

<!-- Theme Javascript -->
<script type="text/javascript" src="/web/js/adm/uniform.min.js"></script>
<script type="text/javascript" src="/web/js/adm/main.js"></script>
<!--<script type="text/javascript" src="js/plugins.js"></script>-->
<script type="text/javascript" src="/web/js/adm/custom.js"></script>
<script type="text/javascript" src="/web/js/jquery.maskedinput.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
   
   // Theme Example - Ckeditor Colorpicker
   $('.editor-ui-color').click(function () {
    var color = $(this).val();
    CKEDITOR.instances.editor1.setUiColor( '#' + color );
   });
    var bodyStyle = $('body')[0].style;

     // Turn off automatic editor initilization.
   // Used to prevent conflictions with multiple text 
   // editors being displayed on the same page.
     CKEDITOR.disableAutoInline = true;

      //Init jquery Color Picker
    $('.colorpicker').colorpicker();
    $(".radio").uniform();
    $(".checkbox").uniform();

    //Mascaras
    $('input[name="referencia"]').mask("9?99999999");
    $('input[name="preco"]').mask("R$ 99?999999");
    $('input[name="subdominio"]').mask("aa?aaaaaaaaaaaaaaaaaa");
 });
</script>
<script type="text/javascript">
  jQuery(document).ready(function() {
	// Init Theme Core 	  
	Core.init();	  
});
</script>
</body>
</html>
