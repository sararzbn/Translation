<!DOCTYPE html>
<html>
<head>
	<title>Key</title>
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
</head>
<body>
<div class="list-of-keys">
	<div class="flag">
		<img src="{{ asset('assets/images/'.$language->flag) }}">
	</div>
	<h1 class="title">
		Keys
	</h1>
	<a class="back" href="{{ route('language') }}">Back</a>
	<form class="add-new-key" method="post" action="{{ route('change.key') }}">
		<h3>Add New Key</h3>
		<div class="form-group">
			<input type="text" name="name" class="form-control key">
			<input type="hidden" name="previous_name" class="form-control previous-name">
		</div>
		<div class="form-group">
			<button type="submit" name="action" class="btn add-new-key-btn" value="add">Add New Key</button>
			<button type="submit" name="action" class="btn-remove delete-key-btn" value="delete">Delete This Key</button>
			<div class="tip">If you delete any key,it's translations will be deleted.</div>
			<div class="tip">If you change any key after it is published, you should talk to programmer for changing that key in script.</div>

		</div>
	</form>
	@if($keys->count() != 0)
		<div class="keys-container">
			@foreach($keys as $key)
				<span data-id="{{ $key->id }}" @isset($key->translations[0]) data-translation="{{ $key->translations[0]->name }}" @endisset>
				{{ $key->name }}
				</span>
			@endforeach
		</div>
		<form class="translation" method="post" action="{{ route('translation',['languageId' => $language->id]) }}">
			@csrf

			<label>Translation</label>
			<textarea name="translation" {{ $language->direction == 'rtl' ? "class=rtl" : "class=ltr" }}></textarea>

			<input type="hidden" name="key_id" class="key-id">
			<input class="btn" type="submit" value="Send">
		</form>
	@endif
	<form method="post" action="{{ route('publish',['languageId' => $language->id]) }}">
		@csrf
		<button type="submit" class="publish btn-publish">Publish</button>

	</form>
</div>
<script src="{{ asset('assets/js/show.js') }}"></script>
</body>
</html>