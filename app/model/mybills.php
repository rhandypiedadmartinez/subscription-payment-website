<?php 

session_start();
include ("config.php");

$current_user = $_SESSION["login"];
$isAdmin = $_SESSION["isAdmin"];

class bill
{
    
    public $billername;
    
    public $amount;
    
    public $ref;
    
    function __construct($billername, $amount, $ref)
    {
        $this->billername = $billername;
        $this->amount = $amount;
        $this->ref = $ref;
    }
}

$bills = array();

// iterates thru billers array to find if current user is subscribe to a particular biller
// if bill>0, subscribed, and if bill=-1 user is not yet subscribed
$i = 0;
foreach ($billers as $biller) {
    $sql = "SELECT * FROM persons where email='$current_user'";
    if ($result = mysqli_query($mysqli, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if ($row[$biller->bill_name] != - 1) {
                    array_push($bills, new bill($biller->billername, $row[$biller->bill_name], $billers[$i]->ref));
                }
                $i ++;
            }
            mysqli_free_result($result);
        }
    }
}

?>