<?php
class DBEvidencijaElektrana extends Tabela 
{
// ATRIBUTI
private $bazapodataka;
private $UspehKonekcijeNaDBMS;
//
public $ID;
public $NazivElektrane;
public $Mesto;
public $Adresa;
public $DatumPustanjaURad;
public $SifraVrstePogona;

// METODE

// konstruktor

public function DajKolekcijuSvihEvidencija()
{
$SQL = "select * from `EvidencijaElektrana` ORDER BY ID ASC";
$this->UcitajSvePoUpitu($SQL); // puni atribut bazne klase Kolekcija
return $this->Kolekcija; // uzima iz baznek klase vrednost atributa
}

public function UcitajEvidencijuPoID($IDParametar)
{
$SQL = "select * from `EvidencijaElektrana` where `ID`='".$IDParametar."'";
$this->UcitajSvePoUpitu($SQL); // puni atribut bazne klase Kolekcija
// raspolazemo sa:
// $Kolekcija;
//  $BrojZapisa;
}

public function DodajNovuEvidenciju()
{
	$SQL = "INSERT INTO `EvidencijaElektrana` (ID, NazivElektrane, Mesto, Adresa, DatumPustanjaURad, SifraVrstePogona) VALUES ('$this->ID', '$this->NazivElektrane', '$this->Mesto', '$this->Adresa', '$this->DatumPustanjaURad', '$this->SifraVrstePogona')";
	$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	return $greska;
}



public function ObrisiEvidenciju($IdZaBrisanje)
{
	$SQL = "DELETE FROM `EvidencijaElektrana` WHERE ID='".$IdZaBrisanje."'";
	$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	return $greska;
}

// TO DO

public function IzmeniEvidenciju($StariID, $id, $nazivElektrane, $mesto, $adresa, $datumPustanjaURad, $sifraVrstePogona)
{
	$SQL = "UPDATE `EvidencijaElektrana` SET ID='".$id."', NazivElektrane='".$nazivElektrane."',Mesto='".$mesto."', Adresa='".$adresa."', DatumPustanjaURad='".$datumPustanjaURad."', SifraVrstePogona='".$sifraVrstePogona."' WHERE ID='".$StariID."'";
	$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	return $greska;
}

// ostale metode 




}
?>
