<?php
require_once('DbFunctions.php');

class LogInFuncs extends DBFuncs 
{
    private function selectCod()
    {
        $query="SELECT codice FROM dipendenti";
        return $this->dbSelect($query,[] );
    }
    public function check($codice)
    {
        $rows=$this->selectCod();
        $oks=[2];
        foreach($rows as $dato)
        {
            if($dato=$codice)
            $oks['codice']=true;
        }
        $oks['admin']=$this->selectAd($codice);
        return $oks;
    }
    private function selectAd($codice)
    {
        $query="SELECT admin From dipendenti where codice=?";
        return $this->dbSelect($query,[$codice] );
    }
}