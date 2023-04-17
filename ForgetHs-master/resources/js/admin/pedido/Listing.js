import AppListing from '../app-components/Listing/AppListing';

Vue.component('pedido-listing', {
    mixins: [AppListing],
    data() {
        return {
            showActiveFilter: true,
            showParceladoFilter: false,
            showAvistaFilter: false,
            filters: {
                bol_inativos: [],
                bol_parcelados: [],
                bol_avista: [],
            },
        }
    },
    watch: {
        showActiveFilter: function (newVal, oldVal) {
            this.filters.bol_inativos = !this.showActiveFilter;
            this.filter('bol_inativos', this.filters.bol_inativos);
        },
        showParceladoFilter: function (newVal, oldVal) {
            this.filters.bol_parcelados = this.showParceladoFilter;
            this.filter('bol_parcelados', this.filters.bol_parcelados);
        },
        showAvistaFilter: function (newVal, oldVal) {
            this.filters.bol_avista = this.showAvistaFilter;
            this.filter('bol_avista', this.filters.bol_avista);
        },
    },
    methods: {
        showDetalhes (pedido) {
            this.$modal.show({
                template: `
                    <div class="vue-dialog">

                        <div class="p-5">
                            <dl class="row">
                                <dt class="col-sm-3 mb-2">Prazo para entrega</dt>
                                <dd class="col-sm-9 mb-2" v-html="rowIndex.prazo_entrega"></dd>

                                <dt class="col-sm-3 mb-2">Código de entrega</dt>
                                <dd class="col-sm-9 mb-2">
                                    <a class="btn btn-dark btn-sm" :href="rowIndex.resource_url + '/entrega'">Detalhes da entrega</a>
                                </dd>

                                <dt class="col-sm-3 mb-2">Pagamento</dt>
                                <dd class="col-sm-9 mb-2">
                                    <span v-html="rowIndex.tipo_pagamento_id"></span> -
                                    <span v-html="rowIndex.tipo_pagamento.nome"></span>
                                </dd>
                            </dl>
                        </div>

                    </div>
                  `,
                props: ['rowIndex'],
            }, {
                rowIndex: pedido,
            }, {
                scrollable: true,
                draggable: false,
                width: window.screen.availWidth > 1280 ? '50%' : '95%',
                height: 'auto',
                name: 'showHelperVideo'
            });
        }
    }
});
