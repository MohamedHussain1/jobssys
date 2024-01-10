<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //define and set to empty
    $street = $city = $state = $country = $zip =$notes= "";
    
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
    $street = CleaningService2($_POST["street"]);
    $city = CleaningService2($_POST["city"]);
    $state = CleaningService2($_POST["state"]);
    $country = CleaningService2($_POST["country"]);
	$zip = CleaningService2($_POST["zip"]);
    $notes = CleaningService2($_POST["notes"]);

    

    //prepare query
    $sql = "INSERT INTO  a_address  (street, city, states, country, zip, notes ) VALUES ('$street', '$city', '$state', '$country' , '$zip', '$notes')";


    //Run and check of the query is sucessfull, if not display error if ok give other options
    if (!mysqli_query($mainconnection, $sql))
    {
    die('Error: ' . mysqli_connect_error());
    }
    else
    {
    //mysqli_close($mainconnection);  
    echo ("Recored Entered."); 
    } 
   



}

$rows = [];

//prepare query
$sql2 = "SELECT * FROM a_address";


$result = mysqli_query($mainconnection, $sql2);

if (!mysqli_query($mainconnection, $sql2)) {
    die('Error: ' . mysqli_connect_error());
}

while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
    //var_dump($rows);
}

    $tpl = new bTemplate();
    $title = 'Add An Address';
    $tpl->set('title', $title);
    $tpl->set('rows', $rows);
    $tpl->set('content', $tpl->fetch('./template/addaddresses.tpl'));
    $tpl->set('navmenu', $tpl->fetch('./template/navmenu.html'));
    echo $tpl->fetch('./template/master.tpl');
