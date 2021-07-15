@extends('body')
@section("addpost")

<section class="author">
    <div class="container">
        <div class="row author_detail">



            <form action="{{ url('addnewpost') }}" method="POST" enctype="multipart/form-data">

                @csrf


                <div class="post_form_container">
                    <h3 class="head">Upload A post for sale</h3>

                    @if($errors->any())
                    @foreach($errors->all() as $err)

                    <li style="list-style-type:none;color:red; padding:5px 0px; margin-left:10%">{{$err}}</li>
                    @endforeach
                    @endif


                    <div class="input_container">
                        <span class="spn">Model:</span> <input class="in" type="text" name="model">
                    </div>
                    <div class="input_container">
                        <span class="spn">Brand:</span> <input class="in" type="text" name="brand">
                    </div>
                    <div class="input_container">

                        <span class="spn">Condition:</span> <input class="in" type="text" name="condition">
                    </div>
                    <div class="input_container">
                        <span class="spn">How long you are using ?</span><br>
                        <input class="in" type="text" name="uses" placeholder="Uses year">

                    </div>
                    <div class="input_container">
                        <span class="spn">Price:</span> <input class="in" type="text" name="price">
                    </div>
                    <div class="input_container">
                        <span class="spn">Description:</span> <br><input class="in" type="textarea" name="detail" style="width:350px; height:100px; border:1px solid gray;">
                    </div>
                    <div class="input_container">
                        <span class="spn">Image:</span> <input class="in" type="file" value="Image" name="image">
                    </div>
                    <div class="input_container">
                        <input class="in" type="submit" value="Post Now">
                    </div>
                </div>


            </form>



        </div>

</section>


@endsection