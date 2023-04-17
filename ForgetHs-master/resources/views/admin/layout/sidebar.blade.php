<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.admin') }}</li>
            @if (Auth::user()->can('admin.loja-local.index'))
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/loja-locals') }}"><i class="nav-icon fa fa-map-marker" aria-hidden="true"></i> {{ trans('admin.loja-local.title') }}</a></li>
            @endif
            @if (Auth::user()->can('admin.categoria.index'))
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/categorias') }}"><i class="nav-icon fa fa-object-group" aria-hidden="true"></i> {{ trans('admin.categoria.title') }}</a></li>
            @endif
            @if (Auth::user()->can('admin.estoque.index'))
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/estoques') }}"><i class="nav-icon fa fa-bookmark" aria-hidden="true"></i> {{ trans('admin.estoque.title') }}</a></li>
            @endif
            @if (Auth::user()->can('admin.oferta.index'))
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/ofertas') }}"><i class="nav-icon fa fa-percent" aria-hidden="true"></i> {{ trans('admin.oferta.title') }}</a></li>
            @endif

            {{-- <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.config') }}</li> --}}

            <li class="nav-item"><a class="nav-link" href="{{ url('admin/nivel-clientes') }}"><i class="nav-icon fa fa-star"></i> {{ trans('admin.nivel-cliente.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/tipo-pagamentos') }}"><i class="nav-icon fa fa-credit-card"></i> {{ trans('admin.tipo-pagamento.title') }}</a></li>

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>

            <li class="nav-item"><a class="nav-link" href="{{ url('admin/clientes') }}"><i class="nav-icon fa fa-users"></i> {{ trans('admin.cliente.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/pedidos') }}"><i class="nav-icon fa fa-list-alt"></i> {{ trans('admin.pedido.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/stores') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.store.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/redes-sociais') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.redes-sociai.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

           <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>

            @if (Auth::user()->can('admin.admin-user.index'))
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            @endif
            @if (Auth::user()->can('admin.translation.index'))
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            @endif

            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
