<?php
// Adding in the configuration file
include ('../../config.php');

$testname= $_POST['Test_name'] ;
$status = $_POST['Status'];
$training_course = $_POST['training_course'];
$number_of_questions = $_POST['number_of_questions'];
$max_score = $number_of_questions*5;



//check if test name exists:
$query = ("SELECT Name FROM Test_Paper WHERE Name='$testname'");
$testname_exist = mysqli_query($conn, $query);

if(mysqli_num_rows($testname_exist)==0) {

    $query2 = ("INSERT INTO Test_Paper (Training_Course_Id, Name, Status, Max_Score) VALUES ($training_course,'$testname', '$status', $max_score)");
    $sql = mysqli_query($conn, $query2);
    $id = mysqli_insert_id($conn);

    header("location: question_and_answers.php?numberofquestions=$number_of_questions&Id=$id");
}
else{
    header("location: creating_test.php?error=Error%20$testname%20is%20taken");
}

?>