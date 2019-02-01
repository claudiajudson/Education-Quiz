<?php
// Adding in the configuration file
include ("../../config.php");

$query = ("SELECT * FROM Training_Course ORDER BY Id ASC");
$select = mysqli_query($conn, $query); // using mysqli_query instead


?>





<Html>
<title>Manage Courses</title>
<link rel='stylesheet' type='text/css' href='../../general_style.css'/>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<body>
<ul class='navigation_bar'>
    <li><a href="../training_course_home.php">Back</a></li>
    <li class="right"><a href="../../AccountPage/account_admin_home.php"><?php
            if(!isset($_SESSION)){
                session_start();

            }
            echo $_SESSION["user"]["Login_Username"];


            ?></a></li>
</ul>

<h1 id='home_header'>MANAGE COURSES</h1>

<div class="TABLE">
<table width='80%' border=0 align="center">
    <tr bgcolor='#CCCCCC'>
        <th>Name</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php

    while($res = mysqli_fetch_array($select)) {
        echo "<tr>";
        echo "<td>".$res['Name']."</td>";
        echo "<td>".$res['Status']."</td>";
        echo "<td><a href=\"courses_edit.php?id=$res[Id]\">Edit</a>";
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
</body>
<a class="footer"> Copyright  &copy;  2018  Claudia  Judson</a> <!-- Creating a copyright in the footer -->
</Html>









