{!! Form::textarea('description',null, ['class'=>'form-control','id'=>'editor','placeholder'=>'Место для примеров и разъяснений']) !!}
<script>
	ClassicEditor
    .create( document.querySelector( '#editor' ), {
        placeholder: 'Место для примеров и разъяснений'
    } )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>
