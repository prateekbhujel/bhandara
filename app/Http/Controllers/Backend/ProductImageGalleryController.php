<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductImageGalleryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImageGallery;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class ProductImageGalleryController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the Product Image Gallery.
     */
    public function index(Request $request, ProductImageGalleryDataTable $dataTable)
    {
        $product = Product::findOrFail($request->product);

        return $dataTable->render('admin.product.image-gallery.index', compact('product'));
    }//End Method

    /**
     * Show the form for creating a new Product Image Gallery.
     */
    public function create()
    {
        //
    }//End Method

    /**
     * Store a newly created Product Image Gallery in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image.*' => ['required', 'image', 'max:2048'],
            'product' => ['required', 'exists:products,id'], 
        ]);
        /** Handle the Image Upload. **/
        $imagePaths = $this->uploadMultiImage($request, 'image', 'uploads/productImages/ImageGallery');
        
        foreach ($imagePaths as $imagePath) {
            ProductImageGallery::create([
                'image' => $imagePath,
                'product_id' => $request->product,
            ]);
        }
        
        toastr('Uploded Sucessfully !');
        return redirect()->back();
    }//End Method

    /**
     * Show the form for editing the specified Product Image Gallery.
     */
    public function edit(ProductImageGallery $image_gallery)
    {
        //
    }//End Method

    /**
     * Update the specified Product Image Gallery in storage.
     */
    public function update(Request $request, ProductImageGallery $image_gallery)
    {
        //
    }//End Method

    /**
     * Remove the specified Product Image Gallery from storage.
     */
    public function destroy(ProductImageGallery $image_gallery)
    {
        //
    }//End Method
}
