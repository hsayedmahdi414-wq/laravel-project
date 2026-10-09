<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customers.index');
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        return 'ذخیره مشتری فعلاً فعال نیست.';
    }

    public function show(string $id)
    {
        return view('customers.show');
    }

    public function edit(string $id)
    {
        return view('customers.edit');
    }

    public function update(Request $request, string $id)
    {
        return 'ویرایش مشتری فعلاً فعال نیست.';
    }

    public function destroy(string $id)
    {
        return 'حذف مشتری فعلاً فعال نیست.';
    }
}