/*|
 *| jQuery File Ajaxis Plugin for Bootstrap
 *| https://github.com/amranidev/ajaxis
 *|
 *| Copyright 2015, Amrani Houssain
 *| amranidev@gmail.com
 *|
 *| Licensed under the MIT license:
 *| http://www.opensource.org/licenses/MIT
 *|
 */

$(document).on('click', '.delete', function() {
    GET($(this).data('link'));
})
$(document).on('click', '.edit', function() {
    GET($(this).data('link'));
})
$(document).on('click', '.display', function() {
    GET($(this).data('link'));
})
$(document).on('click', '.create', function() {
    GET($(this).data('link'));
})
$(document).on('click', '.destroy', function() {
    $.ajax({
        async: true,
        type: 'get',
        url: baseURL + $(this).data('link'),
        success: function(response) {
            window.location = response;
        }
    })
})
$(document).on('click', '.save', function() {
    POST($('#AjaxisForm').serializeArray(), $(this).data('link'));
})

function GET(dataLink) {
    $.ajax({
        async: true,
        type: 'get',
        url: baseURL + dataLink,
        success: function(response) {
            $('.AjaxisModal').html(response);
        }
    })
}

function POST(postData, dataLink) {
    $.ajax({
        async: true,
        type: 'post',
        url: baseURL + dataLink,
        data: postData,
        success: function(response) {
            window.location = response;
        }
    })
}