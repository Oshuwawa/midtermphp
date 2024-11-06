<?php require_once 'core/dbconfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $getClassByID = getClassByID($pdo, $_GET['ClassId']); ?>
	<h1>Are you sure you want to delete this class?</h1>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Class Name: <?php echo $getClassByID['ClassName'] ?></h2>
		<h2>DayOfWeek: <?php echo $getClassByID['DayOfWeek'] ?></h2>
		<h2>Class Instructor: <?php echo $getClassByID['Class_Instructor'] ?></h2>
		<h2>InstructorId: <?php echo $getClassByID['InstructorId'] ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">

			<form action="core/handleForms.php?ClassId=<?php echo $_GET['ClassId']; ?>&InstructorId=<?php echo $_GET['InstructorId']; ?>" method="POST">
				<input type="submit" name="deleteClassBtn" value="Delete">
			</form>			
			
		</div>	

	</div>
</body>
</html>