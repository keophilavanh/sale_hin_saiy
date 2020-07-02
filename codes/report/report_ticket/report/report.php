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
      $query = "SELECT s.sel_id,s.sel_date,s.tax,s.amount,s.total,c.cus_fname,c.cus_lname,e.emp_fname,e.emp_lname
                    FROM tb_sell s
                        INNER JOIN tb_customer c ON c.cus_id = s.cus_id 
                        INNER JOIN tb_employee e ON e.emp_id = s.emp_id 
                       

                         Where s.sel_date >='".date("Y-m-d H:m:s", strtotime($_POST["date_start"]))."' and 
                               s.sel_date <='".date("Y-m-d H:m:s", strtotime($_POST["date_end"]))."'

                       
                       ";
        
      $result = mysqli_query($connect, $query);
      while($row = mysqli_fetch_array($result))
      {
        
        $total_sum += $row["total"];
        $tax_sum += $row["tax"];
        $amount_sum += $row["amount"];
      $Detell .= '
                  <tr>
                     
                      <td align="center"><font size="9">'.$row["sel_id"].'</font></td>
                      <td ><font size="9">'.$row["cus_fname"].' '.$row["cus_lname"].'</font></td>
                      <td align="center"><font size="9">'.$row["sel_date"].'</font></td>
                      <td align="center"><font size="9">'.$row["emp_fname"].' '.$row["emp_lname"].'</font></td>
                      <td align="right"><font size="9">'.number_format($row["amount"],0).' </font></td>
                      <td align="right"><font size="9">'.number_format($row["tax"],0).' </font></td>
                      <td align="right" ><font size="9">'.number_format($row["total"],0).' </font> </td>
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
             
            
    

      <H3 align="center">ລາຍງານການຂາຍຕາມໃບບິນ:</H3>

      <table border="0" cellspacing="0" cellpadding="3">  
           <tr>  
               
                <th align="center"  ><font size="10">ວັນທີ : '.$_POST["date_start"].' ຫາວັນທີ : '.$_POST["date_end"].'</font></th>  
                
           </tr> 
      </table>
      
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th   align="center">ເລກບິນ</th> 
                <th   >ຊື່ລູກຄ້າ</th> 
                <th   align="center">ວັນທີ</th>  
                <th   align="center">ພະນັກງານ</th>  
                <th   align="center">ລາຄາລວມ</th>  
                <th   align="right">ອາກອນ</th>  
                <th   align="right">ລວມເງີນ</th>  
           </tr> 
      ';
      $content .= $Detell;
      $content .='<tr>
                      <td rowspan="1" colspan="3"> </td>
                      <td align="right"><font size="9">ລວມເງີນ</font></td>
                      <td align="right"><font size="9">'.number_format($amount_sum,0).' ກີບ </font> </td>
                      <td align="right"><font size="9">'.number_format($tax_sum,0).' ກີບ </font> </td>
                      <td align="right"><font size="9">'.number_format($total_sum,0).' ກີບ </font> </td>
                    
      
                  </tr>'; 
      $content .='</table>';  

     
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
  
 ?>  
 