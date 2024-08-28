<?php
include_once 'DB.php';

class Blog {
    private $conn;

    public function __construct() {
        $db = new DB();
        $this->conn = $db->getConnection();
    }

    public function createPost($title, $content, $author_id) {
        $stmt = $this->conn->prepare("INSERT INTO blog_posts (title, content, author_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $title, $content, $author_id);
        return $stmt->execute();
    }

    public function getAllPosts() {
        $stmt = $this->conn->query("SELECT * FROM blog_posts ORDER BY created_at DESC");
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM blog_posts WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function deletePost($id) {
        $stmt = $this->conn->prepare("DELETE FROM blog_posts WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
