@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.oferta.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">

        <oferta-form
            :action="'{{ url('admin/ofertas') }}'"
            :produtos="{{ $produtos->toJson() }}"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.oferta.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.oferta.components.form-elements')
                </div>

                <button type="submit" class="btn btn-primary fixed-cta-button" style="margin-bottom:60px;" :disabled="submiting">
                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-save'"></i>
                    {{ trans('brackets/admin-ui::admin.btn.save') }}
                </button>

            </form>

        </oferta-form>

        </div>

        </div>


@endsection
