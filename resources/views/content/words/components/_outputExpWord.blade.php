{{-- output explanations of the main word --}}
@if($word->еxplanation!="")  {{--addition_id--}}
<div class="card border-info mt-3">
	<h5 class="card-header bg-info text-light py-2">Explanations/Разъяснения</h5>
	<div class="card-body">
		<?= $word->еxplanation//addition_id ?>
	</div>
</div>
@endif
