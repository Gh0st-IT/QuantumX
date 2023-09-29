<?php
include '../dbConnection.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $applicantId = $_GET['id'];

    $sql = "SELECT * FROM applicant_table WHERE id = $applicantId";
    $result = $conn->query($sql);


    if ($result->num_rows == 1) {
        $applicant = $result->fetch_assoc();
    } else {
        header("Location: ../index.php");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Edit Applicant</title>
</head>
<body>
    <div class="title">
        <h1><span>Edit</span> Applicant</h1>
    </div>
    
    <div class="form-wrapper">
        <div class="form-container">
            <?php
                if(isset($_GET['error'])) {
                    echo '<div class="error-message">' . htmlspecialchars($_GET['error']) . '</div>';
                }
            ?>
            <form action="../actions/updateApplicant.php" method="post">
                <input type="hidden" name="id" value="<?php echo $applicant['id']; ?>">
                <div style="width: 100%; text-align: end;">
                    <input type="button" value="Close" onclick="window.location.href='../index.php';"><br>
                </div>

                <label for="first_name">First Name</label>
                <input  type="text" id="first_name" name="first_name" value="<?php echo $applicant['first_name']; ?>"><br>

                <label for="middle_name">Middle Name</label>
                <input required type="text" id="middle_name" name="middle_name" value="<?php echo $applicant['middle_name']; ?>"><br>

                <label for="last_name">Last Name</label>
                <input required type="text" id="last_name" name="last_name" value="<?php echo $applicant['last_name']; ?>"><br>

                <label for="cellphone_no">Cellphone No.</label><br>
                <input required type="text" name="cellphone_no" pattern="[0-9]{11}" maxlength="11"  value="<?php echo $applicant['cellphone_no']; ?>"><br>

                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="<?php echo $applicant['address']; ?>"><br>

                <label for="birthdate">Birthdate</label><br>
                <div style="width: 30%;">
                    <input required style="width: 100%; height: 40px;" type="date" id="birthdate" name="birthdate" value="<?php echo $applicant['birthdate']; ?>"><br>
                </div>

                <label for="gender">Gender</label>
                <div>
                    <input type="radio" name="gender" value="Male" required <?php if ($applicant['gender'] == 'Male') echo "checked"; ?>> Male
                    <input type="radio" name="gender" value="Female" required <?php if ($applicant['gender'] == 'Female') echo "checked"; ?>> Female<br>
                </div>

                <input type="submit" value="Update">
            </form>
        </div>
    </div>
    
</body>
</html>
