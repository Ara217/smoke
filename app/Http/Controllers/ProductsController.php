<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Product;
use File;
use Illuminate\Support\Facades\Mail;
use URL;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products = Product::orderBy('created_at', 'desc')->paginate(8);
        return view('pages.templates.products', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.templates.create-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'string|required',
            'brand' => 'string|required',
            'price' => 'integer|required',
            'count' => 'integer|required',
            'description' => 'string|required',
            'image' => 'image|required|mimes:jpeg,png',
            'mainImage' => 'image|required|mimes:jpeg,png',
        ]);

        $image = $this->moveAttachments($request->file('image'), 'preview');
        $mainImage = $this->moveAttachments($request->file('mainImage'), 'main');

        if ($image && $mainImage) {
            $product = Product::create([
                'name' => $data['name'],
                'brand' => $data['brand'],
                'price' => $data['price'],
                'count' => $data['count'],
                'description' => $data['description'],
                'image' => $image['fileName'],
                'main_image' => $mainImage['fileName'],
            ]);

            if ($product) {
                return back();
            } else {
                return back();
            }
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where(['id' => $id])->first();
        return view('pages.templates.show-product', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.templates.edit-product', ['product' => Product::where('id', $id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'name' => 'string|required',
            'brand' => 'string|required',
            'price' => 'integer|required',
            'count' => 'integer|required',
            'description' => 'string|required',
        ]);

        if ($request->file('image')) {
            $image = $this->moveAttachments($request->file('image'), 'preview');
            $data['image'] =  $image['fileName'];
        }

        if ($request->file('mainImage')) {
            $mainImage = $this->moveAttachments($request->file('mainImage'), 'main');
            $data['main_image'] = $mainImage['fileName'];
        }

        Product::where('id', $id)->update($data);
        return redirect('/products/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function moveAttachments($file, $path)
    {
        $attachments = [];
        if (!empty($file)) {
            if ($file != null) {
                $file_size = File::size($file) / 1024;
                $file_type = File::mimeType($file);
                $origName = $file->getClientOriginalName();
                $destinationPath = 'images/' . $path;
                $extension = $file->getClientOriginalExtension();
                $fileName = md5(Carbon::now()->timestamp . $origName) . '.' . $extension;
                $pathWithFilename = $destinationPath . '/' . $fileName;
                $file->move($destinationPath, $fileName);
                $url = URL::asset($destinationPath . '/' . $fileName);

                $attachments = [
                    'fileName' => $fileName,
                    'fileSize' => $file_size,
                    'fileType' => $file_type,
                    'url' => $url,
                    'origName' => $origName,
                    'path' => $pathWithFilename
                ];
            }
        }

        return $attachments;
    }

    public function getProductsByBrand($name)
    {
        $products = Product::where('brand', $name)->orderBy('created_at', 'desc')->paginate(8);
        return view('pages.templates.products', ['products' => $products]);
    }

    public function orderByCart(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'string|required',
            'phone' => 'string|required',
            'order' => 'required'
        ]);

        $newOrder = Orders::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'order' => $data['order']
        ])->toArray();

        Mail::send('pages.emails.order', $newOrder, function($message) use ($newOrder) {
            $message->to('elitevikup@gmail.com', $newOrder['name'])->subject('Заказ - Smoke.com');
            $message->from('elitevikup@gmail.com', '');
        });

        return response()->json([
            "success" => $newOrder ? true : false
        ]);
    }
}
