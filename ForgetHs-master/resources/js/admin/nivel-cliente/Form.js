import AppForm from '../app-components/Form/AppForm';

Vue.component('nivel-cliente-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                description:  '' ,
                
            }
        }
    }

});