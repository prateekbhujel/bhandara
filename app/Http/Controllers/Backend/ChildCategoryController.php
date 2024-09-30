<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ChildCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;

class ChildCategoryController extends Controller
{
    
    /**
     * Display a listing of the child category.
     */
    public function index(ChildCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.child-category.index');
    }//End Method

    /**
     * Change the status of the Sub category from table view or index view custom method.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        // Find the category by its ID
        $childCategory = ChildCategory::find($request->id);

        // Return error if category not found
        if (!$childCategory) {
            return response(['status' => 'error', 'message' => 'Child Category not found.'], 404);
        }

        // Ensure the status is either 0 or 1
        if ($request->has('status')) {
            // Convert 'true' or 'false' to 1 or 0
            $status = $request->status == 'true' ? 1 : 0;
            $childCategory->update(['status' => $status]);

            // Determine status text and class based on the new status
            $statusText = $status ? 'Active' : 'Inactive';
            $statusClass = $status ? 'badge-success' : 'badge-danger';

            // Return success response with updated status information
            return response([
                'status' => 'success',
                'message' => 'Status updated successfully',
                'statusText' => $statusText,
                'statusClass' => $statusClass
            ]);
        }

        // Return error response for invalid status value
        return response()->json(['status' => 'error', 'message' => 'Invalid status value.'], 400);
    }//End Method

    /** 
     * Get Sub categories realted to the id passed from the view.
    **/
    public function getSubCategories(Request $request)
    {
        return SubCategory::where('category_id', $request->id)
                        ->where('status', 1)
                        ->get();
    }//End Method

    /**
     * Show the form for creating a new child category.
     */
    public function create()
    {
        $categories     = Category::where('status', 1)
                                    ->whereHas('subCategories', function ($query) {
                                        $query->where('status', 1);
                                    })
                                    ->get();

        return view('admin.child-category.create', compact('categories'));
    }//End Method

    /**
     * Store a newly created child category in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id'        => ['required'],
            'sub_category_id'    => ['required'],
            'name'               => ['required', 'max:200', 'unique:child_categories,name'],
            'status'             => ['required'] 
        ]);
        $validatedData['slug'] = Str::slug($request->name);
        ChildCategory::create($validatedData);

        toastr('Data Created Successfully!', 'success');
        return redirect()->route('admin.child-category.index');
    }//End Method

    /**
     * Show the form for editing the specified child category.
     */
    public function edit(ChildCategory $childCategory)
    {
        $subCategories  = SubCategory::where('category_id', $childCategory->category_id)->where('status', 1)->get();
        $categories     = Category::where('status', 1)
                                    ->whereHas('subCategories', function ($query) {
                                        $query->where('status', 1);
                                    })
                                    ->get();

        return view('admin.child-category.edit', compact('childCategory', 'categories', 'subCategories'));
    }//End Method

    /**
     * Update the specified child category in storage.
     */
    public function update(Request $request, ChildCategory $childCategory)
    {
        $validatedData = $request->validate([
            'category_id'        => ['required'],
            'sub_category_id'    => ['required'],
            'name'               => ['required', 'max:200', 'unique:child_categories,name,'. $childCategory->id],
            'status'             => ['required'] 
        ]);
        $validatedData['slug'] = Str::slug($request->name);
        $childCategory->update($validatedData);

        toastr('Data Updated Successfully!', 'success');
        return redirect()->route('admin.child-category.index');
    }//End Method

    /**
     * Remove the specified child category from storage.
     */
    public function destroy(ChildCategory $childCategory)
    {
        $childCategory->delete();

        return response(['status' => 'success', 'message' => 'Data Deleted Successfully!']);
    }//End Method
}
