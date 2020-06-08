{{-- модальное окно --}}
<div id="myModal{{$word->id}}" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg " role="document">
		<div class="modal-content">
			<div class="modal-body">
				@include('content.words.components.show')
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
