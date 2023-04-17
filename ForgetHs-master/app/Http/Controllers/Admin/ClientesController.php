<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cliente\BulkDestroyCliente;
use App\Http\Requests\Admin\Cliente\DestroyCliente;
use App\Http\Requests\Admin\Cliente\IndexCliente;
use App\Http\Requests\Admin\Cliente\StoreCliente;
use App\Http\Requests\Admin\Cliente\UpdateCliente;
use App\Http\Services\ClienteServiceInterface;
use App\Http\Services\NivelClienteServiceInterface;
use App\Models\Cliente;
use Brackets\AdminAuth\Models\AdminUser;
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

class ClientesController extends Controller
{
    private $clienteService;
    private $nivelClienteService;

    public function __construct(ClienteServiceInterface $clienteService, NivelClienteServiceInterface $nivelClienteService)
    {
        $this->clienteService = $clienteService;
        $this->nivelClienteService = $nivelClienteService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param IndexCliente $request
     * @return array|Factory|View
     */
    public function index(IndexCliente $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Cliente::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'registro_cliente', 'telefone', 'celular', 'data_nascimento', 'nivel_id', 'user_id'],

            // set columns to searchIn
            ['id', 'telefone', 'celular']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.cliente.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.cliente.create');

        return view('admin.cliente.create', [
            'niveis' => $this->nivelClienteService->listarClienteNiveis (),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCliente $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCliente $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the AdminUser
        $adminUser = AdminUser::create([
            'first_name' => $sanitized['first_name'],
            'last_name' => $sanitized['last_name'],
            'email' => $sanitized['email'],
            'password' => $sanitized['password'],
            'activated' => $sanitized['activated'],
            'forbidden' => $sanitized['forbidden'],
        ]);

        // Store the Cliente
        $cliente = Cliente::create([
            'registro_cliente' => $this->clienteService->clienteAutoRegister (),
            'telefone' => $sanitized['telefone'],
            'celular' => $sanitized['celular'],
            'data_nascimento' => $sanitized['data_nascimento'],
            'nivel_id' => $sanitized['nivel']['id'],
            'user_id' => $adminUser->id,

        ]);

        if ($request->ajax()) {
            return ['redirect' => url('admin/clientes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param Cliente $cliente
     * @throws AuthorizationException
     * @return void
     */
    public function show(Cliente $cliente)
    {
        $this->authorize('admin.cliente.show', $cliente);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cliente $cliente
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Cliente $cliente)
    {
        $this->authorize('admin.cliente.edit', $cliente);

        $cliente->first_name = $cliente->user->first_name;
        $cliente->last_name = $cliente->user->last_name;
        $cliente->email = $cliente->user->email;

        return view('admin.cliente.edit', [
            'cliente' => $cliente,
            'niveis' => $this->nivelClienteService->listarClienteNiveis (),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCliente $request
     * @param Cliente $cliente
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCliente $request, Cliente $cliente)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['registro_cliente'] = $cliente->registro_cliente;

        // Update changed values Cliente
        $cliente->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/clientes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCliente $request
     * @param Cliente $cliente
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCliente $request, Cliente $cliente)
    {
        $cliente->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCliente $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCliente $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('clientes')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

    public function historicoCompras (Cliente $cliente)
    {
        return view('admin.cliente.historico-compras', [
            'cliente' => $cliente,
        ]);
    }
}
