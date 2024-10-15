<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\SubCategory;
use App\Traits\ImageUploadTrait;
use Auth;
use Illuminate\Http\Request;
use Str;

class ProductController extends Controller
{
    use ImageUploadTrait;

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
        $categories = Category::where('status', 1)->get();
        $brands     = Brand::where('status', 1)->get();
        
        return view('admin.product.create', compact('categories', 'brands'));
    }//End Method

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'thumb_image'       => ['required', 'image', 'max:3048'],
            'name'              => ['required', 'string', 'max:200'],
            'sku'               => ['nullable'],
            'category_id'       => ['required'],
            'sub_category_id'   => ['nullable'],
            'child_category_id' => ['nullable'],
            'category_id'       => ['required'],
            'brand_id'          => ['required', 'exists:brands,id'],
            'price'             => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'offer_price'       => ['nullable', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'], 
            'offer_start_date'  => ['nullable'],
            'offer_end_date'    => ['nullable'],
            'qty'               => ['required', 'integer'],
            'video_link'        => ['url', 'nullable'],
            'short_description' => ['required', 'min:5', 'max:600'],
            'long_description'  => ['required', 'min:15'],
            'is_top'            => ['required'],
            'is_best'           => ['required'],
            'is_featured'       => ['required'],
            'seo_title'         => ['nullable', 'max:200'],
            'seo_description'   => ['nullable', 'max:400'],
            'status'            => ['required', 'in:1,0']
        ], [
            'category_id.required'  => 'The Category field is required.',
            'brand_id.required'     => 'The Brand field is required.',
            'price.required'        => 'The Price field is required.',
            'price.numeric'         => 'The Price must be a valid number.',
            'price.regex'           => 'The Price must be a valid amount (e.g., 99, 0.99, 1.99).',            
            'offer_price.numeric'   => 'The Offer Price must be a valid number.',
            'offer_price.regex'     => 'The Offer Price must be a valid amount (e.g., 99, 0.99, 1.99).',
            'offer_start_date.date' => 'The Offer Start Date must be a valid date.',
            'offer_end_date.date'   => 'The Offer End Date must be a valid date.',
        ]);
        /** Handling image and storing image path into the database **/
        $imagePath = $this->uploadImage($request, 'thumb_image', 'uploads/productImages');
        $validated['thumb_image'] = $imagePath;
        /** End Image Path Upload. **/
        $validated['slug']        = Str::slug($request->name);
        $validated['vendor_id']   = Auth::user()->vendor->id;
        $validated['is_approved'] = 1;
        
        Product::create($validated);

        toastr('Data Updated Successfully!', 'success');
        return redirect()->route('admin.products.index');
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
