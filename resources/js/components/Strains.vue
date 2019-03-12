<script>
export default {
  props: {
    products: Array
  },
  data: function () {
    return {
        columns: 3,
        searchQuery: '',
        selectedPack: 6
    }
  },
  computed: {
    filteredProducts: function () {
        var filterKey = _.trim(this.searchQuery && this.searchQuery.toLowerCase())
        var products =  this.products
        if (filterKey) {
        products = this.products.filter(function (row) {
          return Object.keys(row).some(function (key) {
            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
          })
        })
      }
      return _.chunk(products, 3)
    },
  },
  filters: {
    capitalize: function (str) {
      return str.charAt(0).toUpperCase() + str.slice(1)
    },
    feminize: function(num) {
        if (num === 1) {
            return "feminized"
        }
        return "regular"
    }
  },
  methods: {
    addToCart(e) {
    this.user.cart.addProductId(this.product.id, thus.user.id)
    console.log(productId)
    let pack = this.selectedPack

    console.log(pack)

    },
    clearSearchQuery() {
        this.searchQuery = ''
    }
  },
}

</script>

<template>
<div class="container text-center">
        <h3>Available Strains</h3>
    <div class="row text-center">
        <div class="col-md-4 offset-md-4" style="margin-bottom:1em;">
            <form id="search">
                <div class="input-group">

                <input type="text" class="form-control form-inline" name="query" placeholder="Search to filter strains" v-model="searchQuery" autofocus />
               <div v-if="searchQuery !== ''" class="input-group-addon">
               <button v-on:click="clearSearchQuery()" for="query" class="btn btn-info input-group-addon form-inline">
                     <i class="fa fa-close" id="clear_filter">
                    </i>
               </button>
               </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row" v-bind:key="products" v-for="products in filteredProducts">
        <div class="col-sm-4 info" v-bind:key="item" v-for="item in products">
            <h4><a :href="'/strains/' + item.id">{{item.name}}</a></h4>
            <a :href="'/strains/' + item.id"><img :src="item.image"></a>
            <h5 style="margin-top:1em;">Premium {{item.feminized | feminize}} seeds</h5>
                <form action="POST" target="/cart">
                        <div class="form-group">
                            <div class="form-group custom-control custom-radio custom-control-inline">
                                <input
                                    type="radio"
                                    class="custom-control-input"
                                    :id="'seed-pack-6-' + item.id"
                                    :name="'seed-pack-' + item.id"
                                    v-model.number="item.selectedPack" value="6" checked/>
                                <label
                                    class="custom-control-label"
                                    :for="'seed-pack-6-' + item.id">
                                    6 seeds $60
                                </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input
                                    type="radio"
                                    class="custom-control-input"
                                    :id="'seed-pack-12-' + item.id"
                                    :name="'seed-pack-' + item.id"
                                    v-model.number="item.selectedPack"
                                    value="12" />
                                <label
                                    class="custom-control-label"
                                    :for="'seed-pack-12-' + item.id">
                                    12 seeds $100
                                </label>
                            </div>
                        </div>
                        <p><sup>*</sup> Disabled: under development <sup>*</sup></p>
                        <div class="form-group form-inline" style="justify-content: center;">
                            <label :for="'quantity-' + item.id" class="form-label form-inline"></label>
                            <input
                                class="form-control form-inline input-group-sm"
                                style="width:60px;"
                                type="number"
                                :name="'quantity-' + item.id"
                                value="1"
                                min="1"
                                max="10"
                                :id="'quantity-' + item.id"/>
                            &nbsp;
                            <button
                                role="button"
                                :id="'buy-now-' + item.id"
                                class="btn btn-primary form-inline input-group-sm"
                                disabled>
                                BUY
                            </button>
                            &nbsp;
                            <button
                                role="button"
                                :id="'add-to-cart-' + item.id"
                                class="btn btn-outline-gray form-inline input-group-sm"
                                v-on:click.stop.prevent="addToCart($event)">
                                ADD TO CART
                            </button>

                        </div>
                </form>
                <p>{{item.description}}</p>
        <hr>
        </div>
    </div>
</div>
</template>

<style>
body {
  font-family: Helvetica Neue, Arial, sans-serif;
  font-size: 14px;
  color: #444;
}

table {
  border: 2px solid #42b983;
  border-radius: 3px;
  background-color: #fff;
}

th {
  background-color: #42b983;
  color: rgba(255,255,255,0.66);
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

td {
  background-color: #f9f9f9;
}

th, td {
  min-width: 120px;
  padding: 10px 20px;
}

th.active {
  color: #fff;
}

th.active .arrow {
  opacity: 1;
}

.arrow {
  display: inline-block;
  vertical-align: middle;
  width: 0;
  height: 0;
  margin-left: 5px;
  opacity: 0.66;
}

.arrow.asc {
  border-left: 4px solid transparent;
  border-right: 4px solid transparent;
  border-bottom: 4px solid #fff;
}

.arrow.dsc {
  border-left: 4px solid transparent;
  border-right: 4px solid transparent;
  border-top: 4px solid #fff;
}

</style>
