<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.index');
    }//End Method

    /**
     * Show the form for creating a new product with,
     * Categories, Sub categories and Child categories and also Brands.
     */
    public function create()
    {
        $categories = Category::all();
        $brands     = Brand::all();
        
        return view('admin.product.create', compact('categories', 'brands'));
    }//End Method

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        //
    }//End Method

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        //
    }//End Method

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }//End Method

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        //
    }//End Method

    /** 
     * Gets all the Sub Categories related to selected Category.
    */
    public function getSubCategories(Request $request)
    {
        $subCategories = SubCategory::where('category_id', $request->id)->get();

        return $subCategories;
    }//End Method

        /** 
     * Gets all the Child Categories related to selected Sub Category.
    */
    public function getChildCategories(Request $request)
    {
        $childCategories = ChildCategory::where('sub_category_id', $request->id)->get();
        
        return $childCategories;
    }//End Method
}
