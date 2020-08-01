<?php
//design
echo"<title>Há feira? | Paredes</title>";
echo"
<link rel='shortcut icon' type='image/png' href='imgs/favicon.png' />";
echo'
<meta name="description" content="Uma simples página dedicada à consulta dos dias de feira na cidade de Paredes, optimizada para quem usa o campo da feira como estacionamento." />';
echo'
<meta name="robots" content="Feira, Dias de feira, Paredes, Estacionamento" />';
echo'
<meta property="og:image" content="imgs/thumb.jpeg" />';
echo "
<style>
    { margin: 0; padding: 0; }

    html { 
        background: url('imgs/background.jpg') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
		}
</style>";
echo'
<img src="imgs/beta.png" height="100" width="100" align="Right">';
echo'
<img src="imgs/prd.png" height="100" width="100" align="Left">
';
echo "<br>
";
//hora e data
date_default_timezone_set('Europe/Lisbon');//fusohorario
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');//opcao data por extenso em pt
$datetm=new DateTime('tomorrow');//opcao data de amanha
$sysday = date("d");//dia de hoje
$sysdaytm=$datetm->format('d');//dia de amanha
$mes=strftime('%B', strtotime('today'));//mes de hoje por extenso
$mestm=strftime('%B', strtotime('tomorrow'));//mes de amanha por extenso
$ano=date("y");//ano atual
//fim hora e data
//mensagens html principais
$msg1 = ("<center><h1 style='font-size:900%;color:#ffffff;'>HOJE HÁ FEIRA</h1></center>
");
$msg2 = ("<center><h1 style='font-size:900%;color:#ffffff;'>HOJE NÃO HÁ FEIRA</h1></center>
");
$msg3 = ("<center><h1 style='font-size:500%;color:#ffffff;'>AMANHÃ HÁ FEIRA</h1></center>");
$msg4 = ("<center><h1 style='font-size:400%;color:#ffffff;'>AMANHÃ NÃO HÁ FEIRA</h1></center>");
$msg5 = ("<center><h1 style='font-size:700%;color:#ffffff;'>AINDA NÃO HÁ DATAS</h1></center>");
//fim mensagens html principais

//acesso aos ficheiros de datas
$meshoje = file_get_contents("./data/".$mes.".txt");//acesso ao ficheiro com as datas para o mes do dia de hoje
$mesamanha = file_get_contents("./data/".$mestm.".txt");//acesso ao ficheiro com as datas para o mes do dia de amanha
$anodasdatas = file_get_contents("./data/ano.txt");//acesso ao ficheiro com ano para o qual as datas estao definidas
//fim acesso aos ficheiros de datas

if ($ano==$anodasdatas){
	//inicio da selecao das mensagens ha ou nao ha feira
	if (strpos($meshoje, $sysday) == true){
			echo $msg1;}
			else {
				echo $msg2;}
	if (strpos($mesamanha, $sysdaytm) == true){
		   echo $msg3;}
		   else {
				echo $msg4;}
	//fim da selecao das mensagens ha ou nao ha feira

	//inicio dos restantes dias
	echo ("<center><p style='font-size:125%; color:#ffffff;'><b>Feiras durante o mês de ".$mes."".$meshoje."</b></p></center>");
	//fim dos restantes dias
	}
			else{
				echo $msg5;}

//rodape
echo'
<center><p style="font-size:100%; color:#ffffff;"><b>Feito com muito ♡ pelo Rui Moreira</b> <iframe src="https://ghbtns.com/github-btn.html?user=RuiJMoreira&repo=hafeira&type=fork&count=true" frameborder="0" scrolling="0" width="80" height="20" title="GitHub"></iframe></p></center>';

?>
