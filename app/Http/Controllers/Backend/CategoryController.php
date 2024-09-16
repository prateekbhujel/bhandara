<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
     /**
     * Display the all Category in Table from storage using Yajra databale to render an view.
     */
    public function index(CategoryDataTable $dataTable): mixed
    {
        return $dataTable->render('admin.category.index');
    }

    /**
     * Show the form for creating a new category.
     */
    public function create(): View
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created category in storage after the validation.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the category from storage.
     */
    public function edit(Category $category): View
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the category in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the category from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
