<?php
header('Content-Type: text/html; charset=utf-8');
?>

<?php
class CaseFile {
    private $conn;
    private $table_name = "cases";

    public $id;
    public $client_id;
    public $lawyer_id;
    public $case_number;
    public $description;
    public $status;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET client_id=:client_id, lawyer_id=:lawyer_id, case_number=:case_number, description=:description, status=:status";

        $stmt = $this->conn->prepare($query);

        $this->client_id = htmlspecialchars(strip_tags($this->client_id));
        $this->lawyer_id = htmlspecialchars(strip_tags($this->lawyer_id));
        $this->case_number = htmlspecialchars(strip_tags($this->case_number));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->status = htmlspecialchars(strip_tags($this->status));

        $stmt->bindParam(":client_id", $this->client_id);
        $stmt->bindParam(":lawyer_id", $this->lawyer_id);
        $stmt->bindParam(":case_number", $this->case_number);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":status", $this->status);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
