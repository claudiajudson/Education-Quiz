<?php
include('../../config.php');
if(!isset($_SESSION)){
    session_start();
}
$user_id= $_SESSION["user"]["Id"];
$test_id = $_GET['id'];
$trainer_id = $_GET['tid'];
$stscore = 0;
$total_score = 0;
$no_of_questions = 0;
$correct_qus = 0;



$score_array = [];
$questions = $_POST;
foreach($questions as $questionID=>$questionValue){
    $query = ("SELECT Option_Text, Id FROM Test_Question_Option WHERE Correct_Answer_Flag=1 AND Test_Question_Id='.$questionID.' LIMIT 1");
    $sql = $conn->query($query) or die($conn->error);
    if($result = $sql->fetch_assoc()) {
        $marks = 5;
        $optionID = $result["Id"];
        if ($questionValue === $result["Option_Text"]) {

            $response_flag = 1;
            $score = 5;
            $no_of_questions = $no_of_questions+1;
            $correct_qus = $correct_qus+1;

        }
        else {

            $response_flag =0;
            $score = -2;
            $no_of_questions = $no_of_questions+1;

        }
        array_push($score_array,[$optionID, $score,$response_flag]);
        $total_score = $total_score + $marks;
        $stscore = $stscore + $score;
    }
}

$percentage = ($correct_qus/$no_of_questions)*100;
//echo "<br> $user_id, $trainer_id, $total_score, $percentage <br>";

$query1 = ("INSERT INTO Student_Tests (Application_User_Id, Test_Paper_Id,Trainer_Id, User_Score, Total_Score ,Total_Score_Percentage) VALUES ($user_id,$test_id,$trainer_id, $stscore ,$total_score,$percentage)");
$student_tests_db = mysqli_query($conn,$query1);

//echo $query1 . "<br>";
$student_test_id = mysqli_insert_id($conn);

//echo $student_test_id . "<br>";

for ($i=0; $i<count($score_array); $i++) {
    $row = $score_array[$i];
    $qid = $row[0];
    $score = $row[1];
    $flag = $row[2];

    $query2 = ("INSERT INTO `Student_Test_Response`(`Student_Tests_Id`, `Test_Question_Option_Id`, `Score`, `Response_Flag`) VALUES ($student_test_id, $qid, $score, $flag)");
    mysqli_query($conn, $query2);
    //echo $query2 ."<br>";

}


?>


<Html>

<title>Score</title>
<link rel='stylesheet' type='text/css' href='../../general_style.css'/>
<body>
<h1 id='home_header'>Results</h1>


<?php
echo "<div class='form_area'>";
    echo "<div class='form_container'>";
        echo"<h3>Results</h3>";
        echo "<form class='questionnaire_name_form' method='post' action='../../HomePages/home_user.php' autocomplete='off'>";
            echo "<table border='0'>";
                echo "<tr>";
                    echo "<td>Percentage:</td>";
                    echo "<td>".($percentage*100)." % </td>";
                echo "<tr>";
                echo "<tr>";
                    echo "<td>Your Score:</td>";
                    echo "<td>".$stscore."</td>";
                echo "<tr>";

                echo "<tr>";
                    echo "<td> Marks Available:</td>";
                    echo "<td>".$total_score."</td>";
                echo "<tr>";

            echo "</table>";
            echo "<input type='submit' value='Home'>";
        echo "</form>";

        echo"<font size=\"-1\">Every correct answer scores 5 every incorrect answer scores -2</font>";
        echo"</div>";
    echo"</div>";
    ?>


</body>

</Html>
