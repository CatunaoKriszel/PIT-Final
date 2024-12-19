<?php
include 'config.php'; // Include the database configuration

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL query to delete the book with the specified ID
    $sql = "DELETE FROM books WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to view.php with a success message
        header("Location: view.php?message=Book successfully deleted!");
        exit();
    } else {
        // If there's an error, show the error message
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // Redirect to view.php if no ID is provided
    header("Location: view.php?message=No book ID specified.");
    exit();
}

$conn->close(); // Close the database connection
?>
