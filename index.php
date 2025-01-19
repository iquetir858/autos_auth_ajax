<!DOCTYPE HTML>
<!--
	Full Motion by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>

<head>
	<title>Concesionario Multimarca</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="assets/css/main.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" />
</head>

<body id="top">

	<!-- Banner -->
	<!--
				To use a video as your background, set data-video to the name of your video without
				its extension (eg. images/banner). Your video must be available in both .mp4 and .webm
				formats to work correctly.
			-->
	<section id="banner" data-video="images/banner">
		<div class="inner">
			<header>
				<h1>Concesionario Multimarca</h1>
				<p>Somos un Concesionario Multimarca Líder en su sector.</p>
				<p>Calidad y Precio garantizado</p>

			</header>
			<a href="#main" class="more">Learn More</a>
		</div>
	</section>

	<!-- Main -->
	<div id="main">
		<div class="inner">

			<!-- Boxes -->

			<div class="thumbnails">
				<?php
				require_once "client.php";
				$marcas = $client->ObtenerMarcasUrl();
				//var_dump($marcas[0]);
				foreach ($marcas as $marca) {
					?>
					<div class="box">
						<a href="<?= $url ?>" class="image fit" title="ver video"><img
								src="images/<?= strtolower($marca['marca']) ?>.png" alt="logo <?= $marca ?>" /></a>
						<div class="inner">
							<h3><a href="modelos.php?marca=<?= $marca['marca'] ?>" data-poptrox="ajax,600x400">Modelos
									<?= $marca['marca'] ?></a></h3>
							<a href="<?= $marca['url'] ?>" class="button style2 fit" data-poptrox="youtube,800x400">Ver
								video
								<?= $marca['marca'] ?></a>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<footer id="footer">
		<div class="inner">
			<h2>Sigue nuestras redes sociales</h2>
			<p>A responsive video gallery template with a functional lightbox<br />
				designed by <a href="https://templated.co/">Templated</a> and released under the Creative Commons
				License.</p>

			<ul class="icons">
				<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
				<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
				<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
			</ul>
			<p class="copyright">&copy; Untitled. Design: <a href="https://templated.co">TEMPLATED</a>. Images: <a
					href="https://unsplash.com/">Unsplash</a>. Videos: <a href="http://coverr.co/">Coverr</a>.</p>
		</div>
	</footer>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/jquery.poptrox.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

	<div class="poptrox-overlay"
		style="position: fixed; left: 0px; top: 0px; z-index: 10001; width: 100%; height: 100%; text-align: center; cursor: pointer; display: none; opacity: 1;">
		<div style="display:inline-block;height:100%;vertical-align:middle;"></div>
		<div
			style="position:absolute;left:0;top:0;width:100%;height:100%;background:#222226;opacity:0.75;filter:alpha(opacity=75);">
		</div>
		<div class="poptrox-popup"
			style="display: none; vertical-align: middle; position: relative; z-index: 1; cursor: pointer; min-width: 200px; min-height: 100px; width: auto; height: auto;">
			<div class="loader" style="display: none;"></div>
			<div class="pic" style="display: none; text-indent: 0px;"></div><span class="closer"
				style="cursor: pointer; display: none;">×</span>
		</div>
	</div>

</body>

</html>