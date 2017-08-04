<?php
/**
 * Created by PhpStorm.
 * User: RHutanu
 * Date: 8/3/2017
 * Time: 6:54 PM
 */
?>

@extends('layouts.app')

@section('content')
    <div class="row">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                <span>
                    API Current Clients
                </span>

                        <a class="action-link" href="{{ url('/client/create') }}">
                            Create New Client
                        </a>
                    </div>
                </div>

                <div class="panel-body">

                    <!-- Current Clients -->
                    @if(empty($clients))
                        <p class="m-b-none">
                            You have not created any Services.
                        </p>
                    @endif

                    <!-- if clients are inserted -->
                    @if(count($clients))
                        <table class="table table-borderless m-b-none">
                        <thead>
                        <tr>
                            <th width="10%;">Client ID</th>
                            <th width="10%;">First Name</th>
                            <th width="10%;">Last Name</th>
                            <th width="10%;">Birthday</th>
                            <th width="12%;">Email</th>
                            <th width="12%;">Phone Number</th>
                            <th width="7%;"></th>
                            <th width="8%;"></th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <!-- ID -->
                                    <td style="vertical-align: middle;">
                                        {{ $client->id }}
                                    </td>
                                    <td style="vertical-align: middle;">{{ $client->firstName }}</td>
                                    <td style="vertical-align: middle;">{{ $client->lastName }}</td>
                                    <td style="vertical-align: middle;" title="{{ $client->birthday->format('d.m.Y') }}">{{ $client->birthday->toFormattedDateString() }}</td>
                                    <td style="vertical-align: middle;">{{ $client->email }}</td>
                                    <td style="vertical-align: middle;">{{ $client->phoneNumber }}</td>

                                    <!-- Edit Button -->
                                    <td style="vertical-align: middle;">
                                        <a class="action-link">
                                            Edit
                                        </a>
                                    </td>

                                    <!-- Delete Button -->
                                    <td style="vertical-align: middle;">
                                        <a class="action-link text-danger" >
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerDependencies')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
@endsection