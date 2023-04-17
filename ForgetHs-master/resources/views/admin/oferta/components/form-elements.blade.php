<div class="form-group row align-items-center" :class="{'has-danger': errors.has('estoque'), 'has-success': fields.estoque && fields.estoque.valid }">
    <label for="estoque" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.oferta.columns.estoque') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        {{-- <input type="text" v-model="form.estoque" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('estoque'), 'form-control-success': fields.estoque && fields.estoque.valid}" id="estoque" name="estoque" placeholder="{{ trans('admin.oferta.columns.estoque') }}"> --}}

        <multiselect
            v-model="form.estoque"
            :options="produtos"
            :multiple="false"
            track-by="id"
            label="name"
            tag-placeholder="{{ __('Selecionar o produto') }}"
            placeholder="{{ __('Selecionar o produto') }}">
            <template slot="singleLabel" slot-scope="props"><img class="option__image" :src="props.option.foto" alt="No Man’s Sky"><span class="option__desc"><span class="option__title">@{{ props.option.name }}</span></span></template>
            <template slot="option" slot-scope="props"><img class="option__image" :src="props.option.foto" alt="No Man’s Sky">
                <div class="option__desc" style="display: inline-block; width: calc(100% - 75px)"><span class="option__title">@{{ props.option.name }}</span><span class="option__small"><div class="float-right">@{{ props.option.desc }}</div></span></div>
            </template>
        </multiselect>

        <div v-if="errors.has('estoque')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('estoque') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('desconto'), 'has-success': fields.desconto && fields.desconto.valid }">
    <label for="desconto" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.oferta.columns.desconto') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.desconto" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('desconto'), 'form-control-success': fields.desconto && fields.desconto.valid}" id="desconto" name="desconto" placeholder="{{ trans('admin.oferta.columns.desconto') }}">
        <div v-if="errors.has('desconto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('desconto') }}</div>
    </div>
</div>

{{-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('min_user_lvl'), 'has-success': fields.min_user_lvl && fields.min_user_lvl.valid }">
    <label for="min_user_lvl" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.oferta.columns.min_user_lvl') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.min_user_lvl" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('min_user_lvl'), 'form-control-success': fields.min_user_lvl && fields.min_user_lvl.valid}" id="min_user_lvl" name="min_user_lvl" placeholder="{{ trans('admin.oferta.columns.min_user_lvl') }}">
        <div v-if="errors.has('min_user_lvl')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('min_user_lvl') }}</div>
    </div>
</div> --}}

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nivel'), 'has-success': fields.nivel && fields.nivel.valid }">
    <label for="nivel" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.nivel') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect
            v-model="form.nivel"
            placeholder="{{ trans('brackets/admin-ui::admin.forms.select_an_option') }}"
            :options="{{ $niveis->toJson() }}"
            :multiple="false"
            track-by="id"
            label="nome"
            tag-placeholder="{{ __('Selecionar o local') }}"
            placeholder="{{ __('Selecionar o local') }}">
        </multiselect>

        <div v-if="errors.has('nivel')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nivel') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_inicio'), 'has-success': fields.data_inicio && fields.data_inicio.valid }">
    <label for="data_inicio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.oferta.columns.data_inicio') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_inicio" :config="datetimePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_inicio'), 'form-control-success': fields.data_inicio && fields.data_inicio.valid}" id="data_inicio" name="data_inicio" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('data_inicio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_inicio') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_fim'), 'has-success': fields.data_fim && fields.data_fim.valid }">
    <label for="data_fim" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.oferta.columns.data_fim') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_fim" :config="datetimePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_fim'), 'form-control-success': fields.data_fim && fields.data_fim.valid}" id="data_fim" name="data_fim" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('data_fim')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_fim') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('activated'), 'has-success': fields.activated && fields.activated.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="activated" type="checkbox" v-model="form.activated" v-validate="''" data-vv-name="activated"  name="activated_fake_element">
        <label class="form-check-label" for="activated">
            {{ trans('admin.oferta.columns.activated') }}
        </label>
        <input type="hidden" name="activated" :value="form.activated">
        <div v-if="errors.has('activated')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('activated') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.oferta.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>


