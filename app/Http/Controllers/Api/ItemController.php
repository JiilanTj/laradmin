<?php

namespace App\Http\Controllers\Api;

use App\Models\Item;
use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all posts
        $item = Item::latest()->paginate(5);

        //return collection of posts as a resource
        return new ItemResource(true, 'List Data Item', $item);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_item' => 'required',
            'stok' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $item = Item::create([
            'nama_item' => $request->nama_item,
            'stok' => $request->stok,
        ]);

        return new ItemResource(true, 'Item Berhasil Ditambahkan', $item);
    }
}