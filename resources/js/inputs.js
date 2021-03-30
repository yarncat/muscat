const dom = `<div class="track new"><label>№ трека
<input type="number" class="id" name="track_number[]" required>
</label>
<label>Название трека
<input type="text" class="name" name="track_title[]" required>
</label>
<label>Время*
<input type="text" class="time" name="duration[]" required>
</label>
<input type="hidden" name="id[]"></div>`;

$('.add').click(function() {
    $('.tracks').append(dom);
    $('.cancel').css('display', 'inline-block');
});

$('.cancel').click(function() {
    let index = $(".track").length;
    if (index > 0) {
        $('.new:last-of-type').remove();
        if ($(".new").length < 1) {
            $('.cancel').css('display', 'none');
        }
    };
});
