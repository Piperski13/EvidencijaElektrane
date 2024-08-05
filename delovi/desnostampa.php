
<meta charset="UTF-8">
<!--==================================== SADRZAJ STRANICE DESNO pocinje ovde ------------------------------>
<img src="images/sredinagore.jpg" width="100%" height="3" alt="" class="flt1 rp_topcornn" /> 

<table style="width:100%;style="width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0"  bgcolor="#ffffff">

<tr>
<td style="width:5%;">
</td>

<td align="center" valign="middle"> 
<font face="Trebuchet MS" color="darkblue" size="5px">
<b>СПИСАК ЕВИДЕНЦИЈА</br> </font>


</td>

<td style="width:5%;">
</td>
</tr>


<tr>
<td style="width:5%;">
</td>

<td align="left">
<br/>
<font face="Trebuchet MS" color="darkblue" size="4px">

<?php
// PRETHODNI KOD PREUZIMA PODATKE I TO JE NA INDEX.PHP

if ($EvidencijaViewObject->BrojZapisa==0)
	{
		echo "НЕМА ЗАПИСА У ТАБЕЛИ!";
	}
else
	{
		// ------------ zaglavlje ----------------
		echo "<table style=\"width:90%; padding:0\" align=\"center\" cellspacing=\"0\" cellpadding=\"0\" border=\"1\"  bgcolor=\"#ffffff\">";
		echo "<tr>";
		echo "<td style=\"width:15%;\">";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ИД ЕВИДЕНЦИЈЕ</font><br/>";
		echo "</td>";
		echo "<td style=\"width:15%;\">";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">НАЗИВ ЕЛЕКТРАНЕ</font><br/>";
		echo "</td>";
		echo "<td style=\"width:15%;\">";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">МЕСТО</font><br/>";
		echo "</td>";
		echo "<td style=\"width:15%;\">";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">АДРЕСА</font><br/>";
		echo "</td>";
		echo "<td style=\"width:20%;\">";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ДАТУМ ПУШТАЊА У РАД</font><br/>";
		echo "</td>";
		echo "<td style=\"width:20%;\">";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ШИФРА ВРСТЕ ПОГОНА</font><br/>";
		echo "</td>";
		echo "</tr>";

		for ($RBZapisa = 0; $RBZapisa < $EvidencijaViewObject->BrojZapisa; $RBZapisa++) 
		{
							
		// CITANJE VREDNOSTI IZ MEMORIJSKE KOLEKCIJE $RESULT I DODELJIVANJE PROMENLJIVIM
		$ID=$EvidencijaViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($EvidencijaViewObject->Kolekcija, $RBZapisa, 0);
		$NazivElektrane=$EvidencijaViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($EvidencijaViewObject->Kolekcija, $RBZapisa, 1);
		$Mesto=$EvidencijaViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($EvidencijaViewObject->Kolekcija, $RBZapisa, 2);
		$Adresa=$EvidencijaViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($EvidencijaViewObject->Kolekcija, $RBZapisa, 3);
		$DatumPustanjaURad=$EvidencijaViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($EvidencijaViewObject->Kolekcija, $RBZapisa, 4);
		$SifraVrstePogona=$EvidencijaViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($EvidencijaViewObject->Kolekcija, $RBZapisa, 5);		

	
	

	// CRTANJE REDA TABELE SA PODACIMA
	echo "<tr>";
		echo "<td>";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$ID</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$NazivElektrane</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$Mesto</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$Adresa</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$DatumPustanjaURad</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$SifraVrstePogona</font><br/>";
		echo "</td>";
	echo "</tr>";

	}  //za for 
	echo "</table>";
	echo "<br/>";
	echo "<br/>";
	echo "УКУПАН БРОЈ ЕВИДЕНЦИЈА:".$EvidencijaViewObject->BrojZapisa;
}
$KonekcijaObject->disconnect();

?>



</td>

<td style="width:5%;">
</td>

</tr>
</table>

    