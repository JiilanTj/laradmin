<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $total = Product::count();
        $totalfee = 0;

        foreach ($products as $product) {
            $totalfee += $product->feedropship + $product->feedokter + $product->feeadmin + $product->feelayanan;
        }

        return view('admin.superadmin.product.home', compact('products', 'total', 'totalfee'));
    }

    public function create()
    {
        return view('admin.superadmin.product.create');
    }

    public function save(Request $request)
{
    $validation = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'stock' => 'required|integer',
        'modal' => 'required|integer',
        'feedropship' => 'required|integer',
        'feedokter' => 'required|integer',
        'feeadmin' => 'required|integer',
        'laba' => 'required|integer',
        'feelayanan' => 'required|integer',
        'hargacoret' => 'required|integer',
        'gambarutama' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
        'gambar1' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        'gambar2' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        'gambar3' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        'iskhusus' => 'required|boolean',
    ]);

    $gambarutamaPath = $request->file('gambarutama')->store('images', 'public');
    $validation['gambarutama'] = Storage::url($gambarutamaPath);

    if ($request->hasFile('gambar1')) {
        $gambar1Path = $request->file('gambar1')->store('images', 'public');
        $validation['gambar1'] = Storage::url($gambar1Path);
    }

    if ($request->hasFile('gambar2')) {
        $gambar2Path = $request->file('gambar2')->store('images', 'public');
        $validation['gambar2'] = Storage::url($gambar2Path);
    }

    if ($request->hasFile('gambar3')) {
        $gambar3Path = $request->file('gambar3')->store('images', 'public');
        $validation['gambar3'] = Storage::url($gambar3Path);
    }

    $validation['hargaasli'] = $validation['modal'] + $validation['feedropship'] + $validation['feedokter'] + $validation['feeadmin'] + $validation['laba'] + $validation['feelayanan'];

    Product::create($validation);

    session()->flash('success', 'Product added successfully');
    return redirect(route('admin/superadmin/products'));
}


    public function edit($id)
    {
        $products = Product::findOrFail($id);
        return view('admin.superadmin.product.update', compact('products'));
    }

    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $validation = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'stock' => 'required|integer',
        'modal' => 'required|integer',
        'feedropship' => 'required|integer',
        'feedokter' => 'required|integer',
        'feeadmin' => 'required|integer',
        'laba' => 'required|integer',
        'feelayanan' => 'required|integer',
        'hargacoret' => 'required|integer',
        'iskhusus' => 'required|boolean',
        'gambarutama' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        'gambar1' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        'gambar2' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        'gambar3' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Update product details
    $product->title = $validation['title'];
    $product->description = $validation['description'];
    $product->stock = $validation['stock'];
    $product->modal = $validation['modal'];
    $product->feedropship = $validation['feedropship'];
    $product->feedokter = $validation['feedokter'];
    $product->feeadmin = $validation['feeadmin'];
    $product->laba = $validation['laba'];
    $product->feelayanan = $validation['feelayanan'];
    $product->hargacoret = $validation['hargacoret'];
    $product->iskhusus = $validation['iskhusus'];

    // Update gambarutama if provided
    if ($request->hasFile('gambarutama')) {
        $gambarutamaPath = $request->file('gambarutama')->store('images', 'public');
        $product->gambarutama = Storage::url($gambarutamaPath);
    }

    // Update gambar1 if provided
    if ($request->hasFile('gambar1')) {
        $gambar1Path = $request->file('gambar1')->store('images', 'public');
        $product->gambar1 = Storage::url($gambar1Path);
    }

    // Update gambar2 if provided
    if ($request->hasFile('gambar2')) {
        $gambar2Path = $request->file('gambar2')->store('images', 'public');
        $product->gambar2 = Storage::url($gambar2Path);
    }

    // Update gambar3 if provided
    if ($request->hasFile('gambar3')) {
        $gambar3Path = $request->file('gambar3')->store('images', 'public');
        $product->gambar3 = Storage::url($gambar3Path);
    }

    $product->save();

    session()->flash('success', 'Product updated successfully');
    return redirect(route('admin/superadmin/products'));
}



    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        session()->flash('success', 'Product deleted successfully');
        return redirect(route('admin/superadmin/products'));
    }
}
