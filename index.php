<?php
	include("conectaBanco.php");
	include("functionImagem.php");
	include("teste.php");
	session_start();
		$resposta = mysqli_query($link, "select * from contador where id_contador = '1'");

		if($resposta){	
			
			$linha = mysqli_fetch_assoc($resposta);

			if ($linha){
				$linha['num_visitantes'] = $linha['num_visitantes'] + 1;
				$_SESSION['cont'] = 1;
				$resposta2 = mysqli_query($link, "update `contador` set `num_visitantes`= {$linha['num_visitantes']} where id_contador = '1'");			
			}
			
		}
	
?>
<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Página Inicial</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<div dir="rtl" style="border: 2px solid black; color:white; text-align: center; position:fixed; right: 2px;padding-left:2px;padding-right:2px;top:2px; background-color:#cc0000; border-radius: 10px;z-index: 1;">
			<?php 
				echo"Num. visit.: {$linha['num_visitantes']}";
			?>
		</div>
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
											<h1>Coordenação de História<br/></h1>
											<p>Site da coordenação de história do CEFET Maracanã</p>
										</header>
										<p>Projeto criado para auxiliar alunos da instituição ao acesso a material de estudo e contato com professores. A página também contará com eventos organizados pela coordenação, artigos relacionados a disciplina, textos escritos pelos professores e muito mais.</p>
									</div>
									<span class="image object">
										<img src="images/bosque.jpg" alt="" />
									</span>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Saiba Mais</h2>
									</header>
									<div class="features">
										<article>
											<span class="icon fa-book"></span>
											<div class="content">
												<h3>Primeiros Passos</h3>
												<p>A coleção Primeiros Passos poderá ser baixada na página.</p>
											</div>
										</article>
									<!--	<article>
											<span class="icon fa-pencil-square-o"></span>
											<div class="content">
												<h3>Monitoria</h3>
												<p>A monitoria de história estará funcionado a partir do dia DD/MM todos os dias em dois turnos, das HH:MM até HH:MM e HH:MM até HH:MM.</p>
											</div>
										</article>
										<article>
											<span class="icon fa-group"></span>
											<div class="content">
												<h3>Manifestação contra --- </h3>
												<p>Está marcada para o dia DD/MM a manifestação contra ----, partiremos do CEFET as HH:MM, contamos com a presença de todos.</p>
											</div>
										</article>-->
									</div>
								</section>

							<!-- Section -->
								<section>
									<header class='major'>
										<h2>Últimos Adicionados</h2>
									</header><div class='posts'>
									</div>
									<?php
//______________________________________________________________[TEXTOS]_______________________________________________________________

										$pagT = 1;

										if(isset($_REQUEST['pagT'])){

											$pagT = $_REQUEST['pagT'];

										}	

										$linhaTextos = recebeTextos($pagT,4,"texto","id_texto",$link);

										echo"<header class='major'>
												<h2>Textos</h2>
											</header><div class='posts' >";

										for ($i=0; $i < count($linhaTextos); $i++) { 
											
											$respostaProf = mysqli_query($link, "select * from professor where id_professor = {$linhaTextos[$i]['idP']}");
											
												$linhaProf = mysqli_fetch_assoc($respostaProf);

												$nomeImagem = nomeImagem($linhaProf['id_professor'],"miniatura_", $link);

												echo "<article >
												<img style='width:32%;height:40%;border-radius:50px'src='$nomeImagem' alt='' />
												<div><h3>{$linhaTextos[$i]['nome']}</h3>
												{$linhaProf['nome']} <br><h6>";

												$data = "".$linhaTextos[$i]['data'];
												$data = str_replace("-","/",$data);
												$data = printaData($data);
												echo $data;
												
												echo " - "; 
												$hora = "".$linhaTextos[$i]['hora'];
												$hora = $hora[0].$hora[1].$hora[2].$hora[3].$hora[4];
												echo $hora;

												echo"</h6></div>
												<div style='overflow: hidden; width:25em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
													    {$linhaTextos[$i]['resumo']} 
												</div>
													<br>

													<ul class='actions'>
														<li><a href='texto.php?id={$linhaTextos[$i]['id_texto']}' class='button special'>Mais</a></li>
													</ul></article>";
											}


										//include("filtraT.php");

										echo"</div><hr class='major' />";


										$totalObj = mysqli_num_rows(mysqli_query($link, "select * from texto"));

										$numPag = ceil($totalObj/4);

										echo"<center><ul class='pagination'>";
										if($pagT == 1 ){
											
											echo"<li><span class='button disabled'>Voltar</span></li>";

										}else{
											$sub = $pagT - 1;
											echo" <li><a href='index.php?pagT=$sub' class='button'>Voltar</a></li>";

										}

										for ($i=1; $i <= $numPag ; $i++) { 
											if( $i == $pagT){

												echo"<li><a href='index.php?pagT=$i' class='page active'>$i</a></li>";

											}else{

												echo"<li><a href='index.php?pagT=$i' class='page'>$i</a></li>";

											}
										}
										
										if($pagT == $numPag ){
											
											echo" <li><a  class='button disabled'>Próximo</a></li>";

										}else{
											$som = $pagT + 1;
											echo" <li><a href='index.php?pagT=$som' class='button'>Próximo</a></li>";

										}
										
										echo"</ul></center><br><br>";

