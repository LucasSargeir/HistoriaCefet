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
		<title>Textos por Matéria</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
	<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									
									<ul class="icons">
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-medium"><span class="label">Medium</span></a></li>
									</ul>
								</header>

							<!-- Content -->
								<section>
									<header class="main">
										
									</header>
									<form name="form" method="post" action="materias.php" enctype="multipart/form-data">
										<?php	

											$resposta = mysqli_query($link, "select * from materia");
											if (isset($_REQUEST["materia"])){
												$idM=$_REQUEST["materia"];
											}
											else{
												$idM=0;
											}

											if($resposta){	
												$linha = mysqli_fetch_assoc($resposta);
												echo "<div class='row uniform'><div class='6u$ 12u$(xsmall)'><div class='select-wrapper'><select name='materia' id='demo-category'><option value='0'>Selecione uma matéria</option>";
												while($linha){		
													if($linha['id_materia']==$idM){
														echo"<option VALUE={$linha['id_materia']} selected>{$linha['nome']}</option>";
													}
													echo"<option VALUE={$linha['id_materia']}>{$linha['nome']}</option>";
													$linha = mysqli_fetch_assoc($resposta);
												}
												echo"</select></div></div><div class='6u$ 12u$(xsmall)'><input type='submit' value='Enviar'></div></div>";
											}
										echo "</form>";
	
											if($idM==0){
												$resposta2 = mysqli_query($link, "select * from texto order by id_texto desc");
											}
											else{
												$resposta2 = mysqli_query($link, "select * from texto where idM='$idM' order by id_texto desc");
											}

											if($resposta2){	
											
												$linha2 = mysqli_fetch_assoc($resposta2);
													echo"<header class='major'>
														<h2>Textos</h2>
													</header><div class='posts'>";
													include("functionImagem.php");
													

												while($linha2){
													$resposta = mysqli_query($link, "select * from professor where id_professor='$linha2[idP]'");
														if($resposta){	

															$linha = mysqli_fetch_assoc($resposta);
															if($linha){

																$nomeImagem = nomeImagem($linha['id_professor'],"miniatura_");

																echo "<article><img style='width:32%;height:40%;border-radius:50px'src='$nomeImagem' alt='' /><br><h3>$linha2[nome]</h3>$linha[nome]<h6>DD/MM/AAAA - HH:MM</h6>
																<div style='overflow: hidden; width:28em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
																    $linha2[resumo] 
																</div>
																<br>

																<ul class='actions'>
																	<li><a href='texto.php?id={$linha2['id_texto']}' class='button special'>Mais</a></li>
																</ul></article>";
															}
														}
													$linha2 = mysqli_fetch_assoc($resposta2);
												}
											}
													
											else{
												echo "Erro na exibição dos textos";
											}
										?>
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