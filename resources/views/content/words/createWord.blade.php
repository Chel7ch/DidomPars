@extends('layouts.app')

@section('title',('Input of words'))

@section('content')

<ul class="nav nav-tabs">
	<li class="nav-item"><a class="nav-link active" href="#Main" data-toggle="tab">Main</a></li>
	<li class="nav-item"><a class="nav-link" href="#Irregular" data-toggle="tab">Irregular</a></li>
	<li class="nav-item"><a class="nav-link" href="#Additionally" data-toggle="tab">Additionally</a></li>
	<li class="nav-item"><a class="nav-link " href="#Crossing" data-toggle="tab">Crossing</a></li>
	<li class="nav-item"><a class="nav-link " href="#Category" data-toggle="tab">Category</a></li>
</ul>
{{-- Tab panes --}}
<div class="tab-content">
	<div class="tab-pane fade show active" id="Main">
		<br>
		{!! Form::open(array('url'=>'word')) !!}
		{{-- <form class="form-horizontal" enctype="multipart/form-data" action="/lara/public/word" method="post"> --}}
			@csrf

			@include('content.words.components._formMain')
		</div>
		<div class="tab-pane fade" id="Irregular">
			<br>
			@include('content.words.components._formIrregular')
		</div>
		<div class="tab-pane fade" id="Additionally">
			<br>
			@include('content.words.components._formAdditionally')
			<div class="form-group col-md-11">
				@include('content.words.components.__ckeditor5')
			</div>
			@include('content.words.components.__lesson')
		</div>
	</div>
	@include('content.words.components._formCrossing')
	@include('content.words.components._formButton')
	{!! Form::close() !!}
{{-- </form> --}}
@include('error.formErrorMessage')
</div>

@endsection
