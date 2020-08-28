<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products =  Product::get();
        // $products = $products->sortBy('name');
        // return view('products.index',compact('products'));
        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $params = $request->all();
        if ($request->ajax()) {
            Product::create($params);
            return response()->json(['status' => 'success', 'message' => 'Продукт добавлен'], 201);
//            $response = [
//                'status' => 'success',
//                'message' => 'Продукт добавлен'
//            ];
//            return $response;
        } else {
            dd( __METHOD__);
        }
//        Product::create($params);
//        return redirect()->back()->with('success', 'Продукт добавлен');


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $params = $request->all();
        if ($request->ajax()) {
            $product->update($params);
            return response()->json(['status' => 'success', 'message' => 'Продукт Обновлен'], 200);
//            $response = [
//                'status' => 'success',
//                'message' => 'Продукт Обновлен'
//            ];
//            return $response;
        } else {
            dd( __METHOD__);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->delete();
        return response()->json(['status' => 'success', 'message' => 'Продукт Удален'], 200);
//        $response = [
//            'status' => 'success',
//            'message' => 'Продукт Удален'
//        ];
//        return $response;

    }

    public function getAllProducts()
    {
        $products = Product::orderBy('name')->get();
        return $products;
    }
}
