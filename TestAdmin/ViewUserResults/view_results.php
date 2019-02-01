<?php

include ("../../config.php");
?>

<Html>

<title>View Results</title>
<link rel='stylesheet' type='text/css' href='../../general_style.css'/>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>


<body>
<ul class='navigation_bar'>
    <li>
        <a  href='../Test_admin_home.php'>Back</a>
    </li>
    <li class='right' >
        <a href='../../AccountPage/account_user_home.php'>
            <?php
            if(!isset($_SESSION)){
                session_start();
            }
            echo $_SESSION['user']['Login_Username'];

            ?>
        </a>
    </li>
</ul>


<h1 id='home_header'>VIEW USER RESULTS</h1>

<div class="TABLE">
    <table width='80%' border=0 align="center">
        <tr bgcolor='#CCCCCC'>
            <th>Test Name</th>
            <th>Username</th>
            <th>Score</th>
            <th>Max Score</th>
            <th>Percentage</th>

        </tr>
        <?php

        //This is an example of a joining three tables
        $query = ("SELECT tp.Name AS 'Test_Name', au.Name AS 'Username', st.User_Score, st.Total_Score, st.Total_Score_Percentage FROM Test_Paper tp, Student_Tests st, Application_User au WHERE tp.id = st.Test_Paper_id and st.Application_User_id = au.id");
        $result = mysqli_query($conn,$query);

        while($res = mysqli_fetch_array($result)) {

            echo "<tr>";
            echo "<td>".$res['Test_Name']."</td>";
            echo "<td>".$res['Username']."</td>";
            echo "<td>".$res['User_Score']."</td>";
            echo "<td>".$res['Total_Score']."</td>";
            echo "<td>".$res['Total_Score_Percentage']."</td>";

        }
        ?>
    </table>
</div>

<style>

    .TABLE {
        height: 60%;
    }
    table {
        font-family: Lucida Grande, Lucida Sans Unicode, Arial, sans-serif;
        border-collapse: collapse;
        width: 60%;
        table-layout: auto;
    }

    table td, table th {
        border: 3px solid #ddd;
        padding: 8px;
    }

    table tr:nth-child(even){background-color: #f2f2f2;}

    table tr:hover {background-color: #ddd;}

    table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #6f60af;
        color: white;
    }


</style>
<a class='footer'> Copyright  &copy;  2018  Claudia  Judson</a> <!-- Creating a copyright in the footer -->

</body>

</Html>