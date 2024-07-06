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

class Webcontent
{
    public $id;
    public $content;
    public $contentType;
    public $route;
    public $priority;
    function __construct($id, $content, $contentType, $route, $priority)
    {
        $this->id = $id;
        $this->content = $content;
        $this->contentType = $contentType;
        $this->route = $route;
        $this->priortu = $priority;
    }
}

// Haal alleen de gevraagde webcontent op
$route = $_GET["route"];

// Get all web content
$sql = 'SELECT * FROM `contentblocks` WHERE route LIKE "' . $route . '" ORDER BY priority';
$result = mysqli_query($conn, $sql);
$list = [];

if (!$result) {
    echo "An error occured while connecting to the database!";
    die();
}

while ($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $content = $row["content"];
    $contentType = $row["contentType"];
    $route = $row["route"];
    $priority = $row["priority"];

    array_push($list, new Webcontent($id, $content, $contentType, $route, $priority));
}

echo json_encode($list);
$conn->close();
?>