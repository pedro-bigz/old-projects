<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cliente_id'), 'has-success': fields.cliente_id && fields.cliente_id.valid }">
    <label for="cliente_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.cliente_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cliente_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cliente_id'), 'form-control-success': fields.cliente_id && fields.cliente_id.valid}" id="cliente_id" name="cliente_id" placeholder="{{ trans('admin.pedido.columns.cliente_id') }}">
        <div v-if="errors.has('cliente_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cliente_id') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('bol_parcelado'), 'has-success': fields.bol_parcelado && fields.bol_parcelado.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="bol_parcelado" type="checkbox" v-model="form.bol_parcelado" v-validate="''" data-vv-name="bol_parcelado"  name="bol_parcelado_fake_element">
        <label class="form-check-label" for="bol_parcelado">
            {{ trans('admin.pedido.columns.bol_parcelado') }}
        </label>
        <input type="hidden" name="bol_parcelado" :value="form.bol_parcelado">
        <div v-if="errors.has('bol_parcelado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bol_parcelado') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('num_parcelas'), 'has-success': fields.num_parcelas && fields.num_parcelas.valid }">
    <label for="num_parcelas" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.num_parcelas') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.num_parcelas" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('num_parcelas'), 'form-control-success': fields.num_parcelas && fields.num_parcelas.valid}" id="num_parcelas" name="num_parcelas" placeholder="{{ trans('admin.pedido.columns.num_parcelas') }}">
        <div v-if="errors.has('num_parcelas')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('num_parcelas') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('valor_parcela'), 'has-success': fields.valor_parcela && fields.valor_parcela.valid }">
    <label for="valor_parcela" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.valor_parcela') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.valor_parcela" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('valor_parcela'), 'form-control-success': fields.valor_parcela && fields.valor_parcela.valid}" id="valor_parcela" name="valor_parcela" placeholder="{{ trans('admin.pedido.columns.valor_parcela') }}">
        <div v-if="errors.has('valor_parcela')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor_parcela') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('valor_total'), 'has-success': fields.valor_total && fields.valor_total.valid }">
    <label for="valor_total" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.valor_total') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.valor_total" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('valor_total'), 'form-control-success': fields.valor_total && fields.valor_total.valid}" id="valor_total" name="valor_total" placeholder="{{ trans('admin.pedido.columns.valor_total') }}">
        <div v-if="errors.has('valor_total')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor_total') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('prazo_entrega'), 'has-success': fields.prazo_entrega && fields.prazo_entrega.valid }">
    <label for="prazo_entrega" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.prazo_entrega') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.prazo_entrega" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('prazo_entrega'), 'form-control-success': fields.prazo_entrega && fields.prazo_entrega.valid}" id="prazo_entrega" name="prazo_entrega" placeholder="{{ trans('admin.pedido.columns.prazo_entrega') }}">
        <div v-if="errors.has('prazo_entrega')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('prazo_entrega') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cod_entrega'), 'has-success': fields.cod_entrega && fields.cod_entrega.valid }">
    <label for="cod_entrega" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.cod_entrega') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cod_entrega" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cod_entrega'), 'form-control-success': fields.cod_entrega && fields.cod_entrega.valid}" id="cod_entrega" name="cod_entrega" placeholder="{{ trans('admin.pedido.columns.cod_entrega') }}">
        <div v-if="errors.has('cod_entrega')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cod_entrega') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tipo_pagamento_id'), 'has-success': fields.tipo_pagamento_id && fields.tipo_pagamento_id.valid }">
    <label for="tipo_pagamento_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.tipo_pagamento_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tipo_pagamento_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tipo_pagamento_id'), 'form-control-success': fields.tipo_pagamento_id && fields.tipo_pagamento_id.valid}" id="tipo_pagamento_id" name="tipo_pagamento_id" placeholder="{{ trans('admin.pedido.columns.tipo_pagamento_id') }}">
        <div v-if="errors.has('tipo_pagamento_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tipo_pagamento_id') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('activated'), 'has-success': fields.activated && fields.activated.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="activated" type="checkbox" v-model="form.activated" v-validate="''" data-vv-name="activated"  name="activated_fake_element">
        <label class="form-check-label" for="activated">
            {{ trans('admin.pedido.columns.activated') }}
        </label>
        <input type="hidden" name="activated" :value="form.activated">
        <div v-if="errors.has('activated')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('activated') }}</div>
    </div>
</div>


