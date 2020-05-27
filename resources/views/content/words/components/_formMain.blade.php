{{--Main--}}
<div class="form-row">
  <div class="form-group col-md-3">
    {{-- {!! Form::hidden('user_id',1) !!} --}}
    {!! Form::text('english', null, ['class'=>'form-control','placeholder'=>'Слово' ]) !!}
  </div>
  <div class="form-group col-md-2">
    {!! Form::text('transcription', null, ['class'=>'form-control transcr','placeholder'=>'Транскрипция']) !!}
  </div>
  <div class="form-group col-md-2">
      @include('content.words.components.__partOfSpeech', ['partOfSpeeh' => 'part_of_speech'])
  </div>
  <div class="form-group col-md-3">
    {!! Form::text('russian', null, ['class'=>'form-control','placeholder'=>'Перевод']) !!}
  </div>
</div>
<div class="form-row">
  <div class="form-group offset-md-5 col-md-2">
      @include('content.words.components.__partOfSpeech', ['partOfSpeeh' => 'part_of_speech2'])
  </div>
  <div class="form-group col-md-3">
    {!! Form::text('russian2', null, ['class'=>'form-control','placeholder'=>'Перевод']) !!}
  </div>
</div>
