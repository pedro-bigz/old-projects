@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.estoque.actions.edit', ['name' => $estoque->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <estoque-form
                :action="'{{ $estoque->resource_url }}'"
                :locais="{{ $locals }}"
                :categorias="{{ $categorias }}"
                :data="{{ $estoque->toJson() }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.estoque.actions.edit', ['name' => $estoque->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.estoque.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

        </estoque-form>

        </div>

</div>

@endsection
