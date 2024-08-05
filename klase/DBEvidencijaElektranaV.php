<?php
class DBEvidencijaElektrana extends Tabela 
// rad sa pogledom
{

// METODE

// konstruktor

public function DajSvePodatkeOEvidenciji($filterParametar)
{
	if (isset($filterParametar))
	{
		// nad pogledom se moze dodati filter, jer se pogled koristi kao da je tabela
		$upit="select * from `".$this->NazivBazePodataka."`.`SviPodaciOEvidenciji` where `ID`='".$filterParametar."'";
	}
	else
	{
		$upit="select * from `".$this->NazivBazePodataka."`.`SviPodaciOEvidenciji`";
	}
	$this->UcitajSvePoUpitu($upit);
	// sada raspolazemo sa:
	//$this->Kolekcija 
	//$this->BrojZapisa
}


}
?>
