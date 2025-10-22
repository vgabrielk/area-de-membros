<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')
        ->select(['banner', 'description', 'price', 'id', 'title', 'user_id'])
        ->with('user')
        ->paginate(5);
        return view('product.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('store');
        $data = $request->validate([
            'title' => 'string',
            'price' => 'string',
            'description' => 'string',
            'banner' => 'required|image|max:2048',
        ]);
        $user = Auth::user();

        $path = $request->file('banner')->store('banners', 'public');


        $product = new Product($data);
        $product->status = 'published';
        $product->user_id = $user->id;
        $product->banner = $path;
        $product->save();
        return redirect()->route('products')->with('success', 'Curso criado com sucesso!');
        ;

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * @param \App\Http\Requests\ProductRequest|\Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     */
    public function update(ProductRequest $request, Product $product)
    {
        Gate::authorize('update', $product);

        $data = $request->validated();
        if (isset($data['banner'])) {
            if ($product->banner) {
                Storage::disk('public')->delete($product->banner);
            }

            $path = $request->file('banner')->store('banners', 'public');
            $data['banner'] = $path;
        }

        $data['user_id'] = Auth::id();
        $data['status'] = 'published';

        $product->update($data);

        return redirect()
            ->route('products.show', $product)
            ->with('success', 'Curso atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Gate::authorize('delete', $product);

        $product->delete();

        return redirect()->route('products')->with('success', 'Curso deletado com sucesso!');
    }
}
