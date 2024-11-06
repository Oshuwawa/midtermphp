<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbconfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Classes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="index.php">Return to home</a>
    <?php 
        // Check if web_dev_id is set
        if (isset($_GET['InstructorId'])) {
            $InstructorId = $_GET['InstructorId'];
            $getAllInfoByInstID = getAllInfoByInstID($pdo ,$InstructorId); 
        } else {
            die("Error: Instructor is not provided.");
        }
    ?>
    <h1>Name: <?php echo htmlspecialchars($getAllInfoByInstID['uName']); ?></h1>
    <h1>Add New Class</h1>
    <form action="core/handleforms.php?InstructorId=<?php echo $InstructorId; ?>" method="POST">
        <p>
            <label for="ClassName">Class Name</label> 
            <input type="text" name="ClassName" required>
        </p>
        <p>
            <label for="DayOfWeek">Day of the week</label> 
            <input type="text" name="DayOfWeek" required>
        </p>
        <p>
            <label for="Time">Time</label> 
            <input type="text" name="Time" required>
        </p>
        <p>
            <label for="InstructorId">Instructor Id</label> 
            <input type="text" name="InstructorId" required>
            <input type="submit" name="insertNewProjectBtn">
        </p>
    </form>

    <table style="width:100%; margin-top: 50px;">
      <tr>
        <th>Class ID</th>
        <th>Class Name</th>
        <th>Day Of the Week</th>
        <th>Time</th>
        <th>Instructor ID</th>
        <th>Class Instructor</th>
      </tr>
      <?php $getClassByInstructor = getClassByInstructor($pdo, $InstructorId); ?>
      <?php foreach ($getClassByInstructor as $row) { ?>
      <tr>
        <td><?php echo htmlspecialchars($row['ClassId']); ?></td>      
        <td><?php echo htmlspecialchars($row['ClassName']); ?></td>      
        <td><?php echo htmlspecialchars($row['DayOfWeek']); ?></td>      
        <td><?php echo htmlspecialchars($row['Time']); ?></td> <!-- Assuming you want to display the web_dev_id here -->
        <td><?php echo htmlspecialchars($row['InstructorId']); ?></td>
        <td>
            <a href="editclass.php?ClassId=<?php echo $row['ClassId']; ?>&InstructorId=<?php echo $InstructorId; ?>">Edit</a>
            <a href="deleteclass.php?ClassId=<?php echo $row['ClassId']; ?>&InstructorId=<?php echo $InstructorId; ?>">Delete</a>
        </td>      
      </tr>
    <?php } ?>
    </table>
</body>
</html>