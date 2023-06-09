<?php

namespace App\Http\Controllers\Api;

use App\Models\Destination;
use Illuminate\Http\Request;
use App\Libraries\ResponseBase;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DestinationController extends Controller
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

        $destinations = Destination::with('category')
                    ->search($search)
                    ->get();

        return ResponseBase::success("Berhasil menerima data destination", $destinations);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255|unique:destinations,name,NULL,id,category_id,' . $request->category_id,
            'img' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|numeric|exists:categories,id',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return ResponseBase::error($validator->errors(), 422);

        try {
            $destination = new Destination();
            $destination->name = $request->name;
            $destination->img = $request->img;
            $destination->location = $request->location;
            $destination->description = $request->description;
            $destination->category_id = $request->category_id;
            $destination->save();

            return ResponseBase::success("Berhasil menambahkan data destination!", $destination);
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan data destination: ' . $e->getMessage());
            return ResponseBase::error('Gagal menambahkan data destination!', 409);
        }
    }

    public function show($id)
    {
        $destination = Destination::with('category')->findOrFail($id);

        return ResponseBase::success("Berhasil menerima data destination", $destination);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'nullable|string|max:255|unique:destinations,name,' . $id . ',id,category_id,' . $request->category_id,
            'img' => 'nullable|string',
            'location' => 'nullable|string',
            'description' => 'nullable|string',
            'category_id' => 'nullable|numeric|exists:categories,id',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return ResponseBase::error($validator->errors(), 422);

            $destination = Destination::findOrFail($id);

        try {
            $request->filled('name') ? $destination->name = $request->name : null;
            $request->filled('img') ? $destination->img = $request->img : null;
            $request->filled('location') ? $destination->location = $request->location : null;
            $request->filled('description') ? $destination->description = $request->description : null;
            $request->filled('category_id') ? $destination->category_id = $request->category_id : null;
            $destination->save();

            return ResponseBase::success("Berhasil update data destination", $destination);
        } catch (\Exception $e) {
            Log::error('Gagal merubah data destination: ' . $e->getMessage());
            return ResponseBase::error('Gagal merubah data destination', 409);
        }
    }

    public function delete($id)
    {
        $destination = Destination::findOrFail($id);

        try {
            $destination->delete();
            return ResponseBase::success("Berhasil menghapus data destination");
        } catch (\Exception $e) {
            Log::error('Gagal menghapus data destination: ' . $e->getMessage());
            return ResponseBase::error('Gagal menghapus data destination', 409);
        }
    }
}
