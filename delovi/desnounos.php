
<meta charset="UTF-8">
<!--==================================== SADRZAJ STRANICE DESNO pocinje ovde ------------------------------>
<img src="images/sredinagore.jpg" width="100%" height="3" alt="" class="flt1 rp_topcornn" /> 

<table style="width:100%;style="width:100%; padding:0" align="left" cellspacing="0" cellpadding="0" border="0"  bgcolor="#ffffff">
<tr>
<td style="width:5%;">
</td>

<td align="left">
<br/>
<b><font face="Trebuchet MS" color="darkblue" size="4px">  </font></b>
<table style="width:100%;" bgcolor="#ffffff" padding:0" align="left" cellspacing="0" cellpadding="0" border="0">

<tr>
<td style="width:3%;">
</td>
<td align="left">
<font color="#ffffff" size="1px">.</font>
</td>
<td style="width:3%;">
</td>
</tr>

<tr>
<td style="width:3%;">
</td>
<td align="left">
<b><font face="Trebuchet MS" color="black" size="3px">УНОС НОВЕ ЕВИДЕНЦИЈЕ</b></br>
</td>
<td style="width:3%;">
</td>
</tr>

<tr>
<td style="width:3%;">
</td>
<td align="left">
<font color="#ffffff" size="1px">.</font>
</td>
<td style="width:3%;">
</td>
</tr>

<tr>
<td style="width:3%;">
</td>

<td align="left">


<!------------------------FORMA ZA UNOS ---- ACTION="evidencijasnimi.php" --->
<table style="width:50%;" bgcolor="#ffffff" padding:0" align="left" cellspacing="0" cellpadding="0" border="0">
<form name="FormaZaUnosEvidencije" action="evidencijasnimi.php" METHOD="POST" enctype="multipart/form-data" >

<tr>
<td align="left" valign="bottom">     
<b><font face="Trebuchet MS" color="black" size="2px">ИД:</font></b>
</td>
<td align="left" valign="bottom">
<input name="id" type="number" size="50" placeholder="Унесите ИД"  />
</td>
</tr>

<tr>
<td align="left" valign="bottom">
<font face="Trebuchet MS" color="#ffffff" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>

<tr>
<td align="left" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Назив електране:</font><br/></b>
</td>
<td align="center" valign="bottom">
<input name="nazivElektrane" type="text" size="50" placeholder="Унесите назив електране"/>
</td>
</tr>

<tr>
<td align="left" valign="bottom">
<font face="Trebuchet MS" color="#ffffff" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>

<tr>
<td align="left" valign="bottom" style="padding-right:200px;">
<b><font face="Trebuchet MS" color="black" size="2px">Место:</font><br/></b>
</td>
<td align="left" valign="bottom">
<input name="mesto" type="text"  placeholder="Унесите место"/>
</td>
</tr>

<tr>
<td align="left" valign="bottom">
<font face="Trebuchet MS" color="#ffffff" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>

<tr>
<td align="left" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Адреса:</font><br/></b>
</td>
<td align="center" valign="bottom">
<input name="adresa" type="text" size="50" placeholder="Унесите назив адресе"/>
</td>
</tr>

<tr>
<td align="left" valign="bottom">
<font face="Trebuchet MS" color="#ffffff" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>
<tr>
<td align="left" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Датум пуштања у рад:</font><br/></b>
</td>
<td align="left" valign="bottom">
<input name="datumPustanjaURad" type="date" size="50" placeholder="Унесите датум пуштања у рад"/>
</td>
</tr>

<tr>
<td align="left" valign="bottom">
<font face="Trebuchet MS" color="#ffffff" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>

<tr>
<td align="left" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Шифра пуштања у погон:</font><br/></b>
</td>
<td align="left" valign="bottom">
<select name="sifraVrstePogona" required TABINDEX=7>		
	<option value="">изаберите...</option>
	<?php
	// upis vrednosti iz bp 
		
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


</td>
</tr>

<tr>
<td align="left" valign="bottom">
<font face="Trebuchet MS" color="#ffffff" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>




<!-------------------------- prazan red ------->
<tr>
<td align="left" valign="bottom">
<font face="Trebuchet MS" color="#ffffff" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
<font face="Trebuchet MS" color="#ffffff" size="2px">.</font><br/>
</td>
<tr>

<td>       
</td>
<td><input TYPE="submit" name="snimiButton" value="СНИМИ" TABINDEX=3/>
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
<td align="left">
<font color="#ffffff" size="1px">.</font>
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
    