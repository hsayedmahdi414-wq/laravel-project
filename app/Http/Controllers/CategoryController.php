<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index');
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        return 'ذخیره دسته‌بندی فعلاً فعال نیست.';
    }

    public function show(string $id)
    {
        return view('categories.show');
    }

    public function edit(string $id)
    {
        return view('categories.edit');
    }

    public function update(Request $request, string $id)
    {
        return 'ویرایش دسته‌بندی فعلاً فعال نیست.';
    }

    public function destroy(string $id)
    {
        return 'حذف دسته‌بندی فعلاً فعال نیست.';
    }
}