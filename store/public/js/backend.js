$(document).ready(function() {
  
  $.ajaxSetup({headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

    // image preview

    $(".image").change(function() {

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }

    });

    // END of image preview


    /* password show */

    $(".show-pass").hover(function() {

        $(this).removeClass('la-eye-slash').addClass('la-eye');

        $('.password').attr("type", "text");

    }, function() {
        $(this).removeClass('la-eye').addClass('la-eye-slash');
        $('.password').attr("type", "password");

    });

    /* end password show */



// AJAX SEARCH 
$('input[name=search]').keyup(function() {
    var search = $(this).val(),
        url    = $(this).data('route');

        //alert(url);

    $.ajax({
      url:url,
      method:"get",
      data: {search:search},
        success: function(data)
        {
           // data = data.data;
          // console.log(typeof(data));
          //data = JSON.parse(data.data);
           console.log(data);
           //alert(data);
          $('#cont-data').html(data);
          
        },
      error: function (err,status,jqXHR) { alert(err, status, jqXHR);
                                           }
    }); 
}); 
    
  /* $('input[name=search]').keyup(function(){
      
            var search = $(this).val(),
            url    = $(this).data('url');  
      $.ajax({
         method:'get',
         url:url,
         data: {search:search},
         processData:false,
         contentType:false,
         cache:false,
         success: function(data)
        {
           console.log(data);
          $('.cont-data').html(data);
          
        },error: function (err,status,jqXHR) { alert(err, status, jqXHR);
        }
      });
  }); */
 // END AJAX SEARCH
 
 //multidelete
     

   $('#multidelete').click(function (e) { 

        var ids = [];
        var form = $(this).parent();
    
      //console.log(form);
    
        $('.cont-data :checkbox:checked').each(function(i){
        
            ids[i] = $(this).val();   
        });
        
        $('#multi-ID').val(ids);
        
        // confirm convert alertSweet when am create composer update
        
        if (confirm('Are You Sure Delete These ?' )) {
                form.submit();
                
                alert("OK", "Your ", "success");
                
            } else {
                alert("Cancelled", "Your imaginary file is safe", "error");
            } 
        //alert(form);
 });   
 //end of multidelete
 
// AJAX paginate 
  
 // END AJAX paginate  
/*AJAX  USER*/
     
$('#adduser').submit(function (e) { 
    e.preventDefault();
    
     var formdata  = new FormData(jQuery('#adduser')[0]),
         url = $(this).data('url');  
     
     $.ajax({
         method:'post',
         url:url,
         data:formdata,
         dataType:'json',
         cache:false,
         processData:false,
         contentType:false,
         success: function (data) {  
         
           //alert(data);
           if(data.status == 200)
           {
            $('.cont-data').append(data.result);
            $('#exampleModalCenter').modal('hide');
           
           }
            
            
         },error: function(xhr, exception)
         {
             
             if(exception == 'error')
             {  
                $('.name-error').text(xhr.responseJSON.errors.name);
                $('.email-error').text(xhr.responseJSON.errors.email);
                $('.password-error').text(xhr.responseJSON.errors.password);
                $('.password-confirmation-error').text(xhr.responseJSON.errors.password_confirmation);
                $('.role-error').text(xhr.responseJSON.errors.role);
                $('.image-error').text(xhr.responseJSON.errors.image);
                
             }
            
             
             
             
         }
     });                                          
});
 //________________________ END ADD USER__________________________

 //________________________ EDIT USER__________________________
 $(document).on("click",".edituser",function(){

    var url = $(this).data("url");
    $.ajax({
        type:"get",
        url:url,
        
        success:function(user)
        {
            $("#id").val(user.id);
            $("#name").val(user.name);
            $("#email").val(user.email);
           // $("#password").val(user.password);
            $("#role").val(user.role);
            $("#image").html('<img  src=http://127.0.0.1:8000/uploads/users_images/'+user.image+' class="image-preview"  height="120px" width="250px">');
           // $("#file").val(user.image);  
           
        }

    });
    
 });
    
 //________________________END EDIT USER_____________________________
    
 
 //________________________ UPDATE USER______________________________
 
 $('#updateuser').submit(function(e){
    e.preventDefault();
    var formdata  = new FormData(jQuery('#updateuser')[0]),
        id  = $("#id").val(),
        url = $(this).data('url');
     
        $.ajax({
          method:'post',
          url : url,
          data:formdata,
          cache:false,
          processData:false,
          contentType:false,
          dataType:'json',
          success:function(data)
          {
              
              console.log(data.result);
             if(data.status == 200)
             {
              console.log("Data => "+data.result);
                 
                $('#'+id).html(data.result);

                $('#exampleModal').modal('hide');
                     
             } 
            
          }, error: function(xhr, exception)
          {
              console.log(exception);
              
             if(exception == 'error')
            {  
                $('.name-error').text(xhr.responseJSON.errors.name);
                $('.email-error').text(xhr.responseJSON.errors.email);
                $('.password-error').text(xhr.responseJSON.errors.password);
                $('.password-confirmation-error').text(xhr.responseJSON.errors.password_confirmation);
                $('.role-error').text(xhr.responseJSON.errors.role);
                $('.image-error').text(xhr.responseJSON.errors.image);
                
            } 
              
             
         } 
        });
        
        
        
});
//________________________ END UPDATE USER__________________________


//___________________ DELETE USER_____________________________
    
 $(".deluser").click(function (e) { 
    e.preventDefault();
    var url = $(this).data('url');
       $.ajax({
           method:'get',
           url:url,
           success: function (data) 
           {  
            
             $("#"+data.id).remove();
           }
       });
 });
 
 //________________________ END DELETE USER______________________________
 
/*END AJAX  USER*/




/*AJAX  CATEGORY*/
     
$('#addcategory').submit(function (e) { 
    e.preventDefault();
    
     var formdata  = $(this).serialize() ,
         url = $(this).data('url');  
     
     alert(formdata);
     
     $.ajax({
         method:'post',
         url:url,
         data:formdata,
         dataType:'json',
         cache:false,
         processData:false,
         contentType:false,
         success: function (data) {  
         
           //alert(data);
           if(data.status == 200)
           {
            $('.cont-data').append(data.result);
            $('#exampleModalCenter').modal('hide');
           
           }
            
            
         },error: function(xhr, exception)
         {
             
             if(exception == 'error')
             {  
                $('.name-error').text(xhr.responseJSON.errors.name);
                $('.font-error').text(xhr.responseJSON.errors.font);
               
                
             }
            
             
             
             
         }
     });                                          
});
 //________________________ END ADD CATEGORY_______________________

 //________________________ EDIT CATEGORY__________________________
 $(document).on("click",".editcategory",function(){

    var url = $(this).data("url");
    $.ajax({
        type:"get",
        url:url,
        
        success:function(category)
        {
            $("#id").val(category.id);
            $("#name").val(category.name);
            $("#font").val(category.font);
          
        }

    });
    
 });
    
 //________________________END EDIT CATEGORY_____________________________
    
 
 //________________________ UPDATE CATEGORY______________________________
 
 $('#updatecategory').submit(function(e){
    e.preventDefault();
    var formdata  = $(this).serialize(),
        id  = $("#id").val(),
        url = $(this).data('url');
     
        $.ajax({
          method:'post',
          url : url,
          data:formdata,
          cache:false,
          processData:false,
          contentType:false,
          dataType:'json',
          success:function(data)
          {
              
              
             if(data.status == 200)
             {
                 
                $('#'+id).html(data.result);

                $('#exampleModal').modal('hide');
                     
             } 
            
          }, error: function(xhr, exception)
          {
              
             if(exception == 'error')
            {  
                $('.name-error').text(xhr.responseJSON.errors.name);
                $('.font-error').text(xhr.responseJSON.errors.font);
                
            } 
              
             
         } 
        });
        
        
        
});
//________________________ END UPDATE CATEGORY__________________________


//___________________ DELETE CATEGORY_____________________________
    
 $(".delcategory").click(function (e) { 
    e.preventDefault();
    var url = $(this).data('url');
       $.ajax({
           method:'get',
           url:url,
           success: function (data) 
           {  
            
             $("#"+data.id).remove();
           }
       });
 });
 
 //________________________ END DELETE CATEGORY______________________________
 
/*END AJAX  CATEGORY*/
   

}); // End OF Document

