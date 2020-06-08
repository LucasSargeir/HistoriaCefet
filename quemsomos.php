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
		<title>Quem Somos</title>
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

							<!-- Content -->
								<section>
									<header class="main">
										<h1>Quem Somos</h1>
									</header>

									<span class="image main"><img src="images/quemsomosnos.png" alt="" /></span>

									<p>O Centro Federal de Educação Tecnológica Celso Suckow da Fonseca (Cefet/RJ) teve sua origem em 1917 como Escola Normal de Artes e Ofícios Wenceslau Braz. Atualmente, é uma instituição federal de ensino que se compreende como um espaço público de formação humana, científica e tecnológica. Oferece cursos técnicos integrados ao ensino médio, subsequentes (pós-médio), tecnológicos, de graduação e de pós-graduação lato sensu e stricto sensu (mestrado e doutorado), nas modalidades presencial e a distância. O Cefet/RJ atua na tríade ensino, pesquisa e extensão e visa contribuir para a formação de profissionais e cidadãos bem preparados para o desenvolvimento econômico, humano e social do país. </p>
									<p>A coordenação de História do campus Maracanã, que hoje tem como professores efetivos: Álvaro Senra, André Guimarães Couto, Mariana Renou, Mário Luiz de Souza,  Renato Lana Fernandez, Renilda Barreto, Samuel Oliveira, Thiago Rodrigues e Vanessa Brunow, busca contribuir para uma formação completa e integral dos alunos, lançando mão de diversos meios e possibilidades. Este site foi criado como resposta à uma reflexão de longo prazo dos membros da coordenação e da reivindicação de alguns por um espaço de trabalho coletivo, de natureza não-acadêmica, voltado para o aluno do ensino médio integrado. Este site pretende-se, assim, ser um espaço de produção, troca e divulgação de conhecimento; de interlocução entre os membros da coordenação de História do Maracanã, discentes, estagiários, docentes de outras áreas e unidades, comunidade escolar e público em geral. Antenados com os interesses dos nossos alunos e as novas maneiras de se comunicar, produzir e divulgar conhecimento, esperamos ser este um canal para efetivar e potencializar os processos de ensino-aprendizagem e de auxílio na contínua formação discente e docente.</p>
									<p>A contribuição de todos é fundamental para a implementação, enraizamento entre os alunos e continuidade. Sejam bem vindos e aproveitem!</p>

									

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