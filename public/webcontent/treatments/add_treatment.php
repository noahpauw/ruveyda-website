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
$id = $_GET["id"];
$title = $_GET["title"];
$description = $_GET["description"];
$background = $_GET["background"];
$background = $_GET["background"];
$price = $_GET["price"];
$show_on_website = $_GET["show_on_website"];
$duration_minutes = $_GET["duration_minutes"];
$priority = $_GET["priority"];

// Geef door aan database
$sql = 'SELECT * FROM `treatments` WHERE id = ' . $id;
$exists = false;
try {
    $result = mysqli_query($conn, $sql);
    $exists = mysqli_num_rows($result) > 0;
} catch(Exception $e) {
    echo $sql . "<br/><br/>";
    echo $e;
}

$sql = 'INSERT INTO `treatments` VALUES(NULL, "' . $title . '", "' . $description . '", "' . $background . '", ' . $price . ', ' . $show_on_website . ', ' . $duration_minutes . ', ' . $priority . ')';
if($exists)
    $sql = 'UPDATE `treatments` SET title="' . $title . '", description="' . $description . '", background="' . $background . '", price=' . $price . ', show_on_website=' . $show_on_website . ', duration_minutes=' . $duration_minutes . ', priority=' . $priority . ' WHERE id=' . $id;

try {
    $result = mysqli_query($conn, $sql);
} catch(Exception $e) {
    echo $sql . "<br/><br/>";
    echo $e;
}
