 <?php
        
		//session_start();  
	   // citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	   //$idkorisnika=$_SESSION["idkorisnika"];
	   
	      // -------------------------------------
		// UPLOAD FAJLA SLIKE


	   
	   // preuzimanje vrednosti sa forme
	   $ID=$_POST['id'];
	   $NazivElektrane=$_POST['nazivElektrane'];
	   $Mesto=$_POST['mesto'];
	   $Adresa=$_POST['adresa'];
	   $DatumPustanjaURad=$_POST['datumPustanjaURad'];
	   $SifraVrstePogona=$_POST['sifraVrstePogona'];
	   
	   //KONEKCIJA KA SERVERU
	
// koristimo klasu za poziv procedure za konekciju
	require "klase/BaznaKonekcija.php";
	require "klase/BaznaTabela.php";
	$KonekcijaObject = new Konekcija('klase/BaznaParametriKonekcije.xml');
	$KonekcijaObject->connect();
	if ($KonekcijaObject->konekcijaDB) // uspesno realizovana konekcija ka DBMS i bazi podataka
    {	
	// provera poslovne logike
		//require "klase/Evidencija.php";
		//$EvidencijaObject = new Evidencija($KonekcijaObject, 'EvidencijaElektrane');
		//$dozvoljenaEvidencija=$EvidencijaObject->DaLiImaMestaZaEvidencijuElektrane($statusEvidencijaElektrana);
			
		//if ($dozvoljenaEvidencija=="DA")
			//{
		//echo "USPESNA KONEKCIJA";
		require "klase/BaznaTransakcija.php";
		$TransakcijaObject = new Transakcija($KonekcijaObject);
		$TransakcijaObject->ZapocniTransakciju();
		
		require "klase/DBEvidencijaElektrana.php";
		$EvidencijaObject = new DBEvidencijaElektrana($KonekcijaObject, 'EvidencijaElektrana');
		$EvidencijaObject->ID=$ID;
		$EvidencijaObject->NazivElektrane=$NazivElektrane;
		$EvidencijaObject->Mesto=$Mesto;
		$EvidencijaObject->Adresa=$Adresa;
		$EvidencijaObject->DatumPustanjaURad=$DatumPustanjaURad;
		$EvidencijaObject->SifraVrstePogona=$SifraVrstePogona;
		$greska1=$EvidencijaObject->DodajNovuEvidenciju();
		
		// inkrement broja studenata kroz klasu DBSmer
        require "klase/DBVrstaPogona.php";
		$VrstaPogonaObject = new DBVrstaPogona($KonekcijaObject, 'VrstaPogona');
		$greska2=$VrstaPogonaObject->InkrementirajBrojEvidencija($SifraVrstePogona);
		
		// zatvaranje transakcije
		//$UtvrdjenaGreska=$greska1 or $greska2;
		$UtvrdjenaGreska=$greska1.$greska2;
		$TransakcijaObject->ZavrsiTransakciju($UtvrdjenaGreska);
        	
		} // od if db selected

      // ZATVARANJE KONEKCIJE KA DBMS
	  $KonekcijaObject->disconnect();
	
	// prikaz uspeha aktivnosti	
	
	if ($UtvrdjenaGreska) {
	echo "Greska $UtvrdjenaGreska";	
     }	
	 else
	 {
		//echo "Snimljeno!";	
		header ('Location:EvidencijaLista.php');		
	 }
		
	  
      ?>

