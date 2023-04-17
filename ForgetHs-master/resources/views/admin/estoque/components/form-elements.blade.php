<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.estoque.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.estoque.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('price'), 'has-success': fields.price && fields.price.valid }">
    <label for="price" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.estoque.columns.price') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.price" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('price'), 'form-control-success': fields.price && fields.price.valid}" id="price" name="price" placeholder="{{ trans('admin.estoque.columns.price') }}">
        <div v-if="errors.has('price')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('price') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('amount'), 'has-success': fields.amount && fields.amount.valid }">
    <label for="amount" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.estoque.columns.amount') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.amount" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('amount'), 'form-control-success': fields.amount && fields.amount.valid}" id="amount" name="amount" placeholder="{{ trans('admin.estoque.columns.amount') }}">
        <div v-if="errors.has('amount')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('amount') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" v-if="form.aula_online">
    <label for="places_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.planejamento-aula.columns.plataforma_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div v-if="errors.has('places')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('plataforma_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('place_id'), 'has-success': fields.places && fields.places.valid }">
    <label for="places" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.estoque.columns.places') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        {{-- <input type="text" v-model="form.places" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('places'), 'form-control-success': fields.places && fields.places.valid}" id="places" name="places" placeholder="{{ trans('admin.estoque.columns.places') }}"> --}}

        <multiselect
            v-model="form.places"
            :options="locais"
            :multiple="false"
            track-by="id"
            id="places"
            name="places"
            label="full_address"
            tag-placeholder="{{ __('Selecionar o local') }}"
            placeholder="{{ __('Selecionar o local') }}">
        </multiselect>

        <div v-if="errors.has('place_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('place_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('category_id'), 'has-success': fields.category && fields.category.valid }">
    <label for="category" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.estoque.columns.category') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        {{-- <input type="text" v-model="form.category" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('category'), 'form-control-success': fields.category && fields.category.valid}" id="category" name="category" placeholder="{{ trans('admin.estoque.columns.category') }}"> --}}

        <multiselect
            v-model="form.category"
            :options="categorias"
            :multiple="false"
            track-by="id"
            label="description"
            id="category"
            name="category"
            tag-placeholder="{{ __('Selecionar a categoria') }}"
            placeholder="{{ __('Selecionar a categoria') }}">
        </multiselect>

        <div v-if="errors.has('category_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('category_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cor'), 'has-success': fields.cor && fields.cor.valid }">
    <label for="cor" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.estoque.columns.cor') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cor" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cor'), 'form-control-success': fields.cor && fields.cor.valid}" id="cor" name="cor" placeholder="{{ trans('admin.estoque.columns.cor') }}">
        <div v-if="errors.has('cor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cor') }}</div>
    </div>
</div>

{{-- Trabalhar nessa parte --}}

{{-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('imagem'), 'has-success': fields.imagem && fields.imagem.valid }">
    <label for="imagem" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.questao.columns.imagem') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        @if($mode === 'edit')
            @include('brackets/admin-ui::admin.includes.media-uploader', [
                'mediaCollection' => $questao->getMediaCollection('imagem'),
                'media' => $questao->getThumbs200ForCollection('imagem'),
                'label' => 'Imagem do Enunciado'
            ])
        @else
            @include('brackets/admin-ui::admin.includes.media-uploader', [
                'mediaCollection' => app(App\Models\Estoque::class)->getMediaCollection('imagem'),
                'label' => 'Imagem do Enunciado'
            ])
        @endif
    </div>
</div> --}}

<div class="form-check row" :class="{'has-danger': errors.has('activated'), 'has-success': fields.activated && fields.activated.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="activated" type="checkbox" v-model="form.activated" v-validate="''" data-vv-name="activated"  name="activated_fake_element">
        <label class="form-check-label" for="activated">
            {{ trans('admin.estoque.columns.activated') }}
        </label>
        <input type="hidden" name="activated" :value="form.activated">
        <div v-if="errors.has('activated')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('activated') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.estoque.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>


