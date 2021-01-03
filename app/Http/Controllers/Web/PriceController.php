<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PriceController extends Controller
{
    public function getAll()
    {
        $datas = DB::table('prices')
            ->join('merchants', 'prices.merchant_id', '=', 'merchants.id')
            ->join('products', 'prices.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select(
                'prices.*',
                'merchants.name as merchant_name',
                'products.name as product_name',
                'categories.name as category_name'
            )
            ->where('prices.is_delete', '=', false)
            ->get();
        return view('pages.product.view', compact('datas'));
    }

    public function getOne($id)
    {
        $data = DB::table('prices')
            ->join('merchants', 'prices.merchant_id', '=', 'merchants.id')
            ->join('products', 'prices.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select(
                'prices.*',
                'merchants.name as merchant_name',
                'products.name as product_name',
                'categories.name as category_name'
            )
            ->where('prices.id', '=', $id)
            ->where('prices.is_delete', '=', false)
            ->get();
        return view('product', compact('data'));
    }

    public function create(Request $request)
    {
        //input $request to table products and prices
        Price::create($request->all());
        //back to table view with new data
    }

    public function update()
    {
//delete row from table product(id) and price(product_id)
//        $data = Price::findOrFail($id);
//        $data->update($request->all());
        return null;
    }

    public function delete()
    {
//delete row from table product(id) and price(product_id)
//        $data = Price::findOrFail($id);
//        if ($data) {
//            Price::where('id', $id)
//                ->update(['is_delete' => '1']);
//        }
        return null;
    }

    public function getMerchantProduct($merchantId)
    {
        $datas = DB::table('prices')
            ->join('merchants', 'prices.merchant_id', '=', 'merchants.id')
            ->join('products', 'prices.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select(
                'prices.*',
                'merchant.id as merchant_id',
                'merchants.name as merchant_name',
                'products.name as product_name',
                'categories.name as category_name'
            )
            ->where('merchant.id', '=', $merchantId)
            ->where('prices.is_delete', '=', false)
            ->get();
        return view('pages.product.view', compact('datas'));
//        return null;
    }
}
