<?php
// Adding in the configuration file
include('../../config.php');
?>

<Html>

<title>Answers and Questions Inputs</title>
<link rel='stylesheet' type='text/css' href='questions_and_answers.css'/>


<body>

<?php
$number=$_GET['numberofquestions'];
$question_number = 1;
$id=$_GET['Id'];
?>


<form name ='q_and_a' method ='post' action ='addqanda.php'>
<?php
for ($i = 0; $i < $number; $i++) {

    echo "<div class='q_and_a_box'>";

    echo "<h3>".$question_number."</h3>";

    echo"<td id='question' style='padding-bottom:5px'>Question:</td>";
    echo"<td style='padding-right:5px'><input type='text' placeholder='Question' name='Question$i' required</td><br>";
    echo "<td id='answers' style='padding-bottom:5px'>";


    echo"<input type = 'text' name='Answer_A$i'  placeholder='Option A' maxlength='20' required/><input type='radio' name='true_answer$i' value='A' required><br>";
    echo"<input type = 'text' name ='Answer_B$i'  placeholder='Option B' maxlength='20' required/><input type='radio' name='true_answer$i' value='B'><br>";
    echo"<input type = 'text' name ='Answer_C$i'  placeholder='Option C' maxlength='20' required/><input type='radio' name='true_answer$i' value='C'><br>";

    echo"<input type='file' name='pic' accept='image/*'>";
    echo "</td>";
    $question_number++;
    echo "</div>";

}
echo"<input type='hidden' name='Id' value='$id'>";
echo"<input type='hidden' name='number_of_questions' value='$number'>";
?>
<input type = 'submit' VALUE = 'Set the test'>

</form>

</body>

<a class='footer'> Copyright  &copy;  2018  Claudia  Judson</a> <!-- Creating a copyright in the footer -->

</Html>