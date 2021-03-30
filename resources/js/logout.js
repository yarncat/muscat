$('.logout').on('click', function(e) {
    e.preventDefault();
    this.closest('form').submit();
});
