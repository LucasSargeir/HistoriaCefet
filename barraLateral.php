<?php
	include("conectaBanco.php");
	//include("functionImagem.php");
?>									
<header class="major">
	<h2>Menu</h2>
</header>
<ul>
<?php

	echo "<li><a href='index.php'>Home</a></li>
	<li><a href='quemsomos.php'>Quem somos</a></li>
	<li><a href='#'>Projetos CEFET</a></li>
	";
	

		if (isset($_SESSION["email"])){

			$email=$_SESSION["email"];
			$id= $_SESSION["usuario"];
		
			if($email){

				$resposta = mysqli_query($link, "select * from professor where email = '$email'");

				if ($resposta){

					$linha = mysqli_fetch_assoc($resposta);

					if ($linha){
						echo"<li><a href='professor.php'>Minha página</a></li>
						<li><a href='formMudaSenha.php?id=$id'>Trocar Senha</a></li>
							
						<!--	<li><a href='#'>Fale conosco</a></li>-->
							<li>
								<span class='opener'>Produções Acadêmicas</span>
								<ul>
									<li><a href='textoT.php'>Docentes</a></li>
									<li><a href='textoTA.php'>Alunos</a></li>
									<li><a href='textoTE.php'>Estagiários</a></li>
									<li><a href='videoT.php'>Vídeos</a></li>
								</ul>
							</li>
							
							";
							//<li><a href='materias.php'>Matérias</a></li>
						echo"<li><a href='sair.php'>Sair</a></li><br>";
						if($linha['admin']==false){
							echo"<ul class='actions'>
								<center><li><a href='upTexto.php' class='button special'>&nbsp;&nbsp;&nbsp;Novo Texto&nbsp;&nbsp;&nbsp;</a></li>
								<li><a href='upVideo.php' class='button special'>&nbsp;&nbsp;&nbsp;Novo Vídeo&nbsp;&nbsp;&nbsp;</a></li><br>
								<br><li><a href='upTextoAluno.php' class='button special'>&nbsp;&nbsp;&nbsp;Novo Texto do Aluno&nbsp;&nbsp;&nbsp;</a></li><br>
								<br><li><a href='upTextoEstagiario.php' class='button special'>&nbsp;&nbsp;&nbsp;Novo Texto do Estagiário&nbsp;&nbsp;&nbsp;</a></li></center>
							</ul>";
						}
					}
					else{
						echo mysqli_error($link);										
					}
				}
				else{
					mysqli_error($link);
				}
			}
		}
		else{
			$resposta = mysqli_query($link, "select * from professor");

			if ($resposta){

				$linha = mysqli_fetch_assoc($resposta);
				echo"<li><span class='opener'>Professores</span>
								<ul>";
				while ($linha){
					if($linha['admin']==false){
						echo"<li><a href='professor.php?id={$linha['id_professor']}'>{$linha['nome']}</a></li>";
					}
					
					$linha = mysqli_fetch_assoc($resposta);	
				}
				echo"</ul>
							</li>
							
						<!--	<li><a href='#'>Fale conosco</a></li>-->
							<li>
								<span class='opener'>Produções Acadêmicas</span>
								<ul>
									<li><a href='textoT.php'>Docentes</a></li>
									<li><a href='textoTA.php'>Alunos</a></li>
									<li><a href='textoTE.php'>Estagiários</a></li>
									<li><a href='videoT.php'>Vídeos</a></li>
								</ul>
							</li>
							
							<li><a href='#'>Outras Disciplinas</a></li>
							<li>
					<span class='opener'>Entrar</span>
					<ul>
					<form method='post' action='validaProfessor.php'>
						<li><input type='email' name='email' id='email' value='' placeholder='Email' /></li>
						<li><input type='password' name='senha' id='senha' value='' placeholder='Senha' /></li><br>
						<li><input type='submit' value='Entrar' class='special' /></li>
					</form>
					</ul>";
			}
			else{
				mysqli_error($link);
			}
		}
		
	?>
	</li>
<!--	<li><a href="#">Outra Página</a></li>
	<li><a href="#">Outra Página</a></li> -->
</ul>

</nav>

							<!-- Section -->
								<section>
									<?php
									echo"<header class='major'>
										<h2>Eventos</h2>
									</header>
									<div class='mini-posts'>
										<article>";
											

										$resposta = mysqli_query($link, "select * from evento order by id_evento desc");
										$count = 1;
										if($resposta){

											$linha = mysqli_fetch_assoc($resposta);
											if(!$linha){
												echo"Não há eventos";
											}
											while($linha && $count < 4){
												$dataI = printaData("".$linha['data_ini']);
												$dataI = str_replace("-","/",$dataI);
												$dataF = printaData("".$linha['data_fin']); 
												$dataF = str_replace("-","/",$dataF);
												$horaI = "".$linha['hora_ini'];
												$horaI = $horaI[0].$horaI[1].$horaI[2].$horaI[3].$horaI[4];
												$horaF = "".$linha['hora_fin'];
												$horaF = $horaF[0].$horaF[1].$horaF[2].$horaF[3].$horaF[4];

												echo"<a href='#' class='image'><img src='images/evento/min_{$linha['image']}' alt='images/evento/min_{$linha['image']}' /></a>
												<p><b>{$linha['nome']}</b> - {$linha['descricao']}</p><br>
												<p>De <b>$dataI</b> as <b>$horaI</b><br>
												até <b>$dataF</b> as <b>$horaF</b><br></p>
												<ul class='actions'>
													<li><a href='verEvento.php?id={$linha['id_evento']}' class='button special'>Mais</a></li>
												</ul>";
												
												$linha = mysqli_fetch_assoc($resposta);
												$count++;
											}
										}else{

											echo mysqli_error($link);

										}

											
									echo" </article>
									</div>";
									mysqli_close($link);
									?>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Contato</h2>
									</header>
									<p>Para mais informações procure a coordenação de História do CEFET maracanã ou entre em contato através de:</p>
									<ul class="contact">
										<li class="fa-envelope-o"><a href="#">sitedehistoriacefet@gmail.com</a></li>
										<li class="fa-home">Av. Maracanã, 229 - Maracanã,<br> Rio de Janeiro - RJ, 20271-110</li>
									</ul>
								</section>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Untitled. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
								</footer>
