<?php  

function insertInstructor($pdo, $uName, $Qualification, $Experience, $ContactInfo) {

	$sql = "INSERT INTO Instructors(uName, Qualification, Experience, ContactInfo) VALUES(?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$uName, $Qualification, 
		$Experience, $ContactInfo]);

	if ($executeQuery) {
		return true;
	}
}



function updateInstructor($pdo, $uName, $Qualification, 
	$Experience, $ContactInfo, $InstructorId) {

	$sql = "UPDATE Instructors
				SET uName = ?,
					Qualification = ?,
					Experience = ?, 
					ContactInfo = ?
				WHERE InstructorId = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$uName, $Qualification, 
		$Experience, $ContactInfo, $InstructorId]);
	
	if ($executeQuery) {
		return true;
	}

}


function deleteInstructor($pdo, $InstructorId) {
	$deleteInstClass = "DELETE FROM Classes WHERE InstructorId = ?";
	$deleteStmt = $pdo->prepare($deleteInstClass);
	$executeDeleteQuery = $deleteStmt->execute([$InstructorId]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM Instructors WHERE InstructorId = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$InstructorId]);

		if ($executeQuery) {
			return true;
		}

	}
	
}




function getAllInstructors($pdo) {
	$sql = "SELECT * FROM Instructors";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getAllInfoByInstID($pdo, $InstructorId) {
	$sql = "SELECT * FROM Instructors WHERE InstructorId = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$InstructorId]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}





function getClassByInstructor($pdo, $InstructorId) {
  
    $sql = "SELECT 
              Classes.ClassId AS ClassId,
              Classes.ClassName AS ClassName,
              Classes.DayOfWeek AS DayOfWeek,
              Classes.Time AS Time,
              Classes.InstructorId AS InstructorId,
              CONCAT_WS(' ', Instructors.uName) AS Class_Instructor
            FROM Classes
            JOIN Instructors ON Classes.InstructorId = Instructors.InstructorId
            WHERE Classes.InstructorId = ? 
            GROUP BY Classes.ClassName;";
  
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$InstructorId]);
    if ($executeQuery) {
      return $stmt->fetchAll();
    }
  }


function insertClass($pdo, $ClassId, $ClassName, $DayOfWeek, $Time, $InstructorId) {
	$sql = "INSERT INTO Classes (ClassId, ClassName, DayOfWeek, Time, IntructorId) VALUES (?,?,?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$ClassId, $ClassName, $DayOfWeek, $Time, $InstructorId]);
	if ($executeQuery) {
		return true;
	}

}

function getClassByID($pdo, $ClassId) {
    $sql = "SELECT 
                Classes.ClassId AS ClassId,
                Classes.ClassName AS ClassName,
                Classes.DayOfWeek AS DayOfWeek,
                Classes.Time AS Time,
                Classes.InstructorId AS InstructorId,
                CONCAT_WS(' ', Instructors.uName) AS Class_Instructor
            FROM Classes
            JOIN Instructors ON Classes.InstructorId = Instructors.InstructorId
            WHERE Classes.ClassId = ? 
            GROUP BY Classes.ClassName";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$ClassId]);
    if ($executeQuery) {
        return $stmt->fetch();
    }
}

function updateClass($pdo, $ClassName, $DayOfWeek, $Time, $InstructorId, $ClassId) {
	$sql = "UPDATE projects
			SET ClassName = ?,
				DayOfWeek = ?,
                Time = ?
                InstructorId = ?
			WHERE ClassId = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$ClassName, $DayOfWeek, $Time, $InstructorId, $ClassId]);

	if ($executeQuery) {
		return true;
	}
}

function deleteClass($pdo, $ClassId) {
	$sql = "DELETE FROM Classes WHERE Classid = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$ClassId]);
	if ($executeQuery) {
		return true;
	}
}

function insertNewUser($pdo, $username, $password) {

	$checkUserSql = "SELECT * FROM user_passwords WHERE username = ?";
	$checkUserSqlStmt = $pdo->prepare($checkUserSql);
	$checkUserSqlStmt->execute([$username]);

	if ($checkUserSqlStmt->rowCount() == 0) {

		$sql = "INSERT INTO user_passwords (username,password) VALUES(?,?)";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$username, $password]);

		if ($executeQuery) {
			$_SESSION['message'] = "User successfully inserted";
			return true;
		}

		else {
			$_SESSION['message'] = "An error occured from the query";
		}

	}
	else {
		$_SESSION['message'] = "User already exists";
	}

	
}

function loginUser($pdo, $username, $password) {
	$sql = "SELECT * FROM user_passwords WHERE username=?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$username]); 

	if ($stmt->rowCount() == 1) {
		$userInfoRow = $stmt->fetch();
		$usernameFromDB = $userInfoRow['username']; 
		$passwordFromDB = $userInfoRow['password'];

		if ($password == $passwordFromDB) {
			$_SESSION['username'] = $usernameFromDB;
			$_SESSION['message'] = "Login successful!";
			return true;
		}

		else {
			$_SESSION['message'] = "Password is invalid, but user exists";
		}
	}

	
	if ($stmt->rowCount() == 0) {
		$_SESSION['message'] = "Username doesn't exist from the database. You may consider registration first";
	}

}

function getAllUsers($pdo) {
	$sql = "SELECT * FROM user_passwords";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}

}

function getUserByID($pdo, $user_id) {
	$sql = "SELECT * FROM user_passwords WHERE user_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$user_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}


?>