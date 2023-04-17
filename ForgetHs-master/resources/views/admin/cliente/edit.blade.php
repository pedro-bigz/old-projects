@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.cliente.actions.edit', ['name' => $cliente->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <cliente-form
                :action="'{{ $cliente->resource_url }}'"
                :data="{{ $cliente->toJson() }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.cliente.actions.edit', ['name' => $cliente->full_name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.cliente.components.form-elements')
                    </div>

                    <button type="submit" class="btn btn-primary fixed-cta-button" style="margin-bottom:60px;" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-save'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>

                </form>

        </cliente-form>

        </div>

</div>

@endsection
