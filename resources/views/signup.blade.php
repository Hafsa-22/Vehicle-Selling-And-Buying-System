@extends('body')
@section("signup")
<div class="llggoo" style="margin-top:120px !important">


    @if(session()->has('mg'))
    <p style="text-align:center; padding:20px 0; color:red;">
        <?php if (session()->has('mg')) {
            echo session()->get('mg');
        }
        ?>

    </p>

    @endif
    <div class="row flex">

        <div class="register col-sm-12 col-md-6 col-xm-12 mx-auto my-auto">
            <form action="signup" method="POST">
                @csrf
                <div class="input">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                </div>
                <div class="input">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                </div>
                <div class="input">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="input">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address">
                </div>
                <div class="input">
                    <label for="mobile">Mobile Number:</label>
                    <input type="text" id="mobile" name="mobile">
                </div>
                <input type="submit" class="btn btn-primary align-center" value="register" style="margin-top:5px">
            </form>
        </div>
    </div>
</div>
@endsection