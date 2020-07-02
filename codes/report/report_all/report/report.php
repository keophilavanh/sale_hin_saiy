<?php  
    include_once '../../../../conn.php';
    require_once '../../../tcpdf/tcpdf.php';  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
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
      
      
      $Detell = '';

      $total_sum=0;
      $tax_sum=0;
      $amount_sum=0;
      $query = "SELECT sum(s.tax) as tax, sum(s.amount) as amount, sum(s.total) as total
                    FROM tb_sell s

                         Where s.sel_date >='".date("Y-m-d H:m:s", strtotime($_POST["date_start"]))."' and 
                               s.sel_date <='".date("Y-m-d H:m:s", strtotime($_POST["date_end"]))."'
                       ";

          $query_pay = "SELECT sum(sd.total) as total
               FROM tb_order_detail sd
               INNER JOIN tb_order s ON s.ord_id = sd.ord_id 
              

               Where s.ord_status='ໃບສັ່ງຊື້' And (s.ord_date >='".date("Y-m-d H:m:s", strtotime($_POST["date_start"]))."' and s.ord_date <='".date("Y-m-d H:m:s", strtotime($_POST["date_end"]))."')

         
          ";
     
     $result_pay = mysqli_query($connect, $query_pay);
     $row_pay = mysqli_fetch_array($result_pay);
    
        
      $result = mysqli_query($connect, $query);
      $row = mysqli_fetch_array($result);
     
      $Detell .= '
                  <tr>
                      <td align="center"><font size="9">'.number_format($row["amount"],0).' </font></td>
                      <td align="center"><font size="9">'.number_format($row["tax"],0).' </font></td>
                      <td align="center" ><font size="9">'.number_format($row["total"],0).' </font> </td>
                      <td align="center" ><font size="9">'.number_format($row_pay["total"],0).' </font> </td>
                      <td align="center" ><font size="9">'.number_format($row["amount"] - $row_pay["total"],0).' </font> </td>
                  </tr> ';
                

      


      
      

      //$sql_customer = "SELECT Name FROM customer Where id =".$result_ticket['customer_id'];
      //$result_customer =  mysqli_fetch_array(mysqli_query($connect, $sql_customer));

      
      session_start();
      $content = '';  
      $content .= '  
      
            
             <font align="center">  <font size="8">ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ </font> <br/>
             <font size="8">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ </font><br/><br/>
             <font size="16">'.$_SESSION['system_name'].'</font></font>
             
            
    

      <H3 align="center">ລາຍງານສະຫຼຸບລາຍຮັບລາຍຈ່າຍ:</H3>

      <table border="0" cellspacing="0" cellpadding="3">  
           <tr>  
               
                <th align="center"  ><font size="10">ວັນທີ : '.$_POST["date_start"].' ຫາວັນທີ : '.$_POST["date_end"].'</font></th>  
                
           </tr> 
      </table>
      
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th   align="center">ລວມຍອດຂາຍ</th> 
                <th   align="center">ອາກອນ</th> 
                <th   align="center">ລວມເງີນໄດ້ຮັບ</th> 
                <th   align="center">ລາຍຈ່າຍ</th> 
                <th   align="center">ກຳໄລ</th>  
               
           </tr> 
      ';
      $content .= $Detell;
    
      $content .='</table>';  

     
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
  
 ?>  
 