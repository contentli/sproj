<?php

namespace App\Http\Controllers\Dashboard;

use App\Product;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ImageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Upload a image
     *
     * @param Request $request
     * @return void
     */
    public function upload(Request $request)
    {

        $id = $request->id;
        $file = $request->file;

        $product = Product::findOrFail($id);

        $product
            ->addMedia($file)
            ->toMediaCollection('product-images');

        // Get images
        $media = $product->getMedia('product-images');
        $images = [];

        foreach ($media as $key => $image) {
            $images[$key]['id'] = $image->id;
            $images[$key]['src'] = $image->getUrl('thumb');
        }

        // Return data
        return response()->json([
            'success' => true,
            'message' => 'File uploaded!',
            'files' =>  $images
        ], 200);

    }

    /**
     * Delete a image
     *
     * @param Request $request
     * @return void
     */
    public function delete(Request $request)
    {
        // Set id
        $id = $request->id;

        // Delete the files
        $product = Product::whereHas('media', function ($query) use($id){
            $query->whereId($id);
        });
        $product_id = $product->firstOrFail()->id;
        $product = $product->firstOrFail()->deleteMedia($id);

        // Get images
        $media = Product::findOrFail($product_id)->getMedia('product-images');
        $images = [];

        foreach ($media as $key => $image) {
            $images[$key]['id'] = $image->id;
            $images[$key]['src'] = $image->getUrl('thumb');
        }

        // Return data
        return response()->json([
            'success' => true,
            'message' => 'File deleted!',
            'files' =>  $images
        ], 200);

    }
}
