<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'prod_name' => 'required',
            'prod_description' => 'nullable',
            'prod_price' => 'required|numeric',
            'prod_stock' => 'required|integer',
            'prod_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:category,id', // Assuming your table name is 'categories'
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $productData = $request->except('prod_image');

        // Handle image upload
        if ($request->hasFile('prod_image')) {
            $image = $request->file('prod_image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $productData['prod_image'] = $imageName;
        }

        // if ($request->hasFile('image')) {
        //     $filename = $request->file('image')->getClientOriginalName();
        //     $path = $request->file('image')->storeAs('public/images', $filename);
        //     $movie->image = $filename;
        // }


        $product = Product::create($productData);

        return response()->json(['data' => $product, 'message' => 'Product created successfully'], 201);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return response()->json(['data' => $product]);
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
