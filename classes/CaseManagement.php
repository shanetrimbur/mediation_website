<?php
include_once 'DB.php';

class CaseManagement {
    private $conn;

    public function __construct() {
        $db = new DB();
        $this->conn = $db->getConnection();
    }

    public function getCasesByUser($user_id) {
        $stmt = $this->conn->prepare("SELECT * FROM cases WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function uploadDocument($case_id, $file_name) {
        $stmt = $this->conn->prepare("INSERT INTO case_documents (case_id, file_name) VALUES (?, ?)");
        $stmt->bind_param("is", $case_id, $file_name);
        return $stmt->execute();
    }

    public function getDocumentsByCase($case_id) {
        $stmt = $this->conn->prepare("SELECT * FROM case_documents WHERE case_id = ?");
        $stmt->bind_param("i", $case_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
