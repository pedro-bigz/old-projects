import AppForm from '../app-components/Form/AppForm';

Vue.component('loja-local-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                logradouro:  '' ,
                numero:  '' ,
                bairro:  '' ,
                cidade:  '' ,
                uf:  '' ,
                cep:  '' ,
                activated:  true ,

            }
        }
    }

});
