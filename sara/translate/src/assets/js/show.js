
$('.keys-container span').on("click", function () {


	$('.keys-container span').css('background-color', '#fff');
	$(this).css('background-color', '#c7d8e4');

	var key = $(this).text();
	$('.key').val(key.trim());
	$('.previous-name').val(key.trim());

	var translation = $(this).data('translation');

	$('.key-id').val($(this).data('id'));

	if (translation) {
		$('.translation textarea').val(translation);
	} else {
		$('.translation textarea').val('');

	}

});
