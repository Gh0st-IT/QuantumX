<?php
    include '../dbConnection.php';

    // Check if the ID parameter is passed in the URL
    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        // Get the ID from the URL
        $applicantId = $_GET['id'];

        // Delete the applicant from the database based on the ID
        $sql = "DELETE FROM applicant_table WHERE id = $applicantId";

        if ($conn->query($sql) === TRUE) {
            // If the deletion is successful, redirect to the index page
            header("Location: ../index.php");
            exit();
        } else {
            // If there is an error with the SQL query, display an error message
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        // If no ID parameter is provided, redirect to the index page or display an error message
        header("Location: ../index.php");
        exit();
    }

    // Close the database connection
    $conn->close();
?>