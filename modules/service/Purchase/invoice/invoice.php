<?php  
    include_once('../../../../conn.php');
    require_once('../../../tcpdf/tcpdf.php');  
    session_start();
      $obj_pdf = new TCPDF('P', PDF_UNIT, array(148, 210), true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("BILL");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('Saysettha_OT', '', 12);  
      $obj_pdf->AddPage(); 
      
      $id_ticket = $_GET['id'];
      $Detell = '';


      $query = "SELECT * FROM tb_order_detail Where ord_id =".$id_ticket;

      $result = mysqli_query($connect, $query);
      while($row = mysqli_fetch_array($result))
      {
          $sql = "SELECT pro_name,uni_name 
                        FROM tb_product p
                              INNER JOIN tb_unit u ON p.uni_id = u.uni_id  Where pro_barcode ='".$row["pro_barcode"]."'";
          $result_name =  mysqli_fetch_array(mysqli_query($connect, $sql));
          
      $Detell .= '
                  <tr>
                     
                      <td><font size="9">'.$result_name["pro_name"].'</font></td>
                      <td align="center"><font size="9">'.$row["quality"].'</font></td>
                      <td align="center"><font size="9">'.$result_name["uni_name"].'</font></td>
                      <td align="right"><font size="9"></font></td>
                      <td align="right" ><font size="9"></font> </td>
                  </tr> ';
                

      }


      
      $sql_ticket = "SELECT s.ord_id as id,s.ord_date,c.sup_name,m.emp_fname,m.emp_lname
                          FROM tb_order s
                          INNER JOIN tb_supplier c ON s.sup_id = c.sup_id 
                          INNER JOIN tb_employee m ON s.emp_id = m.emp_id 
                          WHERE  s.ord_id =".$id_ticket;
      $result_ticket =  mysqli_fetch_array(mysqli_query($connect, $sql_ticket));

      //$sql_customer = "SELECT Name FROM customer Where id =".$result_ticket['customer_id'];
      //$result_customer =  mysqli_fetch_array(mysqli_query($connect, $sql_customer));

     // $sum ="SELECT sum(total) as total FROM tb_order_detail WHERE ord_id=$id_ticket";
     // $total_sum =  mysqli_fetch_array(mysqli_query($connect, $sum));

      $content = '';  
      $content .= '  
      
            
             <font align="center">  <font size="8">ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ </font> <br/>
             <font size="8">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ </font><br/><br/>
             <font size="12">'.$_SESSION['system_name'].'</font></font>
             
            
    

      <H3 align="center">ໃບຂໍລາຄາສິນຄ້າ:</H3>

      <table border="0" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="70%" ><font size="10">ຊື່ຜູ້ສະໜອງ : '.$result_ticket['sup_name'].'<BR/> ພະນັກງານ : '.$result_ticket['emp_fname'].' '.$result_ticket['emp_lname'].'</font></th> 
                <th  width="40%"><font size="10">ເລກບິນ : '.$id_ticket.' <BR/> ວັນທີ : '. date("d/m/Y", strtotime($result_ticket['ord_date'])).'</font></th>  
           </tr> 
      </table>
      
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th  width="35%" >ລານການສິນຄ້າ</th>  
                <th  width="15%">ຈຳນວນ</th> 
                <th  width="15%">ຫົວໜ່ວຍ</th> 
                <th  width="20%">ລາຄາ</th>  
                <th  width="20%">ລາຄາລວມ</th>  
           </tr> 
      ';
      $content .= $Detell;
     /* $content .='<tr>
                      <td rowspan="1" colspan="2"> </td>
                      <td align="right"><font size="9">ລວມເງີນ</font></td>
                      <td align="right"><font size="9">'.number_format($total_sum['total'],0).' ກີບ </font> </td>
                    
      
                  </tr>'; */
      $content .='</table>';  

     
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
  
 ?>  
 