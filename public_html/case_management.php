<?php
// Start session management
session_start();

// Check if the user is logged in; if not, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include 'config/db.php';

// Fetch user's cases from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM cases WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$cases = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case Management Portal - Mediation and Dispute Resolution Services</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Include the navigation menu -->
    <?php include 'includes/navigation.php'; ?>

    <!-- Case Management Section -->
    <section class="case-management">
        <h1>Case Management Portal</h1>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>. Here you can view and manage your ongoing cases.</p>

        <?php if (empty($cases)): ?>
            <p>You currently have no active cases.</p>
        <?php else: ?>
            <h2>Your Cases</h2>
            <ul class="case-list">
                <?php foreach ($cases as $case): ?>
                    <li class="case-item">
                        <h3>Case ID: <?php echo htmlspecialchars($case['id']); ?></h3>
                        <p><strong>Status:</strong> <?php echo htmlspecialchars($case['status']); ?></p>
                        <p><strong>Details:</strong> <?php echo htmlspecialchars($case['case_details']); ?></p>

                        <h4>Documents</h4>
                        <ul class="document-list">
                            <?php
                            // Fetch documents related to this case
                            $case_id = $case['id'];
                            $doc_query = "SELECT * FROM case_documents WHERE case_id = ?";
                            $doc_stmt = $conn->prepare($doc_query);
                            $doc_stmt->bind_param("i", $case_id);
                            $doc_stmt->execute();
                            $doc_result = $doc_stmt->get_result();
                            $documents = $doc_result->fetch_all(MYSQLI_ASSOC);
                            ?>
                            <?php if (empty($documents)): ?>
                                <li>No documents available.</li>
                            <?php else: ?>
                                <?php foreach ($documents as $document): ?>
                                    <li>
                                        <a href="uploads/<?php echo htmlspecialchars($document['file_name']); ?>" download><?php echo htmlspecialchars($document['file_name']); ?></a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>

                        <form action="upload_document.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="case_id" value="<?php echo $case['id']; ?>">
                            <label for="document">Upload New Document:</label>
                            <input type="file" name="document" id="document" required>
                            <button type="submit" class="btn">Upload Document</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

    </section>

    <!-- Include the footer -->
    <?php include 'includes/footer.php'; ?>

</body>
</html>
