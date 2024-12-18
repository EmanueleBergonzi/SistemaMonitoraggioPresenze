<?

class DipedenteFuncs extends DbFuncs
{
    function selectDipendenti()
    {
        $query = "SELECT * FROM dipendente";
        return $this->dbSelect($query, []);
    }

    function slctDipeGrbyMansWhrPres($mansione)
    {
        $query = "SELECT d.codice 
                  FROM dipendente d 
                  INNER JOIN dipartimento dip ON d.IdDipa = dip.IdDipa 
                  INNER JOIN scheda s ON d.IdDipe = s.IdDipe 
                  WHERE dip.mansione = ? AND s.orario_entrata IS NOT NULL";
        return $this->dbSelect($query, [$mansione]);
    }

    function slcAllDipendenti()
    {
        $query = "SELECT d.nome, d.cognome, d.codice, d.data_nascita, d.admin 
                  FROM dipendente d";
        return $this->dbSelect($query, []);
    }

    function selectSingle($id)
    {
        $query = "SELECT d.nome, d.cognome, d.codice, d.data_nascita, d.admin 
                  FROM dipendente d 
                  INNER JOIN scheda s ON d.IdDipe = s.IdDipe 
                  WHERE d.IdDipe = ?";
        return $this->dbSelect($query, [$id]);
    }

    function selectLates()
    {
        $query = "SELECT d.nome, d.cognome, d.codice 
                  FROM dipendente d 
                  INNER JOIN scheda s ON d.IdDipe = s.IdDipe 
                  WHERE TIME(s.orario_entrata) > '09:00:00'";
        return $this->dbSelect($query, []);
    }
}
