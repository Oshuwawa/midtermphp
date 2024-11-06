<?php require_once 'core/handleforms.php'; ?>
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
	<?php $getInstructorByID = getAllInfoByInstID($pdo, $_GET['InstructorId']); ?>
	<h1>Edit the user!</h1>
	<form action="core/handleforms.php?InstructorId=<?php echo $_GET['InstructorId']; ?>" method="POST">
		<p>
			<label for="Name">Name</label> 
			<input type="text" name="Name" value="<?php echo $getInstructorByID['uName']; ?>">
		</p>
		<p>
			<label for="Qualification">Qualification</label> 
			<input type="text" name="Qualification" value="<?php echo $getInstructorByID['Qualification']; ?>">
		</p>
		<p>
			<label for="Experience">Experience</label> 
			<input type="Text" name="Experience" value="<?php echo $getInstructorByID['Experience']; ?>">
		</p>
		<p>
			<label for="ContactInfo">Contact Info</label> 
			<input type="text" name="ContactInfo" value="<?php echo $getInstructorByID['ContactInfo']; ?>">
			<input type="submit" name="editWebDevBtn">
		</p>
	</form>
</body>
</html>