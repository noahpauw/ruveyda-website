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

$id = $_GET["id"];
$content = $_GET["content"];
$priority = $_GET["priority"];

// Get all web content
$sql = 'UPDATE `contentblocks` SET content="' . $content . '", priority=' . $priority . ' WHERE id=' . $id;
try {
    $result = mysqli_query($conn, $sql);
} catch(Exception $e) {
    echo $e;
}