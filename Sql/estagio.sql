-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14-Jul-2017 às 19:39
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estagio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contador`
--

CREATE TABLE `contador` (
  `id_contador` int(11) NOT NULL,
  `num_visitantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contador`
--

INSERT INTO `contador` (`id_contador`, `num_visitantes`) VALUES
(1, -1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `materia`
--

INSERT INTO `materia` (`id_materia`, `nome`) VALUES
(3, 'História Contemporânea'),
(6, 'História do Brasil Contemporâneo'),
(8, 'História da República'),
(9, 'História da República'),
(10, 'História da República'),
(11, 'História Moderna');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id_professor` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `token` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `blog` varchar(200) NOT NULL,
  `biografia` text NOT NULL,
  `imagem` text NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id_professor`, `nome`, `token`, `email`, `blog`, `biografia`, `imagem`, `admin`) VALUES
(1, 'Adimin', '255bc6f43b63625f9c3583a0581c9a4f8e01175d', 'sitedehistoriacefet@gmail.com', '', 'Apenas uma conta de controle', 'images/pic011.jpg', 1),
(7, 'Alvaro Senra', 'e49908f528d0116907166c79bf752767ccff09cb', 'alvarosenra@gmail.com', '', 'Alvaro Senra se formou em História pela UFRJ. É professor desde 1985. Trabalhou em várias redes públicas e instituições particulares, desde o quinto ano até pós-graduação. É professor do CEFET-RJ a partir de 2004', 'images/pic011.jpg', 0),
(8, 'Renato Lana Fernandez ', '232ec04a467919b547108a3f4b9b21e2280e76be', 'renatolfernandez@hotmail.com', '', 'Rubro Negro, professor desde 1986 em diversas instituições de ensino publico e privado, leciona no CEFET desde 1995. Graduado em História pela Universidade Federal Fluminense, possui especialização em educação e movimentos sociais, especialização em História do Brasil, mestrado e doutorado em História politica e bens culturais realizados no CPDOC-FGV', 'images/pic011.jpg', 0),
(11, 'Mário Luiz de Souza', '751b4a2d7deefef8cdf665b475a5916acd421959', 'maraols@uol.com.br', '', 'Formado em História pela Universidade Estadual do Rio de Janeiro (UERJ), com mestrado e doutorado em Educação pela Universidade Federal Fluminense (UFF). Atua no Cefet-RJ como professor de História do Ensino Integrado e professor do Mestrado em Relações Étnico-raciais.', 'images/pic011.jpg', 0),
(12, 'Mariana Renou', '5eadb54e4b74c2a851d41567b84726c184bf63ef', 'marirenou@yahoo.com.br', '', 'Formada em História pela Universidade Federal do Rio de Janeiro. Realizou pesquisa sobre História da Baixada Fluminense, memórias e identidades dos moradores de bairros da periferia do município de Nova Iguaçu, Ensino de História, Religiões de Matriz Africana no Brasil e História, Cultura e Populações afroamericanas. Defendeu dissertação de mestrado em Antropologia Social pelo PPGAS / Museu Nacional / UFRJ, onde realizou pesquisa com comunidades de terreiro do Candomblé Angola de Nova Iguaçu. Doutora em Antropologia Social pelo PPGAS/UFRJ, com tese sobre populações afrodescendentes, associações políticas e culturais, memória, lembrança e História de Guadalupe, Caribe. Pesquisadora vinculada ao Laboratório de Antropologia e História LAH / PPGAS/ MN/ UFRJ. Professora de História desde 2007, atuando especialmente em turmas de pré-vestibular, Ensino Médio e Técnico', 'images/pic011.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `texto`
--

CREATE TABLE `texto` (
  `id_texto` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `resumo` varchar(600) NOT NULL,
  `arquivo` text NOT NULL,
  `idP` int(11) NOT NULL,
  `idM` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `texto`
--

INSERT INTO `texto` (`id_texto`, `nome`, `resumo`, `arquivo`, `idP`, `idM`, `data`, `hora`) VALUES
(5, 'O Mundo Pós-Guerra Mundial', 'O texto aborda os principais fenômenos da História Mundial pós-Ii Guerra (1945-1991): os Blocos políticos e econômicos, a Guerra Fria e a Descolonização Afro-Asiática.', 'upload/7/O Mundo Pós-Guerra Mundial.pdf', 7, 0, '0000-00-00', '00:00:00'),
(6, 'A I Guerra e a Revolução Russa', 'O texto aborda a crise do imperialismo europeu,  culminando com a I Guerra Mundial e com a Revolução Russa, que abriram um novo período histórico', 'upload/7/A I Guerra Mundial e a Revolução Russa.pdf', 7, 0, '0000-00-00', '00:00:00'),
(7, 'América  Latina no século XX', 'Texto didático abordando os principais momentos da História da América Latina no Século XX', 'upload/7/América Latina no século XX.pdf', 7, 0, '0000-00-00', '00:00:00'),
(8, 'Crise de 1929 e o Fascismo', 'O texto aborda o período de crise do capitalismo liberal, realçando a Crise de 1929 e suas consequências e a chegada ao poder dos regimes fascistas na Europa.', 'upload/7/Crise de 1929 e Fascismo.pdf', 7, 0, '0000-00-00', '00:00:00'),
(9, 'O Brasil Democrático (1945-1964)', 'O texto aborda a vida política, econômica, social e cultural do país no período entre 1945 (queda da ditadura do Estado Novo) e 1964 (golpe militar que derrubou João Goulart)', 'upload/7/O Brasil democrático (1945-1964).pdf', 7, 0, '0000-00-00', '00:00:00'),
(10, 'Iluminismo', 'Esse texto aborda as principais propostas de alguns filósofos do Iluminismo, se contrapondo a organização do Antigo Regime. Tais ideias acabaram sendo os pressupostos do Liberalismo Político e do Liberalismo Econômico.', 'upload/11/ILUMINISMO.pdf', 11, 0, '0000-00-00', '00:00:00'),
(11, 'POWER POINT - PRIMEIRA REPÚBLICA - MOVIMENTO OPERÁ', 'Esse é o PowerPoint utilizado na aula sobre Movimento Operário na Primeira República.  ', 'upload/11/PRIMEIRAREPÚBLICAMOVOPERÁRIOEESTADO.pdf', 11, 0, '0000-00-00', '00:00:00'),
(12, 'PowerPonit ILUMINISMO', 'Esse PowerePoint foi feito tendo como foco algumas características do movimento Iluminista e de suas formulações com relação ao Antigo Regime.', 'upload/11/ILUMINISMO.pdf', 11, 0, '0000-00-00', '00:00:00'),
(13, 'PowerPoint - Revolução Francesa - Processo Revoluc', 'Esse PowerPoint tem por objetivo abordar alguns dos aspectos centrais do começo da Revolução Francesa, em especial a queda do regime absolutista.', 'upload/11/REVOLUÇÃOFRANCESAPROCESSOREVOLUCIONÁRIO.pdf', 11, 0, '0000-00-00', '00:00:00'),
(14, 'PRIMEIRA REPÚBLICA - MOVIMENTO OPERÁRIO ATÉ 1922', 'O texto trabalha algumas das características do Movimento Operário na Primeira República, em especial as condições de trabalho e vida desses trabalhadores, sua forma de organização de luta, a presença do movimento anarquista junto ao movimento dos operários e a repressão do Estado sobre esse movimento.', 'upload/11/PRIMEIRA REPÚBLICA - MOVIMENTO OPERÁRIO ATÉ 1922.pdf', 11, 0, '0000-00-00', '00:00:00'),
(15, 'LIBERALISMO E SOCIALISMO NO SÉCULO XIX', 'O texto aborda as principais características do pensamento liberal, anarquista e marxista, no século XIX.', 'upload/11/LIBERALISMO E SOCIALISMO NO SÉCULO XIX.pdf', 11, 0, '0000-00-00', '00:00:00'),
(16, 'ESTADO NOVO', '', 'upload/11/ESTADO NOVO.pdf', 11, 0, '0000-00-00', '00:00:00'),
(17, 'GOVERNO DE JOSEF STALIN', '', 'upload/11/GOVERNO DE JOSEF STALIN.pdf', 11, 0, '0000-00-00', '00:00:00'),
(18, 'Do desenvolvimentismo ao neoliberalismo no Brasil', 'Esse texto paradidático busca analisar o processo de organização, auge e crise do Estado desenvolvimentista no Brasil e sua substituição por um novo modelo, o neoliberalismo, ressaltando os principais momentos desse processo.', 'upload/7/Do desenvolvimentismo ao neoliberalismo no Brasil.pdf', 7, 0, '0000-00-00', '00:00:00'),
(19, 'POWERPOINT - REVOLUÇÃO FRANCESA - FASES DA REVOLUÇ', 'Esse é um PowerPoint utilizado na aula sobre as fases da Revolução Francesa, abordando os principais fatos, documentos, medidas e aspectos de cada um dos períodos dessa revolução.', 'upload/11/REVOLUÇÃO FRANCESA - FASES DA REVOLUÇÃO.pdf', 11, 0, '0000-00-00', '00:00:00'),
(20, 'POWERPOINT - LIBERALISMO, ANARQUISMO E MARXISMO, N', 'Esse PowerPoint contém as características principais do pensamento liberal, anarquista e marxista, no século XIX. ', 'upload/11/POWERPOINT - LIBERALISMO, ANARQUISMO E MARXISMO, NO SÉCULO XIX.pdf', 11, 0, '0000-00-00', '00:00:00'),
(21, 'Processo de Independência do Brasil', 'Analise do processo de Independência do Brasil a partir da chegada da família real em 1908 e como os setores de elite tanto brasileiras como portuguesas se adaptam a nova ordem pós independência.', 'upload/8/Processo de independencia do Brasil - Interiorização da metrópole.pdf', 8, 0, '0000-00-00', '00:00:00'),
(22, 'Brasil: a Primeira República (1889-1930)', 'O texto aborda a História da Primeira República Brasileira (1889-1930), em seus aspectos políticos, econômicos e sociais.', 'upload/7/Brasil a Primeira República -  1889-1930.pdf', 7, 0, '0000-00-00', '00:00:00'),
(23, 'Roteiro de estudo sobre crise do feudalismo', 'Roteiro para facilitar a leitura sobre o tema', 'upload/8/1. Crise do feudalismo e formação dos estados modernos.pdf', 8, 0, '0000-00-00', '00:00:00'),
(24, 'Roteiro sobre Humanismo e Renascimento', 'Roteiro para facilitar a leitura sobre o tema', 'upload/8/3. HUMNISMO E RENASCIMENTO.pdf', 8, 0, '0000-00-00', '00:00:00'),
(25, 'Roteiro sobre Absolutismo monarquico', 'Roteiro para facilitar a leitura sobre o tema', 'upload/8/2. Absolutismo Monarquico.pdf', 8, 0, '0000-00-00', '00:00:00'),
(26, 'Roteiro sobre Reforma e Contra-reforma', 'Roteiro para facilitar a leitura sobre o tema', 'upload/8/4. Reforma e Contra Reforma.pdf', 8, 0, '0000-00-00', '00:00:00'),
(27, 'Roteiro sobre Revolução Gloriosa', 'Roteiro para facilitar a leitura sobre o tema', 'upload/8/5. Revolução Gloriosa.pdf', 8, 0, '0000-00-00', '00:00:00'),
(28, 'Roteiro sobre Revolução Cientifica', 'Roteiro para facilitar a leitura sobre o tema', 'upload/8/6. REVOLUÇÃO CIENTIFICA.pdf', 8, 0, '0000-00-00', '00:00:00'),
(29, 'Resumo sobre Iluminismo', 'Roteiro para facilitar a leitura sobre o tema', 'upload/8/7. Iluminismo.pdf', 8, 0, '0000-00-00', '00:00:00'),
(30, 'roteiro de estudo sobre Revolução Industrial', 'Roteiro para direcionar a leitura do tema.', 'upload/8/Revolução Industrial.pdf', 8, 0, '0000-00-00', '00:00:00'),
(31, 'roteiro de estudo sobre Revolução Industrial', 'Roteiro para direcionar a leitura do tema.', 'upload/8/Revolução Industrial.pdf', 8, 0, '0000-00-00', '00:00:00'),
(32, 'Roteiro de estudos sobre Revolução Francesa.', 'Roteiro para direcionar a leitura do tema.', 'upload/8/Revolução Francesa.pdf', 8, 0, '0000-00-00', '00:00:00'),
(33, 'Roteiro de estudo sobre Congresso de Viena', 'Roteiro para direcionar a leitura do tema.', 'upload/8/Congresso de Viena.pdf', 8, 0, '0000-00-00', '00:00:00'),
(34, 'resumo sobre as revoluções liberais e nacionais no', 'Roteiro para direcionar a leitura do tema.', 'upload/8/Revoluções Libearais e Nacionais de 1820, 1830 e 1848.pdf', 8, 0, '0000-00-00', '00:00:00'),
(35, 'Roteiro sobre Unificação alemã', 'Roteiro para direcionar a leitura do tema.', 'upload/8/Unificação Alemã.pdf', 8, 0, '0000-00-00', '00:00:00'),
(36, 'Roteiro de estudo sobre Unificação Italiana', '', 'upload/8/Unificação Italiana.pdf', 8, 0, '0000-00-00', '00:00:00'),
(37, 'Roteiro sobre Idéias sociais e politicas do sec. X', 'Roteiro para a auxiliar o estudo do tema.', 'upload/8/Idéias sociais e políticas.pdf', 8, 0, '0000-00-00', '00:00:00'),
(38, 'Roteiro de estudo sobre Imperialismo e Neo colonia', 'Roteiro para direcionar a leitura do tema.', 'upload/8/Imperialismo e Neocolonialismo.pdf', 8, 0, '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `titulo` varchar(70) NOT NULL,
  `resumo` varchar(600) NOT NULL,
  `link` text NOT NULL,
  `idM` int(11) NOT NULL,
  `idP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `video`
--

INSERT INTO `video` (`id_video`, `titulo`, `resumo`, `link`, `idM`, `idP`) VALUES
(7, 'Mapa internativo da II Guerra Mundial', 'Interessante vídeo, que mostra os principais movimentos da II Guerra Mundial (1939-1945)', 'https://www.youtube.com/watch?v=Xx0MBUTZFTo', 3, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contador`
--
ALTER TABLE `contador`
  ADD PRIMARY KEY (`id_contador`);

--
-- Indexes for table `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id_professor`);

--
-- Indexes for table `texto`
--
ALTER TABLE `texto`
  ADD PRIMARY KEY (`id_texto`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contador`
--
ALTER TABLE `contador`
  MODIFY `id_contador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `texto`
--
ALTER TABLE `texto`
  MODIFY `id_texto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
