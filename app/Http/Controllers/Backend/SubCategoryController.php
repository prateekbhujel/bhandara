<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the Sub-Category.
     */
    public function index(SubCategoryDataTable $dataTable): mixed
    {
        return $dataTable->render('admin.sub-category.index');
    }//End Method

    /**
     * Show the form for creating a new Sub-Category.
     */
    public function create(): View
    {
        return view('admin.sub-category.create');
    }//End Method

    /**
     * Store a newly created Sub-Category in storage.
     */
    public function store(Request $request)
    {
        //
    }//End Method

    /**
     * Show the form for editing the specified Sub-Category.
     */
    public function edit(SubCategory $subCategory): View
    {
        return view('admin.sub-category.edit', compact('subCategory'));
    }//End Method

    /**
     * Update the specified Sub-Category in storage.
     */
    public function update(Request $request,SubCategory $subCategory)
    {
        //
    }//End Method

    /**
     * Remove the specified Sub-Category from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
    }//End Method
}
