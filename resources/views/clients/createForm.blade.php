<?php
/**
 * Created by PhpStorm.
 * User: RHutanu
 * Date: 8/4/2017
 * Time: 11:05 AM
 */
?>
@extends('layouts.app')

@section('content')
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                <span>
                    Create a new Client
                </span>

                    <a class="action-link" href="{{ url('/client') }}">
                        << Back to Clients
                    </a>
                </div>
            </div>

            <div class="panel-body">

                <form class="form-horizontal" method="POST" action="{{ url('/client/') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="gender">Gender:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="gender" name="gender">
                                <option value="0">Female</option>
                                <option value="1">Male</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="firstName">First Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="firstName" name="firstName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="lastName">Last Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lastName" name="lastName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email address:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="phoneNumber">Phone number:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="birthday">Birthday:</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="birthday" name="birthday">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="observations">Observations:</label>
                        <div class="col-sm-10">
                            <textarea rows="5" class="form-control" id="observations" name="observations"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label><input type="checkbox" id="loyalty" name="loyalty"> Add to Loyalty program</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Create</button>
                        </div>
                    </div>
                </form>

                @include('layouts.errors')

            </div>
        </div>
    </div>
@endsection