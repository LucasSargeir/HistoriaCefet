<?php
	include("conectaBanco.php");
	include("functionImagem.php");
	session_start();
?>
<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Cadastro</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
								<!--	<a href="index.html" class="logo"><strong>Editorial</strong> by HTML5 UP</a>
									<ul class="icons">
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-medium"><span class="label">Medium</span></a></li>
									</ul>-->
								</header>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
										<header>
											<h1>Cadastro<br/></h1>
											<p>Cadastre um professor abaixo</p>
										</header>
									</div>
								</section>

							<!-- Section -->

							<!-- Section -->
								<section>
									<center>
										<form method="post" action="cadastraProfessor.php">	
												<div class="6u 12u$(xsmall)">
													<input type="text" name="nome" id="nome" value="" placeholder="Nome" required="" />
												</div>
												<br>
												<div class="6u$ 12u$(xsmall)">
													<input type="email" name="email" id="email" value="" placeholder="E-mail" required=""/>
												</div>
												<br>
												<div class="6u$ 12u$(xsmall)">
													<input type="password" name="senha" id="senha" value="" placeholder="Senha" required=""/>
												</div>
												<br>
												<div class="6u$ 12u$(xsmall)">
													<input type="text" name="blog" id="blog" value="" placeholder="Link para blog (opcional)" />
												</div>
												<br>
												<div class="12u$">
													<textarea name="biografia" id="biografia" placeholder="Biografia" style="resize:none; width:50%;" rows="8" required=""></textarea>
												</div>
												<br>
												<!-- Break -->
												<div class="12u$">
													<ul class="actions">
														<li><input type="submit" value="Cadastrar" class="special" /></li>
													</ul>
												</div>
										</form>
									</center>
								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search 
								<section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>
								</section>-->

							<!-- Menu -->
								<nav id="menu">
									<?php
										include("barraLateral.php");
									?>
								</nav>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Eventos</h2>
									</header>
									<div class="mini-posts">
										<article>
											<a href="#" class="image"><img src="images/pic07.jpg" alt="" /></a>
											<p>Evento 1 - Descrição breve do evento, juntamente a data etc. Ao clicar o usuario terá acesso a mais informações como data, inscrição(se ouver) etc.</p>
											<ul class="actions">
												<li><a href="#" class="button special">Mais</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
											<p>Evento 2 - Descrição breve do evento, juntamente a data etc. Ao clicar o usuario terá acesso a mais informações como data, inscrição(se ouver) etc.</p>
											<ul class="actions">
												<li><a href="#" class="button special">Mais</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
											<p>Evento 3 - Descrição breve do evento, juntamente a data etc. Ao clicar o usuario terá acesso a mais informações como data, inscrição(se ouver) etc.</p>
											<ul class="actions">
												<li><a href="#" class="button special">Mais</a></li>
											</ul>
										</article>
									</div>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Contato</h2>
									</header>
									<p>Para mais informações procure a coordenação de História do CEFET maracanã ou entre em contato através de:</p>
									<ul class="contact">
										<li class="fa-envelope-o"><a href="#">information@untitled.tld</a></li>
										<li class="fa-phone">(000) 000-0000</li>
										<li class="fa-home">1234 Somewhere Road #8254<br />
										Nashville, TN 00000-0000</li>
									</ul>
								</section>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Untitled. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
								</footer>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>