<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Faker\Provider\Lorem;
use Illuminate\Support\Facades\DB;

class CarControl extends Controller
{
    function newpost(Request $req)
    {
        $req->validate(
            [
                'model' => 'required',
                'brand' => 'required',
                'condition' => 'required',
                'uses' => 'required',
                'price' => 'required',
                'detail' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );
        $image = $req->file('image');
        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('/img');
        $image->move($path, $input['imagename']);
        $img_name =  $input['imagename'];
        $authorid = session()->get('owner')['id'];
        $cardetail = new Car;

        $cardetail->authorid = $authorid;
        $cardetail->model = $req->model;
        $cardetail->brand = $req->brand;
        $cardetail->price = $req->price;
        $cardetail->img = $img_name;
        $cardetail->uses = $req->uses;
        $cardetail->detail = $req->detail;
        $cardetail->condition = $req->condition;
        $cardetail->save();

        return redirect('author');
    }
    function authorpost()
    {
        $authorid = session()->get('owner')['id'];
        $alldata = DB::table('userinfo')
            ->join('car', 'userinfo.id', '=', 'car.authorid')
            ->where('userinfo.id', $authorid)
            ->select('car.*')->get();

        return view('author', ['collectdata' => $alldata]);
    }
    function carhome()
    {
        $caritem = Car::all();
        return view('carhome', ['allcarpost' => $caritem]);
    }
    function delete($id)
    {
        Car::where('id', $id)->delete();
        return redirect('author');
    }
    function detail($id)
    {
        $caritem = DB::table('car')
                ->join('userinfo','car.authorid','=','userinfo.id')
                ->where('car.id',$id)
                ->select('car.*','userinfo.*')
                ->first();
            return view('detail', ['item' => $caritem]);
       
    }
    function search(Request $req)
    {

        $item = Car::where('model', 'like', '%' . $req->search .  '%')
            ->orwhere('brand', 'like', '%' . $req->search .  '%')
            ->select('car.*')->get();

        return view("search", ['data' => $item]);
    }
    function addpost()
    {
        return view('addpost');
    }

    function edit(Request $req)
    {
        $data = Car::where('id', $req->carid)->first();
        return view('edit', ['cardata' => $data]);
    }
    function update(Request $req)
    {


        $req->validate(
            [
                'model' => 'required',
                'brand' => 'required',
                'condition' => 'required',
                'uses' => 'required',
                'price' => 'required',
                'detail' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );



        $image = $req->file('image');
        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('/img');
        $image->move($path, $input['imagename']);
        $img_name =  $input['imagename'];


        $authorid = session()->get('owner')['id'];

        $cardetail = Car::find($req->id);;

        $cardetail->authorid = $authorid;
        $cardetail->model = $req->model;
        $cardetail->brand = $req->brand;
        $cardetail->price = $req->price;
        $cardetail->img = $img_name;
        $cardetail->uses = $req->uses;
        $cardetail->detail = $req->detail;
        $cardetail->condition = $req->condition;
        $cardetail->update();





        return redirect('author');
    }
}
