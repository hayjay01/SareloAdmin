<?php
namespace App\Http\Controllers\Api;

use League\Fractal;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Transformers\ProductTransformer;
use App\Http\Controllers\Api\ApiController;

class ProductsController extends ApiController
{

    public function search(Request $request)
    {
        $products = Product::with('unit_type')->where('name', 'like', $request->search_term.'%')->get();
        // dd()

        $resource = new Fractal\Resource\Collection($products, new ProductTransformer);
        
        $products =  $this->manager->createData($resource)->toArray();

        $payload = ['products' => $products['data'], 'charges' => $this->charges['data']];

        return response()->json(['status' => 'success', 'data' => $payload]);

    }
}