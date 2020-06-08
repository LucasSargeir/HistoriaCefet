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
		<style rel="stylesheet" media="(max-width: 320px)">
		   html,body { height: 100% }
		   .stockIframe {  width:100%; height:100%; }
		   .stockIframe iframe {  width:300px; height:158px; border:0;overflow:hidden }
		</style>
	</head>
	<body>
		<script>
		   function autoResize(i) {
		     var iframeHeight=
		     (i).contentWindow.document.body.scrollHeight;
		     (i).height=iframeHeight+20;
		   } 
		</script>

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
										$resposta = mysqli_query($link, "select * from video where id_video='$id'");
										if($resposta){	
										
											$linha = mysqli_fetch_assoc($resposta);
											if($linha){
												echo"<h1>$linha[titulo]</h1></header>";
												echo"<p>$linha[resumo]</p>";

												$link = $linha['link'];

												$palheiro = $link;
												
												$agulha   = 'iframe';

												$pos = strpos( $palheiro, $agulha );

												if($pos === false){

													$ifra =youtube_id_from_url($link);
													
													require_once("Mobile_Detect.php");
                                                    
                                                    $detect = new Mobile_Detect;
                                                    
                                                    // Testa se é Tablet ou Telefone
                                                    if ($detect->isMobile()) {
                                                    // echo "Diz que é um Dispositivo Movel";
                                                   
                                                      //  $ifra  = str_replace("height='315'","height='158'",$ifra);
                                                       // $ifra  = str_replace("width='560'","width='280'",$ifra);
                                                    }
                                                    echo "<div class='stockIframe '>";echo $ifra;echo"</div>";

												}
												else{

                                                    $link = str_replace("560","100%",$link);

													echo "<div class='stockIframe '>";echo $link; echo"</div>";

												}

												
												echo"</center></section>";
											}
											
											if (isset($_SESSION["usuario"])){
												echo"<br><center><ul class='actions'>
														<li><a href='editarV.php?id=$id' class='button special'>Editar</a></li>
														<li><a href='excluirV.php?id=$id' class='button special'>Excluir</a></li>

													</ul></center>";
											}
										}//excluirV.php?id=$id
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