 $("body").on('click', '.modalRow', function() {
     // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
     $(this).leanModal();
 });
 $(document).ready(function() {
     // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
     $('.modal-trigger').leanModal();
 });
 $('body').on('click', '.delete', function() {
     $(this).leanModal();
     var id = $(this).data('id');
     var tr = $(this).parent().parent();
     $.ajax({
         type: 'get',
         url: baseURL + $(this).data('link'),
         success: function(response) {
             $('.AjaxisDeleting').html(response);
         }
     })
     $('body').on('click', '.remove', function() {
         $.ajax({
             method: 'get',
             url: baseURL + $(this).data('link') + id,
             success: function(response) {
                 $('#modal1').closeModal();
                 tr.remove();
             }
         });
     });
 });
 $("body").on('click', '.edit', function() {
     var id = $(this).data('id');
     $.ajax({
         method: 'get',
         url: baseURL + $(this).data('link') + id,
         success: function(response) {
             $('.editModal').html(response);
         }
     })
 })
 $(document).on("click", ".update", function() {
     postData = $(this).parent().parent().serializeArray();
     var close = $(this).parent().parent().parent().parent();
     var id = $(this).data('id');
     $.ajax({
         type: 'post',
         url: baseURL + $(this).data('link') + $(this).data('id'),
         data: postData,
         success: function(response) {
             $('a[data-id=' + id + ']').parent().parent().html(response);
         }
     });
 });
 $(document).on("click", ".closeModal", function() {
     $(this).parent().parent().parent().parent().closeModal();
 });
 $(document).on("click", ".create", function() {
     $.ajax({
         type: 'get',
         url: baseURL + $(this).data('link'),
         success: function(response) {
             $('.createModal').html(response);
         }
     })
     $(document).on("click", ".save", function() {
         var postData = $(this).parent().parent().serializeArray();
         $.ajax({
             type: 'post',
             url: baseURL + $(this).data('link'),
             data: postData,
             success: function(response) {
                 var html = '<tr>' + response + '</tr>'
                 $('tbody').append(html);
             }
         })
     })
 })
 $(document).on('click','.show',function(){
   $.ajax({
     type: 'get',
     url: baseURL + $(this).data('link') + $(this).data('id'),
     success:function(response){
        $('.showModal').html(response);
     }
   })
 })