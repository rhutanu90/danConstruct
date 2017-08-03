@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div id="passportElements">
            <services-vue-elements></services-vue-elements>
        </div>

    </div>
</div>
@endsection

@section('footerDependencies')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
@endsection