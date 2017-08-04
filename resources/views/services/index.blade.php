@extends('layouts.app')

@section('content')
    <div class="row">

        <div id="passportElements">
            <services-vue-elements></services-vue-elements>
        </div>

    </div>
@endsection

@section('footerDependencies')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/services.js') }}"></script>
@endsection