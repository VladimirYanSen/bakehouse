<?php

namespace App\Http\Controllers\Web;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function getAll(){
        $datas = DB::table('categories')
            ->select()
            ->where('is_delete', '=', false)
            ->get();
        return view('pages.category.view', compact('datas'));
    }

    public function getOne($id){

        $data = DB::table('categories')
            ->select()
            ->where('id', '=' , $id)
            ->where('is_delete','=', false)
            ->get();
        return view('pages.category.view', compact('data'));

    }

    public function create(Request $request){

//        input $request
        Category::create($request->all());
//        back to table view with new data
        $datas = DB::table('categories')
            ->select()
            ->where('is_delete', '=', false)
            ->get();
        return view('pages.category.view', compact('datas'));
    }

    public function update(Request $request, $id){

        $data = Category::findOrFail($id);
        $data->update($request->all());

//        back to table view with new data
        $datas = DB::table('categories')
            ->select()
            ->where('is_delete', '=', false)
            ->get();
        return view('pages.category.view', compact('datas'));
    }

    public function delete($id){
        $data = Category::findOrFail($id);
        if ($data) {
            Category::where('id', $id)
                ->update(['is_delete' => '1']);
        }
    }
}
