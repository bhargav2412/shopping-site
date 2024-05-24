<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller {
    public function AddProduct() {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add', compact('categories', 'brands'));
    }

    public function StoreProduct(Request $request) {
        try {
            $validatedData = $request->validate(
                [
                    'brand_id' => 'required',
                    'category_id' => 'required',
                    'subcategory_id' => 'required',
                    'subsubcategory_id' => 'required',
                    'product_name_en' => 'required',
                    'product_name_hin' => 'required',
                    'product_code' => 'required',
                    'product_qty' => 'required',
                    'selling_price' => 'required',
                    'discount_price' => 'required',
                ],
                [
                    'brand_id.required' => 'Please select brand name',
                    'category_id.required' => 'Please select category name',
                    'subcategory_id.required' => 'Please select sub-category name',
                    'subsubcategory_id.required' => 'Please select sub->sub-category name',
                    'product_name_en.required' => 'Please enter product name in english',
                    'product_name_hin.required' => 'Please enter product name in hindi',
                ]
            );

            // Thumb Product Image Upload
            $image = $request->file('product_thambnail');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/' . $name_gen);
            $save_url = 'upload/products/thambnail/' . $name_gen;

            $model = new Product();
            $model->brand_id = $request->brand_id;
            $model->category_id = $request->category_id;
            $model->subcategory_id = $request->subcategory_id;
            $model->subsubcategory_id = $request->subsubcategory_id;

            $model->product_name_en = $request->product_name_en;
            $model->product_name_hin = $request->product_name_hin;
            $model->product_slug_en =  strtolower(str_replace(' ', '-', $request->product_name_en));
            $model->product_slug_hin = strtolower(str_replace(' ', '-', $request->product_name_hin));

            $model->product_code = $request->product_code;
            $model->product_qty = $request->product_qty;
            $model->product_tags_en = $request->product_tags_en;
            $model->product_tags_hin = $request->product_tags_hin;

            $model->product_size_en = $request->product_size_en;
            $model->product_size_hin = $request->product_size_hin;
            $model->product_color_en = $request->product_color_en;
            $model->product_color_hin = $request->product_color_hin;

            $model->selling_price = $request->selling_price;
            $model->discount_price = $request->discount_price;
            $model->short_descp_en = $request->short_descp_en;
            $model->short_descp_hin = $request->short_descp_hin;

            $model->long_descp_en = $request->long_descp_en;
            $model->long_descp_hin = $request->long_descp_hin;
            $model->product_thambnail = $request->product_thambnail;
            $model->product_thambnail = $save_url;

            $model->hot_deals = $request->hot_deals;
            $model->featured = $request->featured;
            $model->special_offer = $request->special_offer;
            $model->special_deals = $request->special_deals;
            $model->created_at = Carbon::now();

            $model->save();
            $lastInsertedProductId = $model->id;

            // Multiple Product's Images upload
            $multiImages = $request->file('multi_img');
            foreach ($multiImages as $img) {
                $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                Image::make($img)->resize(917, 1000)->save('upload/products/multi-images/' . $make_name);
                $uploadPath = 'upload/products/multi-images/' . $make_name;

                $multiImgModel = new MultiImg();
                $multiImgModel->product_id = $lastInsertedProductId;
                $multiImgModel->photo_name = $uploadPath;
                $multiImgModel->created_at = Carbon::now();

                $multiImgModel->save();
            }

            $notification = array(
                'message' => 'Product Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('manage.product')->with($notification);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function ManageProduct() {
        $products = Product::latest()->get();
        return view('backend.product.product_view', compact('products'));
    }

    public function EditProduct($id) {
        $multiImgs = MultiImg::where('product_id', $id)->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit', compact('categories', 'brands', 'subcategory', 'subsubcategory', 'products', 'multiImgs'));
    }

    public function ProductDataUpdate(Request $request) {

        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_hin' => $request->long_descp_hin,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
        ]);

        $notification = array(
            'message' => 'Product Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.product')->with($notification);
    } // end method 


    /// Multiple Image Update
    public function MultiImageUpdate(Request $request) {
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-images/' . $make_name);
            $uploadPath = 'upload/products/multi-images/' . $make_name;

            MultiImg::where('id', $id)->update([
                'photo_name' => $uploadPath,
            ]);
        } // end foreach

        $notification = array(
            'message' => 'Product Image Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end mehtod 


    /// Product Main Thambnail Update /// 
    public function ThambnailImageUpdate(Request $request) {
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/' . $name_gen);
        $save_url = 'upload/products/thambnail/' . $name_gen;

        Product::findOrFail($pro_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Image Thambnail Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end method


    //// Multi Image Delete ////
    public function MultiImageDelete($id) {
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method 


    public function ProductInactive($id) {
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ProductActive($id) {
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function ProductDelete($id) {
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id', $id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method 
}
