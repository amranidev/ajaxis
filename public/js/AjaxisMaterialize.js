$(document).ready(function() {
     $('.modal-trigger').leanModal();
     $('select').material_select();
 });
 //*************************************** Deleting *******************************************
 $('body').on('click', '.delete', function() {

      tr = $(this).parent().parent();
     $.ajax({
         async: true,
         type: 'get',
         url: baseURL + $(this).data('link'),
         success:function(response) {
             $('.AjaxisModal').html(response);
         }
     })
 });
      $('body').on('click', '.remove', function() {
        var modal = $(this).parent().parent().parent();
        modal.closeModal();
         $.ajax({
          async: true,
             method: 'get',
             url: baseURL + $(this).data('link'),
             success:function(response) {
                 window.location.replace(ModelApi);
             }
         });
     });
//*****************************************Editing*************************************************
 $("body").on('click', '.edit', function() {
     $.ajax({
        async: true,
         method: 'get',
         url: baseURL + $(this).data('link'),
         success: function(response) {
             $('.AjaxisModal').html(response);
         }
     })
 })
 $(document).on("click", ".update", function(e) {
    e.preventDefault();
     postData = $(this).parent().parent().serializeArray();
     var close = $(this).parent().parent().parent().parent();
     $.ajax({
        async: true,
         type: 'post',
         url: baseURL + $(this).data('link'),
         data: postData,
         success: function(response) {
             window.location.replace(ModelApi);
         }
     });
 });
 $(document).on("click", ".closeModal", function() {
     $(this).parent().parent().parent().parent().closeModal();
 });
 //******************************************** Creating ******************************************************
 $(document).on("click", ".create", function() {
     $.ajax({
        async: true,
         type: 'get',
         url: baseURL + $(this).data('link'),
         success:function(response) {
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
             success:function(response) {
                 window.location.replace(ModelApi);
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
 