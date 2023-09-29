<?php
include '../dbConnection.php';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    if(empty($_POST["first_name"]) || empty($_POST["middle_name"]) || empty($_POST["last_name"]) || empty($_POST["cellphone_no"]) || empty($_POST["birthdate"]) || empty($_POST["gender"])) {
        header('Location: '.'../pages/editApplicantPage.php?id=' . $id . '&error=*Please fill out all required fields');
        exit();
    }
    $cellphone_no = test_input(trim($_POST["cellphone_no"]));

    if (!preg_match('/^[0-9]{11}$/', $cellphone_no)) {
        header('Location: '.'../pages/editApplicantPage.php?id=' . $id . '&error=*Invalid cellphone number');
        exit();
    }

    $first_name = test_input($_POST["first_name"]);
    $middle_name = test_input($_POST["middle_name"]);
    $last_name = test_input($_POST["last_name"]);
    $birthdate = test_input($_POST["birthdate"]);
    $gender = test_input($_POST["gender"]);
    $cellphone_no = test_input($_POST["cellphone_no"]);
    $address = test_input($_POST["address"]);

    $sql = "UPDATE applicant_table SET 
            first_name='$first_name', 
            middle_name='$middle_name', 
            last_name='$last_name', 
            birthdate='$birthdate',
            cellphone_no='$cellphone_no',
            gender='$gender',
            address='$address'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: '.'../pages/editApplicantPage.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
