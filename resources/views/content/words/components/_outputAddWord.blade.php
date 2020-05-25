<div class="card border-{{$color}} mb-3">
	<h5 class="card-header bg-{{$color}} text-light py-2">{{$name}}</h5>
	<div class="card-body">

		{{--@while ($row1 = $stmt1->fetch())--}}
		<span class="bold_left">{{$word->english}}</span>&nbsp;&nbsp;-&nbsp;&nbsp;<span class="owerflow"> {{$word->english}}</span><br>
		{{--@endwhile--}}
	</div>
</div>