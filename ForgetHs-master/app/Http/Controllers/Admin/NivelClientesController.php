<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NivelCliente\BulkDestroyNivelCliente;
use App\Http\Requests\Admin\NivelCliente\DestroyNivelCliente;
use App\Http\Requests\Admin\NivelCliente\IndexNivelCliente;
use App\Http\Requests\Admin\NivelCliente\StoreNivelCliente;
use App\Http\Requests\Admin\NivelCliente\UpdateNivelCliente;
use App\Models\NivelCliente;
use Brackets\AdminListing\Facades\AdminListing;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class NivelClientesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexNivelCliente $request
     * @return array|Factory|View
     */
    public function index(IndexNivelCliente $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(NivelCliente::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome'],

            // set columns to searchIn
            ['id', 'nome', 'description']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.nivel-cliente.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.nivel-cliente.create');

        return view('admin.nivel-cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreNivelCliente $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreNivelCliente $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the NivelCliente
        $nivelCliente = NivelCliente::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/nivel-clientes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/nivel-clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param NivelCliente $nivelCliente
     * @throws AuthorizationException
     * @return void
     */
    public function show(NivelCliente $nivelCliente)
    {
        $this->authorize('admin.nivel-cliente.show', $nivelCliente);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param NivelCliente $nivelCliente
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(NivelCliente $nivelCliente)
    {
        $this->authorize('admin.nivel-cliente.edit', $nivelCliente);


        return view('admin.nivel-cliente.edit', [
            'nivelCliente' => $nivelCliente,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateNivelCliente $request
     * @param NivelCliente $nivelCliente
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateNivelCliente $request, NivelCliente $nivelCliente)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values NivelCliente
        $nivelCliente->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/nivel-clientes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/nivel-clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyNivelCliente $request
     * @param NivelCliente $nivelCliente
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyNivelCliente $request, NivelCliente $nivelCliente)
    {
        $nivelCliente->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyNivelCliente $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyNivelCliente $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('nivelClientes')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
