<?php
include_once '../../../conn.php';
// $date_start = date("Y-01-01");
// $date_end = date("Y-12-31");



function select_total_day($date_start,$date_end,$connect) {

$sql = "SELECT sum(sd.total) as total
        FROM tb_sell_detail sd
            INNER JOIN tb_sell s ON s.sel_id = sd.sel_id
        

            Where s.sel_date >='".$date_start."' and 
                s.sel_date <='".$date_end."'

        ";


 $result = mysqli_fetch_array(mysqli_query($connect, $sql));


  
    return intval($result['total']);
}

 
$dataPoints = array( 
	array("y" => select_total_day(date("Y-01-01"),date("Y-01-31"),$connect), "label" => "ເດືອນມັງກອນ" ),
	array("y" => select_total_day(date("Y-02-01"),date("Y-02-29"),$connect), "label" => "ເດືອນກຸມພາ" ),
	array("y" => select_total_day(date("Y-03-01"),date("Y-03-31"),$connect), "label" => "ເດືອນມີນາ" ),
	array("y" => select_total_day(date("Y-04-01"),date("Y-04-30"),$connect), "label" => "ເດືອນເມສາ" ),
	array("y" => select_total_day(date("Y-05-01"),date("Y-05-31"),$connect), "label" => "ເດືອນພຶດສະພາ" ),
	array("y" => select_total_day(date("Y-06-01"),date("Y-06-30"),$connect), "label" => "ເດືອນມີຖຸນາ" ),
    array("y" => select_total_day(date("Y-07-01"),date("Y-07-31"),$connect), "label" => "ເດືອນກໍລະກົດ" ),
    array("y" => select_total_day(date("Y-08-01"),date("Y-08-31"),$connect), "label" => "ເດືອນສິງຫາ" ),
	array("y" => select_total_day(date("Y-09-01"),date("Y-09-30"),$connect), "label" => "ເດືອນກັນຍາ" ),
	array("y" => select_total_day(date("Y-10-01"),date("Y-10-31"),$connect), "label" => "ເດືອນຕຸລາ" ),
	array("y" => select_total_day(date("Y-11-01"),date("Y-11-30"),$connect), "label" => "ເດືອນພະຈິກ" ),
	array("y" => select_total_day(date("Y-12-01"),date("Y-12-31"),$connect), "label" => "ເດືອນທັນວາ" )
);

echo json_encode($dataPoints);
 
?>