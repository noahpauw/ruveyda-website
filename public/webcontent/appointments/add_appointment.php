<?
include "../cors.php";

$servername = "rdbms.strato.de";
$username = "dbu1393290";
$password = "nTwmj5JYgReNe@e";
$dbname = "dbs12868937";

try {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
} catch (Exception $exception) {
    die($exception);
}

if ($conn->connect_error) {
    die("Connection failed!");
}

// Haal alle velden op van de behandeling
$name = $_GET["name"];
$email = $_GET["email"];
$phone = $_GET["phone"];
$treatment_id = $_GET["treatment_id"];
$date_time = $_GET["date_time"];
$comments = $_GET["comments"];
$agreed_to_terms = $_GET["agreed_to_terms"];
$priority = $_GET["priority"];

date_default_timezone_set("Europe/Amsterdam");
$date_time = date('Y-m-d H:i:s', $date_time);

$uuid = uniqid();

$sql = 'INSERT INTO `appointments` VALUES(NULL, "' . $name . '", "' . $uuid . '", "' . $email . '", "' . $phone . '", ' . $treatment_id . ', "' . $date_time . '", "' . $comments . '", ' . $agreed_to_terms . ')';

try {
    $result = mysqli_query($conn, $sql);
} catch(Exception $e) {
    echo $sql . "<br/><br/>";
    echo $e;
}