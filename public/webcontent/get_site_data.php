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

class SiteData
{
    public $id;
    public $dataType;
    public $content;
    function __construct($id, $dataType, $content)
    {
        $this->id = $id;
        $this->dataType = $dataType;
        $this->content = $content;
    }
}

// Haal alleen de gevraagde webcontent op
$dataType = $_GET["dataType"];

// Get all web content
$sql = 'SELECT * FROM `site_data` WHERE dataType LIKE "' . $dataType . '"';
$result = mysqli_query($conn, $sql);
$list = [];

if (!$result) {
    echo "An error occured while connecting to the database!";
    die();
}

while ($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $dataType = $row["dataType"];
    $content = $row["content"];

    array_push($list, new SiteData($id, $dataType, $content));
}

echo json_encode($list);
$conn->close();
?>