<?php
/**
 * Created by PhpStorm.
 * User: RHutanu
 * Date: 8/4/2017
 * Time: 12:14 PM
 */
?>

@if(count($errors))
    <div class="form-group">
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
