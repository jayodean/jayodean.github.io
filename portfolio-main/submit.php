<?php
// submit.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = htmlspecialchars($_POST["name"]);
  $email = htmlspecialchars($_POST["email"]);
  $message = htmlspecialchars($_POST["message"]);

  // Example only — replace with real mail logic
  echo "<h1>Thanks, $name!</h1><p>Your message has been received.</p>";
} else {
  header("Location: form.php");
}
