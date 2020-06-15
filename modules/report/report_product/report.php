<?php  
    include_once('../../../conn.php');
    require_once('../../tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Report");  
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


      $query = "SELECT p.pro_barcode,p.pro_name,p.quality,p.buy_price,p.sell_price,u.uni_name,c.cat_name
                    FROM tb_product p
                        INNER JOIN tb_category c ON c.cat_id = p.cat_id 
                        INNER JOIN tb_unit u ON u.uni_id = p.uni_id ";
               if($_POST["category"]!=='All'){
                    $query.="Where p.cat_id='".$_POST["category"]."'";

                    $querycategory = "SELECT * FROM tb_category ";
                    $resultcategory = mysqli_query($connect, $querycategory);
                    $data = mysqli_fetch_array($resultcategory);
                    $namecat=$data['cat_name'];
               }else{
                    $namecat='ເລືອກທທັງໝົດ';
               }

      $result = mysqli_query($connect, $query);
      while($row = mysqli_fetch_array($result))
      {
       
          
      $Detell .= '
                  <tr>
                     
                      <td align="center"><font size="9"> '.$row["pro_barcode"].'</font></td>
                      <td ><font size="9"> '.$row["pro_name"].'</font></td>
                      <td align="center"><font size="9">'.$row["cat_name"].'</font></td>
                      <td align="center"><font size="9">'.$row["quality"].'</font></td>
                      <td align="center"><font size="9">'.$row["uni_name"].'</font></td>
                      <td align="right"><font size="9">'.number_format($row["buy_price"],0).' ກີບ </font></td>
                      <td align="right"><font size="9">'.number_format($row["sell_price"],0).' ກີບ </font></td>
                     
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
             
            
    

      <H3 align="center">ລາຍງານສິນຄ້າໃນຮ້ານ:</H3>

      <table border="0" cellspacing="0" cellpadding="3">  
           <tr>  
               
                <th   ><font size="10">ເລືອກໝວດ : '. $namecat.' </font></th>  
                
           </tr> 
      </table>
      
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th   align="center">ບາໂຄດ</th>  
                <th   >ຊື່ລາຍການ</th>
                <th   align="center">ປະເພດ</th>    
                <th   align="center">ຈຳນວນ</th>  
                <th   align="center">ຫົວໜ່ວຍ</th> 
                <th   align="right">ລາຄາຊື້</th> 
                <th   align="right">ລາຄາຂາຍ</th>  
           </tr> 
      ';
      $content .= $Detell;
      
      $content .='</table>';  

     
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
  
 ?>  
 