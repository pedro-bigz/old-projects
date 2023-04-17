@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.loja-local.actions.create'))

@section('styles')
    <link rel="stylesheet" href="/css/create-forms.css">
@endsection

@section('body')

    <div class="container-xl">

                <div class="card">

        <loja-local-form
            :action="'{{ url('admin/loja-locals') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.loja-local.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.loja-local.components.form-elements')
                </div>

                <button type="submit" class="btn btn-primary fixed-cta-button" style="margin-bottom:60px;" :disabled="submiting">
                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-save'"></i>
                    {{ trans('brackets/admin-ui::admin.btn.save') }}
                </button>

            </form>

        </loja-local-form>

        </div>

        </div>


@endsection
