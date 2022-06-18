@extends('layout')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

	@if (count($cards) > 0)
    	@foreach ($cards as $card)
    		
    		<div>
    			<h3>	
    				<a href="{{ route('cards.show', ['card' => $card['id']]) }}">{{$card['name']}}</a>
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
    		
    	@endforeach
    @else
    	<h2>There are no cards to display.</h2>
    @endif
	<div>
		User Input: {{$userInput}}
	</div>
</div>
@endsection