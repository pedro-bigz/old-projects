import AppForm from '../app-components/Form/AppForm';

Vue.component('cliente-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                registro_cliente:  '' ,
                first_name:  '' ,
                last_name:  '' ,
                email:  '' ,
                telefone:  '' ,
                celular:  '' ,
                data_nascimento:  '' ,
                nivel:  '' ,
                password:  '' ,
                password_confirmation:  '' ,
                activated:  true ,
                forbidden:  false ,
            },
            datetimePickerConfig: {
                enableTime: true,
                time_24hr: true,
                enableSeconds: false,
                dateFormat: 'Y-m-d H:i:S',
                minuteIncrement: "5",
                altInput: true,
                altFormat: 'd/m/Y H:i:S',
                locale: "pt"
            },
        }
    },

});
