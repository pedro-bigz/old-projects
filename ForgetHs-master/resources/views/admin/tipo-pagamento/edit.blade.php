@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.tipo-pagamento.actions.edit', ['name' => $tipoPagamento->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <tipo-pagamento-form
                :action="'{{ $tipoPagamento->resource_url }}'"
                :data="{{ $tipoPagamento->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.tipo-pagamento.actions.edit', ['name' => $tipoPagamento->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.tipo-pagamento.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </tipo-pagamento-form>

        </div>
    
</div>

@endsection