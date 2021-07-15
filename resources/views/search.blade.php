@extends('body')
@section("search")

<section class="carhome">
    <div class="container">
        <h6>search result :</h6>
        @if($data->isEmpty())
        <h3 class="" stye="text-align:center; margin:100px 0;">No Result Found</h3>
        @else
        <div class="row">
            @foreach($data as $item)

            <div class="col-md-4 sol-sm-6 col.xs-12 car_item">
                <div class="img">
                    <img src="{{url('img/' . $item->img)}}" alt="No Image" class="image-fluid">
                    <p class="txt">{{ $item->created_at}}</p>
                </div>
                <div class="car_detail_txt">
                    <h6 class="car_model_name">{{$item->model}}</h6>
                    <a class=" txt">{{$item->brand}}</a>
                    <a class="txt">{{$item->address}}</a>
                    <a class="detail-btn" href="{{url('detail/' .$item->id)}}">detail</a>

                </div>
            </div>


            @endforeach
        </div>
        @endif

        <!-- end container -->
    </div>
</section>


@endsection