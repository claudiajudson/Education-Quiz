<Html>

<title>Test Settings</title>
<link rel='stylesheet' type='text/css' href='../general_style.css'/>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>


<body>
<ul class='navigation_bar'>
    <li>
        <a href='../HomePages/home_user.php'>Home</a>
    </li>
    <li>
        <a class='active' >Tests</a>
    </li>
    <li class='right' >
        <a href='../AccountPage/account_user_home.php'>
            <?php
            if(!isset($_SESSION)){
                session_start();
            }
            echo $_SESSION['user']['Login_Username'];
            ?>
        </a>
    </li>
</ul>


<h1 id='home_header'>TESTS HOME</h1>

<p>
    <a href='CompleteTest/test_choose.php' id='circle_images_container'>
        <img id='circle_images' src='complete_test.png' /> <!--https://www.flaticon.com/packs/modern-education-->
    </a>
    Complete Test
</p>

<p>
    <a href='ViewResults/view_results_user.php' id='circle_images_container'>
        <img id='circle_images' src='view_results.png' /> <!--https://www.flaticon.com/packs/modern-education-->
    </a>
    View Results
</p>


<a class='footer'> Copyright  &copy;  2018  Claudia  Judson</a> <!-- Creating a copyright in the footer -->

</body>

</Html>