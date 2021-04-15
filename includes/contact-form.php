<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mailFrom = $_POST['email'];
    $company = isset($_POST['company']) ? $_POST['company'] : null;
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    include('../includes/mailer.php');

    sendMail($mailFrom, $name, $company, $subject, $message);

    header("Location: ../pages/contact.php?mailsend");
}else {
    header("Location: ../pages/contact.php");
}