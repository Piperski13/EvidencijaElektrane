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

	   if (isset($_POST['sifraVrstePogona']))
	   {
		$sifraVrstePogona=$_POST['sifraVrstePogona'];
	   }
	   else // ako nije nista promenjeno
	   {
		$StariSifraVrstePogona=$_POST['sifraVrstePogona'];
		$sifraVrstePogona=$StariSifraVrstePogona;
	   }
	  
	   // koristimo klasu za poziv procedure za konekciju
		require "klase/BaznaKonekcija.php";
		require "klase/BaznaTabela.php";
		$KonekcijaObject = new Konekcija('klase/BaznaParametriKonekcije.xml');
		$KonekcijaObject->connect();
		if ($KonekcijaObject->konekcijaDB) // uspesno realizovana konekcija ka DBMS i bazi podataka
		{	
			require "klase/DBEvidencijaElektrana.php";
			$EvidencijaObject = new DBEvidencijaElektrana($KonekcijaObject, 'EvidencijaElektrana');
			$greska=$EvidencijaObject->IzmeniEvidenciju($StariID, $id, $nazivElektrane, $mesto, $adresa, $datumPustanjaURad, $sifraVrstePogona);
		}
		else
		{
			echo "Nije uspostavljena konekcija ka bazi podataka!";
		}
		
    $KonekcijaObject->disconnect();
	   
	// prikaz uspeha aktivnosti	
	//echo "Ukupno procesirano $retval zapisa";
	//echo "Greska $greska";	

	header ('Location:EvidencijaLista.php');	
		
	  
      ?>
