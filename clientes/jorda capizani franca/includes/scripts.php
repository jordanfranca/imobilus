<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/estiloie.css" />
<![endif]-->
<link rel="shortcut icon" href="img/faveicon.png" type="image/x-icon">
<script src="js/jquery-latest.js" type="text/javascript"></script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=219634854836330";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript">
	$(function(){
		$('#curtir-top span').hover(function(){
			$('#curtir-top span').hide();
			$('#curtir-top iframe').show();
		} 

		);

		$('#curtir-top iframe').mouseout(function(){
			$('#curtir-top span').show();
			$('#curtir-top iframe').hide();
		});

		$('#primeiroitem').show('slow');
		$('#primeiroitem').nextAll().show('slow');

	});


</script>

