{{--Main--}}

<div class="form-row">
    <div class="form-group col-md-3">
        <input type="text" class="form-control" placeholder="Слово" name="english" value="<?= $word->english ?? '' ?>">
    </div>
    <div class="form-group col-md-2">
        <input type="text" class="form-control" placeholder="Транскрипция" name="transcription" value="<?= $word->transcription ?? '' ?>">
    </div>
    <div class="form-group col-md-2">
        <select class="form-control" name="part_of_speech">
            @include('content.words.components.__partOfSpeech')
        </select>
    </div>
    <div class="form-group col-md-3">
        <input type="text" class="form-control" placeholder="Перевод" name="russian1" value="<?= $word->russian ?? '' ?>" >
    </div>
</div>
<div class="form-row">
    <div class="form-group offset-md-5 col-md-2">
        <select class="form-control" name="part_of_speech2">
            @include('content.words.components.__partOfSpeech')
        </select>
    </div>
    <div class="form-group col-md-3">
        <input type="text" class="form-control" placeholder="Перевод" name="russian2" value="<?= $word->russian2 ?? '' ?>">
    </div>
</div>
