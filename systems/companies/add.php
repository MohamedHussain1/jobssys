<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //define and set to empty
    $companyname = $phone = $email = $notes = $address_id= "";

    // Process form data from add.html and use a cleaning dunction for security


    //create a cleaning function to clean posted data just in case
    function CleaningService2($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        // lets return the data after cleaning it
        return $data;
    }

    // lets assign the posted information to the variables above and assign it a cleaning function
    $companyname = CleaningService2($_POST["companyname"]);
    $phone = CleaningService2($_POST["phone"]);
    $email = CleaningService2($_POST["email"]);
    $notes = CleaningService2($_POST["notes"]);
    $address_id = CleaningService2($_POST["address_id"]);



    //prepare query
    $sql = "INSERT INTO company (companyname, phone, email, notes, address_id) VALUES ('$companyname', '$phone', '$email', '$notes','$address_id')";


    //run query
    //$addsqldata = mysqli_query($mainconnection, $sql);

    //Run and check of the query is sucessfull, if not display error if ok give other options
    if (!mysqli_query($mainconnection, $sql)) {
        die('Error: ' . mysqli_connect_error());
    } else {
        //mysqli_close($mainconnection);
        echo ("Recored Entered.");
    }
}

$rows = [];



//prepare query to get address and add the list to the form a_address


//Select the list of customer 
$sql_select_option_one = "SELECT * FROM customers";
$result2 = mysqli_query($mainconnection, $sql_select_option_one);
while ($selectone = mysqli_fetch_assoc($result2)) {
    $selectones[] = $selectone;
    //var_dump($rows);
}


////get list of Addresses to associate with the client and as number to database with , seperator if there is more than one customer associated with address
$sql_select_option_two = "SELECT firstname FROM a_address ";
$result3 = mysqli_query($mainconnection, $sql_select_option_two);
while ($selecttwo = mysqli_fetch_assoc($result3)) {
    $selecttows[] = $selecttwo;
    //var_dump($rows);
}



//prepare query To Display list of companies
$sql = "SELECT * FROM company";

if (!mysqli_query($mainconnection, $sql)) {
    die('Error: ' . mysqli_connect_error());
}

$result = mysqli_query($mainconnection, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
    //var_dump($rows);
}




$tpl = new bTemplate();
$title = 'Add A Company';
$tpl->set('title', $title);
$tpl->set('rows', $rows);
$tpl->set('selectones', $selectones);
$tpl->set('selecttwos', $selecttows);
$tpl->set('content', $tpl->fetch('./template/addcompany.tpl'));
$tpl->set('navmenu', $tpl->fetch('./template/navmenu.html'));
echo $tpl->fetch('./template/master.tpl');