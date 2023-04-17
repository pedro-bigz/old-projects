@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.redes-sociai.actions.edit', ['name' => $redesSociai->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <redes-sociai-form
                :action="'{{ $redesSociai->resource_url }}'"
                :data="{{ $redesSociai->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.redes-sociai.actions.edit', ['name' => $redesSociai->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.redes-sociai.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </redes-sociai-form>

        </div>
    
</div>

@endsection