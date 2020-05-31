{{-- Additionally --}}
<div class="form-row">
	<div class="form-group offset-md-5 col-md-2">
		@include('content.words.components.__partOfSpeech',['partOfSpeeh'=>'part_of_speech3'])
	</div>
	<div class="form-group col-md-3">
		{!! Form::text('russian3', null, ['class'=>'form-control','placeholder'=>'Перевод']) !!}
	</div>
</div>
<div class="form-row">
	<div class="form-group offset-md-5 col-md-2">
		@include('content.words.components.__partOfSpeechRus')
	</div>
	<div class="form-group col-md-3">
		{!! Form::text('russian4', null, ['class'=>'form-control','placeholder'=>'Перевод' ]) !!}
	</div>
</div>
