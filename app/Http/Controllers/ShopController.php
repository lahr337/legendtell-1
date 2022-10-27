<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $page_title = 'Network Shops';
        $shops = Shop::all();
        return view('shop.index', compact('page_title','shops'));
    }

    public function view($id)
    {
        if($shop = Shop::find($id)){
            $page_title = $shop->name;
            return view('shop.view', compact('page_title','shop'));
        }
        return redirect()->back();
    }
}
