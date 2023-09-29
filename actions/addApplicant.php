<?php
include '../dbConnection.php';

function convertToPascalCase($input) {
    // Split the string into parts based on space
    $parts = explode(" ", $input);

    // Capitalize the first letter of each part
    $capitalizedParts = array_map(function($part) {
        return ucfirst(strtolower($part));
    }, $parts);

    // Join the parts back into a single string
    $pascalCaseString = implode(" ", $capitalizedParts);

    return $pascalCaseString;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    // Convert the data to Pascal case
    $data = convertToPascalCase($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if required fields are empty
    if(empty($_POST["first_name"]) || empty($_POST["middle_name"]) || empty($_POST["last_name"]) || empty($_POST["cellphone_no"]) || empty($_POST["birthdate"]) || empty($_POST["gender"])) {
        header('Location: '.'../pages/addApplicantPage.php?error=Please fill out all required fields');
        exit();
    }
    $cellphone_no = test_input(trim($_POST["cellphone_no"]));

    if (!preg_match('/^[0-9]{11}$/', $cellphone_no)) {
        header('Location: '.'../pages/editApplicantPage.php?id=' . $id . '&error=*Invalid cellphone number');
        exit();
    }

    $firstName = test_input($_POST["first_name"]);
    $middleName = test_input($_POST["middle_name"]);
    $lastName = test_input($_POST["last_name"]);
    $birthdate = test_input($_POST["birthdate"]);
    $gender = test_input($_POST["gender"]);
    $cellphoneNo = test_input($_POST["cellphone_no"]);
    $address = test_input($_POST["address"]);

    $sql = "INSERT INTO applicant_table (first_name, middle_name, last_name, birthdate, gender, cellphone_no, address)
    VALUES ('$firstName', '$middleName', '$lastName', '$birthdate', '$gender', '$cellphoneNo', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: '.'../index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
