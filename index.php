<?php
include 'dbConnection.php';

$sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'id';
$sortOrder = isset($_GET['order']) && $_GET['order'] === 'desc' ? 'DESC' : 'ASC';

$allowedColumns = ['id', 'first_name', 'middle_name', 'last_name', 'cellphone_no', 'birthdate', 'address', 'gender'];
if (!in_array($sortColumn, $allowedColumns)) {
    $sortColumn = 'id';
}

$newSortOrder = $sortOrder === 'ASC' ? 'DESC' : 'ASC';

$sql = "SELECT * FROM applicant_table ORDER BY $sortColumn $newSortOrder";
$result = $conn->query($sql);

$applicants = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $applicants[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Quantum X Applicants</title>

</head>
<body>
    <div class="title">
        <h1>Quantum <span>X</span></h1><br>
        <h2>Applicants</h2>
    </div>

    <div class="table-container">
        <a class="add-applicant"href="pages/addApplicantPage.php">Add New Applicant</a>
        <?php if (empty($applicants)): ?>
            <h1>No applicants found.</h1>
            <?php else: ?>
                <div class="table-wrapper">
                    <table class="applicants">
                        <thead>
                            <tr>
                                <th><a href="?sort=id&order=<?php echo $sortColumn === 'id' && $sortOrder === 'ASC' ? 'desc' : 'asc'; ?>"><span class="arrow"> <?php echo $sortColumn === 'id' ? ($sortOrder === 'ASC' ? '▲' : '▼') : ''; ?></span>ID</a></th>
                                <th><a href="?sort=first_name&order=<?php echo $sortColumn === 'first_name' && $sortOrder === 'ASC' ? 'desc' : 'asc'; ?>"><span class="arrow"><?php echo $sortColumn === 'first_name' ? ($sortOrder === 'ASC' ? '▲' : '▼') : ''; ?></span>First Name</a></th>
                                <th><a href="?sort=middle_name&order=<?php echo $sortColumn === 'middle_name' && $sortOrder === 'ASC' ? 'desc' : 'asc'; ?>"><span class="arrow"><?php echo $sortColumn === 'middle_name' ? ($sortOrder === 'ASC' ? '▲' : '▼') : ''; ?></span>Middle Name</a></th>
                                <th><a href="?sort=last_name&order=<?php echo $sortColumn === 'last_name' && $sortOrder === 'ASC' ? 'desc' : 'asc'; ?>"><span class="arrow"><?php echo $sortColumn === 'last_name' ? ($sortOrder === 'ASC' ? '▲' : '▼') : ''; ?></span>Last Name</a></th>
                                <th><a href="?sort=cellphone_no&order=<?php echo $sortColumn === 'cellphone_no' && $sortOrder === 'ASC' ? 'desc' : 'asc'; ?>"><span class="arrow"><?php echo $sortColumn === 'cellphone_no' ? ($sortOrder === 'ASC' ? '▲' : '▼') : ''; ?></span>Contact</a></th>
                                <th><a href="?sort=address&order=<?php echo $sortColumn === 'address' && $sortOrder === 'ASC' ? 'desc' : 'asc'; ?>"><span class="arrow"><?php echo $sortColumn === 'address' ? ($sortOrder === 'ASC' ? '▲' : '▼') : ''; ?></span>Address</a></th>
                                <th><a href="?sort=birthdate&order=<?php echo $sortColumn === 'birthdate' && $sortOrder === 'ASC' ? 'desc' : 'asc'; ?>"><span class="arrow"><?php echo $sortColumn === 'birthdate' ? ($sortOrder === 'ASC' ? '▲' : '▼') : ''; ?></span>Birthdate</a></th>
                                <th><a href="?sort=gender&order=<?php echo $sortColumn === 'gender' && $sortOrder === 'ASC' ? 'desc' : 'asc'; ?>"><span class="arrow"><?php echo $sortColumn === 'gender' ? ($sortOrder === 'ASC' ? '▲' : '▼') : ''; ?></span>Gender</a></th>
                                <th colspan="2">Actions</th>

                            </tr>   
                        </thead>
                        <tbody>
                            <?php foreach ($applicants as $applicant): ?>
                                <tr>
                                    <td><?php echo $applicant['id']; ?></td>
                                    <td><?php echo $applicant['first_name']; ?></td>
                                    <td><?php echo $applicant['middle_name']; ?></td>
                                    <td><?php echo $applicant['last_name']; ?></td>
                                    <td><?php echo $applicant['cellphone_no'];?></td>
                                    <td><?php echo $applicant['address'];?></td>
                                    <td><?php echo $applicant['birthdate']; ?></td>
                                    <td><?php echo $applicant['gender'];?></td>
                                    <td><a class="edit" href='pages/editApplicantPage.php?id=<?php echo $applicant['id']; ?>'>Edit</a></td>
                                    <td><a class="delete" href='actions/deleteApplicant.php?id=<?php echo $applicant['id']; ?>'>Delete</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
        <?php endif; ?>
    </div>
</body>
</html>
