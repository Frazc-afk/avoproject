<?php
// Only allow POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: Contact.html");
    exit;
}

// Honeypot anti-spam
if (!empty($_POST['hp_field'])) {
    die("Spam detectat.");
}

// Sanitize & validate input
$name    = htmlspecialchars(trim($_POST['name'] ?? ''));
$email   = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$problem = htmlspecialchars(trim($_POST['problem'] ?? ''));
$comment = htmlspecialchars(trim($_POST['comment'] ?? ''));
$contact = htmlspecialchars(trim($_POST['contact_method'] ?? ''));

if (empty($name) || empty($email) || empty($problem) || empty($comment)) {
    die("Toate câmpurile sunt obligatorii.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Adresa de email invalidă.");
}

// Prepare email
$to = "clashminiesmecher@gmail.com";  // <-- replace with your email
$subject = "Mesaj nou de la $name: $problem";
$message = "Nume: $name\nEmail: $email\nTip problemă: $problem\nMesaj: $comment\nMetoda contact: $contact";
$headers = "From: $email\r\nReply-To: $email\r\n";

// Send email
$status = mail($to, $subject, $message, $headers) ? 'ok' : 'fail';
$ref = uniqid();
$date = (new DateTime())->format('d.m.Y H:i');

// Redirect to thank-you page with GET parameters
header("Location: thankyou.php?status=$status&ref=$ref&name=" . urlencode($name) . "&email=" . urlencode($email) . "&problem=" . urlencode($problem) . "&comment=" . urlencode($comment) . "&contact=" . urlencode($contact));
exit;
