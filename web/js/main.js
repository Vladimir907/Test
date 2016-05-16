/**
 * Created by vladimir on 13.05.16.
 */
$(document).ready(function () {
    $(document).on('submit', 'form', function (event)
    {
        var form = event.target,
            formAction = form.action,
            formMethod = form.method,
            formData = new FormData(form);

        runAJAX(formMethod, formAction, formData);

        event.preventDefault();
    });

    function runAJAX(method, url, data)
    {
        $.ajax
        ({
            type: method,
            url: url,
            dataType: 'HTML',
            contentType: false,
            processData: false,
            data: data,
            success: function (data)
            {
                $('#search_result').html(data);
            }
        });
    }
});