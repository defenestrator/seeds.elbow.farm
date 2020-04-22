<script>
    import Cart from '../Cart'
    export default {
        name: 'Strains',
        mixins: [Cart],
        props: {
            products: Array
        },
        data: function () {
            return {
                columns: 3,
                searchQuery: "",
                selectedPack: 0
            };
        },
        computed: {
            filteredProducts: function () {
                var filterKey = _.trim(
                    this.searchQuery && this.searchQuery.toLowerCase()
                );
                var products = this.products;
                if (filterKey) {
                    products = this.products.filter(function (row) {
                        return Object.keys(row).some(function (key) {
                            return (
                                String(row[key])
                                .toLowerCase()
                                .indexOf(filterKey) > -1
                            );
                        });
                    });
                }
                return _.chunk(products, 3);
            }
        },
        filters: {
            capitalize: function (str) {
                return str.charAt(0).toUpperCase() + str.slice(1);
            },
            feminize: function (num) {
                if (num === 1) {
                    return "feminized";
                }
                return "regular";
            },
        },
        methods: {
            clearSearchQuery() {
                this.searchQuery = "";
            }
        },
    };

</script>

<template>
    <div class="container text-center">
        <div class="row" v-bind:key="products.uuid" v-for="products in filteredProducts">
            <div class="col-sm-4 info strainlisting" v-bind:key="item.id" v-for="item in products">
                <hr>
                <a :href="'/strains/' + item.uuid">
                    <h4>{{item.name}} </h4>
                </a>
                <a :href="'/strains/' + item.uuid">
                    <h5>{{ item.genetics }}</h5>
                </a>
                <a :href="'/strains/' + item.uuid">
                    <img v-if="item.images === null" :src="item.image" :alt="item.name" :title="item.name" />
                    <img v-else :src="item.images.large" :alt="item.name" :title="item.name" />
                </a>
            </div>
        </div>
    </div>
</template>

<style>

</style>
