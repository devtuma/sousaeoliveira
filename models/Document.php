<?php
header('Content-Type: text/html; charset=utf-8');
?>

<?php
class Document {
    private $conn;
    private $table_name = "documents";

    public $id;
    public $case_id;
    public $document_name;
    public $file_path;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET case_id=:case_id, document_name=:document_name, file_path=:file_path";

        $stmt = $this->conn->prepare($query);

        $this->case_id = htmlspecialchars(strip_tags($this->case_id));
        $this->document_name = htmlspecialchars(strip_tags($this->document_name));
        $this->file_path = htmlspecialchars(strip_tags($this->file_path));

        $stmt->bindParam(":case_id", $this->case_id);
        $stmt->bindParam(":document_name", $this->document_name);
        $stmt->bindParam(":file_path", $this->file_path);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
