@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.pedido.actions.edit', ['name' => $pedido->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <pedido-form
                :action="'{{ $pedido->resource_url }}'"
                :data="{{ $pedido->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.pedido.actions.edit', ['name' => $pedido->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.pedido.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </pedido-form>

        </div>
    
</div>

@endsection