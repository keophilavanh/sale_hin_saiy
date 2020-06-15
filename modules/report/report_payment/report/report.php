<?php  
    include_once '../../../../conn.php';
    require_once '../../../tcpdf/tcpdf.php';  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("report");  
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
      
      
      $Detell = '';

     $count=0;
     $sum_tatal=0;
      $query = "SELECT o.ord_id,o.ord_date,s.sup_name,e.emp_fname,e.emp_lname
                        FROM tb_order o
                            INNER JOIN tb_supplier s ON s.sup_id = o.sup_id 
                            INNER JOIN tb_employee e ON e.emp_id = o.emp_id 
                                Where o.ord_status='ໃບສັ່ງຊື້' and o.ord_date >='".date("Y-m-d H:m:s", strtotime($_POST["date_start"]))."' 
                                  and o.ord_date <='".date("Y-m-d H:m:s", strtotime($_POST["date_end"]))."'

                           
                            ";

      $result = mysqli_query($connect, $query);
      while($row = mysqli_fetch_array($result))
      {
       
          $sql = "SELECT sum(total) as total FROM tb_order_detail Where ord_id ='".$row["ord_id"]."'";
          $result_name =  mysqli_fetch_array(mysqli_query($connect, $sql));
          
      $Detell .= '
                  <tr>
                     
                      <td align="center"><font size="9">'.$row["ord_id"].'</font></td>
                      <td ><font size="9">'.$row["ord_date"].'</font></td>
                      <td ><font size="9">'.$row["sup_name"].'</font></td>
                      <td ><font size="9">'.$row["emp_fname"].' '.$row["emp_fname"].'</font></td>
                      <td align="right" ><font size="9">'.number_format($result_name["total"],0).' ກີບ </font> </td>
                  </tr> ';
        $sum_tatal+= $result_name["total"];
        $count++;



      }

      $query_expire = "SELECT sd.pro_barcode,p.pro_name,c.cat_name,u.uni_name,sum(sd.quality)as quality,sd.price ,sum(sd.total) as total
                    FROM tb_expire_product_detail sd
                        INNER JOIN tb_expire_product s ON s.exp_id = sd.exp_id 
                        INNER JOIN tb_product p ON p.pro_barcode = sd.pro_barcode 
                        INNER JOIN tb_unit u ON u.uni_id = p.uni_id 
                        INNER JOIN tb_category c ON c.cat_id = p.cat_id 

                         Where s.exp_date >='".date("Y-m-d H:m:s", strtotime($_POST["date_start"]))."' and s.exp_date <='".date("Y-m-d H:m:s", strtotime($_POST["date_end"]))."'

                        GROUP BY sd.pro_barcode,p.pro_name 
                       ";
      $total_list=0;
      $total_sum = 0;
      $Detell_expire ="";
      $result_expire = mysqli_query($connect, $query_expire);
      while($row_expire = mysqli_fetch_array($result_expire))
      {
          $total_sum += $row_expire["total"];
          $Detell_expire .= '
          <tr>
             
              <td align="center"><font size="9">'.$row_expire["pro_barcode"].'</font></td>
              <td ><font size="9">'.$row_expire["pro_name"].'</font></td>
              <td align="center"><font size="9">'.$row_expire["cat_name"].'</font></td>
              <td align="center"><font size="9">'.$row_expire["quality"].'</font></td>
              <td align="center"><font size="9">'.$row_expire["uni_name"].'</font></td>
              <td align="right"><font size="9">'.number_format($row_expire["price"],0).' ກີບ </font></td>
              <td align="right" ><font size="9">'.number_format($row_expire["total"],0).' ກີບ </font> </td>
          </tr> ';
          $total_list++;

      }


      
      

      //$sql_customer = "SELECT Name FROM customer Where id =".$result_ticket['customer_id'];
      //$result_customer =  mysqli_fetch_array(mysqli_query($connect, $sql_customer));

      
      session_start();
      $content = '';  
      $content .= '  
      
            
             <font align="center">  <font size="8">ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ </font> <br/>
             <font size="8">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ </font><br/><br/>
             <font size="16">'.$_SESSION['system_name'].'</font></font>
             
            
    

      <H3 align="center">ລາຍງານລາຍຈ່າຍ:</H3>

      <table border="0" cellspacing="0" cellpadding="3">  
           <tr>  
               
                <th align="center"  ><font size="10">ວັນທີ : '.$_POST["date_start"].' ຫາວັນທີ : '.$_POST["date_end"].'</font></th>  
                
           </tr> 
      </table>
      <h4><u>ໃບບິນສັງຊື້</u> :</h4>
      <table border="0.2" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="10%" >ເລກບິນ</th>  
                <th   >ວັນທີ</th>  
                <th   >ຜູ້ສະໜອງ</th>  
                <th   >ພະນັກງານ</th>  
                <th   align="right">ລາຄາລວມ</th>  
           </tr> 
      ';
      $content .= $Detell;
      $content .='<tr>
                      <td > <font size="9">'.$count.' ບິນ</font> </td>
                      <td rowspan="1" colspan="2"> </td>
                      <td align="right"><font size="9">ລວມເງີນ</font></td>
                      <td align="right"><font size="9">'.number_format($sum_tatal,0).' ກີບ </font> </td>
                    
      
                  </tr>'; 
      $content .='</table>';  

      $content .='<h4><u>ລາຍການສິນຄ້າໝົດອາຍຸ</u> :</h4>
      
      <table border="0.2" cellspacing="0" cellpadding="3">  
           <tr>  
                <th   align="center">ບາໂຄດ</th> 
                <th   >ລາຍການ</th> 
                <th   align="center">ປະເພດ</th>  
                <th   align="center">ຈຳນວນ</th>  
                <th   align="center">ຫົວໜ່ວຍ</th>  
                <th   align="right">ລາຄາ</th>  
                <th   align="right">ລາຄາລວມ</th>  
           </tr> ';  
      $content .= $Detell_expire;
      $content .='<tr>
                         <td > <font size="9">'.$total_list.' ລາຍການ</font> </td>
                         <td rowspan="1" colspan="4"> </td>
                         <td align="right"><font size="9">ລວມເງີນ</font></td>
                         <td align="right"><font size="9">'.number_format($total_sum,0).' ກີບ </font> </td>
                    

                    </tr>'; 
      $content .='</table>';  

      $content .=' <br/><br/><br/>
      
      <table border="0.2" cellspacing="0" cellpadding="3" width="45%">  
           <tr>  
                <th   align="center" colspan="2">ລວມລາຍຈ່າຍ</th> 
                
           </tr>
           <tr>
                         <td align="right"><font size="9">ລາຍຈ່າຍຈາກການສັ່ງຊື້</font></td>
                         <td align="right"><font size="9">'.number_format($sum_tatal,0).' ກີບ </font> </td>
                    

          </tr> 
          <tr>
          <td align="right"><font size="9">ລາຍຈ່າຍຈາກສິນຄ້າໝົດອາຍຸ</font></td>
          <td align="right"><font size="9">'.number_format($total_sum,0).' ກີບ </font> </td>
     

</tr>';
      $content .='</table>';  
     
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
  
 ?>  
 