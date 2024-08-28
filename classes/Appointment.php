<?php
include_once 'DB.php';

class Appointment {
    private $conn;

    public function __construct() {
        $db = new DB();
        $this->conn = $db->getConnection();
    }

    public function schedule($user_id, $date, $time, $mediator, $details) {
        $stmt = $this->conn->prepare("INSERT INTO appointments (user_id, date, time, mediator, details) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $user_id, $date, $time, $mediator, $details);
        return $stmt->execute();
    }

    public function getAppointmentsByUser($user_id) {
        $stmt = $this->conn->prepare("SELECT * FROM appointments WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
