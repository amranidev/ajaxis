 $("body").on('click', '.modalRow', function() {
     // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
     $(this).leanModal();
 });
 $(document).ready(function() {
     // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
     $('.modal-trigger').leanModal();
 });
 $('body').on('click', '.delete', function() {
     //$(this).leanModal();
     
     var id = $(this).data('id');
     var tr = $(this).parent().parent();
     console.log(baseURL + $(this).data('link') + id)
     $.ajax({
         async: true,
         type: 'get',
         url: baseURL + $(this).data('link'),
         success:function(response) {
            //console.log(response);
             $('.AjaxisModal').html(response);
         }
     })
     $('body').on('click', '.remove', function() {
        var modal = $(this).parent().parent().parent();
        modal.closeModal();
         $.ajax({
          async: true,
             method: 'get',
             url: baseURL + $(this).data('link') + id,
             success:function(response) {
                 console.log(response);
                 tr.remove();
                 
             }
         });
     });
 });
 $("body").on('click', '.edit', function() {
     var id = $(this).data('id');
     $.ajax({
        async: true,
         method: 'get',
         url: baseURL + $(this).data('link') + id,
         success: function(response) {
             $('.AjaxisModal').html(response);
         }
     })
 })
 $(document).on("click", ".update", function(e) {
    e.preventDefault();
    //location.hash = '99';
     postData = $(this).parent().parent().serializeArray();
     var close = $(this).parent().parent().parent().parent();
     var id = $(this).data('id');
     $.ajax({
        async: true,
         type: 'post',
         url: baseURL + $(this).data('link') + $(this).data('id'),
         data: postData,
         success: function(response) {
             //console.log(response)
             $('a[data-id=' + id + ']').parent().parent().html(response);
         }
     });
 });
 $(document).on("click", ".closeModal", function() {
     $(this).parent().parent().parent().parent().closeModal();
 });
 $(document).on("click", ".create", function() {
     $.ajax({
        async: true,
         type: 'get',
         url: baseURL + $(this).data('link'),
         success: function(response) {
             $('.AjaxisModal').html(response);
         }
     })
 })
      $(document).on("click", ".save", function() {
         var postData = $(this).parent().parent().serializeArray();
         //Materialize.toast('an element has been created!', 5000);
         $.ajax({
            async: true,
             type: 'post',
             url: baseURL + $(this).data('link'),
             data: postData,
             success: function(response) {
                 var html = '<tr>' + response + '</tr>'
                 $('tbody').append(html);
             }
         })
     })
 $(document).on('click', '.show', function() {
     $.ajax({
        async: true,
         type: 'get',
         url: baseURL + $(this).data('link') + $(this).data('id'),
         success: function(response) {
             $('.AjaxisModal').html(response);
         }
     })
 })
 $(document).on('click','.deletingModalClose',function(){

    $(this).parent().parent().parent().closeModal();
 })