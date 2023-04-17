<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TipoPagamento\BulkDestroyTipoPagamento;
use App\Http\Requests\Admin\TipoPagamento\DestroyTipoPagamento;
use App\Http\Requests\Admin\TipoPagamento\IndexTipoPagamento;
use App\Http\Requests\Admin\TipoPagamento\StoreTipoPagamento;
use App\Http\Requests\Admin\TipoPagamento\UpdateTipoPagamento;
use App\Models\TipoPagamento;
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

class TipoPagamentoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTipoPagamento $request
     * @return array|Factory|View
     */
    public function index(IndexTipoPagamento $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TipoPagamento::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome'],

            // set columns to searchIn
            ['id', 'nome']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tipo-pagamento.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tipo-pagamento.create');

        return view('admin.tipo-pagamento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTipoPagamento $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTipoPagamento $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TipoPagamento
        $tipoPagamento = TipoPagamento::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tipo-pagamentos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tipo-pagamentos');
    }

    /**
     * Display the specified resource.
     *
     * @param TipoPagamento $tipoPagamento
     * @throws AuthorizationException
     * @return void
     */
    public function show(TipoPagamento $tipoPagamento)
    {
        $this->authorize('admin.tipo-pagamento.show', $tipoPagamento);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TipoPagamento $tipoPagamento
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TipoPagamento $tipoPagamento)
    {
        $this->authorize('admin.tipo-pagamento.edit', $tipoPagamento);


        return view('admin.tipo-pagamento.edit', [
            'tipoPagamento' => $tipoPagamento,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTipoPagamento $request
     * @param TipoPagamento $tipoPagamento
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTipoPagamento $request, TipoPagamento $tipoPagamento)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TipoPagamento
        $tipoPagamento->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tipo-pagamentos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tipo-pagamentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTipoPagamento $request
     * @param TipoPagamento $tipoPagamento
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTipoPagamento $request, TipoPagamento $tipoPagamento)
    {
        $tipoPagamento->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTipoPagamento $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTipoPagamento $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    TipoPagamento::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
