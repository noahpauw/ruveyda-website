<?php
$servername = "localhost";
$username = "lash_admin";
$password = "HB8z6xZ9T";
$dbname = "lash_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed!");
}

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
$sql = "SELECT * FROM `appointments` ORDER BY date_time";
$result = mysqli_query($conn, $sql);
$list = [];

if (!$result) {
    echo "An error occured while connecting to the database!";
    die();
}

while ($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $email = $row["email"];
    $phonenumber = $row["phonenumber"];
    $comments = $row["comments"];
    $date_time = $row["date_time"];
    $appointment_type = $row["appointment_type"];
    $duration_minutes = $row["duration_minutes"];

    array_push($list, new Appointment($id, $firstname, $lastname, $email, $phonenumber, $comments, $date_time, $appointment_type, $duration_minutes));
}

echo json_encode($list);
$conn->close();
?>