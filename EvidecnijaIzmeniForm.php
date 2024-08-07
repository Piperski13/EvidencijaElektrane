<?php
// OVO JE SUSTINSKO ODJAVLJIVANJE KORISNIKA
	   session_start();
     	   
	   // citanje vrednosti iz sesije
	   $korisnik=$_SESSION["korisnik"];
      
	  // ako nije prijavljen korisnik, vraca ga na pocetnu stranicu
				if (!isset($korisnik))
				{
					header ('Location:index.php');
				}	

// REALIZACIJA CITANJA hidden polja za filter radi pristupa, cita sa EvidencijaLista
$StariID=$_POST['ID'];

// KONEKTOVANJE NA BAZU
	require "klase/BaznaKonekcija.php";
	$KonekcijaObject = new Konekcija("klase/BaznaParametriKonekcije.xml");
	$KonekcijaObject->connect();
	$db_handle = $KonekcijaObject->konekcijaMYSQL;
	$bazapodataka=$KonekcijaObject->KompletanNazivBazePodataka;
	$UspehKonekcijeNaBazu=$KonekcijaObject->konekcijaDB;
	
	require "klase/BaznaTabela.php";
	
	// IZDVAJANJE PODATAKA KORISTECI KLASU VRSTE POGONA
	require "klase/DBVrstaPogona.php";
	$VrstaPogonaObject = new DBVrstaPogona($KonekcijaObject, "VrstaPogona");
	$VrstaPogonaObject->UcitajKolekcijuSvihVrstaPogona();
	$KolekcijaZapisa= $VrstaPogonaObject->Kolekcija;
	$UkupanBrojZapisa= $VrstaPogonaObject->BrojZapisa;

	// PREUZIMANJE STARIH VREDNOSTI ZA IZABRANU EVIDENCIJU ELEKTANE
	require "klase/DBEvidencijaElektrana.php";
	$EvidencijaObject = new DBEvidencijaElektrana($KonekcijaObject, 'EvidencijaElektrane');
	$EvidencijaObject->UcitajEvidencijuPoID($StariID);
	$KolekcijaZapisaEvidencija= $EvidencijaObject->Kolekcija;
	$UkupanBrojZapisaEvidencija = $EvidencijaObject->BrojZapisa;
	
	if ($UkupanBrojZapisaEvidencija>0) 
	{
		$row=0;  // prvi i jedini red ima taj id
		$StariID=$EvidencijaObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaEvidencija, $row, 0);
		$StariNazivElektrane=$EvidencijaObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaEvidencija, $row, 1);//mysql_result($result,$row,"REGISTARSKIBROJ");
		$StaroMesto=$EvidencijaObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaEvidencija, $row, 2);
		$StaraAdresa=$EvidencijaObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaEvidencija, $row, 3);
		$StariDatumPustanjaURad=$EvidencijaObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaEvidencija, $row, 4);
		$StaraSifraVrstePogona=$EvidencijaObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisaEvidencija, $row, 5);
		
	}         

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="sr-RS" xml:lang="sr-RS">
<meta charset="UTF-8">
<head>
<title>Евиденција електране</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
<script src="JavaScript/provera.js"> </script>
</head>
<body>

<!-----VELIKA TABELA KOJA SADRZI SVE---->
<!-----10% SADRZAJ 10%---->
<table class="no-spacing" style="width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0" style="border-spacing: 0;">

<!-------------------------- ZAGLAVLJE ------->
<?php include 'delovi/zaglavljewelcome.php';?>


<!-------------------------- DONJI DEO  ------->
<tr style="padding:0px;">

<!-----LEVO PRAZNINA---->
<td style="width:10%;">
</td>

<!------------------------------------------------------------------------------------------->
<!---------------------- SREDINA DONJEG DELA SA SADRZAJEM pocinje ovde ---------------------->
<td align="center" valign="middle" style="width:80%; padding:0" > 

<table style="width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0" bgcolor="#003366">

<tr>
<td style="width:1%;">
</td>

<td style="width:15%;padding:0" cellspacing="0" cellpadding="0" border="0" valign="top">
<?php include 'delovi/menilevoadmin.php';?>
</td>

<td style="width:1%;">
</td>

<td style="width:80%;padding:0" cellspacing="0" cellpadding="0" border="0" valign="top">
<!------- GLAVNI SADRZAJ desno ----------->  
<?php include 'delovi/desnoEvidencijaIzmeniForm.php';?>
</td>

<td style="width:1%;">
</td>

</tr>
</table>

</td>
<!---------------------- SADRZAJ zavrsava ovde ---------------------->

<!-----DESNO PRAZNINA---->
<td style="width:10%;">
</td>

</tr>
<!---------------------- DONJI DEO zavrsava ovde ---------------------->


<tr style="padding:0px;">
<td style="width:10%;"></td>
<td align="center" valign="middle"></td>
<td style="width:10%;"></td>
</tr>
<!--- DONJI DEO sa donjom ivicom zavrsava ovde  ------->
<!-- footer panel starts here -->
<?php include 'delovi/footer.php';?>

</table>

</body>
</html>
