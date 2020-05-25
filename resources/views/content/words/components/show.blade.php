<div class="container-fluid">

    <pre>
            @php
                    print_r($word);
                      //print_r($en);
            //$collection->dump();
            @endphp
            </pre>


	<div class="row">
		{{--content--}}
		<div class="col-sm-8">
			@include('content.words.components._outputOnceWord')
			@include('content.words.components._outputExpWord')
		</div>
		<div class="col-sm-4 ">
			@include('content.words.components._outputAddWord',['color'=>'danger','name'=>'Синонимы'])
			@include('content.words.components._outputAddWord',['color'=>'secondary','name'=>'Антонимы'])
			@include('content.words.components._outputAddWord',['color'=>'success','name'=>'Идиомы'])
			@include('content.words.components._outputAddWord',['color'=>'warning','name'=>'Вместе'])
			@include('content.words.components._outputAddWord',['color'=>'dark','name'=>'Похожие'])
		</div>
	</div>
</div>
