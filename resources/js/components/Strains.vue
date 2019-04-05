<script>
import addToCart from '../addToCart'
export default {
  props: {
    products: Array
  },
  data: function() {
    return {
      columns: 3,
      searchQuery: "",
      perPack: 6
    };
  },
  computed: {
    filteredProducts: function() {
      var filterKey = _.trim(
        this.searchQuery && this.searchQuery.toLowerCase()
      );
      var products = this.products;
      if (filterKey) {
        products = this.products.filter(function(row) {
          return Object.keys(row).some(function(key) {
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
    capitalize: function(str) {
      return str.charAt(0).toUpperCase() + str.slice(1);
    },
    feminize: function(num) {
      if (num === 1) {
        return "feminized";
      }
      return "regular";
    }
  },
  methods: {
    clearSearchQuery() {
      this.searchQuery = "";
    }
  },
  mixins:[addToCart]
};
</script>

<template>
  <div class="container text-center">
    <h3>Featured Seeds</h3>
    <div class="row text-center">
      <div class="col-md-4 offset-md-4" style="margin-bottom:1em;">
        <form id="search">
          <div class="input-group">
            <input
              type="text"
              class="form-control form-inline"
              name="query"
              placeholder="Search to filter strains"
              v-model="searchQuery"
              autofocus
            >
            <div v-if="searchQuery !== ''" class="input-group-addon">
              <button
                v-on:click="clearSearchQuery()"
                for="query"
                class="btn btn-info input-group-addon form-inline"
              >
                <i class="fa fa-close" id="clear_filter"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row" v-bind:key="products.uuid" v-for="products in filteredProducts">
      <div class="col-sm-4 info strainlisting" v-bind:key="item.uuid" v-for="item in products">
        <hr>

          <a :href="'/strains/' + item.uuid">
          <h4>{{item.name}} <div class="s1" v-if="item.s1 === 1">S1
                <span class="tooltiptext">
                    Breeders use various techniques to encourage the production of male
                    flowers on female plants. When this pollen is used to pollinate
                    the same "mother", or her clones, the seeds are called an "S1" generation.
                </span>
            </div></h4>
            <h4>{{ item.genetics }}</h4>

          </a>

        <a :href="'/strains/' + item.uuid">
          <img :src="item.image" :alt="item.name" :title="item.name">
        </a>
        <h5 style="margin-top:1em;">6 {{item.feminized | feminize}} seeds</h5>
        <form action="POST" target="/cart">
          <!-- <div class="form-group">
                    <div class="form-group custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" :id="'seed-pack-6-' + item.uuid" :name="'seed-pack-' + item.uuid"
                            v-model.number="item.selectedPack" value="6" checked />
                        <label class="custom-control-label" :for="'seed-pack-6-' + item.uuid">
                            6 seeds $60
                        </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" :id="'seed-pack-12-' + item.uuid" :name="'seed-pack-' + item.uuid"
                            v-model.number="item.selectedPack" value="12" />
                        <label class="custom-control-label" :for="'seed-pack-12-' + item.uuid">
                            12 seeds $100
                        </label>
                    </div>
          </div>-->
          <p>$60 per pack</p>

          <div class="form-group form-inline" style="justify-content: center;">
            <input
              v-model.number="item.quantity"
              class="form-control form-inline input-group-sm"
              style="max-width:60px;margin-bottom:0.1rem;"
              type="number"
              :name="'quantity-' + item.uuid"
              min="1"
              max="10"
              :id="'quantity-' + item.uuid"
            >
            &nbsp;
            <button
              style="margin-bottom:0.1rem;"
              role="button"
              :id="'buy-now-' + item.uuid"
              class="btn btn-primary form-inline input-group-sm"
              disabled
            >BUY</button>
            &nbsp;
            <button
              style="margin-bottom:0.1rem;"
              role="button"
              :id="'add-to-cart-' + item.uuid"
              class="btn btn-outline-gray form-inline input-group-sm"
              v-on:click.stop.prevent="addToCart(item)"

            >ADD TO CART</button>
          </div>
        </form>
        <p style="margin-bottom:3rem;" class="straindescription">
          <a :href="'/strains/' + item.id" :title="item.name + ' details page'">{{item.description}}</a>
        </p>
      </div>
    </div>
  </div>
</template>

<style>

/* Tooltip container */
.s1 {
  position:relative;
  display:inline-block;
  border-bottom: 1px dotted hsla(212,25%, 27%, 0.95) !important;
}

/* Tooltip text */
.tooltiptext {
  visibility: hidden;
  width: 120px;
  text-align: center;
  padding: 5px;
  border-radius: 6px;
  /* Position the tooltip text - see examples below! */
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -60px;
  font-size:0.75rem;
  z-index: 1;
  background-color:hsla(212,25%, 27%, 0.95);
  color:white;
}

.s1:hover .tooltiptext {
  visibility: visible;
}

</style>
