<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
	<script type="text/javascript" src="/wp-content/js/jquery.min.js"></script>
	<script type="text/javascript" src="/wp-content/js/unobtrusivelib.js"></script>
	<script type="text/javascript" src="/wp-content/js/prettify.js"></script>
	<script type="text/javascript" src="/wp-content/js/jquery.carousel.pack.js"></script>
	<script type="text/javascript">
		$(function(){
			$.unobtrusivelib();
			prettyPrint();
			$("div.highlight").carousel({ pagination: true, autoSlide: true, loop: true, autoSlideInterval: 5000, effect: "fade"});
		});
	</script>
</head>
<body>
	<div id="page">
		<div id="header" role="banner">
			<div id="headerimg">
				<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
				<div class="description"><?php bloginfo('description'); ?></div>
			</div>
		</div>
		<div class="barDate">
			<span class="date">
				<?
			// leitura das datas
			$dia = date('d');
			$mes = date('m');
			$ano = date('Y');
			$semana = date('w');
			
			
			// configuração mes
			
			switch ($mes){
			
			case 1: $mes = "Janeiro"; break;
			case 2: $mes = "Fevereiro"; break;
			case 3: $mes = "Março"; break;
			case 4: $mes = "Abril"; break;
			case 5: $mes = "Maio"; break;
			case 6: $mes = "Junho"; break;
			case 7: $mes = "Julho"; break;
			case 8: $mes = "Agosto"; break;
			case 9: $mes = "Setembro"; break;
			case 10: $mes = "Outubro"; break;
			case 11: $mes = "Novembro"; break;
			case 12: $mes = "Dezembro"; break;
			
			}
			
			
			// configuração semana
			
			switch ($semana) {
			
			case 0: $semana = "Domingo"; break;
			case 1: $semana = "Segunda-feira"; break;
			case 2: $semana = "Terça-feira"; break;
			case 3: $semana = "Quarta-feira"; break;
			case 4: $semana = "Quinta-feira"; break;
			case 5: $semana = "Sexta-feira"; break;
			case 6: $semana = "Sábado"; break;
			
			}
			//Agora basta imprimir na tela...
			print ("$semana, $dia de $mes de $ano");
			?>
			</span>
		</div>
