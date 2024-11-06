<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbconfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Are you sure you want to delete this user?</h1>
	<?php $getInstructorByID = getAllInfoByInstID($pdo, $_GET['InstructorId']); ?>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Name: <?php echo $getInstructorByID['uName']; ?></h2>
		<h2>Qualification: <?php echo $getInstructorByID['Qualification']; ?></h2>
		<h2>Experience: <?php echo $getInstructorByID['Experience']; ?></h2>
		<h2>Contact Info: <?php echo $getInstructorByID['ContactInfo']; ?></h2>
		

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
        <form action="core/handleForms.php?action=deleteInstructor&InstructorId=<?php echo $_GET['InstructorId']; ?>" method="POST">
            <input type="hidden" name="InstructorId" value="<?php echo $_GET['InstructorId']; ?>">
            <input type="submit" name="deleteInstructorBtn" value="Delete">
        </form>		
		</div>	

	</div>
</body>
</html>