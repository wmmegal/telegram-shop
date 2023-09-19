<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $products = Product::cursorPaginate(6);

        if ($request->ajax()) {
            $nextPageUrl = $products->nextPageUrl();
            $html = view('partials.products', compact('products'))->render();

            return response()->json([
                'html' => $html,
                'nextPageUrl' => $nextPageUrl
            ]);
        }

        return view('home', compact('products'));
    }
}
