$(document).on('click', '.delete', function() {
    $.ajax({
        async: true,
        type: 'get',
        url: baseURL + $(this).data('link'),
        success: function(response) {
            $('.AjaxisModal').html(response);
        }
    })
});
$(document).on('click', '.destroy', function() {
    $.ajax({
        async: true,
        type: 'get',
        url: baseURL + $(this).data('link'),
        success: function(response) {
            window.location.replace(ModelApi);
        }
    })
})
$(document).on('click', '.create', function() {
    $.ajax({
        async: true,
        type: 'get',
        url: baseURL + $(this).data('link'),
        success: function(response) {
            //console.log(response);
            $('.AjaxisModal').html(response);
        }
    })
})
$(document).on('click', '.save', function(e) {
    var postData = $('#AjaxisForm').serializeArray();
    e.preventDefault();
    $.ajax({
        async: true,
        type: 'post',
        url: baseURL + $(this).data('link'),
        data: postData,
        success: function(response) {
            window.location.replace(ModelApi);
        }
    })
})
$(document).on('click', '.edit', function() {
    $.ajax({
        async: true,
        type: 'get',
        url: baseURL + $(this).data('link'),
        success: function(response) {
            //console.log(response);
            $('.AjaxisModal').html(response);
        }
    })
})
