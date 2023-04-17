import AppForm from '../app-components/Form/AppForm';

Vue.component('redes-sociai-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                url:  '' ,
                icon:  '' ,
                activated:  false ,
                
            }
        }
    }

});