import AppForm from '../app-components/Form/AppForm';

Vue.component('pedido-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                cliente_id:  '' ,
                bol_parcelado:  false ,
                num_parcelas:  '' ,
                valor_parcela:  '' ,
                valor_total:  '' ,
                prazo_entrega:  '' ,
                cod_entrega:  '' ,
                tipo_pagamento_id:  '' ,
                activated:  false ,
                
            }
        }
    }

});