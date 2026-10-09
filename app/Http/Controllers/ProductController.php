<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        return 'ذخیره محصول فعلاً فعال نیست.';
    }

    public function show(string $id)
    {
        return view('products.show');
    }

    public function edit(string $id)
    {
        return view('products.edit');
    }

    public function update(Request $request, string $id)
    {
        return 'ویرایش محصول فعلاً فعال نیست.';
    }

    public function destroy(string $id)
    {
        return 'حذف محصول فعلاً فعال نیست.';
    }
}