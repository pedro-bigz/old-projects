<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Estoque\BulkDestroyEstoque;
use App\Http\Requests\Admin\Estoque\DestroyEstoque;
use App\Http\Requests\Admin\Estoque\IndexEstoque;
use App\Http\Requests\Admin\Estoque\StoreEstoque;
use App\Http\Requests\Admin\Estoque\UpdateEstoque;
use App\Http\Services\CategoriaServiceInterface;
use App\Http\Services\LojaServiceInterface;
use App\Models\Estoque;
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

class EstoqueController extends Controller
{
    private $lojaService;
    private $categoriaService;

    public function __construct(LojaServiceInterface $lojaService, CategoriaServiceInterface $categoriaService)
    {
        $this->lojaService = $lojaService;
        $this->categoriaService = $categoriaService;
    }
    /**
     * Display a listing of the resource.
     *
     * @param IndexEstoque $request
     * @return array|Factory|View
     */
    public function index(IndexEstoque $request)
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

        // dd ($data->toArray());

        return view('admin.estoque.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.estoque.create');

        $locais = $this->lojaService->listarLocais ();
        $categorias = $this->categoriaService->listarCategorias();

        // dd ($locais->toArray());

        return view('admin.estoque.create', [
            'locals' => json_encode($locais),
            'categorias' => json_encode($categorias),
            'mode' => 'create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEstoque $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEstoque $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        $sanitized['place_id'] = $sanitized['places']['id'];
        $sanitized['category_id'] = $sanitized['category']['id'];

        // Store the Estoque
        $estoque = Estoque::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/estoques'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/estoques');
    }

    /**
     * Display the specified resource.
     *
     * @param Estoque $estoque
     * @throws AuthorizationException
     * @return void
     */
    public function show(Estoque $estoque)
    {
        $this->authorize('admin.estoque.show', $estoque);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Estoque $estoque
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Estoque $estoque)
    {
        $this->authorize('admin.estoque.edit', $estoque);

        $locais = $this->lojaService->listarLocais ();
        $categorias = $this->categoriaService->listarCategorias();

        // dd ($locais->toArray());

        return view('admin.estoque.edit', [
            'locals' => json_encode($locais),
            'categorias' => json_encode($categorias),
            'estoque' => $estoque,
            'mode' => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEstoque $request
     * @param Estoque $estoque
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEstoque $request, Estoque $estoque)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Estoque
        $estoque->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/estoques'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/estoques');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEstoque $request
     * @param Estoque $estoque
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyEstoque $request, Estoque $estoque)
    {
        $estoque->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEstoque $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyEstoque $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Estoque::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
