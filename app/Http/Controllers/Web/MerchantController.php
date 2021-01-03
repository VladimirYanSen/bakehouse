<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MerchantController extends Controller
{
    public function getAll(){
        $datas = DB::table('merchants')
            ->select()
            ->where('is_delete', '=', false)
            ->get();
        return view('pages.merchant.view', compact('datas'));
    }

    public function getOne($id){
        $data = DB::table('merchants')
            ->select()
            ->where('id = ?', $id)
            ->where('is_delete', '=', false)
            ->get();
        return view('pages.merchant.view', compact('data'));
    }

    public function create(Request $request){
        //input $request
        Merchant::create($request->all());
        //back to table view with new data
        $datas = DB::table('merchants')
            ->select()
            ->where('is_delete', '=', false)
            ->get();
        return view('pages.merchant.view', compact('datas'));
    }

    public function update(Request $request, $id){
        $data = Merchant::findOrFail($id);
        $data->update($request->all());
    }

    public function delete($id){
        $data = Merchant::findOrFail($id);
        if ($data) {
            Merchant::where('id', $id)
                ->update(['is_delete' => '1']);
        }
    }
}
