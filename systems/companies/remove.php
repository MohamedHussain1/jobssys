<?php
/* Files that is included in most files */
include_once ("../../includes/overall.php");
/* End overall inclusion*/

//define and set to empty
$companyname = $phone = $email = $notes = "";

// Process form data from add.html and use a cleaning dunction for security
if ( $_SERVER["REQUEST_METHOD"]=="POST")
{
     //create a cleaning function to clean posted data just in case
    function CleaningService($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    // lets return the data after cleaning it
    return $data;
}

    // lets assign the posted information to the variables above and assign it a cleaning function
    $companyname = CleaningService($_POST["companyname"]);
    $phone = CleaningService($_POST["phone"]);
    $email = CleaningService($_POST["email"]);
    $notes = CleaningService($_POST["notes"]);

    //prepare query
$sql = "INSERT INTO company (companyname, phone, email, notes) VALUES ('$companyname', '$phone', '$email', '$notes')";

//Run and check of the query is sucessfull, if not display error if ok give other options
if (!mysqli_query($mainconnection, $sql))
{   
die('Error: ' . mysqli_connect_error());
}
else
{
mysqli_close($mainconnection);  
echo ("Company Recored Deleted."); 
} 

}
else {echo"This page can not be accessed directly and there is nothing Here To See";}