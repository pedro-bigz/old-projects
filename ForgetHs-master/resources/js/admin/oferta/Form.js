import AppForm from '../app-components/Form/AppForm';

Vue.component('oferta-form', {
    mixins: [AppForm],
    props: ['produtos', 'niveis'],
    data () {
        return {
            form: {
                estoque:  '' ,
                desconto:  '' ,
                description:  '' ,
                nivel:  '' ,
                activated:  true ,
                data_inicio:  '' ,
                data_fim:  '' ,
            }
        }
    }

});
