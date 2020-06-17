<?php  
 
    require_once 'tcpdf/tcpdf.php';  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");  
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
      $content = '';  
      $content .= '  
      <center>
            
             <font align="center" size="14">ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ <br/> ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ</font>
             
             <br/>
             <font size="14">ຮ້ານມິນິມາກກົງມະນີ</font>
             <br/>
             <font size="14">ໃບຮັບເງິນ</font><br/>
             <br/>
    </center>

      <H1 align="center"> ອ້າຍຊື່ສຸດຫຼໍ່</H1><br/><H1 align="center"> ອ້າຍຊື່ສຸດຫຼໍ່</H1> <u>ໃບບິນ</u>
      <table border="0" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="5%">Id</th>  
                <th width="30%">Name</th>  
                <th width="15%">Age</th>  
                <th width="50%">Email</th>  
           </tr>  
      ';  

      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
  
 ?>  
 