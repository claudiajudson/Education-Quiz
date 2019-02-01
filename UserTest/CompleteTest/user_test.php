<Html>

<title>Test Page</title>
<link rel='stylesheet' type='text/css' href='../../general_style.css'/>
<link rel="stylesheet" type="text/css" href="../user_test_style.css"/>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>

<body>


<?php
include('../../config.php');
$test_id = $_GET['id'];
$trainer_id = $_POST['trainer'];

$query = ("SELECT name FROM Test_Paper where id =$test_id");
$result = mysqli_query($conn,$query);

$query1 = "SELECT * FROM Test_Question WHERE Test_Paper_Id = $test_id ";
$result2 = mysqli_query($conn, $query1);

$row = mysqli_fetch_assoc($result);
echo "<h2>".$row['name']."</h2>";

$n = mysqli_num_rows($result2);
$n = $n - 1;
$question_number = 1;


echo "<form action='test_auth.php?id=$test_id&tid=$trainer_id' method='post'>";

while ($row2 = mysqli_fetch_array($result2)) {
    $question_id = $row2['Id'];

    echo "<div class='question_box'> ";
    echo "<h3>".$question_number.". ".$row2['Question_Text']."</h3>";

    //echo "<h3>".$question_id."</h3>";
    $query2 = "SELECT * FROM Test_Question_Option WHERE Test_Question_Id = '$question_id'";
    $result3 = mysqli_query($conn, $query2);

    while ($row3 = mysqli_fetch_array($result3)) {
        echo "<input type = 'radio' name='".$question_id."' value='".$row3['Option_Text']."' required>" .$row3 ['Option_Text']. "</input><br>" ;
    }

    echo "</div>";

    $question_number++;

}
echo "<input type='submit'> ";
echo "<form>";

?>