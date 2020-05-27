@php
// echo "<pre>
// 	var_dump($word->id);<br>
// </pre>"


@endphp
@if ($errors->any())
    <div class="alert alert-danger">

            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

    </div>
@endif