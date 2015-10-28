<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
        <meta http-equiv="refresh" content="420" />
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
				$("div.tv").carousel({ pagination: true, autoSlide: true, loop: true, autoSlideInterval: 20000, effect: "fade"});
			});
		</script>
		<script language="JavaScript">
			function Reloj(){
			A = new Date()
			dateText = ""
			hora = A.getHours()
			minuto = A.getMinutes()
			segundo = A.getSeconds()
			
			// Tomar el dia actual y convertirlo al espanol
			dayValue = A.getDay()
			if (dayValue == 0)
			dateText += "Domingo"
			else if (dayValue == 1)
			dateText += "Segunda-feira"
			else if (dayValue == 2)
			dateText += "Terça-feira"
			else if (dayValue == 3)
			dateText += "Quarta-feira"
			else if (dayValue == 4)
			dateText += "Quinta-Feira"
			else if (dayValue == 5)
			dateText += "Sexta-feira"
			else if (dayValue == 6)
			dateText += "Sábado"
			
			// tomar el mes actual y convertirlo a meses en espanol
			monthValue = A.getMonth()
			dateText += " "
			if (monthValue == 0)
			dateText += "Janeiro"
			if (monthValue == 1)
			dateText += "Fevereiro"
			if (monthValue == 2)
			dateText += "Março"
			if (monthValue == 3)
			dateText += "Abril"
			if (monthValue == 4)
			dateText += "Maio"
			if (monthValue == 5)
			dateText += "Junho"
			if (monthValue == 6)
			dateText += "Julho"
			if (monthValue == 7)
			dateText += "Agosto"
			if (monthValue == 8)
			dateText += "Setembro"
			if (monthValue == 9)
			dateText += "Outubro"
			if (monthValue == 10)
			dateText += "Novembro"
			if (monthValue == 11)
			dateText += "Dezembro"
			
			// Para visualizar el ano, si es antes del 2000
			if (A.getYear() < 2000)
			dateText += " " + A.getDate() + ", " + (1900 + A.getYear())
			else
			dateText += " " + A.getDate() + ", " + (A.getYear())
			
			// Para visualizar la forma como se mira el tiempo
			if (segundo < 10)
			segundo = "0" + segundo;
			
			if (minuto < 10)
			minuto = "0" + minuto;
			
			if (hora < 10)
			hora = "0" + hora;
			
			if (hora < 12)
			{
			greeting=""
			timeText=greeting + " " + hora + ":" + minuto
			}
			else if(hora == 12)
			{
			greeting=""
			timeText=greeting + " " + hora + ":" + minuto
			}
			else if(hora < 18)
			{
			greeting=""
			timeText=greeting + " " + hora + ":" + minuto
			}
			else
			{
			greeting=""
			timeText=greeting + " " + hora + ":" + minuto
			}
			
			horaImprimible = timeText
			
			document.form_reloj.reloj.value = horaImprimible
			
			setTimeout("Reloj()",1000)
			
			}
			
		</script>
		<style>
			body {
				background: #fff url(/wp-content/themes/opsbra/images/fundo_TV.jpg) bottom left repeat-x;
			}
			#page {
				background: none;
				width: 100%;
				margin: 0 auto;
			}
			.top {
				background: #fff url(/wp-content/themes/opsbra/images/top_tv1024.jpg) top left no-repeat;
				height: 120px;
				width: 100%;
				border-bottom: 3px solid #0B4B7B;
			}
			#content {
                                width:100%;
				margin:0;
                        }
			.highlightTV1024 {
				width: 1024px;
				float:left;
			}
                        .sidebar-tv {
                                float: left;
				width: 200px;
                        }
			.RSS {
				background: #0b4b7b;
				font-size: 18px;
				font-family: Arial, Helvetica, sans-serif;
				color: #FFF;
				position: absolute;
				bottom: 0px;
				width: 100%;
			}
			.RSS .area {
				padding: 10px;
			}
			.RSS a {
				color: #FFF;
			}
			.dataHora #reloj {
				position: absolute;
				right: 20px;
				top:65px;
				font-size: 40px;
				font-family: Arial, Helvetica, sans-serif;
				font-weight: bold;
				color: #0b4b7b;
				text-shadow: 2px 2px 2px #aabecc;
				border: none;
				background: none;
				width: 130px;
			}
			
			.center-wrap {
				display: none;
			}
			.tv {
				padding-top: 50px;
			}
			.rss-fica-a-dica a img {display: none;}
			.widget.widget_rss li {margin-bottom:12px;}
			.widget.widget_rss li a {font-weight: bold; font-size: 120%;color: #0066ff;}
			.widget.widget_rss li .rss-date {display: block;font-size:90%; font-style:italic;margin-bottom:3px;color:#ababab;}
		</style>
	</head>
<body onload="Reloj()">
</div>
	<div id="page">
	<div class="top">
		<div class="dataHora">
                        <form name="form_reloj">
                        	<input type="text" name="reloj" id="reloj">
                	</form>

        	</div>
	</div>
	<div id="content" class="narrowcolumn" role="main">
		<?php if (have_posts()) : ?>
		<div class="highlightTV1024">
			<div class="tv">
				<ul>
					<?php if (have_posts()) : ?>  
					<?php while (have_posts()) : the_post(); ?>  
						<li <?php post_class() ?> id="post-<?php the_ID(); ?>">
							<div class="thumb">
								<?php
									// If WordPress 2.9 or above and a Post Thumbnail has been specified
									if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
										the_post_thumbnail('post-tv', array('class' => 'post-thumbnail', 'alt' => ''.get_the_title().''));
									}
									// Or if a custom field post image has been specified
									else if (get_post_meta($post->ID, 'image', true)) {
										$postimage = get_post_meta($post->ID, 'image', true);
										echo '<img src="'.$postimage.'" alt="'.get_the_title().'" />';
									}
								?>
							</div>
							<h4>
								<?php foreach((get_the_category()) as $category) { 
									if($category->cat_ID == get_post_meta($post->ID, 'main_category', true)) {
										echo $category->cat_name . ' ';
									}
								}?>
								<? //echo get_post_meta($post->ID, 'main_category', true) ?>
							</h4>
							<h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							<span class="resumo">
								<?php the_excerpt(); ?>
							</span>
						</li>
					<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>	
				</ul>
			</div>
		</div>
		<div class="sidebar-tv">
                        <div class="rss-fica-a-dica">
                                <?php dynamic_sidebar( 'sidebar-tv' ); ?>
                        </div>
                </div>
		<div style="clear:both"></div>
		<div class="RSS">
			<div class="area">
				<?php if (function_exists (rss_scr_show)) rss_scr_show(); ?> 
			</div>
		</div>
	<?php endif; ?>
	</div>
</div>
</body>
