<?php
$servername = "localhost";
$username = "lash_admin";
$password = "HB8z6xZ9T";
$dbname = "lash_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed!");
}

// Create a GUID for data storage
function getGUID()
{
    if (function_exists('com_create_guid')) {
        return com_create_guid();
    } else {
        mt_srand((double) microtime() * 10000); //optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45); // "-"
        $uuid = chr(123) // "{"
            . substr($charid, 0, 8) . $hyphen
            . substr($charid, 8, 4) . $hyphen
            . substr($charid, 12, 4) . $hyphen
            . substr($charid, 16, 4) . $hyphen
            . substr($charid, 20, 12)
            . chr(125); // "}"
        return $uuid;
    }
}

// Variables for creation
$id = getGUID();
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$phonenumber = $_POST["phonenumber"];
$comments = $_POST["comments"];
$date_time = $_POST["date_time"];
$appointment_type = $_POST["appointment_type"];
$duration_minutes = $_POST["duration_minutes"];

$appointment = new Appointment($id, $firstname, $lastname, $email, $phonenumber, $comment, $date_time, $appointment_type, $duration_minutes);

class Appointment
{
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $phonenumber;
    public $comments;
    public $date_time;
    public $appointment_type;
    public $duration_minutes;

    function __construct($id, $firstname, $lastname, $email, $phonenumber, $comments, $date_time, $appointment_type, $duration_minutes)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->phonenumber = $phonenumber;
        $this->comments = $comments;
        $this->date_time = $date_time;
        $this->appointment_type = $appointment_type;
        $this->duration_minutes = $duration_minutes;
    }
}

// Get all appointments
$sql = "INSERT INTO `appointments` VALUES('$id', '$firstname', '$lastname', '$email', '$phonenumber', '$comments', '$date_time', '$appointment_type', '$duration_minutes')";
$upload = mysqli_query($conn, $sql);

if (!$upload) {
    echo mysqli_error($conn);
    die();
}

// Send an e-mail to the customer
$date = date("d-m-Y", $date_time);
$time = date("H:i", $date_time);
$link = "https://www.lashroomdeventer.nl/#/mijn-afspraak?id=" . $id;
$headers = "From: Lash Room Deventer <noreply@lashroomdeventer.nl>\r\nContent-Type: text/html; charset=ISO-8859-1\r\n";

$message = "<p>Beste " . $firstname . ", </p>";
$message .= "<p>Je hebt een afspraak ingepland bij <b>Lash Room Deventer</b>. Bedankt daarvoor! Je afspraak staat gepland op <b>" . $date . "</b> om <b>" . $time . "</b>.</p>";
$message .= "<p>We zien je graag dan op onze locatie: <b>Zwolseweg 349 in Deventer</b>.</p>";
$message .= "<h3>Bekijk je afspraak online!</h3>";
$message .= "<p>Met <a href=\"$link\">deze link</a> kun je je afpsraak op onze website bekijken.";
$message .= "<h3>Annulering</h3>";
$message .= "<p>Mocht je onverhoopt niet kunnen? Bel dan <i>minimaal 24 uur vantevoren</i> naar <b>0612345678</b>!";
$message .= "<p>Tot dan! 😊</p>";
$message .= "<p>Groetjes,</p>";
$message .= "<p><b>Lash Room Deventer</b></p>";
$message .= "<hr>";
$message .= "<p><b>Je gekozen behandeling</b>: " . $appointment_type . "</p>";
$message .= "<p><b>Duur behandeling</b>: " . $duration_minutes . " minuten</p>";

mail($email, "Lash Room Deventer: Afspraakbevestiging op " . $date . " om " . $time, $message, $headers);

$url = "https://lashroomdeventer.nl/#/bedankt?id=" . $id;
header("Location: " . $url);

$conn->close();
?>