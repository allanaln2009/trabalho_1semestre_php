<?php
// Állan Lima
// 9930011572
// myadress.site40.net/trabalho_php1 -> em caso de problema, tente acessar o site uma segunda vez

error_reporting(0);
header ('Content-type: text/html; charset=UTF-8');
echo "<html>\n<header>\n\t<title>Média 3º Semestre - Ciência da Computação</title>\n</header>\n
\n<style>\n.reprovado{\n\tbackground-color: #ff0000;\n\twidth: 2px;\n}\n.aprovado{\n\tbackground-color: #0ff000;
\twidth: 2px;\n}\n</style>\n\n<body>\n";

$x = 0;	$media = 0; $y = 0;
$todanota = round($_GET["todanota"], 2);
if ($todanota != null){
	if ($todanota > 10 || $todanota < 0 || is_numeric($todanota) == false){
		$y++;
	}else{
		while ($x <= 29){
			$notas[$x] = $todanota;
			$_POST["nota$x"] = $todanota;
			$x++;
		}
	}
}
while ($x <= 29){
	$notas[$x] = $_POST["nota$x"];
	if ($notas[$x] == null){
		$notas[$x] = 0;
	}
	if ($notas[$x] > 10 || $notas[$x] < 0 || is_numeric($notas[$x]) == false){
		$y++;
		$notas[$x] = 0;
	}
	$media = $media + $notas[$x];
	$x++;
}
$media = $media / 30;

if ($y != 0){
	echo "<h1>Digite notas válidas!</h1>";
}

$alunos = array('Ademarço Oliveira',
				'Alessandro Assis',
				'Állan Cunha',
				'Andressa Valentim',
				'Arthur Mendonça',
				'Breno Vial',
				'Claudio Carvalho',
				'Daniel Bissoli',
				'Dyana Figueiredo',
				'Edivino dos Reis',
				'Felipe de Paula',
				'Felipe Rodrigues',
				'Julio Mitica',
				'Laryssa Souza',
				'Marco Junqueira',
				'Mateus Bosso',
				'Robson Moura',
				'Rodrigo Munis',
				'Sheila Zaros',
				'Thiago Silva',
				'Victor Gonzalez',
				'Vitor Beraldo',
				'André Santos',
				'Marcela Antunes',
				'Bruno Marques',
				'Marco de Deus',
				'Gabriel Krassny',
				'Danillo Garcia',
				'Barbara Brito',
				'Igor Melo');
sort($alunos);

if ($media < 6){
	$cor	=	"color: #ff0000;";
}else{
	$cor	=	"color: #0ff000;";
}

if ($media != null){
	$captionTab = 'A média da sala é <i style="'.$cor.'">'.round($media, 2).'</i>';
}

echo "\n<form action=\"index.php\" method=\"post\">\n<table>\n<caption><b>$captionTab</b></caption>\n\t<td>\n\t<table>\n";
for ($i=0; $i < 15; $i++) {
	if ($notas[$i] < 6){
		$cor	=	"reprovado";
	}else{
		$cor	=	"aprovado";
	}
	echo "\t\t<tr>\n";											// linha primeira coluna
	echo "\t\t\t<td class=\"$cor\"></td>\n";					// célula de cor/status
	echo "\t\t\t<td><b>$alunos[$i]</b></td>\n";					// célula com nome
	echo "\t\t\t<td>Nota: <input value=\"$notas[$i]\" type=\"text\" name=\"nota$i\" size=\"1\" maxlength=\"4\"></td>\n"; // célula com textbox
	echo "\t\t</tr>\n";											// fim linha
}
	echo "\t</table>\n\t</td>\n";								// fecha tabela (coluna 1)
	echo "\t<td>\n\t<table>\n";									// abre tabela (coluna 2)
for ($i=15; $i < 30; $i++) {
	if ($notas[$i] < 6){
		$cor	=	"reprovado";
	}else{
		$cor	=	"aprovado";
	}
	echo "\t\t<tr>\n";											// linha segunda coluna
	echo "\t\t\t<td class=\"$cor\"></td>\n";					// célula de cor/status
	echo "\t\t\t<td><b>$alunos[$i]</b></td>\n";					// célula com nome
	echo "\t\t\t<td>Nota: <input value=\"$notas[$i]\" type=\"text\" name=\"nota$i\" size=\"1\" maxlength=\"4\"></td>\n"; // célula com textbox
	echo "\t\t</tr>\n";											// fim linha
}
	echo "\t</table>\n\t</td>\n</table>\n";						// fecha tabela (coluna 2); fecha tabela do formulário
	echo "<input type=\"submit\" value=\"Processar notas\">\n</form>\n\n<p>Para números decimais, utilize <b>ponto</b>. É permitido até duas casas decimais.<br><br>
<br><b>Dica:</b> Você pode atribuir uma nota para todos os alunos de uma única vez, basta inserir à frente de <i>http://myadress.site40.net/trabalho_php1/</i>, <b>?todanota=</b> e a nota que deseja inserir.
<br>Ficando desta maneira: <i>http://myadress.site40.net/trabalho_php1/index.php?todanota=8.74</i>, o resultado será todos os alunos com média <i>8.74</i>. 
<br>O processamento só é realizado após clicar no botão \"Processar notas\", sendo assim, é possível alterar as demais notas que não estiverem corretas.</p>\n\n</body>\n</html>";
?>