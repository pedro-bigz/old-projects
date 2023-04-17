<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RedesSociai\BulkDestroyRedesSociai;
use App\Http\Requests\Admin\RedesSociai\DestroyRedesSociai;
use App\Http\Requests\Admin\RedesSociai\IndexRedesSociai;
use App\Http\Requests\Admin\RedesSociai\StoreRedesSociai;
use App\Http\Requests\Admin\RedesSociai\UpdateRedesSociai;
use App\Models\RedesSociai;
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

class RedesSociaisController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRedesSociai $request
     * @return array|Factory|View
     */
    public function index(IndexRedesSociai $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(RedesSociai::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'url', 'icon', 'activated'],

            // set columns to searchIn
            ['id', 'nome', 'url', 'icon']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.redes-sociai.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.redes-sociai.create');

        return view('admin.redes-sociai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRedesSociai $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRedesSociai $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the RedesSociai
        $redesSociai = RedesSociai::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/redes-sociais'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/redes-sociais');
    }

    /**
     * Display the specified resource.
     *
     * @param RedesSociai $redesSociai
     * @throws AuthorizationException
     * @return void
     */
    public function show(RedesSociai $redesSociai)
    {
        $this->authorize('admin.redes-sociai.show', $redesSociai);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RedesSociai $redesSociai
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(RedesSociai $redesSociai)
    {
        $this->authorize('admin.redes-sociai.edit', $redesSociai);


        return view('admin.redes-sociai.edit', [
            'redesSociai' => $redesSociai,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRedesSociai $request
     * @param RedesSociai $redesSociai
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRedesSociai $request, RedesSociai $redesSociai)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values RedesSociai
        $redesSociai->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/redes-sociais'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/redes-sociais');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRedesSociai $request
     * @param RedesSociai $redesSociai
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRedesSociai $request, RedesSociai $redesSociai)
    {
        $redesSociai->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRedesSociai $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRedesSociai $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    RedesSociai::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
