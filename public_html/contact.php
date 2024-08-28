<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Mediation and Dispute Resolution Services</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Include the navigation menu -->
    <?php include 'includes/navigation.php'; ?>

    <!-- Contact Us Section -->
    <section class="contact-us">
        <h1>Contact Us</h1>
        <p>If you have any questions or would like to schedule a consultation, please get in touch with us using the form below or by contacting us directly.</p>

        <h2>Contact Form</h2>
        <form action="process_contact.php" method="post" class="contact-form">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit" class="btn">Send Message</button>
        </form>

        <h2>Our Contact Information</h2>
        <p><strong>Address:</strong> 123 Mediation Lane, Suite 100, City, State, ZIP</p>
        <p><strong>Phone:</strong> (123) 456-7890</p>
        <p><strong>Email:</strong> <a href="mailto:info@mediationfirm.com">info@mediationfirm.com</a></p>

        <h2>Our Location</h2>
        <div class="map">
            <!-- Embed a Google Map or similar -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345093747!2d144.95373631565458!3d-37.81720997975195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577c3e2f6e02140!2s123%20Mediation%20Lane%2C%20Suite%20100%2C%20City%2C%20State%2C%20ZIP!5e0!3m2!1sen!2sau!4v1616012134567!5m2!1sen!2sau" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

    <!-- Include the footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="js/scripts.js"></script>
</body>
</html>
