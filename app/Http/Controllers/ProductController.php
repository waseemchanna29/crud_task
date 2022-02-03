<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->toArray();
        return array_reverse($products);
    }
    public function store(Request $request)
    {
        $product = new Product(['product_title' => $request->input('product_title'), 'description' => $request->input('description'), 'price' => $request->input('price')]);
        $product->save();
        return response()->json('Product created!');
    }
    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }
    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return response()->json('Product updated!');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json('Product deleted!');
    }

    public function getCsv(){
        $products = Product::all();
        $fileName = 'products_'.date('dmYHis',time()).'.csv';
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('ID', 'Title', 'Description', 'Price');
        $callback = function() use($products, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($products as $task) {
                $row['ID']  = $task->id;
                $row['Title']  = $task->product_title;
                $row['Description']    = $task->description;
                $row['Price']    = $task->price;
               
                fputcsv($file, array($row['ID'], $row['Title'], $row['Description'], $row['Price']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);

    }
}
