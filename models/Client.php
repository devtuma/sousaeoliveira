<?php
header('Content-Type: text/html; charset=utf-8');
?>

<?php
class Client {
    private $conn;
    private $table_name = "clients";

    public $id;
    public $account_number;
    public $name;
    public $email;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET account_number=:account_number, name=:name, email=:email";

        $stmt = $this->conn->prepare($query);

        $this->account_number = htmlspecialchars(strip_tags($this->account_number));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));

        $stmt->bindParam(":account_number", $this->account_number);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
