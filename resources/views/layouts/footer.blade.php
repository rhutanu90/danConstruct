<?php
/**
 * Created by PhpStorm.
 * User: RHutanu
 * Date: 8/7/2017
 * Time: 4:37 PM
 */ ?>

<div class="footer">
    <div class="container">
        @if(Auth::check())
            <p class="text-muted">Footer data from Controller: {{ $footerDetails }}</p>
        @endif
    </div>
</div>
