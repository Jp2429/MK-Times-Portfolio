<?php # CONNECT TO MySQL DATABASE.

    # Connect/Link  on 'localhost' .
    $link = mysqli_connect('localhost','root','','mktimes',3308); 
    if (!$link) { 
    # Otherwise fail gracefully and explain the error. 
    die('Could not connect to MySQL: ' . mysqli_error()); 
    } 
    //echo 'Connected to the database successfully!';  
?> 