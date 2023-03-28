<?php
    session_start();
    include 'connection.php';
    global $server;


    if(isset($_POST['companysubmit'])) {
        $CompanyName = $_POST['company'];
        $addCompany = "INSERT INTO company (company) VALUES ('$CompanyName')";
        mysqli_query($server, $addCompany);
        header('Location: ../../app/');

    }