@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.estoque.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">

        <estoque-form
            :action="'{{ url('admin/estoques') }}'"
            :locais="{{ $locals }}"
            :categorias="{{ $categorias }}"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.estoque.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.estoque.components.form-elements')
                </div>

                {{-- <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div> --}}

                <button type="submit" class="btn btn-primary fixed-cta-button" style="margin-bottom:60px;" :disabled="submiting">
                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-plus'"></i>
                    {{ trans('brackets/admin-ui::admin.btn.save') }}
                </button>

            </form>

        </estoque-form>

        </div>

        </div>


@endsection
