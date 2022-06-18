@extends('layout')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

	<div>
		<h3>	
			{{$card['name']}}
		</h3>
		<ul>
			<li>
				Card type: {{$card['type']}}
			</li>
			<li>
				Limited to {{$card['current_limit']}}.
			</li>
		</ul>
	</div>

</div>
@endsection