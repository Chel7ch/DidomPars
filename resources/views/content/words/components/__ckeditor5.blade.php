<textarea name="content" id="editor"></textarea>
<script>
	ClassicEditor
	.create( document.querySelector( '#editor' ))
	.catch( error => {
		console.error( error );
	} );
</script>
