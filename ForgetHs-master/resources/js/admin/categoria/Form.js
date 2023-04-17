import AppForm from '../app-components/Form/AppForm';

Vue.component('categoria-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                tipo:  '' ,
                setor:  '' ,
                activated:  true ,

            }
        }
    }

});
