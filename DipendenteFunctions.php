<?

class DipedenteFuncs extends DbFuncs
{
    function selectDipendenti()
    {
        $query="SELECT * FROM dipedente";
        return $this->select($query, []);

    }
    function slctDipeGrbyMansWhrPres($mansione)
    {
        $query="SELECT d.codice FROM dipendente d inner join dipartimento dip on d.IdDipa=dip.IdDipa inner join scheda s on d.IdDipe=s.IdDipe where dip.mansione=? and ";
        return $this->select($query, [$mansione]);
    }
    function slcAllDipendenti()
    {
        $query="SELECT d.nome, d.cognome, d.codice, d.data_nascita, d.codice, d.admin from dipendenti";
        return $this->select($query,[]);
    }
    function selectSingle($id)
    {
        $query="SELECT d.nome, d.cognome, d.codice, d.data_nascita, d.codice, d.admin from dipendenti d inner join scheda s on d.IdDipe=s.IdDipe where IdDipe=?";
        return $this->selectbyid($query,[$id]);
    }

    function selectLates()
    {
        $query="SELECT d.nome, d.cognome, d.codice from dipendenti d inner join scheda s on d.IdDipe=s.IdDipe where s.orario_inizio>09:00:00"
    }
}