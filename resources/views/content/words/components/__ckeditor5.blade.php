<textarea name="content" id="editor"></textarea>
<script>
	ClassicEditor
	.create( document.querySelector( '#editor' ), {
// 	    toolbar: {
//     items: [
//         'heading', '|',
//         'fontfamily', 'fontsize', '|',
//         'alignment', '|',
//         'fontColor', 'fontBackgroundColor', '|',
//         'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
//         'link', '|',
//         'outdent', 'indent', '|',
//         'bulletedList', 'numberedList', 'todoList', '|',
//         'code', 'codeBlock', '|',
//         'insertTable', '|',
//         'uploadImage', 'blockQuote', '|',
//         'undo', 'redo'
//     ],
//     shouldNotGroupWhenFull: true
// },
        // toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'uploadImage', 'blockQuote',
        //     'insertTable', 'undo', 'redo' ],
        // toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        table: {
            contentToolbar: [
                'tableColumn',
                'tableRow',
                'mergeTableCells'
            ]
        },
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' }
            ]
        }
    } )
	.catch( error => {
		console.error( error );
	} );
</script>
