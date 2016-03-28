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
$message="Anfrage \n\n";
$message="Kontaktdaten \n";
$message.="Name: $von \n";
$message.="Geboren: $born \n";
$message.="Mail: $email \n";
$message.="Telefon: $telefon \n\n";
$message.="Autodaten \n";
$message.="Marke: $marke \n";
$message.="Typ: $typ \n";
$message.="Jahrgang: $jahrgang \n";
$message.="Farbe: $farbe \n";
$message.="Max.Km: $km \n";
$message.="Max.Preis: $preis \n";
$message.="Zusatz: $zusatz \n";

//STOP bis hier konfigurieren --------------------------------------------------------------
$header="From: $von<$email>\nReply-To: $email\nX-Mailer: PHP/" . phpversion();
$headers="From: $site<$webmas>\nReply-To: $webmas\nX-Mailer: PHP/" . phpversion();
mail($webmas, "Anfrage", $message, $header);
$datei = fopen( "PHP_formail.dat", "r" );
$bestatigung = fread( $datei, filesize( "PHP_formail.dat" ) );
fclose( $datei );
mail( $email, "Bestätigung Anfrage - auto-günstig.ch", $bestatigung, $headers);
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="refresh" content="6;URL=http://www.auto-guenstig24.ch">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <title>Vielen Dank</title>
</head>
<body>
<div class="container">
    <div style="height: 50px"></div>
    <div class="alert alert-success" role="alert">
        <h1 class="text-center">Herzlichen Dank für Ihre Anfrage!</h1>
        <p class="text-center">Wir haben Ihre Anfrage erhalten und werden diese umgehend bearbeiten.</p>
        <p class="text-center">Sie erhalten automatisch eine E-Mail als Bestätigung Ihrer Anfrage.</p>
        <br>
        <p class="text-center">Das Team von auto-günstig24.ch</p>
    </div>
</div>
</body>
</html>