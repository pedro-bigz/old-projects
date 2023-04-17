<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LojaLocal\BulkDestroyLojaLocal;
use App\Http\Requests\Admin\LojaLocal\DestroyLojaLocal;
use App\Http\Requests\Admin\LojaLocal\IndexLojaLocal;
use App\Http\Requests\Admin\LojaLocal\StoreLojaLocal;
use App\Http\Requests\Admin\LojaLocal\UpdateLojaLocal;
use App\Models\LojaLocal;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LojaLocalsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLojaLocal $request
     * @return array|Factory|View
     */
    public function index(IndexLojaLocal $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(LojaLocal::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'logradouro', 'numero', 'bairro', 'cidade', 'uf', 'cep', 'activated'],

            // set columns to searchIn
            ['id', 'logradouro', 'bairro', 'cidade', 'uf', 'cep']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.loja-local.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.loja-local.create');

        return view('admin.loja-local.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLojaLocal $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLojaLocal $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the LojaLocal
        $lojaLocal = LojaLocal::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/loja-locals'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/loja-locals');
    }

    /**
     * Display the specified resource.
     *
     * @param LojaLocal $lojaLocal
     * @throws AuthorizationException
     * @return void
     */
    public function show(LojaLocal $lojaLocal)
    {
        $this->authorize('admin.loja-local.show', $lojaLocal);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LojaLocal $lojaLocal
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(LojaLocal $lojaLocal)
    {
        $this->authorize('admin.loja-local.edit', $lojaLocal);


        return view('admin.loja-local.edit', [
            'lojaLocal' => $lojaLocal,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLojaLocal $request
     * @param LojaLocal $lojaLocal
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLojaLocal $request, LojaLocal $lojaLocal)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values LojaLocal
        $lojaLocal->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/loja-locals'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/loja-locals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLojaLocal $request
     * @param LojaLocal $lojaLocal
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLojaLocal $request, LojaLocal $lojaLocal)
    {
        $lojaLocal->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLojaLocal $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLojaLocal $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    LojaLocal::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
