<?php
// Include database connection
include 'config/db.php';

// Fetch blog posts from the database
$query = "SELECT * FROM blog_posts ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Mediation and Dispute Resolution Services</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Include the navigation menu -->
    <?php include 'includes/navigation.php'; ?>

    <!-- Blog Section -->
    <section class="blog-section">
        <h1>Our Blog</h1>
        <p>Stay informed with the latest articles and insights from our experts on mediation, arbitration, and dispute resolution.</p>

        <?php if (empty($posts)): ?>
            <p>No blog posts available at the moment. Please check back later.</p>
        <?php else: ?>
            <div class="blog-posts">
                <?php foreach ($posts as $post): ?>
                    <div class="blog-post">
                        <h2><?php echo htmlspecialchars($post['title']); ?></h2>
                        <p class="post-date">Posted on <?php echo date('F j, Y', strtotime($post['created_at'])); ?></p>
                        <p><?php echo nl2br(htmlspecialchars(substr($post['content'], 0, 200))); ?>...</p>
                        <a href="view_post.php?id=<?php echo $post['id']; ?>" class="btn">Read More</a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

    <!-- Include the footer -->
    <?php include 'includes/footer.php'; ?>

</body>
</html>
