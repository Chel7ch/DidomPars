@extends('layouts/app')

@section('title',('Edit word'))

@section('content')

<ul class="nav nav-tabs">
	<li class="nav-item"><a class="nav-link" href="#Category" data-toggle="tab">Category</a></li>
	<li class="nav-item"><a class="nav-link active" href="#Main" data-toggle="tab">Main</a></li>
	<li class="nav-item"><a class="nav-link" href="#Delete" data-toggle="tab">Delete</a></li>
</ul>
{{-- Tab panes --}}
<div class="tab-content">
	<div class="tab-pane fade" id="Category">
		<br>

	</div>
	<div class="tab-pane fade show active" id="Main">
		<br>
		<form class="form-horizontal" enctype="multipart/form-data" action="{{ action('EnglishController@store', $word->id) }}" method="POST">
{{--		 <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('EnglishController@update', $word->id) }}" method="post">--}}
			{{-- $url = route('loginPage');
			Route::get('profile/{id}', ['as' => 'viewProfile', 'uses' => 'ProfileController@view']);
			$redirect = Redirect::route('loginPage'); --}}
			@method('PATCH')
			@csrf
			@include('content.words.components._formMain')
			@include('content.words.components._formAdditionally')
			@include('content.words.components._formIrregular')
			<div class="form-row ">
				<div class="form-group col-md-11">
					@include('content.words.components.__ckeditor5')
				</div>
			</div>
			@include('content.words.components.__lesson')
			@include('content.words.components._formCrossing')
			@include('content.words.components._formButtonEdit')
		</form>
	</div>
	<div class="tab-pane fade" id="Delete">
		<br>
		@include('content.words.components.__deliteWord')
	</div>
	@include('error.formErrorMessage')
</div>

@endsection
