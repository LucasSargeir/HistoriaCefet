<?php
	include("conectaBanco.php");
	include("functionImagem.php");
	include("teste.php");
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
		<title>Textos dos Professores</title>
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
									
										<form method="post" action="textoT.php">
											
												<div class="row uniform">
												<div class="6u 12u$(xsmall)">
													<input type="text" name="titulo" id="titulo"  placeholder="Pesquisar por título" />
													</div>
												
													<?php
														$resposta = mysqli_query($link, "select * from materia");
														if($resposta){	
															$linha = mysqli_fetch_assoc($resposta);
															echo "<div class='6u$ 12u$(xsmall)'><div class='select-wrapper'><select name='materia'  id='materia'><option value='0'>Selecione uma matéria</option>";
															while($linha){		
																if($linha['id_materia']==$idM){
																	echo"<option VALUE={$linha['id_materia']} selected>{$linha['nome']}</option>";
																}
																else{
																	echo"<option VALUE={$linha['id_materia']}>{$linha['nome']}</option>";
																}
																$linha = mysqli_fetch_assoc($resposta);
															}
															echo"</select></div></div></div>";
														}

													
													?>
												
											<br><center><input type="submit" value="Procurar"></center>
										</form>
									
										<?php
											if(isset($_REQUEST['materia']) || isset($_REQUEST['titulo'])){
												$aux = 0;
												if(isset($_REQUEST['materia']) & $_REQUEST['materia'] != 0 ){
													$mat = $_REQUEST['materia'];
													$aux = 1;
												}
												else{
													$mat = "";
												}
												if(isset($_REQUEST['titulo']) & $_REQUEST['titulo'] != ""){
													$tit = $_REQUEST['titulo'];
													$aux = ($aux == 1)?3:2;
												}
												else{
													$tit = "";
												}
												$sql;
												switch ($aux){
													case 1:
														$sql = "select * from texto where idM = $mat";													
														break;
													
													case 2:
														$sql = "select * from texto where nome like '%$tit%'";													
														break;
													
													case 3:
														$sql = "select * from texto where idM='$mat' and nome like '%$tit%'";													
														break;
													
													default:
														$sql = "";													
														break;
												}
												//echo"$sql";
												$resposta = mysqli_query($link, $sql." order by id_texto desc");
												echo"<header class='major'>
														<h2>Textos</h2>
													</header><div class='posts' >";
												if($resposta){

													$linhaTextos = mysqli_fetch_assoc($resposta);

													while($linhaTextos){

														$resposta2 = mysqli_query($link, "select * from professor where id_professor = {$linhaTextos['idP']}");

														$linhaProf = mysqli_fetch_assoc($resposta2);
														$nomeImagem = nomeImagem($linhaProf['id_professor'],"miniatura_");
														echo "<article >
															<img style='width:32%;height:40%;border-radius:50px'src='$nomeImagem' alt='' />
															<div><h3>{$linhaTextos['nome']}</h3>
															{$linhaProf['nome']} <br><h6>";

															$data = "".$linhaTextos['data'];
															$data = str_replace("-","/",$data);
															$data = printaData($data);
															echo $data;
															
															echo " - "; 
															$hora = "".$linhaTextos['hora'];
															$hora = $hora[0].$hora[1].$hora[2].$hora[3].$hora[4];
															echo $hora;

															echo"</h6></div>
															<div style='overflow: hidden; width:25em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
																    {$linhaTextos['resumo']} 
															</div>
																<br>

																<ul class='actions'>
																	<li><a href='texto.php?id={$linhaTextos['id_texto']}' class='button special'>Mais</a></li>
																</ul></article>";

															$linhaTextos = mysqli_fetch_assoc($resposta);

													}

												}

												echo"</div><hr class='major' />";

											}
											else{

												$pagT = 1;

												if(isset($_REQUEST['pagT'])){

													$pagT = $_REQUEST['pagT'];

												}	

												$linhaTextos = recebeTextos($pagT,16,"texto","id_texto", $link);

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

												$numPag = ceil($totalObj/16);

												echo"<center><ul class='pagination'>";
												if($pagT == 1 ){
													
													echo"<li><span class='button disabled'>Voltar</span></li>";

												}else{
													$sub = $pagT - 1;
													echo" <li><a href='textoT.php?pagT=$sub' class='button'>Voltar</a></li>";

												}

												for ($i=1; $i <= $numPag ; $i++) { 
													if( $i == $pagT){

														echo"<li><a href='textoT.php?pagT=$i' class='page active'>$i</a></li>";

													}else{

														echo"<li><a href='textoT.php?pagT=$i' class='page'>$i</a></li>";

													}
												}
												
												if($pagT == $numPag ){
													
													echo" <li><a  class='button disabled'>Próximo</a></li>";

												}else{
													$som = $pagT + 1;
													echo" <li><a href='textoT.php?pagT=$som' class='button'>Próximo</a></li>";

												}
												
												echo"</ul></center><br><br>";
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