$(document).on('click', '.select_upload', function(){  
    
    $.ajax({  
        url:"../upload.php",  
        method:"POST",  
        data:{},  
        dataType:"text",  
        success:function(data){
            console.log(data);  
          
        }  
    });  
    
  
});