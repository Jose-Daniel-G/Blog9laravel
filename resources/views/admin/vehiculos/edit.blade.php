@section('title', 'JDeveloper')

@section('content_header')
    <h1>Crear nuevo Post</h1>
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('vehiculos.form', ['vehiculo' => $vehiculo])
        </div>
    </div>
</div>
@stop
@endsection
