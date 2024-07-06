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

$sql = "SELECT * FROM `treatments`";
$list = [];
try {
    $result = mysqli_query($conn, $sql);
    foreach($result as $res) {
        array_push($list, $res);
    }
    echo json_encode($list);
    $conn->close();
} catch(Exception $e) {
    echo $e;
}