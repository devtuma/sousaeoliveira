<?php
header('Content-Type: text/html; charset=utf-8');
?>

<?php
class Message {
    private $conn;
    private $table_name = "messages";

    public $id;
    public $case_id;
    public $sender_id;
    public $receiver_id;
    public $message;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET case_id=:case_id, sender_id=:sender_id, receiver_id=:receiver_id, message=:message";

        $stmt = $this->conn->prepare($query);

        $this->case_id = htmlspecialchars(strip_tags($this->case_id));
        $this->sender_id = htmlspecialchars(strip_tags($this->sender_id));
        $this->receiver_id = htmlspecialchars(strip_tags($this->receiver_id));
        $this->message = htmlspecialchars(strip_tags($this->message));

        $stmt->bindParam(":case_id", $this->case_id);
        $stmt->bindParam(":sender_id", $this->sender_id);
        $stmt->bindParam(":receiver_id", $this->receiver_id);
        $stmt->bindParam(":message", $this->message);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
