import AppForm from '../app-components/Form/AppForm';

Vue.component('tipo-pagamento-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                
            }
        }
    }

});