<?php
class Evidencija extends Tabela 
{
// ATRIBUTI
private $bazapodataka;
private $UspehKonekcijeNaDBMS;
//
// METODE

// konstruktor nasledjuje od bazne klase Tabela

public function DaLiImaMestaZaEvidencijuElektrane($SifraVrstePogonaParametar)
{
// incijalizacija promenljive za izlaz
$odgovor="NE";

// izdvajanje ogranicenja iz XML
$xml=simplexml_load_file("klase/".$SifraVrstePogonaParametar.".xml") or die("Nije uspesno ucitavanje fajla sa ogranicenjem!");
$maxBrojEvidencijaElektrana=$xml->maxBrojEvidencijaElektrana;

// izdvajanje koliko trenutno imamo upisanih za tu vrstu signalizacije u bazi podataka
$NazivTrazenogPolja="`UkupanBrojElektrana`";
$KriterijumFiltriranja="`Sifra`='".$SifraVrstePogonaParametar."'";
$KriterijumSortiranja="`Sifra`"; // nema potrebe da se sortira, ali ne menjamo baznu klasu
$trenutanBrojEvidencijaElektrana=$this->DajVrednostJednogPoljaPrvogZapisa($NazivTrazenogPolja, $KriterijumFiltriranja, $KriterijumSortiranja); 

// uporedjivanje max i trenutno i odlucivanje
if ($trenutanBrojEvidencijaElektrana<$maxBrojEvidencijaElektrana)
{
$odgovor="DA";
}
else
{
$odgovor="NE";
}

//vracanje odgovora
return $odgovor;
}


}
?>
