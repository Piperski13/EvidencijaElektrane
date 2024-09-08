<?php
        
		session_start();  
	   // citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	   // citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	   $korisnik=$_SESSION["korisnik"];
      
	  // ako nije prijavljen korisnik, vraca ga na pocetnu stranicu
				if (!isset($korisnik))
				{
					header ('Location:index.php');
				}	
	   

	      // -------------------------------------
		// UPLOAD FAJLA SLIKE


	   // preuzimanje vrednosti sa forme
	   $id=$_POST['id'];
	   $StariID=$_POST['StariID'];
	   $nazivElektrane=$_POST['nazivElektrane'];
	   $mesto=$_POST['mesto'];
	   $adresa=$_POST['adresa'];
	   $datumPustanjaURad=$_POST['datumPustanjaURad'];

		 $sifraVrstePogona=$_POST['sifraVrstePogona'];
		 $StaraSifraVrstePogona=$_POST['staraSifraVrstePogona'];
	  
	    // koristimo klasu za poziv procedure za konekciju
			require "klase/BaznaKonekcija.php";
			require "klase/BaznaTabela.php";
			require "klase/DBEvidencijaElektrana.php";
			require "klase/DBVrstaPogona.php";
			require "klase/Evidencija.php";
	
			$KonekcijaObject = new Konekcija('klase/BaznaParametriKonekcije.xml');
			$KonekcijaObject->connect();
	
			if ($KonekcijaObject->konekcijaDB) {	
					// Kreiraj objekte za evidenciju i vrstu pogona
					$EvidencijaObject = new DBEvidencijaElektrana($KonekcijaObject, 'EvidencijaElektrana');
					$VrstaPogonaObject = new DBVrstaPogona($KonekcijaObject, 'VrstaPogona');
					
					$EvidencijaObjectPravilo = new Evidencija($KonekcijaObject, 'vrstapogona');
					$dozvoljenaEvidencija=$EvidencijaObjectPravilo->DaLiImaMestaZaEvidencijuElektrane($sifraVrstePogona);
						
					if ($dozvoljenaEvidencija=="DA")
						{
	
					// Provera da li je šifra vrste pogona promenjena
					if ($sifraVrstePogona != $StaraSifraVrstePogona) {
							// Dekrementiraj staru šifru pogona
							$VrstaPogonaObject->DekrementirajBrojEvidencija($StaraSifraVrstePogona);
	
							// Inkrementiraj novu šifru pogona
							$VrstaPogonaObject->InkrementirajBrojEvidencija($sifraVrstePogona);
					}
	
					// Izvrši izmenu evidencije
					$greska = $EvidencijaObject->IzmeniEvidenciju($StariID, $id, $nazivElektrane, $mesto, $adresa, $datumPustanjaURad, $sifraVrstePogona);
			} else {
					echo "Nije uspostavljena konekcija ka bazi podataka!";
			}
		}
		
    $KonekcijaObject->disconnect();
	   
	// prikaz uspeha aktivnosti	
	//echo "Ukupno procesirano $retval zapisa";
	//echo "Greska $greska";	

	header ('Location:EvidencijaLista.php');	
		
	  
      ?>
