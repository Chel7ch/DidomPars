@extends('layouts.app')

@section('title', 'Words')

{{--@section('sidebar')--}}
{{--<p>This is appended sidebar.</p>--}}
{{--@endsection--}}

{{-- вывод списка слов по алфавиту --}}
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-offset-3 col-sm-9">

            <pre>
            @php
            //print_r($words);
              //print_r($en);
            @endphp
            </pre>

			@foreach ($words as $word)
			<a href="#myModal{{$word->id}}" data-toggle="modal"><b class="en_word">{{$word->english}}</b></a>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;{{$word->russian}}____ {{$word->lesson_num}}<br>
			@include('content.words.components.modal')
			@endforeach

		</div>
	</div>
{{--    @include('content.words.components.__paginator')--}}
</div>
@stop