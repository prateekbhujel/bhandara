<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductImageGalleryDataTable;
use App\Http\Controllers\Controller;
use App\Models\ProductImageGallery;
use Illuminate\Http\Request;

class ProductImageGalleryController extends Controller
{
    /**
     * Display a listing of the Product Image Gallery.
     */
    public function index(ProductImageGalleryDataTable $dataTable)
    {
        return $dataTable->render('admin.product.image-gallery.index');
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
        //
    }//End Method

    /**
     * Show the form for editing the specified Product Image Gallery.
     */
    public function edit(ProductImageGallery $productImageGallery)
    {
        //
    }//End Method

    /**
     * Update the specified Product Image Gallery in storage.
     */
    public function update(Request $request, ProductImageGallery $productImageGallery)
    {
        //
    }//End Method

    /**
     * Remove the specified Product Image Gallery from storage.
     */
    public function destroy(ProductImageGallery $productImageGallery)
    {
        //
    }//End Method
}
