<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Content;
use Validator;


class ContentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Content::where('user_id', auth()->id())->get();


        return $this->sendResponse($products->toArray(), 'Products retrieved successfully.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
         $fileName = null;
    if (request()->hasFile('file')) {
        $file = request('file');
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        $file->move('images', $fileName);    
    }

      //  $product = new Content();
        $input['user_id'] =  auth()->id();
        $input['file'] =  $fileName;
        $product = Content::create($input);


        return $this->sendResponse($product->toArray(), 'Contents created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Content::find($id);


        if (is_null($product)) {
            return $this->sendError('Contents not found.');
        }


        return $this->sendResponse($product->toArray(), 'Contents  retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $product)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required',
            'file' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
     $fileName = null;
    if (request()->hasFile('file')) {
        $file = request('file');
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        $file->move('images', $fileName);    
    }

        $product->name = $input['name'];
        $product->description = $input['description'];
        $product->file = $fileName;
        $product->save();


        return $this->sendResponse($product->toArray(), 'Contents updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $product)
    {
        $product->delete();


        return $this->sendResponse($product->toArray(), 'Contents deleted successfully.');
    }
}