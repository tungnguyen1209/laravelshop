@extends('master-login')
@section('content')
<div class="container">
    <div id="content">
        <form action="#" method="post" class="beta-form-checkout">
            {{ csrf_field()}}
            @if(Session::has('flag'))
                <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
            @endif
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Login</h4>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="text" name="email" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Password*</label>
                        <input style="height: 37px; padding: 0 12px;border: 1px solid #e1e1e1" type="password" name="pass" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="beta-btn primary" name="placeorder">Login</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
