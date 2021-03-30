let albumId = $('.album').data('id');

$('#tracksForm').on('submit', function (e) {
    e.preventDefault();
    $('.error').css('display', 'none');
    $.ajax({
        type: 'PATCH',
        url: '/albums/' + albumId + '/tracks',
        data: $('#tracksForm').serialize(),
        success: function (data) {
            window.location.href = '/albums/' + albumId;
        },
        error: function (data) {
            $.each(data.responseJSON.errors, function(key,value) {
                let keySlice = key.replace(/[^a-z_]/g, '');
                $('span.' + keySlice).css('display', 'inline-block').text(value);
            });
        }
    });
});
