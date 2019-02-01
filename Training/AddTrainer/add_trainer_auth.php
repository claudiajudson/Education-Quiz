<?php
// Adding in the configuration file
include ('../../config.php');

$trainer= $_POST['trainer_name'] ;


//check if test name exists:
$query = ("SELECT Name FROM Trainer WHERE Name='$trainer'");
$trainer_exist = mysqli_query($conn, $query);

if(mysqli_num_rows($trainer_exist)==0) {

    $query2 = ("INSERT INTO Trainer (Name) VALUE ('$trainer')");
    $insert = mysqli_query($conn, $query2);

    header("location: add_trainer.php?alert=Trainer%20added%20");
}

else{
    header("location: add_trainer.php?error=Error%20$trainer%20is%20in%20database");
}

?>


