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
	<a href="viewprojects.php?InstructorId=<?php echo $_GET['InstructorId']; ?>">
	View The Classes</a>
	<h1>Edit the project!</h1>
	<?php $getClassByID = getClassByID($pdo, $_GET['ClassId']); ?>
	<form action="core/handleforms.php?ClassId=<?php echo $_GET['ClassId']; ?>
	&InstructorId=<?php echo $_GET['InstructorId']; ?>" method="POST">
		<p>
			<label for="firstName">Class Name</label> 
			<input type="text" name="projectName" 
			value="<?php echo $getClassByID['ClassName']; ?>">
		</p>
		<p>
			<label for="firstName">Day Of The Week</label> 
			<input type="text" name="technologiesUsed" 
			value="<?php echo $getClassByID['DayOfWeek']; ?>">
			<input type="submit" name="editProjectBtn">
		</p>
	</form>
</body>
</html>