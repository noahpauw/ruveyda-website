<?
$servername = "localhost";
$username = "lash_admin";
$password = "HB8z6xZ9T";
$dbname = "lash_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed!");
}

class Webcontent
{
    public $id;
    public $heading;
    public $content;
    public $show_on_website;
    public $display_name;
    public $on_page;
    public $url;

    function __construct($id, $heading, $content, $show_on_website, $display_name, $on_page, $url)
    {
        $this->id = $id;
        $this->heading = $heading;
        $this->content = $content;
        $this->show_on_website = $show_on_website;
        $this->display_name = $display_name;
        $this->on_page = $on_page;
        $this->url = $url;
    }
}

// Get all web content
$sql = "SELECT * FROM `webcontents`";
$result = mysqli_query($conn, $sql);
$list = [];

if (!$result) {
    echo "An error occured while connecting to the database!";
    die();
}

while ($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $heading = $row["heading"];
    $content = $row["content"];
    $show_on_website = $row["show_on_website"];
    $display_name = $row["display_name"];
    $on_page = $row["on_page"];
    $url = $row["url"];

    array_push($list, new Webcontent($id, $heading, $content, $show_on_website, $display_name, $on_page, $url));
}

echo json_encode($list);
$conn->close();
?>