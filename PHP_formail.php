<?

// PHP Variablen
// Kontaktdaten
$von = $_POST['name'];
$born = $_POST['geburtsdatum'];
$email = $_POST['email'];
$telefon = $_POST['telefon'];
// Autodaten
$marke = $_POST['marke'];
$typ = $_POST['typ'];
$jahrgang = $_POST['jahrgang'];
$farbe = $_POST['farbe'];
$km = $_POST['km'];
$preis = $_POST['preis'];
$zusatz = $_POST['zusatz'];


//Ab hier konfigurieren ---------------------------------------------------------------------

//email des Empfängers
$webmas="info@auto-guenstig24.ch";

//hier websitenamen eingeben
$site="www.auto-guenstig24.ch";

//hier die nachricht an sie selbst eingeben
$message="hallo,\n\n";
$message.="ein besucher von ihrer website hat ihr kontakt-formular benutzt\n";
$message.="sein name ist $von und seine email adresse ist $email\n";
$message.="die postadresse und die tel/faxnummer: $postadresse, $telfaxnummer\n";
$message.="der betreff: $betreff\n";
$message.="und die nachricht an sie:\n\n";
$message.="$nachricht";

//STOP bis hier konfigurieren --------------------------------------------------------------
$header="From: $von<$email>\nReply-To: $email\nX-Mailer: PHP/" . phpversion();
$headers="From: $site<$webmas>\nReply-To: $email\nX-Mailer: PHP/" . phpversion();
//if($von!="" && $email!="" && $betreff!="" && $nachricht!="" || $von!="Vor- und Nachname" && $email!="Bitte geben Sie ihre wahre E-mail Adresse an!" && $betreff!="Bitte einen Betreff angeben" && $nachricht!="Ihre Nachricht an Uns"){
mail($webmas, "Anfrage", $message, $header);
$datei = fopen( "PHP_formail.dat", "r" );
$bestatigung = fread( $datei, filesize( "PHP_formail.dat" ) );
fclose( $datei );
mail( $email, "Danke f�r Ihre E-Mail", $bestatigung, $headers);
//}
?>
<html>
<HEAD>
   <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
   <meta http-equiv="refresh" content="3;URL=http://www.auto-guenstig24.ch">
   <title>Danke</title>
</HEAD>
<BODY TEXT="#000000" BGCOLOR="#FBFBFB">
<TABLE BORDER=0 WIDTH="100%" >
<TR>
<TD>x
<CENTER>&nbsp;</CENTER>
</TD>
</TR>

<TR>
<TD>
<CENTER>
      </CENTER>
</TD>
</TR>

<TR>
<TD>&nbsp;</TD>
</TR>
</TABLE>

<CENTER>&nbsp;</CENTER>

<TABLE BORDER=0 WIDTH="100%" >
<TR>
<TD>
<CENTER>
        <B><FONT FACE="Verdana"><FONT COLOR="#000000">Vielen Dank f&uuml;r Ihre
        E-Mail!</FONT></FONT></B>
      </CENTER>
</TD>
</TR>
</TABLE>

<CENTER>&nbsp;</CENTER>

<TABLE BORDER=0 WIDTH="100%" >
  <TR>
    <TD>
      <CENTER>
        <B><FONT FACE="Verdana"><FONT COLOR="#000000"><FONT SIZE=-1>Wir haben
        Ihre Nachricht erhalten und werden diese sofort bearbeiten.</FONT></FONT></FONT></B>
      </CENTER>
      </TD>
  </TR>
  <TR>
    <TD>
      <div align="center"><b><font face="Verdana"><font color="#000000"><font size=-1>Sie
        erhalten automatisch eine E-Mail als Best&auml;tigung Ihrer Nachricht.</font></font></font></b></div>
    </TD>
  </TR>
  <TR>
    <TD>&nbsp;</TD>
  </TR>
  <TR>
    <TD>
      <div align="center"><b><font face="Verdana"><font color="#000000"><font size=-1>- 
        auto-guenstig24.ch -</font></font></font></b> </div>
    </TD>
  </TR>
</TABLE>

<CENTER>&nbsp;</CENTER>

<TABLE BORDER=0 WIDTH="100%" >
<TR>
<TD>
<CENTER>
      </CENTER>
</TD>
</TR>
</TABLE>

<CENTER>&nbsp;</CENTER>
</body>
</html>