//______________________________________________________________[ VIDEOS ]______________________________________________________________
										

										//include("filtraV.php");

										$pagV = 1;

										if(isset($_REQUEST['pagV'])){

											$pagV = $_REQUEST['pagV'];

										}	

										$linhaVideos = recebeTextos($pagV,4,"video","id_video", $link);

										echo"<header class='major'>
												<h2>Vídeos</h2>
											</header><div class='posts' >";

										for ($i=0; $i < count($linhaVideos); $i++) { 
											
											$respostaProf = mysqli_query($link, "select * from professor where id_professor = {$linhaVideos[$i]['idP']}");

											$linhaProf = mysqli_fetch_assoc($respostaProf);

											$nomeImagem = nomeImagem($linhaProf['id_professor'],"miniatura_", $link);
											echo "<article><img style='width:32%;height:40%;border-radius:50px'src='$nomeImagem' alt='' /><br><h3>{$linhaVideos[$i]['titulo']}</h3>{$linhaProf['nome']}<h6>";

											$data = "".$linhaVideos[$i]['data'];
											$data = str_replace("-","/",$data);
											$data = printaData($data);
											echo $data;
											
											echo " - "; 
											$hora = "".$linhaVideos[$i]['hora'];
											$hora = $hora[0].$hora[1].$hora[2].$hora[3].$hora[4];
											echo $hora;

											echo"</h6>
												<div style='overflow: hidden; width:28em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
												    {$linhaVideos[$i]['resumo']} 
												</div>
												<br>

												<ul class='actions'>
													<li><a href='video.php?id={$linhaVideos[$i]['id_video']}' class='button special'>Mais</a></li>
												</ul></article>";
											
										}

										echo"</div><hr class='major' />";

										$totalObj = mysqli_num_rows(mysqli_query($link, "select * from video"));

										$numPag = ceil($totalObj/4);

										echo"<center><ul class='pagination'>";
										if($pagV == 1 ){
											
											echo"<li><span class='button disabled'>Voltar</span></li>";

										}else{
											$sub = $pagV - 1;
											echo" <li><a href='index.php?pagV=$sub' class='button'>Voltar</a></li>";

										}

										for ($i=1; $i <= $numPag ; $i++) { 
											if( $i == $pagV){

												echo"<li><a href='index.php?pagV=$i' class='page active'>$i</a></li>";

											}else{

												echo"<li><a href='index.php?pagV=$i' class='page'>$i</a></li>";

											}
										}
										
										if($pagV == $numPag ){
											
											echo" <li><a  class='button disabled'>Prócimo</a></li>";

										}else{
											$som = $pagV + 1;
											echo" <li><a href='index.php?pagV=$som' class='button'>Próximo</a></li>";

										}
										
										echo"</ul></center><br><br>";
									?>
										<!--<article>
											<img style="width:45%;height:45%;border-radius:100px" src="images/pic011.jpg" alt="" /><br>Nome do Professor<h6>DD/MM/AAAA - HH:MM</h6>
											<br>
											
											<h3>Título</h3>
											<p>Subtítitulo ou  chamada - algo chamativo para o aluno ler </p>
											<ul class="actions">
												<li><a href="#" class="button special">Mais</a></li>
											</ul>
										</article>
										<article>
											<img style="width:45%;height:45%;border-radius:100px" src="images/pic011.jpg" alt="" /><br>Nome do Professor<h6>DD/MM/AAAA - HH:MM</h6>
											<br>
											
											<h3>Título</h3>
											<p>Subtítitulo ou  chamada - algo chamativo para o aluno ler </p>
											<ul class="actions">
												<li><a href="#" class="button special">Mais</a></li>
											</ul>
										</article>
										<article>
											<img style="width:45%;height:45%;border-radius:100px" src="images/pic011.jpg" alt="" /><br>Nome do Professor<h6>DD/MM/AAAA - HH:MM</h6>
											<br>
											
											<h3>Título</h3>
											<p>Subtítitulo ou  chamada - algo chamativo para o aluno ler </p>
											<ul class="actions">
												<li><a href="#" class="button special">Mais</a></li>
											</ul>
										</article>
										<article>
											<img style="width:45%;height:45%;border-radius:100px" src="images/pic011.jpg" alt="" /><br>Nome do Professor<h6>DD/MM/AAAA - HH:MM</h6>
											<br>
											
											<h3>Título</h3>
											<p>Subtítitulo ou  chamada - algo chamativo para o aluno ler </p>
											<ul class="actions">
												<li><a href="#" class="button special">Mais</a></li>
											</ul>
										</article>-->
									
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