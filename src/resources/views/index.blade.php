<!DOCTYPE html>
<html>
<head>
	<title>Language</title>
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
</head>
<body>
<div class="translator-wrapper">
	<h1 class="title">List of languages</h1>
	<button class="btn add-new-language-btn">Add New Language</button>
	<table class="list-of-languages">
		@foreach($languages as $language)
			<tr>
				<td class="flag">
					<img src="{{ asset('assets/images/'.$language->flag) }}">
				</td>
				<td class="language-name">
					{{ $language->name }}
				</td>
				<td>
					<button data-language-id="{{ $language->id }}" data-direction="{{ $language->direction }}" class="edit">Edit</button>
				</td>
				<td>
					<a href="{{ route('show.key',['languageName' => $language->name]) }}">Translate</a>
				</td>
			</tr>
		@endforeach
	</table>


	<div class="popup">

		<h3>Add New Language</h3>

		<form action="{{ route('add.new.language') }}" method="post" enctype="multipart/form-data">

			<input type="hidden" name="language_id" class="popup-language-id">
			<div class="form-group">
				<label>Name:</label>
				<input type="text" name="name" class="form-control popup-name">
			</div>

			<div class="form-group">
				<label>Flag:</label>
				<input type="file" name="flag" class="form-control popup-flag">
			</div>

			<div class="form-group">
				<label>Language Direction:</label>
				<select name="direction" class="form-control popup-direction">
					<option value="rtl">RTL</option>
					<option value="ltr">LTR</option>
				</select>
			</div>


			<div class="form-group">
				<input type="submit" class="btn">
			</div>
		</form>
	</div>
</div>
<script src="{{ asset('assets/js/index.js') }}"></script>

</body>
</html>