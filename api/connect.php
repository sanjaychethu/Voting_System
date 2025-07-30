<?php
// connect.php

// --- DATABASE CONNECTION ---
// Remember to use port 3307 if that's what your XAMPP is configured to.
$connect = mysqli_connect("localhost", "root", "", "voting", 3307);

// --- CHECK CONNECTION ---
if (!$connect) {
    // If the connection fails, kill the script and show the error.
    die("Connection failed: " . mysqli_connect_error());
}
?>
