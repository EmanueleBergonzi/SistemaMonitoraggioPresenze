<?

class SchedaFuncs extends DbFuncs
{
    function selectScheda($codice)
    {
        $query="SELECT s.orario_entrata, s.orario_uscita, s.note  FROM scheda INNER JOIN dipendente d on s.IdDipe=d.IdDpe where d.codice=?";
        return $this->dbSelect($query, [$codice]);
    }
    
}