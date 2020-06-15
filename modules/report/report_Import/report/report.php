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

      $total_sum=0;
      $query = "SELECT sd.pro_barcode,p.pro_name,c.cat_name,u.uni_name,p.quality
                    FROM tb_import_detail sd
                        INNER JOIN tb_import s ON s.imp_id = sd.imp_id 
                        INNER JOIN tb_product p ON p.pro_barcode = sd.pro_barcode 
                        INNER JOIN tb_unit u ON u.uni_id = p.uni_id 
                        INNER JOIN tb_category c ON c.cat_id = p.cat_id 

                         Where s.imp_date >='".date("Y-m-d H:m:s", strtotime($_POST["date_start"]))."' and s.imp_date <='".date("Y-m-d H:m:s", strtotime($_POST["date_end"]))."'

                        GROUP BY sd.pro_barcode,p.pro_name 
                       ";
        
      $result = mysqli_query($connect, $query);
      while($row = mysqli_fetch_array($result))
      {
        
        $total_sum += $row["quality"];
          
      $Detell .= '
                  <tr>
                     
                      <td align="center"><font size="9">'.$row["pro_barcode"].'</font></td>
                      <td ><font size="9">'.$row["pro_name"].'</font></td>
                      <td align="center"><font size="9">'.$row["cat_name"].'</font></td>
                      <td align="center"><font size="9">'.$row["quality"].'</font></td>
                      <td align="center"><font size="9">'.$row["uni_name"].'</font></td>
                     
                  </tr> ';
                

      }


      
      

      //$sql_customer = "SELECT Name FROM customer Where id =".$result_ticket['customer_id'];
      //$result_customer =  mysqli_fetch_array(mysqli_query($connect, $sql_customer));

      
      session_start();
      $content = '';  
      $content .= '  
      
            
             <font align="center">  <font size="8">ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ </font> <br/>
             <font size="8">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ </font><br/><br/>
             <font size="16">'.$_SESSION['system_name'].'</font></font>
             
            
    

      <H3 align="center">ລາຍງານການຮັບຊື້ສິນຄ້າ:</H3>

      <table border="0" cellspacing="0" cellpadding="3">  
           <tr>  
               
                <th align="center"  ><font size="10">ວັນທີ : '.$_POST["date_start"].' ຫາວັນທີ : '.$_POST["date_end"].'</font></th>  
                
           </tr> 
      </table>
      
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th   align="center">ບາໂຄດ</th> 
                <th   >ລາຍການ</th> 
                <th   align="center">ປະເພດ</th>  
                <th   align="center">ຈຳນວນ</th>  
                <th   align="center">ຫົວໜ່ວຍ</th>  
               
           </tr> 
      ';
      $content .= $Detell;
     /* $content .='<tr>
                      <td rowspan="1" colspan="3"> </td>
                      <td align="right"><font size="9">ລວມ</font></td>
                      <td align="right"><font size="9">'.number_format($total_sum,0).' ອັນ </font> </td>
                      
      
                  </tr>'; */
      $content .='</table>';  

     
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
  
 ?>  
 