@extends('layout')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

	<form class="form bg-white p-5 border-1" method="POST" action="{{ route('cards.store') }}">
		@csrf
		<div>
			<label class="text-sm" for="name">Card Name</label>
			<input class="text-lg border-1" type="text" id="name" name="name" value="{{ old('name') }}">
			@error('name')
				<div class="form-error">
					{{ $message }}
				</div>
			@enderror
		</div>
		<div>
			<label class="text-sm" for="type">Type</label>
			<input class="text-lg border-1" type="text" id="type" name="type" value="{{ old('type') }}">
			@error('type')
				<div class="form-error">
					{{ $message }}
				</div>
			@enderror
		</div>
		<div>
			<label class="text-sm" for="current_limit">Card Limit</label>
			<input class="text-lg border-1" type="text" id="current_limit" name="current_limit" value="{{ old('current_limit') }}">
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