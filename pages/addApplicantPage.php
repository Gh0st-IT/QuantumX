<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Quantum X Applicants</title>
</head>
<body>
    <div class="title">
        <h1><span>Add New</span> Applicant</h1>
    </div>
    <div class="form-wrapper">
        <div class="form-container">
            <?php
            if(isset($_GET['error'])) {
                echo '<div class="error-message">' . htmlspecialchars($_GET['error']) . '</div>';
            }
            ?>

            <form action="../actions/addApplicant.php" method="post">
                <div style="width: 100%; text-align: end;">
                    <input type="button" value="Close" onclick="window.location.href='../index.php';"><br>
                </div>
                
                <label for="first_name">First Name</label><br>
                <input type="text" name="first_name" required><br>

                <label for="middle_name">Middle Name</label><br>
                <input type="text" name="middle_name" required><br>

                <label for="last_name">Last Name</label><br>
                <input type="text" name="last_name" required><br>

                <label for="cellphone_no">Cellphone No.</label><br>
                <input type="text" name="cellphone_no" pattern="[0-9]{11}" maxlength="11" required><br>

                <label for="address">Address</label><br>
                <input type="text" name="address" ><br>

                <label for="birthdate">Birthdate</label><br>
                <div style="width: 30%;">
                    <input style="width: 100%; height: 40px;" type="date" name="birthdate" required><br>
                </div>
                
                <label for="gender">Gender</label>
                <div>
                    <input type="radio" name="gender" value="Male" required> Male
                    <input type="radio" name="gender" value="Female" required> Female<br>
                </div>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
