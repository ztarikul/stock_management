<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stocks = Stock::all();
        $categories = Category::all();
        return view('admin.stock.stock_list', ['stocks' => $stocks, 'categories' => $categories]);
    }

    public function category_products(Request $request){
        if($request->has('q')){
            $q=$request->q;
            $result = Product::where('category_id', $q)->get();
            return response()->json(['data' =>$result]);

        }else{
            return view('home');
        }
    }
    public function product_prev_stock(Request $request){
        if($request->has('p')){
            $p=$request->p;
            $stock = Stock::where('product_id', $p)->first();
            return response()->json(['stock' =>$stock]);

        }else{
            return view('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);

        $array_size = count($request['category_id']);
        for($i = 0; $i<$array_size; $i++){
            
            $prd_id = $request['product_id'][$i];
            $prd_exist = Stock::where('product_id', $prd_id)->first();
            if($prd_exist != null){
                $prd_exist['qnty'] = $prd_exist['qnty'] + $request['qnty'][$i];
                $prd_exist->update();
            }
            else{
                $inputs['category_id'] = $request['category_id'][$i];
                $inputs['product_id'] = $request['product_id'][$i];
                $inputs['qnty'] = $request['qnty'][$i];
                $stock = new Stock($inputs);
                $stock->save();
            }

           

        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
