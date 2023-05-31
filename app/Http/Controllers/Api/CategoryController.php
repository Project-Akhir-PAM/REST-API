<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Libraries\ResponseBase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
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

        $categories = Category::search($search)
                ->paginate($dataAmount, ['*'], 'page', $pageNumber);

        return ResponseBase::success("Berhasil menerima data category", $categories);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|unique:categories|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return ResponseBase::error($validator->errors(), 422);

        try {
            $category = new Category();
            $category->name = $request->name;
            $category->save();

            return ResponseBase::success("Berhasil menambahkan data category!", $category);
        } catch (\Exception $e) {
            return ResponseBase::error('Gagal menambahkan data category!', 409);
        }
    }

    public function show($id)
    {
        $category = Category::with('products')->findOrFail($id);

        return ResponseBase::success("Berhasil menerima data category", $category);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'nullable|string|max:255|unique:categories,name,' . $id . ',id',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return ResponseBase::error($validator->errors(), 422);

        try {
            $category = Category::findOrFail($id);

            $category->name = $request->filled('name') ? $request->name : $category->name;
            $category->save();

            return ResponseBase::success("Berhasil update data category", $category);
        } catch (\Exception $e) {
            return ResponseBase::error($e->getMessage(), 409);
        }
    }

    public function delete($id)
    {
        try {
            $category = Category::findOrFail($id);

            $category->delete();
            return ResponseBase::success("Berhasil menghapus data category");
        } catch (\Exception $e) {
            return ResponseBase::error($e->getMessage(), 409);
        }
    }
}
