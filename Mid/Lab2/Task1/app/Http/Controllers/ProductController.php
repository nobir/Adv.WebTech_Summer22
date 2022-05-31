<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function service()
    {
        $products = [];

        for($i = 0; $i < 10; ++$i)
        {
            $products[] = [
                'name' => "Name " . ($i + 1),
                'id' => $i + 1,
                'dob' => date('U')
            ];
        }

        return view('product.service')
            ->with('page_title', "Service")
            ->with('products', $products);
    }
}
