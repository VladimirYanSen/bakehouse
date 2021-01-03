<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getAll(){
        $datas = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*','categories.name as category_name')
            ->where('products.is_delete', '=', false)
            ->get();
//        print_r($datas->toJson());
        return view('product', compact('datas'));
    }

    public function getOne($id){
        $data = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name')
            ->where('products.id', '=', $id)
            ->where('products.is_delete', '=', false)
            ->get();
        return view('product', compact('data'));
    }

    public function create(Request $request){
        Product::create($request->all());
    }

    public function update(Request $request, $id){
        $data = Product::findOrFail($id);
        $data->update($request->all());
    }

    public function delete($id){
        $data = Product::findOrFail($id);
        if ($data) {
            Product::where('id', $id)
                ->update(['is_delete' => '1']);
        }
    }

    public function getAllCategories(){
        $datas = DB::table('categories')
            ->select()
            ->where('is_delete', '=', false)
            ->get();
        return view('addproduct', compact('datas'));
    }








    //function for multiple input.

    function insert (Request $request) {
        if ($request->ajax()) {
            $rules = array (
                'first_name.*'    => 'required',
                'last_name.*'     => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails()){
                return response()->json([
                    'error' => $error->errors()->all()
                ]);
            }

            $first_name = $request->first_name;
            $last_name = $request->last_name;

            for ($count = 0; $count < count($first_name); $count++){
                $data = array(
                    'first_name' => $first_name[$count],
                    'last_name' => $last_name[$count]
                );
                $insert_data[] = $data;
            }

            Product::insert($insert_data);
            return response()->json([
                'success' => 'Data Added Succressfully.'
            ]);
        }
    }
}
