$("#imgInp").change(function() {
    input = $(this)[0];
    if (input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('#image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
});
