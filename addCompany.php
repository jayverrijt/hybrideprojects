<?php
    session_start();
    include 'connection.php';


    if(isset($_POST['companysubmit'])) {
        $CompanyName = $_POST['company'];
        $addCompany = "INSERT INTO company (company) VALUES ('$CompanyName')";
        mysqli_query($conn, $addCompany);

        header('Location: app/');

    }
?>