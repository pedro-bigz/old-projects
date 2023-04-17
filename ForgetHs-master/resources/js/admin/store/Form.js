import AppForm from '../app-components/Form/AppForm';

Vue.component('store-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                role_id:  '' ,
                
            }
        }
    }

});