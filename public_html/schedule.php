<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule an Appointment - Mediation and Dispute Resolution Services</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Include a datepicker library like jQuery UI -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>

    <!-- Include the navigation menu -->
    <?php include 'includes/navigation.php'; ?>

    <!-- Schedule an Appointment Section -->
    <section class="schedule-appointment">
        <h1>Schedule an Appointment</h1>
        <p>To schedule an appointment with one of our mediators, please fill out the form below. We will confirm your appointment via email.</p>

        <form action="process_schedule.php" method="post" class="appointment-form">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="date">Preferred Date:</label>
            <input type="text" id="date" name="date" required>

            <label for="time">Preferred Time:</label>
            <select id="time" name="time" required>
                <option value="9:00 AM">9:00 AM</option>
                <option value="10:00 AM">10:00 AM</option>
                <option value="11:00 AM">11:00 AM</option>
                <option value="1:00 PM">1:00 PM</option>
                <option value="2:00 PM">2:00 PM</option>
                <option value="3:00 PM">3:00 PM</option>
                <option value="4:00 PM">4:00 PM</option>
            </select>

            <label for="mediator">Preferred Mediator:</label>
            <select id="mediator" name="mediator" required>
                <option value="John Doe">John Doe</option>
                <option value="Jane Smith">Jane Smith</option>
                <option value="Emily Johnson">Emily Johnson</option>
            </select>

            <label for="details">Additional Details:</label>
            <textarea id="details" name="details" rows="5"></textarea>

            <button type="submit" class="btn">Schedule Appointment</button>
        </form>
    </section>

    <!-- Include the footer -->
    <?php include 'includes/footer.php'; ?>

    <!-- Include jQuery and jQuery UI for datepicker -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize the datepicker
            $("#date").datepicker({
                dateFormat: "yy-mm-dd",
                minDate: 0 // Disable past dates
            });
        });
    </script>
</body>
</html>
