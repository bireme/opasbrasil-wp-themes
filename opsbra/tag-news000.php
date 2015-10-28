<?php
$hmtlName = date("Y_m_d");

$cacheFile = 'newsletter/news_'.$hmtlName .'.html';
$link = 'http://boletim.opasbrasil.org/'.$cacheFile .'';

ob_start();
// write content
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<title><? wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<? wp_head(); ?>
<style>
body {
	background: #cecece;
	font-family: "Trebuchet MS";
	font-size: 12px;
	margin: 0px;
}

a {
	color: #000;
	text-decoration: none;
}

#newsletter {
	width: 600px;
	margin: 0 auto;
	background: #FFF;
}

ul {
	margin: 0px;
	padding: 0px;
}

li {
	list-style: none;
	clear: both;
	margin: 0px;
	padding: 10px;
}
h4 {
	margin: 0px;
	color: #7B0B1D;	
}

h3 {
	margin: 0px;
	font-size: 17px;
}
h3 a {
	color: #0B4B7B;
}

.resumo p {
	margin: 0px;
}

.spacer {
	clear: both;
}

#footer {
	background: #D9E2EA;
	padding: 10px;
}

.news li img {
	width: 150px;
	float: left;
	margin: 0px 10px 10px 0px;
}

#header {
	background: #0B4B7B;
	margin: 0px;
	height: 50px;
}
#header h1 {
	margin: 10px;
	color: #FFF;
	float: left;
}

.message {
	text-align: center;
}
.message a {
	color: blue;
}

</style>
</head>
<body>
		<p class="message">Caso não esteja vendo esse email, por favor acesse:<br> <a href="<?php echo $link; ?>"><?php echo $link; ?></a> </p>
	<div id="newsletter">
		<div id="header" role="banner">
			<h1>Newsletter</h1>
		</div>
		<div id="content" class="narrowcolumn" role="main">
		<div class="news">
			<ul>
				<? if (have_posts()) : ?>  
					<? while (have_posts()) : the_post(); ?>  
						<li <? post_class() ?> id="post-<? the_ID(); ?>">
							<h4><? foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; }?></h4>
							<h3 class="storytitle"><a href="<? the_permalink() ?>" rel="bookmark"><? the_title(); ?></a></h3>
							<div class="thumb">
								<?
									if(get_post_meta($post->ID, 'image', true)) { ?> 
										<img src="<? echo get_post_meta($post->ID, 'image', true) ?>" title="<? the_title(); ?>">
								<? }?>
							</div>
							<span class="resumo">
								<? the_excerpt(); ?>
							</span>
							<div class="spacer"></div>
						</li>
					<? endwhile; else: ?>
					<p><? _e('Sorry, no posts matched your criteria.'); ?></p>
					<? endif; ?>	
			</ul>
		</div>
	</div>
		<div id="footer" role="contentinfo">
				<p>
					Setor de Embaixadas Norte, Lote 19, 70800-400 Brasília, DF, Brasil<br>
					Caixa Postal 08-729, 70312-970 - Brasilia, DF, Brasil<br>
					Tel: 55 61 3251-9595<br>
				</p>
				
			</div>
		</div>
	</body>
</html>

<?php
    $content = ob_get_contents();
    ob_end_clean();
    file_put_contents($cacheFile,$content);
    echo $content;
?>

