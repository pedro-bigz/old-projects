<div class="form-group row align-items-center" :class="{'has-danger': errors.has('logradouro'), 'has-success': fields.logradouro && fields.logradouro.valid }">
    <label for="logradouro" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.loja-local.columns.logradouro') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.logradouro" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('logradouro'), 'form-control-success': fields.logradouro && fields.logradouro.valid}" id="logradouro" name="logradouro" placeholder="{{ trans('admin.loja-local.columns.logradouro') }}">
        <div v-if="errors.has('logradouro')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('logradouro') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('numero'), 'has-success': fields.numero && fields.numero.valid }">
    <label for="numero" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.loja-local.columns.numero') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.numero" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('numero'), 'form-control-success': fields.numero && fields.numero.valid}" id="numero" name="numero" placeholder="{{ trans('admin.loja-local.columns.numero') }}">
        <div v-if="errors.has('numero')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('numero') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bairro'), 'has-success': fields.bairro && fields.bairro.valid }">
    <label for="bairro" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.loja-local.columns.bairro') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.bairro" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('bairro'), 'form-control-success': fields.bairro && fields.bairro.valid}" id="bairro" name="bairro" placeholder="{{ trans('admin.loja-local.columns.bairro') }}">
        <div v-if="errors.has('bairro')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bairro') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cidade'), 'has-success': fields.cidade && fields.cidade.valid }">
    <label for="cidade" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.loja-local.columns.cidade') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cidade" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cidade'), 'form-control-success': fields.cidade && fields.cidade.valid}" id="cidade" name="cidade" placeholder="{{ trans('admin.loja-local.columns.cidade') }}">
        <div v-if="errors.has('cidade')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cidade') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('uf'), 'has-success': fields.uf && fields.uf.valid }">
    <label for="uf" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.loja-local.columns.uf') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.uf" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('uf'), 'form-control-success': fields.uf && fields.uf.valid}" id="uf" name="uf" placeholder="{{ trans('admin.loja-local.columns.uf') }}">
        <div v-if="errors.has('uf')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('uf') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cep'), 'has-success': fields.cep && fields.cep.valid }">
    <label for="cep" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.loja-local.columns.cep') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cep" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cep'), 'form-control-success': fields.cep && fields.cep.valid}" id="cep" name="cep" placeholder="{{ trans('admin.loja-local.columns.cep') }}">
        <div v-if="errors.has('cep')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cep') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('activated'), 'has-success': fields.activated && fields.activated.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="activated" type="checkbox" v-model="form.activated" v-validate="''" data-vv-name="activated"  name="activated_fake_element">
        <label class="form-check-label" for="activated">
            {{ trans('admin.loja-local.columns.activated') }}
        </label>
        <input type="hidden" name="activated" :value="form.activated">
        <div v-if="errors.has('activated')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('activated') }}</div>
    </div>
</div>


