@extends('body')
@section("author")

<section class="author">
    <div class="container">
        <div class="row author_detail">

            <div class="col-sm-12 col-md-4">
                <h4>{{session()->get('owner')['name']}}</h4>
                <p><span class="owner_dtl1">Address: </span> <span class="owner_dtl2">{{session()->get('owner')['address']}}</span></p>
                <p><span class="owner_dtl1">Mobile: </span> <span class="owner_dtl2">{{session()->get('owner')['mobile']}}</span></p>
                <p><span class="owner_dtl1">Email: </span> <span class="owner_dtl2">{{session()->get('owner')['email']}}</span></p>
            </div>
        </div>

        <div class="row" style="margin:80px 0px;">
            <div class="col-sm-12">
                <p style="color:black; font-size:22px;">Click here to add new post: <a href="{{url('addpost')}}" style="
                color:white !important ; 
                padding:5px 8px; background:blue;
                border-radius:5px;
                ">New post</a></p>
            </div>
        </div>


        <div class="row author_post">
            <div class="row">
                @foreach($collectdata as $data)
                <div class="col-md-4 col-sm-12 img">
                    <img src="{{url('img/' . $data->img)}}" alt="">
                    <p class="txt">Post at : <span class="txt"></span> {{$data->created_at}}</p>
                </div>
                <div class="col-md-3 col-sm-12 text1" style="text-align:center; color:green;">
                    <p>Model : <span class="txt"></span> {{$data->model}}</p>
                    <p>Brand :<span class="txt"></span>{{$data->brand}}</p>
                    <p>Price : <span class="txt"></span> {{$data->price}}</p>
                    <p>How long you uses : <span class="txt"></span>{{$data->uses}}</p>
                </div>
                <div class="col-md-4 col-sm-12 text2">
                    <p class="txt">Description:</p>
                    <p class="txt">{{$data->detail}}</p>
                </div>
                <div class="col-sm-12 author_editor_div">
                    <a class="remove-btn" href="{{url('delete/' .$data->id)}}"> Remove</a>


                    <form action="{{url('edit')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$data->id}}" name="carid">
                        <button class="edit-btn" style="display:inline-block;">Edit</button>
                    </form>

                </div>
                @endforeach
            </div>
        </div>
    </div>

</section>


@endsection