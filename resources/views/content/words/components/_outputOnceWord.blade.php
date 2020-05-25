{{-- output of the main word --}}
<div class="card border-primary">
	<h5 class="card-header bg-primary text-light py-2">{{$word->english}}</h5>
	<div class="card-body">
		<div class="main_word col-sm-12">
			{{$word->english}} &nbsp; {{$word->transcription}} <br>
			@unless ($word->past_simp=='') {{$word->past_simp}} &nbsp; {{$word->transcription2}} <br>
			@endunless
			@unless ($word->past_part=='') {{$word->past_part}} &nbsp; {{$word->transcription3}} <br>
			@endunless
			@unless ($word->meaning4=='') {{$word->meaning4}} &nbsp; {{$word->transcription4}} <br>
			@endunless
		</div>
		<div class="main_desc col-sm-12">
{{--			{{$word->part_of_speech}}&nbsp;&nbsp;{{$word->ru_words[0]['russian']}}<br>--}}
{{--                @php--}}
{{--                    if (isset($word->count)){--}}
{{--                      for($i=2;$i<=$word->count;$i++){--}}
{{--                        $w='russian'.$i;--}}
{{--                        $w=$word->$w;--}}
{{--                        echo htmlspecialchars($word->part_of_speech).'&nbsp;&nbsp;'.htmlspecialchars($w)."<br>";--}}
{{--                      }--}}
{{--                    }--}}
{{--                @endphp--}}
		</div>
	</div>
</div>
