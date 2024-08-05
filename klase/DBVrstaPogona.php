<?php
class DBVrstaPogona extends Tabela 
{
// ATRIBUTI
private $bazapodataka;
private $UspehKonekcijeNaDBMS;
//
public $Sifra;
public $Naziv; 
public $UkupanBrojElektrana;

// METODE

// konstruktor

public function UcitajKolekcijuSvihVrstaPogona()
{
$SQL = "select * from `VrstaPogona` ORDER BY Naziv ASC";
$this->UcitajSvePoUpitu($SQL); // puni atribut bazne klase Kolekcija
//return $this->Kolekcija; // uzima iz baznek klase vrednost atributa
}

public function InkrementirajBrojEvidencija($IDStatusa)
{
	
	$KriterijumFiltriranja="Sifra='".$IDStatusa."'";
	$StaraVrednostUkBrEvidencija=$this->DajVrednostJednogPoljaPrvogZapisa ('UkupanBrojElektrana', $KriterijumFiltriranja, 'UkupanBrojElektrana'); 
	
	// izracunavanje nove vrednosti
	$NovaVrednostUkBrEvidencija=$StaraVrednostUkBrEvidencija + 1;
	
	// izvrsavanje izmene
    $SQL = "UPDATE `".$this->NazivBazePodataka."`.`VrstaPogona` SET UkupanBrojElektrana=".$NovaVrednostUkBrEvidencija." WHERE Sifra='".$IDStatusa."'";
	$greska= $this->IzvrsiAktivanSQLUpit($SQL);

	return $greska;
	
	}
}

?>
