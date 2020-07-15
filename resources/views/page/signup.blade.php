@extends('master-login')
@section('content')
<div class="container">
    <div id="content">
        <form action="" method="post" class="beta-form-checkout">
            {{ csrf_field()}}
            @if(isset($message))
            <div class="alert alert-danger">{{$message}}</div>
            @endif
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Register</h4>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-block">
                        <label for="your_last_name">Fullname*</label>
                        <input type="text" name="fullname" required>
                    </div>
                    <div class="form-block">
                        <label for="adress">Address*</label>
                        <input type="text" name="address" value="Street Address" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Phone*</label>
                        <input type="text" name="phone" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Password*</label>
                        <input style="height: 37px; padding: 0 12px;border: 1px solid #e1e1e1" type="password" name="pass" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Re password*</label>
                        <input style="height: 37px; padding: 0 12px;border: 1px solid #e1e1e1" type="password" name="re_pass" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="beta-btn primary" name="placeorder">Register</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
