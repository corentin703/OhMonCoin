
function pictureDelete(id, csrfToken)
{
    $.ajax({
        headers:
        {
            'X-CSRF-TOKEN': csrfToken
        },
        url: '/picture/' + id,
        type: "DELETE",
        data: 'id=' + id,
        success: function ()
        {
            window.location.reload();
        },
    });
}