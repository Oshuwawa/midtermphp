CREATE TABLE Members (
    MemberId INT PRIMARY KEY,
    Name VARCHAR(50),
    Age INT,
    Gender VARCHAR(10),
    ContactInfo VARCHAR(100),
    BeltRank VARCHAR(20),
    EnrollmentDate DATE,
    ExpirationDate DATE
);

CREATE TABLE Instructors (
    InstructorId INT PRIMARY KEY,
    uName VARCHAR(50),
    Qualification VARCHAR(50),
    Experience INT,
    ContactInfo VARCHAR(100)
);

CREATE TABLE Classes (
    ClassId INT PRIMARY KEY,
    ClassName VARCHAR(50),
    DayOfWeek VARCHAR(20),
    Time TIME,
    InstructorId INT,
    FOREIGN KEY (InstructorId) REFERENCES Instructors(InstructorId)
);

CREATE TABLE Attendance (
    AttendanceId INT PRIMARY KEY,
    MemberId INT,
    ClassId INT,
    Date DATE,
    AttendanceStatus VARCHAR(20),
    FOREIGN KEY (MemberId) REFERENCES Members(MemberId),
    FOREIGN KEY (ClassId) REFERENCES Classes(ClassId)
);

INSERT INTO Members (MemberId, Name, Age, Gender, ContactInfo, BeltRank, EnrollmentDate, ExpirationDate)
VALUES
    (1, 'John Doe', 15, 'Male', 'johndoe@email.com', 'White', '2023-01-01', '2024-12-31'),
    (2, 'Jane Smith', 12, 'Female', 'janesmith@email.com', 'Yellow', '2023-02-15', '2024-01-15'),
    (3, 'Michael Lee', 18, 'Male', 'michaellee@email.com', 'Green', '2023-03-01', '2024-03-01');

INSERT INTO Instructors (InstructorId, Name, Qualification, Experience, ContactInfo)
VALUES
    (1, 'Master Kim', '5th Dan', 20, 'masterkim@email.com'),
    (2, 'Coach Lee', '3rd Dan', 10, 'coachlee@email.com');

INSERT INTO Classes (ClassId, ClassName, DayOfWeek, Time, InstructorId)
VALUES
    (1, 'Beginner', 'Monday', '16:00:00', 2),
    (2, 'Intermediate', 'Wednesday', '18:00:00', 1),
    (3, 'Advanced', 'Friday', '19:00:00', 1);

INSERT INTO Attendance (AttendanceId, MemberId, ClassId, Date, AttendanceStatus)
VALUES
    (1, 1, 1, '2023-01-02', 'Present'),
    (2, 2, 2, '2023-02-16', 'Absent'),
    (3, 3, 3, '2023-03-02', 'Late');