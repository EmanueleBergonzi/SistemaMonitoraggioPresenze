<?
require('DBCLASSES/LogInFuncs.php');
require_once('DBCLASSES/Config.php');
$dato=$_POST['codice'];
$check=new LogInFuncs($pdo);
$oks=$check->check($dato);
if($oks['codice']==true)
{
    if($oks['admin']=true)
    header('Location: admin.php');
    else
    header('Location: dipdendente.php');
}
else
header('Location: LogIn.html');
