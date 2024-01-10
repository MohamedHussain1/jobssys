<?php
/* Files that is included in most files */
include_once ("./includes/overall.php"); 


//Check incoming page request
function CleaningService($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    // lets return the data after cleaning it
    return $data;
}


if(isset($_GET['page']))
{

    $page = CleaningService($_GET["page"]);

    include_once("./includes/definedpages.php");
    
    if (in_array($page, $pageslist))
    {
    echo "Match page found and authorized <br />";
                switch ($page)
                {
                case'':
                    include'("")';
                    break;
                case'addcompany':
                    include './systems/companies/add.php';
                    break;
                case'addaddress':
                    include './systems/addresses/add.php';
                     break;
                case'addcustomers':
                    include './systems/customers/add.php';
                    break;
                
                }
    }
    else
    {
    echo "Page Not Defined";
    }
}

//if ( $_SERVER['REQUEST_METHOD'] == 'GET' or empty($_GET))
else
{
    $tpl = new bTemplate();
    $title = 'Main Page';
    $tpl->set('title', $title);
    $tpl->set('navmenu', $tpl->fetch('./template/navmenu.html'));
    $tpl->set('content', $tpl->fetch('./template/sample.html'));
    echo $tpl->fetch('./template/master.tpl');
}