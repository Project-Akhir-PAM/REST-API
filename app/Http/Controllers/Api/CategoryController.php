<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Libraries\ResponseBase;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $rules = [
            'search' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return ResponseBase::error($validator->errors(), 422);

        $search = $request->input('search', null);

        $categories = Category::search($search)
                    ->get();

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
            Log::error('Gagal menambahkan data category: ' . $e->getMessage());
            return ResponseBase::error('Gagal menambahkan data category!', 409);
        }
    }

    public function show($id)
    {
        $category = Category::with('destinations')->findOrFail($id);

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

            $category = Category::findOrFail($id);

        try {
            $category->name = $request->filled('name') ? $request->name : $category->name;
            $category->save();

            return ResponseBase::success("Berhasil update data category", $category);
        } catch (\Exception $e) {
            Log::error('Gagal mengubah data category: ' . $e->getMessage());
            return ResponseBase::error('Gagal mengubah data category!', 409);
        }
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);

        try {
            $category->delete();
            return ResponseBase::success("Berhasil menghapus data category");
        } catch (\Exception $e) {
            Log::error('Gagal menghapus data category: ' . $e->getMessage());
            return ResponseBase::error('Gagal menghapus data category!', 409);
        }
    }
}
