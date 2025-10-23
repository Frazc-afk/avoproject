<?php
$status  = $_GET['status']  ?? '';
$ref     = $_GET['ref']     ?? '—';
$name    = $_GET['name']    ?? 'Utilizator';
$email   = $_GET['email']   ?? 'adresa ta';
$problem = $_GET['problem'] ?? '—';
$comment = $_GET['comment'] ?? '—';
$contact = $_GET['contact'] ?? '—';
$date    = (new DateTime())->format('d.m.Y H:i');

// Sanitize for display
$name    = htmlspecialchars($name);
$email   = htmlspecialchars($email);
$problem = htmlspecialchars($problem);
$comment = htmlspecialchars($comment);
$contact = htmlspecialchars($contact);
$ref     = htmlspecialchars($ref);
?>

<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <title>Mulțumim!</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f1f5f9;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }
    .card {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
      max-width: 700px;
      width: 100%;
    }
    h1 { margin-top: 0; color: #16a34a; }
    h1.fail { color: #dc2626; }
    .pill { margin: 8px 0; padding: 10px; background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; }
    .actions { margin-top: 20px; }
    .btn { padding: 10px 16px; border-radius: 8px; text-decoration: none; font-weight: bold; margin-right: 10px; }
    .btn-primary { background: #0ea5e9; color: white; }
    .btn-secondary { background: #f1f5f9; color: #111; border: 1px solid #d1d5db; }
  </style>
</head>
<body>
  <div class="card">
    <?php if ($status === "ok"): ?>
      <h1>Mulțumim, <?= $name ?>!</h1>
      <p>Am primit mesajul tău și am trimis confirmarea la <strong><?= $email ?></strong>.</p>
    <?php else: ?>
      <h1 class="fail">⚠️ Mesajul NU a putut fi trimis!</h1>
      <p>Te rugăm să încerci din nou sau să contactezi direct suportul.</p>
    <?php endif; ?>

    <div class="pill">Cod referință: <strong><?= $ref ?></strong></div>
    <div class="pill">Trimis la: <strong><?= $date ?></strong></div>
    <div class="pill">Tip problemă: <strong><?= $problem ?></strong></div>
    <div class="pill">Descriere: <strong><?= nl2br($comment) ?></strong></div>
    <div class="pill">Metodă contact: <strong><?= $contact ?></strong></div>

    <div class="actions">
      <a href="Contact.html" class="btn btn-primary">Înapoi la formular</a>
      <a href="mailto:your-email@example.com" class="btn btn-secondary">Contact suport</a>
    </div>
  </div>
</body>
</html>