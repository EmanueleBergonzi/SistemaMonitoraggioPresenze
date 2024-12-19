<?php
require_once('DbFunctions.php');

class LogInFuncs extends DBFuncs 
{
    private function select_($campo)
    {
        $query="SELECT :campo FROM dipendenti";
        return $this->dbSelect($query,[':campo'=>$campo] );
    }
    public function check($codice,$nome,$cognome)
    {
        $rowsCodici=$this->select_('codice');
        $rowsNomi=$this->select_('nome');
        $rowsCognomi=$this->select_('cognome');
        $oks=['codice'=>false,'nome'=>false,'cognome'=>false,'admin'=>false];
        $oks['codice']=$this->singlechecks($rowsCodici,$codice);
        $oks['nome']=$this->singlechecks($rowsNomi,$nome);
        $oks['cognome']=$this->singlechecks($rowsCognomi,$cognome);
        $oks['admin']=$this->selectAd($codice);
        return $oks;
    }
    private function singlechecks($rows,$campo)
    {
        foreach($rows as $dato)
        {
            if($dato==$campo)
            return true;
        }
        return false;
    }
    private function selectAd($codice)
    {
        $query="SELECT admin From dipendenti where codice=?";
        return $this->dbSelect($query,[$codice] );
    }

}