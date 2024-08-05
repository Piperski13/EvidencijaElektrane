<?php
class DBEvidencijaElektrana extends Tabela 
// rad sa stored procedurom za snimanje novog studenta
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

public function DodajNovuEvidenciju()
{

	
	
		$GreskarezultatPar1 = $this->IzvrsiAktivanSQLUpit ("SET @IDParametar='".$this->ID."'");
		
		$GreskarezultatPar2 = $this->IzvrsiAktivanSQLUpit ("SET @NazivElektraneParametar='".$this->NazivElektrane."'");
		
		$GreskarezultatPar3 = $this->IzvrsiAktivanSQLUpit ("SET @MestoParametar='".$this->Mesto."'");
		
		$GreskarezultatPar4 =  $this->IzvrsiAktivanSQLUpit ("SET @AdresaParametar='".$this->Adresa."'");
		
		$GreskarezultatPar5 = $this->IzvrsiAktivanSQLUpit (  "SET @DatumPustanjaURadParametar='".$this->DatumPustanjaURad."'");
		
		$GreskarezultatPar6 = $this->IzvrsiAktivanSQLUpit (  "SET @SifraVrstePogonaParametar='".$this->SifraVrstePogona."'");
		
		$GreskarezultatCall = $this->IzvrsiAktivanSQLUpit ( "CALL `DodajNovuEvidenciju`(@IDParametar, @NazivElektraneParametar, @MestoParametar, @AdresaParametar, @DatumPustanjaURadParametar,@SifraVrstePogonaParametar);");
		 
	
	$greska=$GreskarezultatPar1.$GreskarezultatPar2.$GreskarezultatPar3.$GreskarezultatPar4.$GreskarezultatPar5.$GreskarezultatPar6.$GreskarezultatCall;
	return $greska;
}


}
?>
