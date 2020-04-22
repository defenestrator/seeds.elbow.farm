<script>
    import Cart from '../Cart'
    export default {
        data() {
            return {
                selectedPack: 0
            }
        },
        props: {
            product: Object
        },

        mixins: [Cart],

    }
</script>

<template>
<div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 pagetitle">
                <h1>{{ product.name }}</h1>
            </div>
            <div class="col-sm-12"><h2>{{ product.genetics }}</h2></div>
        </div>
        <div class="row">
            <div class="col-md-7 info">

                <img v-if="product.images === null || product.images === undefined"
                :src="product.image"
                :alt="product.name + ' ' + product.feminized + ' seeds'"
                :title="product.name  + ' ' + product.feminized + ' seeds'"
                />

                <img v-else
                :src="product.images.large"
                :alt="product.name + ' ' + product.feminized + ' seeds'"
                :title="product.name  + ' ' + product.feminized + ' seeds'"
                />

            </div>
            <div class="col-md info">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                           {{product.name}}
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <p>{{ product.description }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p>
                        Min flowering time: {{ product.flowering_time_min_weeks}} weeks
                    </p>
                    <p>
                        Max flowering time: {{ product.flowering_time_max_weeks}} weeks
                    </p>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">

            </div>
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
