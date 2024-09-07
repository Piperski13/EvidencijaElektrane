<?php
        
		session_start();  
	   // citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	   $korisnik=$_SESSION["korisnik"];
      
	  // ako nije prijavljen korisnik, vraca ga na pocetnu stranicu
				if (!isset($korisnik))
				{
					header ('Location:index.php');
				}	
	   
	   // preuzimanje vrednosti sa forme
	   $IdZaBrisanje=$_POST['ID'];
		 $NazivVrstaPogona=$_POST['SifraVrstePogona'];
	   
      // koristimo klasu za poziv procedure za konekciju
	require "klase/BaznaKonekcija.php";
	require "klase/BaznaTabela.php";
	$KonekcijaObject = new Konekcija('klase/BaznaParametriKonekcije.xml');
	$KonekcijaObject->connect();
	if ($KonekcijaObject->konekcijaDB) // uspesno realizovana konekcija ka DBMS i bazi podataka
    {	
		require "klase/DBEvidencijaElektrana.php";
		$EvidencijaObject = new DBEvidencijaElektrana($KonekcijaObject, 'EvidencijaElektrana');
		$greska=$EvidencijaObject->ObrisiEvidenciju($IdZaBrisanje);

		// dekrement broja primena kroz klasu DBVrstaPogona
		require "klase/DBVrstaPogona.php";
    $VPObject = new DBVrstaPogona($KonekcijaObject, 'VrstaPogona');

    // Pronađi sifru
    $sifraVrstapogona = $VPObject->DajSifruNaOsnovuNaziva($NazivVrstaPogona);
    
    if ($sifraVrstapogona !== null) {
        // Dekrement broja primena
        $greska2 = $VPObject->DekrementirajBrojEvidencija($sifraVrstapogona);
    } else {
        error_log("Sifra za naziv '" . $NazivVrstaPogona . "' nije pronađena.");
    }
	}
		
    $KonekcijaObject->disconnect();
	
	// prikaz uspeha aktivnosti	
	//echo "Ukupno procesirano $retval zapisa";
	//echo "Greska $greska";	

	header ('Location:EvidencijaLista.php');	
		
	  
      ?>


