import AppForm from '../app-components/Form/AppForm';

Vue.component('estoque-form', {
    mixins: [AppForm],
    props: ['locais', 'categorias'],
    data: function() {
        return {
            form: {
                name:  '' ,
                price:  '' ,
                amount:  '' ,
                places:  '' ,
                category:  '' ,
                cor:  '' ,
                activated:  true ,
                description:  '' ,
            }
        }
    }
});
