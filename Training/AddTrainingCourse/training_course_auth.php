<?php
// Adding in the configuration file
include ('../../config.php');

$coursename= $_POST['course_name'] ;


//check if test name exists:
$query = ("SELECT Name FROM Training_Course WHERE Name='$coursename'");
$coursename_exist = mysqli_query($conn, $query);

if(mysqli_num_rows($coursename_exist)==0) {

    $query2 = ("INSERT INTO Training_Course (Name) VALUE ('$coursename')");
    $insert = mysqli_query($conn, $query2);

    header("location: training_course.php?alert=Course%20added%20");
}
else{
    header("location: training_course.php?error=Error%20$coursename%20is%20taken");
}

?>



