<?php

// We can have to database main and another as old. When someone deletes or edits a dtabase record a copy of main database is copied to the old and than the changes are applied. in the old database nothing is lost.

//main database details
$host = "localhost";
$username = "jobssys";
$password = "aSVpZGRnxjHyTXtl";
$dataset = "jobssys";

// Activatiing a connection
$mainconnection = mysqli_connect($host, $username, $password, $dataset);

if (!$mainconnection)
{
    die ("Something went wrong while trying to connect to main database". mysqli_connect_error());
}

//Whenever you want to use this main data use
// $somevariable = mysqli_query($mainconnection, $sql);
//$sql variable should have the sql query you want to run. for example
//$sql = "INSERT INTO contactform_entries (id, fname, lname, email) VALUES ('0', '$fname', '$lname', '$email')";

/*

//old database details
$host = "localhost";
$username = "username";
$password = "password";
$dataset = "";

// Activatiing a connection
$oldconnection = mysqli_connect($host, $username, $password, $dataset);

if (!$oldconnection)
{
    die ("Something went wrong while trying to connect to old database". mysqli_connect_error());
}
*/