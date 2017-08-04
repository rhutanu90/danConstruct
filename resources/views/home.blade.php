@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div id="passportElements">

            <!-- let people make clients -->
            <passport-clients></passport-clients>

            <!-- list of clients people have authorized to access our account -->
            <passport-authorized-clients></passport-authorized-clients>

            <!-- make it simple to generate a token right in the UI to play with -->
            <passport-personal-access-tokens></passport-personal-access-tokens>

        </div>

    </div>
</div>
@endsection

@section('footerDependencies')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/apiToken.js') }}"></script>
@endsection


