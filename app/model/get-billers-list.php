<?php 

include ("config.php");

class billers
{
    
    public $billername;
    
    public $bill_name;
    
    public $ref;
    
    function __construct($billername, $bill_name, $ref)
    {
        $this->billername = $billername;
        $this->bill_name = $bill_name;
        $this->ref = $ref;
    }
}


$billers = array();

$sql_biller = "SELECT * FROM biller_list";
if ($result_biller = mysqli_query($mysqli, $sql_biller)) {
    if (mysqli_num_rows($result_biller) > 0) {
        while ($row = mysqli_fetch_array($result_biller)) {
            array_push($billers, new billers($row['biller_name'], $row['biller_bill_name'], $row['ref']));
        }
    }
}
?>