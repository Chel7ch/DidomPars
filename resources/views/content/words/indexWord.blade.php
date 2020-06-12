@extends('layouts/app')

@section('title', 'English words')

@include('navbar.enNavbar')

@section('sidebar')
<p>This is appended sidebar.</p>
@endsection

{{-- вывод списка слов по алфавиту --}}
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-offset-3 col-sm-9">
			@foreach ($words as $word)
			<a href="#myModal{{$word->id}}" data-toggle="modal"><b class="en_word">{{$word->english}}</b></a>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;{{$word->russian}}____ {{$word->lesson_num}}<br>
			@include('content.words.components.modal')
			@endforeach
		</div>
	</div>
</div>
@stop
