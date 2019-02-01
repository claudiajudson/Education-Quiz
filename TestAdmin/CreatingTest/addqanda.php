<?php
// Adding in the configuration file
include ('../../config.php');
$number_of_questions = $_POST['number_of_questions'];

$id1 = $_POST['Id'];
$question_number = 1;


for ($i = 0; $i < $number_of_questions; $i++) {
    $question= $_POST['Question'.$i];
    $true_answer = $_POST['true_answer'.$i];

    $AnswerA = $_POST['Answer_A'.$i];
    $AnswerB = $_POST['Answer_B'.$i];
    $AnswerC = $_POST['Answer_C'.$i];

    $true_answerA = $true_answer === 'A' ? 1 : 0 ;
    $true_answerB = $true_answer === 'B' ? 1 : 0 ;
    $true_answerC = $true_answer === 'C' ? 1 : 0 ;

    $query= ("INSERT INTO Test_Question (Test_Paper_Id, Order_Number, Question_Text) VALUES ('$id1','$question_number', '$question')");
    $sql = mysqli_query($conn, $query);

    $id2 = mysqli_insert_id($conn);

    echo "question entered into database <br>";


    $query2A = ("INSERT INTO Test_Question_Option (Test_Question_Id,Order_Number,Option_Text,Correct_Answer_Flag) VALUES ($id2,1,'$AnswerA', $true_answerA)");
    $query2B = ("INSERT INTO Test_Question_Option (Test_Question_Id,Order_Number,Option_Text,Correct_Answer_Flag) VALUES ($id2,2,'$AnswerB', $true_answerB)");
    $query2C = ("INSERT INTO Test_Question_Option (Test_Question_Id,Order_Number,Option_Text,Correct_Answer_Flag) VALUES ($id2,3,'$AnswerC', $true_answerC)");


    echo $query."<br>";
    echo $query2A."<br>";
    echo $query2B."<br>";
    echo $query2C."<br>";

    mysqli_query($conn, $query2A);
    mysqli_query($conn, $query2B);
    mysqli_query($conn, $query2C);

    $question_number++;

}

?>