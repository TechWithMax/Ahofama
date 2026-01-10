<?php
// Include necessary files
include_once 'config.php';
include_once 'functions.php';

// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Fetch client reviews for the current user
$client_reviews = getClientReviews($user_id);

// Display client reviews
foreach ($client_reviews as $review) {
    echo "<div class='review'>";
    echo "<h3>" . htmlspecialchars($review['client_name']) . "</h3>";
    echo "<p>" . htmlspecialchars($review['review_text']) . "</p>";
    echo "<p>Rating: " . htmlspecialchars($review['rating']) . "</p>";
    echo "</div>";
}
?>