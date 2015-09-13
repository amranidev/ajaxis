$(document).on('click','.delete',function(){    
     $.ajax({
         async: true,
         type: 'get',
         url: baseURL + $(this).data('link'),
         success:function(response) {
             $('.AjaxisModal').html(response);
         }
     })
});
$(document).on('click','.destroy',function(){
$.ajax({
   async:true,
   type:'get',
   url: baseURL + $(this).data('link'),
   success:function(response){
        window.location.replace(ModelApi);
   }
})

})