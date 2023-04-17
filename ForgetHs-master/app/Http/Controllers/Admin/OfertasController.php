<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Oferta\BulkDestroyOferta;
use App\Http\Requests\Admin\Oferta\DestroyOferta;
use App\Http\Requests\Admin\Oferta\IndexOferta;
use App\Http\Requests\Admin\Oferta\StoreOferta;
use App\Http\Requests\Admin\Oferta\UpdateOferta;
use App\Http\Services\EstoqueServiceInterface;
use App\Http\Services\NivelClienteServiceInterface;
use App\Models\Oferta;
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

class OfertasController extends Controller
{
    private $estoqueService;
    private $nivelClienteService;

    public function __construct(EstoqueServiceInterface $estoqueService, NivelClienteServiceInterface $nivelClienteService)
    {
        $this->estoqueService = $estoqueService;
        $this->nivelClienteService = $nivelClienteService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param IndexOferta $request
     * @return array|Factory|View
     */
    public function index(IndexOferta $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Oferta::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'estoque_id', 'desconto', 'nivel_id', 'activated', 'data_inicio', 'data_fim'],

            // set columns to searchIn
            ['id', 'description']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.oferta.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.oferta.create');

        $produtos = $this->estoqueService->listarProdutosAtivos();

        foreach ($produtos as &$produto) {
            $endStr = strlen($produto->description) > 20 ? "..." : "";
            $produto->desc = mb_substr(strip_tags($produto->description), 0, 20) . $endStr;
            $produto->foto = 'https://s2.glbimg.com/z_gIOSUdsxyNGClgVLYVBHBziyw=/0x0:400x400/400x400/s.glbimg.com/po/tt2/f/original/2016/05/20/new-google-favicon-logo.png';
        }

        // Criar metodo para minificar imagem

        return view('admin.oferta.create', [
            'produtos' => $produtos,
            'niveis' => $this->nivelClienteService->listarClienteNiveis (),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOferta $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreOferta $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['nivel_id'] = $sanitized['nivel']['id'];
        $sanitized['estoque_id'] = $sanitized['estoque']['id'];

        // Store the Oferta
        $ofertum = Oferta::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/ofertas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/ofertas');
    }

    /**
     * Display the specified resource.
     *
     * @param Oferta $ofertum
     * @throws AuthorizationException
     * @return void
     */
    public function show(Oferta $ofertum)
    {
        $this->authorize('admin.oferta.show', $ofertum);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Oferta $ofertum
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Oferta $ofertum)
    {
        $this->authorize('admin.oferta.edit', $ofertum);

        $produtos = $this->estoqueService->listarProdutosAtivos();

        foreach ($produtos as &$produto) {
            $endStr = strlen($produto->description) > 20 ? "..." : "";
            $produto->desc = mb_substr(strip_tags($produto->description), 0, 20) . $endStr;
            $produto->foto = 'https://s2.glbimg.com/z_gIOSUdsxyNGClgVLYVBHBziyw=/0x0:400x400/400x400/s.glbimg.com/po/tt2/f/original/2016/05/20/new-google-favicon-logo.png';
        }

        return view('admin.oferta.edit', [
            'ofertum' => $ofertum,
            'produtos' => $produtos,
            'niveis' => $this->nivelClienteService->listarClienteNiveis (),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOferta $request
     * @param Oferta $ofertum
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateOferta $request, Oferta $ofertum)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Oferta
        $ofertum->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/ofertas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/ofertas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyOferta $request
     * @param Oferta $ofertum
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyOferta $request, Oferta $ofertum)
    {
        $ofertum->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyOferta $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyOferta $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('oferta')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
