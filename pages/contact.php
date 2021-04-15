<?php
include("../parts/header.php")
?>
    <link rel="stylesheet" type="text/css" href="../src/css/contact.css">

<?php
if (isset($_GET['mailsend'])) {
    echo '<div class="successfully-send"><p>Successfully send the email!</p></div>';
}
?>

    <div class="contact-form-container">
        <form class="contact-form" action="../includes/contact-form.php" method="POST">
            <h3>Name</h3>
            <input type="text" name="name" required>
            <h3>Email</h3>
            <input type="email" name="email" required>
            <h3>Company</h3>
            <input type="text" name="company">
            <h3>Subject</h3>
            <input type="text" name="subject">
            <h3>Message</h3>
            <textarea name="message" required></textarea>
            <button type="submit" name="submit">Send Email</button>;
        </form>
    </div>

<?php
include("../parts/footer.php")
?>