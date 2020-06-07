<?php
	include("conectaBanco.php");
	include("teste.php");
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
		<title>Vídeo</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script>
			function verificaExcluir() {
			    
			    var r = confirm("Tem certeza que deseja excluir? Essa ação não poderá ser desfeita.");
			    if (r == true) {
			     	<?php "window.location.href = \"excluirV.php?id=$id\";"; ?>  
			    } else {
			        
			    }
			  
			}
		</script>
		
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
								

							<!-- Section -->
							<?php
							
	

								echo"<section style='width='100%';>
									<center>
									<header class='main'>";
										$id=$_REQUEST["id"];
										$resposta = mysqli_query($link, "select * from evento where id_evento='$id'");
										if($resposta){	
										
											$linha = mysqli_fetch_assoc($resposta);
											if($linha){
												$dataI = printaData("".$linha['data_ini']);
												$dataI = str_replace("-","/",$dataI);
												$dataF = printaData("".$linha['data_fin']); 
												$dataF = str_replace("-","/",$dataF);
												$horaI = "".$linha['hora_ini'];
												$horaI = $horaI[0].$horaI[1].$horaI[2].$horaI[3].$horaI[4];
												$horaF = "".$linha['hora_fin'];
												$horaF = $horaF[0].$horaF[1].$horaF[2].$horaF[3].$horaF[4];
												echo"<h1>{$linha['nome']}</h1>
												<img src='images/evento/{$linha['image']}' alt='' />
												<p>{$linha['descricao']}</p></center><br><br>
												<p>De <b>$dataI</b> as <b>$horaI</b>
												até <b>$dataF</b> as <b>$horaF</b><br></p>";
												
												echo"</section>";
											}
											
											if (isset($_SESSION["usuario"])){
												echo"<br><center><ul class='actions'>
														<li><a href='#?id=$id' class='button special'>Editar</a></li>
														<li><a href='#?id=$id' class='button special'>Excluir</a></li>
													</ul></center>";
											}
										}
							?>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

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