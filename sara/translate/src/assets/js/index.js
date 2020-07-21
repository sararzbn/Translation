$('.add-new-language-btn').on("click", function () {
	$('.popup').fadeIn();
	$('body').append("<div class='overlay'></div>");
});


$('.edit').on("click", function () {
	$('.popup').fadeIn();
	var direction = $(this).data('direction');

	var name = $(this).parent().parent().find('.language-name').text();

	$('.popup-name').val(name.trim());
	$('.popup-direction option[value="' + direction.trim() +'"]').attr('selected', 'selected');

	$('.popup-language-id').val($(this).data('language-id'));

	$('body').append("<div class='overlay'></div>");
});


$('body').on("click", function (event) {
	if ($(event.target).closest('.popup').length == 0 && $(event.target).closest('.add-new-language-btn').length == 0 && $(event.target).closest('.edit').length == 0) {
		$('.popup').fadeOut();
		$('.overlay').remove();
	}
});