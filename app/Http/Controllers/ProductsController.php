<?php

namespace App\Http\Controllers;

use App\CallRequests;
use App\Category;
use App\Orders;
use App\Product;
use App\Region;
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
        return view('pages.templates.products', ['products' => $products, 'search' => '']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $region = Region::all();
        return view('pages.templates.create-product', ['category' => $category, 'region' => $region]);
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
            'name' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'count' => 'required',
            'region_id' => 'required',
            'delivery' => 'required',
            'exists' => 'required',
            'description' => 'string',
            'image' => 'image|mimes:jpeg,png',
//            'mainImage' => 'image|mimes:jpeg,png',
        ], [
            'name.required' => 'Укажите имя.',
            'brand.required' => 'Укажите марку.',
            'price.required' => 'Укажите цену.',
            'count.required' => 'Укажите количество.',
            'region_id.required' => 'Укажите категорию.',
            'description.string' => 'Информация необходима.',
            'image.required' => 'Требуется фото․',
        ]);

        $image = $this->moveAttachments($request->file('image'), 'preview');
//        $mainImage = $this->moveAttachments($request->file('mainImage'), 'main');

        if ($image/* && $mainImage*/) {
            $product = Product::create([
                'name' => $data['name'],
                'brand' => $data['brand'],
                'price' => $data['price'],
                'count' => $data['count'],
                'region_id' => $data['region_id'],
                'delivery' => $data['delivery'],
                'exists' => $data['exists'],
                'description' => $data['description'],
                'image' => $image['fileName'],
                'main_image' => $image['fileName'],
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
        $product = Product::where('id', $id)->first();
        $regionName = Region::select('name')->where('id', $product->region_id)->first();
        $category = Category::all();
        $region = Region::all();
        return view('pages.templates.show-product', ['product' => $product, 'category' => $category, 'region' => $region, 'regionName' => $regionName]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $regionName = Region::select('name')->where('id', $product->region_id)->first();
        $category = Category::all();
        $region = Region::all();
        return view('pages.templates.edit-product', ['product' => $product, 'category' => $category, 'region' => $region, 'regionName' => $regionName]);
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
            'name' => 'string',
            'brand' => 'string',
            'price' => 'integer',
            'count' => 'integer',
            'region_id' => 'integer',
            'delivery' => 'integer',
            'exists' => 'integer',
            'description' => 'string',
            'image' => 'image|mimes:jpeg,png',
        ]);

        if ($request->file('image')) {
            $image = $this->moveAttachments($request->file('image'), 'preview');
            $data['image'] =  $image['fileName'];
        }

        if ($request->file('mainImage')) {
//            $mainImage = $this->moveAttachments($request->file('mainImage'), 'main');
            $data['main_image'] = $image['fileName'];
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
//                $fileName = md5(Carbon::now()->timestamp . $origName) . '.' . $extension;
                $fileName = $origName;
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
        return view('pages.templates.products', ['products' => $products, 'search' => '']);
    }

    public function getProductsByRegion($id)
    {
        $products = Product::where('region_id', $id)->orderBy('created_at', 'desc')->paginate(8);
        return view('pages.templates.products', ['products' => $products, 'search' => '']);
    }

    public function orderByCart(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'order' => 'required'
        ], [
           'name.required' => 'Введите ваше имя.',
           'phone.required' => 'Введите номер телефона.',
           'address.required' => 'Введите адрес.',
           'order.required' => 'Корзина пуста.'
        ]);

        $newOrder = Orders::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
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

    public function getProductsBySearch(Request $request)
    {
        $products = Product::where('name', 'LIKE', '%' . $request->search . '%')->orderBy('created_at', 'desc')->paginate(8);
            return view('pages.templates.products', ['products' => $products, 'search' => $request->search]);
    }


    public function orderCall(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'string|required',
            'phoneNumber' => 'string|required'
        ]);

        Mail::send('pages.emails.call-request-email', $data, function($message) use ($data) {
            $message->to('aramesropyan@gmail.com', $data['name'])->subject('Заказ на звонок');
            $message->from('elitevikup@gmail.com', 'Элит-Выкуп');
        });

        $newCall = CallRequests::create($data);

        return response()->json([
            "success" => $newCall ? true : false,
        ]);
    }
}
