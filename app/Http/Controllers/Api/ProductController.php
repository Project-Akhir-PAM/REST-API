<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Libraries\ResponseBase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $rules = [
            'page' => 'nullable|integer',
            'limit' => 'nullable|integer',
            'search' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return ResponseBase::error($validator->errors(), 422);

        $pageNumber = $request->input('page', 1);
        $dataAmount = $request->input('limit', 10);
        $search = $request->input('search', null);

        $products = Product::with('category')
                    ->search($search)
                    ->paginate($dataAmount, ['*'], 'page', $pageNumber);

        $products->getCollection()->transform(function ($product) {
            $product->img = asset('storage/' . $product->img);
            return $product;
        });

        return ResponseBase::success("Berhasil menerima data product", $products);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255|unique:products,name,NULL,id,category_id,' . $request->category_id,
            'category_id' => 'required|numeric|exists:categories,id',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return ResponseBase::error($validator->errors(), 422);

        try {
            $product = new Product();
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->save();

            return ResponseBase::success("Berhasil menambahkan data product!", $product);
        } catch (\Exception $e) {
            return ResponseBase::error('Gagal menambahkan data product!', 409);
        }
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);

        return ResponseBase::success("Berhasil menerima data product", $product);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'nullable|string|max:255|unique:products,name,' . $id . ',id,category_id,' . $request->category_id,
            'category_id' => 'nullable|numeric|exists:categories,id',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return ResponseBase::error($validator->errors(), 422);

        try {
            $product = Product::with('category')->findOrFail($id);

            $product->name = $request->filled('name') ? $request->name : $product->name;
            $product->category_id = $request->filled('category_id') ? $request->category_id : $product->category_id;
            $product->save();

            return ResponseBase::success("Berhasil update data product", $product);
        } catch (\Exception $e) {
            return ResponseBase::error($e->getMessage(), 409);
        }
    }

    public function delete($id)
    {
        try {
            $product = Product::findOrFail($id);

            $product->delete();
            return ResponseBase::success("Berhasil menghapus data product");
        } catch (\Exception $e) {
            return ResponseBase::error($e->getMessage(), 409);
        }
    }
}
