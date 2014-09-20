<?php
function facebook_likes($url){
	  // criando a consulta FLQ
	  $fql_query  = "SELECT comment_count, comments_fbid, commentsbox_count, like_count, normalized_url, share_count, total_count, url ";
	  $fql_query .= "FROM link_stat WHERE url = '$url'";
	  // fazendo a requisição
	  $json_string = file_get_contents('http://graph.facebook.com/fql?q=' . urlencode($fql_query));
	  // transformando o json retornado em array
	  $json = json_decode($json_string, true);
	  // retorna um array com os índices
	  return $json['data'][0];
	}

$shares = facebook_likes('http://www.facebook.com/AgenciaExtremes');
// número de curtir
?>

<div id="header">
		<div class="alinha-centro">
			<div id="logo">
				<a href="index.php"><img src="img/logo-extremes.png" /></a>
			</div>
			<div id="curtir-top">
				<a href="http://www.youtube.com/user/AgenciaExtremes/videos" title="Youtube da Agência Extremes!" target="_blank"><img src="img/ico-youtube.png" /></a><a href="http://www.facebook.com/AgenciaExtremes" title="Facebook da agência Extremes!" target="_blank"><img src="img/ico-facebook-home.png" /></a>
				<div class="za">
				<span class="marrom-c"><?php echo $shares['like_count']; ?> pessoas já curtiram!</span> <span class="cinza-b">E Você?</span>
				</div>
				<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2FAgenciaExtremes&amp;width=450&amp;height=80&amp;colorscheme=dark&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;send=false&amp;appId=219634854836330" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="true"></iframe>
				<br />
				
			</div>
		</div>
	</div>