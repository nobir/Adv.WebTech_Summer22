<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home()
    {
        return view('product.home')
            ->with("page_title", "Home Page | Product");
    }

    public function create()
    {
        return view('product.create')
            ->with("page_title", "Home Create | Product");
    }

    public function createSubmit(Request $request)
    {
        $this->validate(
            $request,
            [
                "id" => "required|size:10|regex:/^([0-9]{2}-[0-9]{5}-[1-3]{1})+$/i",
                "name" => "required",
                "price" => "required|numeric|between:0.00,999999.99"
            ],
            [
                "id.regex" => "The Id format is invalid e.g. XX-XXXXX-X"
            ]
        );

        // Database work

        return $request->name . " " . $request->id . " " . $request->price;
    }

    public function all()
    {
        return view('product.list')
            ->with("page_title", "Home List | Product");
    }
}
