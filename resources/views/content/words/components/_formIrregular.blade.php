{{-- Irregular --}}

<div class="form-row">
	<div class="form-group col-md-3">
		{!! Form::text('past_simp', null, ['class'=>'form-control','placeholder'=>'Past_Simple' ]) !!}
	</div>
	<div class="form-group col-md-2">
		{!! Form::text('transcription2', null, ['class'=>'form-control transcr','placeholder'=>'Транскрипция' ]) !!}
	</div>
	<div class="form-group col-md-2">
			@include('content.words.components.__markExcept')
	</div>
</div>
<div class="form-row">
	<div class="form-group col-md-3">
		{!! Form::text('past_part', null, ['class'=>'form-control','placeholder'=>'Past Participle' ]) !!}
	</div>
	<div class="form-group col-md-2">
		{!! Form::text('transcription3', null, ['class'=>'form-control transcr','placeholder'=>'Транскрипция' ]) !!}
	</div>
</div>
<div class="form-row">
	<div class="form-group col-md-3">
		{!! Form::text('meaning4', null, ['class'=>'form-control','placeholder'=>'4 meaning of the word' ]) !!}
		</div>
	<div class="form-group col-md-2">
		{!! Form::text('transcription4', null, ['class'=>'form-control transcr','placeholder'=>'Транскрипция' ]) !!}
	</div>
</div>
