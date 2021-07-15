@extends('body')
@section("detail")

<section class="cardetail">
    <div class="container">
        <div class="row">


            <div class="col-md-4 sol-sm-6 col.xs-12 img">

                <img src="{{url('img/' . $item->img)}}" alt="No Image" class="image-fluid">
            </div>
            <div class="car_detail_txt col-md-4 col-sm-12 text-center">
                <p>Model : <span class="txt"></span> {{$item->model}}</p>
                <p>Brand :<span class="txt"></span>{{$item->brand}}</p>
                <p>Price : <span class="txt"></span> {{$item->price}}</p>
                <p>How long you uses : <span class="txt"></span>{{$item->uses}}</p>
            </div>
            <div class="col-sm-12">
                <p class="txt">{{ $item->created_at}}</p>
                <p class="txt"> Description:</p>
                <p class="txt">{{$item->detail}}</p>
            </div>

        </div>

        <!-- end container -->
    </div>
</section>


@endsection