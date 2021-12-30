<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Validator;
use DataTables;
use File;
use Image;
use Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Product::latest()->get();
    		return Datatables::of($data)
    			->addIndexColumn()
    			->addColumn('action', function($row) {
                        $button  = '<button type="button" name="edit" id="'.$row->id.'" class="edit btn btn-warning btn-sm glyphicon glyphicon-edit"><a href="'.url('/').'/product/edit/'. $row->id .'">Edit</a></button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$row->id.'" class="delete btn btn-danger btn-sm glyphicon glyphicon-trash">Delete</button>';
                        return $button;
    				})
    			->rawColumns(['action'])
    			->make(true);
    	}
    	return view('product.product_list');
    }

    public function create()
    {
    	return view('product.add_new');
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'Name'           => 'required',
    		'Price'          => 'required',
    		'UPC'            => 'required'
    	]);

    	/*Code For Image Storage In Public Folder*/
        $hidden_image  = isset($params['hidden_image']) ? $params['hidden_image'] : '';
        $updateLogo = $hidden_image;
            
        $filename = storage_path('app/public/product-images/' . $hidden_image);
            
        $image         = $request->file('Product_Image');
        $logo_image    = time() . '.' . $image->getClientOriginalExtension();

        $img = Image::make($image->getRealPath());
        $img->stream(); 
        Storage::disk('public')->put('product-images/'.$logo_image, $img, 'public');
        $updateLogo = $logo_image;

    	$form_data = [
    		'Name'          => $request['Name'],
            'Price'         => $request['Price'],
            'UPC'           => $request['UPC'],
            'Status'        => $request['Status'],
            'Product_Image' => $updateLogo,
        ];

        Product::Create($form_data);
        return redirect('/home')->with('success','Product Added Succesfully');

    }

    public function edit($id)
    {
    	$data = Product::findOrFail($id);
    	return view('product.add_new')->with('data',$data);
    }

    public function update(Request $request , $id)
    {
    	$request->validate([
    		'Name'           => 'required',
    		'Price'          => 'required',
    		'UPC'            => 'required',
    	]);
        
        /*Code For Image Storage In Public Folder*/
        if($request->file('Product_Image')){
            $image         = $request->file('Product_Image');
            $logo_image    = time() . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put('product-images/'.$logo_image, $img, 'public');
            $updateLogo = $logo_image;
        }

        $form_data = [
    		'Name'          => $request['Name'],
            'Price'         => $request['Price'],
            'UPC'           => $request['UPC'],
            'Status'        => $request['Status'],
        ];

        if($request->file('Product_Image')){
            $form_data['Product_Image'] = $updateLogo;
        }

        Product::whereId($id)->update($form_data);
        return redirect('/dashboard')->with('success','Product Updated Succesfully');
    }

    public function destroy($id)
    {
    	$data = Product::find($id);
    	$data->delete();
    }
}
