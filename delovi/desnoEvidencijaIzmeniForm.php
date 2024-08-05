
<meta charset="UTF-8">
<!--==================================== SADRZAJ STRANICE DESNO pocinje ovde ------------------------------>
<img src="images/sredinagore.jpg" width="100%" height="3" alt="" class="flt1 rp_topcornn" /> 

<table style="width:100%;style="width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0"  bgcolor="#D8E7F4">
<tr>
<td style="width:5%;">
</td>

<td align="left">
<br/>
<b><font face="Trebuchet MS" color="darkblue" size="4px">  </font></b>
<table style="width:100%;" bgcolor="#D8E7F4" padding:0" align="center" cellspacing="0" cellpadding="0" border="0">

<tr>
<td style="width:3%;">
</td>
<td align="center">
<font color="#D8E7F4" size="1px">.</font>
</td>
<td style="width:3%;">
</td>
</tr>

<tr>
<td style="width:3%;">
</td>
<td align="center">
<b><font face="Trebuchet MS" color="black" size="3px">ИЗМЕНА ПОДАТАКА ЕВИДЕЦНИЈЕ</b></br>
</td>
<td style="width:3%;">
</td>
</tr>

<tr>
<td style="width:3%;">
</td>
<td align="center">
<font color="#D8E7F4" size="1px">.</font>
</td>
<td style="width:3%;">
</td>
</tr>

<tr>
<td style="width:3%;">
</td>

<td align="center">


<!------------------------FORMA ZA UNOS ---- ACTION="studentsnimi.php" --->
<table style="width:50%;" bgcolor="#D8E7F4" padding:0" align="center" cellspacing="0" cellpadding="0" border="0">
<form name="FormaZaUnosEvidencija" action="EvidencijaIzmeni.php" METHOD="POST" enctype="multipart/form-data" >

<tr>
<td align="right" valign="bottom">     
<b><font face="Trebuchet MS" color="black" size="2px">ИД:&nbsp;&nbsp;</font></b>
</td>
<td align="left" valign="bottom">
<input name="id" type="number" size="50" value="<?php echo $StariID; ?>"  />
<input type="hidden" name="StariID" value="<?php echo $StariID; ?>">

</td>
</tr>

<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Назив електране:&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<input name="nazivElektrane" type="text" size="50" value="<?php echo $StariNazivElektrane; ?>"/>
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Место:&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<input name="mesto" type="text" size="50" value="<?php echo $StaroMesto; ?>"/>
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Адреса:&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<input name="adresa" type="text" size="50" value="<?php echo $StaraAdresa; ?>"/>
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>
<tr>
<td align="right" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Датум пуштања у рад:&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<input name="datumPustanjaURad" type="date" size="50" value="<?php echo $StariDatumPustanjaURad; ?>"/>
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>

<tr>
<td align="right" valign="top">
<b><font face="Trebuchet MS" color="black" size="2px">Шифра врсте погона:&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<select name="sifraVrstePogona" required TABINDEX=7>		
	<option value="">изаберите...</option>
	<?php
	// upis vrednosti iz bp - Tip vozila
		
	// PREDSTAVLJANJE U OPTION KROZ FOR CIKLUS
	if ($UkupanBrojZapisa>0) 
	{					
		for ($brojacEvidencija = 0; $brojacEvidencija < $UkupanBrojZapisa; $brojacEvidencija++) 
			{
				$sifraVrstePogona =$VrstaPogonaObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisa, $brojacEvidencija, 0);
				$nazivEE=$VrstaPogonaObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisa, $brojacEvidencija, 1);					
				echo "<option value=\"$sifraVrstePogona\">$nazivEE</option>";						
			} //for
										
	} // 
	
	?>
		
</select>
<br/>
<font face="Trebuchet MS" color="black" size="2px">Стара шифра врсте погона: <?php echo $StaraSifraVrstePogona; ?></font>
<input type="hidden" name="staraSifraVrstePogona" value="<?php echo $StaraSifraVrstePogona; ?>">

</td>
</tr>

<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>



<!-------------------------- prazan red ------->
<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<tr>

<td>       
</td>
<td><input TYPE="submit" name="snimiButton" value="СНИМИ ИЗМЕНУ" TABINDEX=3/>
</td>
</form>
</table>

</td>
<td style="width:3%;">
</td>
</tr>

<tr>
<td style="width:3%;">
</td>
<td align="center">
<font color="#D8E7F4" size="1px">.</font>
</td>
<td style="width:3%;">
</td>
</tr>
</table>
</td>

<td style="width:5%;">
</td>

</tr>
</table>
<img src="images/sredinadole.jpg" width="100%" height="5" alt="" class="flt1" /> 
    