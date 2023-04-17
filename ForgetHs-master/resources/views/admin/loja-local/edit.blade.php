@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.loja-local.actions.edit', ['name' => $lojaLocal->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <loja-local-form
                :action="'{{ $lojaLocal->resource_url }}'"
                :data="{{ $lojaLocal->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.loja-local.actions.edit', ['name' => $lojaLocal->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.loja-local.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </loja-local-form>

        </div>
    
</div>

@endsection