<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Brackets\AdminListing\Facades\AdminListing;
use Illuminate\Http\Request;
use App\Models\Estoque;

class ProdutoController extends Controller
{
    public function __construct ()
    {

    }

    public function index (Request $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Estoque::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'price', 'amount', 'place_id', 'category_id', 'cor', 'activated'],

            // set columns to searchIn
            ['id', 'name', 'cor', 'description']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        // dd($data);

        return view('admin.estoque.index', ['data' => $data]);
    }

    public function getProduct(Estoque $produto)
    {
        return view('admin.produtos.index', ['produto' => $produto]);
    }

}
