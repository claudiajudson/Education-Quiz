<Html>

<title>Choose Test</title>
<link rel='stylesheet' type='text/css' href='../../general_style.css'/>
<link rel='stylesheet' type='text/css' href='../user_test_style.css'/>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>

<body>
<ul class='navigation_bar'>
    <li>
        <a  href="../test_user_home.php">Back</a>
    </li>

    <li class="right" >
        <a href="../../AccountPage/account_user_home.php">
            <?php
            if(!isset($_SESSION)){
                session_start();
            }
            echo $_SESSION['user']['Login_Username'];
            ?>
        </a>
    </li>
</ul>
<h1 id='home_header'>TESTS</h1>
<h3>
    <?php

    include('../../config.php');

    $query = ("SELECT * FROM Test_Paper");
    $result = mysqli_query($conn, $query);


    $n = mysqli_num_rows($result);
    $n = $n - 1;



    while ($row = mysqli_fetch_array($result)) {
        if ($row['Status'] == "Live") {

            echo "<div class='test_box'> ";
            echo "<h2><a href='select_trainer.php?id={$row['Id']}'>{$row['Name']}</a></h2>";
            echo "</div>";
        }

    }


    ?>
</h3>



<a class='footer'> Copyright  &copy;  2018  Claudia  Judson</a> <!-- Creating a copyright in the footer -->
</body>


</Html>