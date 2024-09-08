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

	public function DekrementirajBrojEvidencija($IDStatusa)
{
    $IDStatusa = (int)$IDStatusa; // Osigurava da je int za SQL query

    // Kriterijum filtriranja na osnovu IDStatusa
    $KriterijumFiltriranja = "Sifra=" . $IDStatusa;
    
    // Uzimanje trenutne vrednosti UkupanBrojElektrana
    $StaraVrednostUkBrElektrana = $this->DajVrednostJednogPoljaPrvogZapisa('UkupanBrojElektrana', $KriterijumFiltriranja, 'Sifra');
    

    // Provera da li je vrednost veća od 0 pre dekrementiranja
    if ($StaraVrednostUkBrElektrana > 0) {
        $NovaVrednostUkBrPrimena = $StaraVrednostUkBrElektrana - 1;

        // Izvršavanje SQL upita za ažuriranje
        $SQL = "UPDATE `" . $this->NazivBazePodataka . "`.`" . $this->NazivTabele . "` SET UkupanBrojElektrana=" . $NovaVrednostUkBrPrimena . " WHERE Sifra=" . $IDStatusa;
        error_log("SQL upit za dekrementiranje: " . $SQL);
        
        // Izvrši SQL upit
        $rezultat = mysqli_query($this->OtvorenaKonekcija->konekcijaDB, $SQL);
        
        if (!$rezultat) {
            $greska = "Greška pri izvršavanju SQL upita: " . mysqli_error($this->OtvorenaKonekcija->konekcijaDB);
            error_log($greska);
            return $greska;
        }
    } else {
        // Ako je trenutna vrednost 0 ili manja, nema smanjenja
        $greska = "Broj primena je već na minimalnoj vrednosti (0).";
        error_log($greska);
        return $greska;
    }

    return null; // Ako nema greške
}

public function DajSifruNaOsnovuNaziva($naziv)
{
    // Provera vrednosti naziva i vraćanje odgovarajuće šifre
    if ($naziv === 'Вода') {
        return 0;
    } elseif ($naziv === 'Ветар') {
        return 1;
    } elseif ($naziv === 'Угаљ') {
        return 2;
    } else {
        // Ako naziv ne odgovara nijednom poznatom vrednosti, vraća null
        error_log("Nepoznat naziv: " . $naziv);
        return null;
    }
}


}

?>
