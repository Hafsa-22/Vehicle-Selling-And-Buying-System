<section class="header">
    <div class="row justify-content-around">
        <div class="col-sm-2 logo">
            <a href="{{url('carhome')}}">VehicleHome</a>
        </div>

        <div class="col-sm-12 col-md-3">
            @if(session()->has('owner'))
            <a href="{{url('addpost')}}" style="font-size:20px; color:darkorange;">Addpost</a>
            <a href="{{url('logout')}}">logout</a>
            <a href="{{url('author')}}" style="font-size:20px; color:darkorange;">{{session()->get('owner')['name']}}</a>
            @else
            <a href="login">login</a>
            <a href="signup">sign up</a>
            @endif
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="search">
                <form action="{{url('search')}}">
                    <div class="input_src"></div>
                    <input type="text" name="search" style="width:80% ;height:30px;;display:inline-block;">
                    <input type="submit" value="search" class="btn btn-primary" style="color:black !important;display:inline-block;">
            </div>
            </form>
        </div>
    </div>


    </div>

</section>