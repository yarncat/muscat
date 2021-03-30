$('.delete-track').on('click', function(e) {
    e.preventDefault();
    let id = $(this).val();
    if(confirm('Точно удалить трек?')) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'DELETE',
            url: '/tracks/' + id,
            success: function () {
                window.location.href = '/albums/' + albumId;
            },
            error: function (data) {
                console.log("Что-то пошло не так");
            }
        });
    } else {
        return false;
    }
});
