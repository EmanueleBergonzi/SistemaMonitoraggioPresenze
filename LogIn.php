<?
require('DBCLASSES/LogInFuncs.php');
require_once('DBCLASSES/Config.php');
$codice=$_POST['codice'];
$nome_intero=$_POST['nome_cognome']->split(' ');
$check=new LogInFuncs($pdo);
$oks=$check->check($codice,$nome_intero[0],$nome_intero[1]);
if($oks['codice']==true && $oks['nome']==true && $oks['cognome']==true)
{
    if($oks['admin']=true)
    header('Location: admin.php');
    else
    header('Location: dipdendente.php');
}
else
header('Location: LogIn.html');
