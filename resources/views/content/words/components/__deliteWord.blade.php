{{-- Delete word --}}

<form class="form-horizontal" enctype="multipart/form-data" action="/lara/public/word" method="post">
	{{ csrf_field() }}
	<div class="form-group col-md-12 left_pad">
		{{ $word->english }}&nbsp;&nbsp;—&nbsp;&nbsp;{{ $word->russian }}
	</div>
	<!--Button Del-->
	<div class="form-group">
		<div class="offset-md-6 col-md-2 right_pad">
			<input type="submit" class="form-control btn-danger margin-top20 "  value="Удалить">
			{{-- <input type='hidden' name='english_del' value= {{ $word->english }}> --}}
		</div>
	</div>
</form>
