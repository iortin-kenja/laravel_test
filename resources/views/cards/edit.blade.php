@extends('layout')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

	<form class="form bg-white p-5 border-1" method="POST" action="{{ route('cards.update', ['card' => $card->id]) }}">
		@csrf
		@method('PUT')
		<div>
			<label class="text-sm" for="name">Card Name</label>
			<input class="text-lg border-1" type="text" id="name" name="name" value="{{ $card->name }}">
			@error('name')
				<div class="form-error">
					{{ $message }}
				</div>
			@enderror
		</div>
		<div>
			<label class="text-sm" for="type">Type</label>
			<input class="text-lg border-1" type="text" id="type" name="type" value="{{ $card->type }}">
			@error('type')
				<div class="form-error">
					{{ $message }}
				</div>
			@enderror
		</div>
		<div>
			<label class="text-sm" for="current_limit">Card Limit</label>
			<input class="text-lg border-1" type="text" id="current_limit" name="current_limit" value="{{ $card->current_limit }}">
			@error('current_limit')
				<div class="form-error">
					{{ $message }}
				</div>
			@enderror
		</div>
		<div>
			<button class="border-1" type="submit">Submit</button>
		</div>
	</form>

</div>
@endsection