
import axios from "axios"
export default {

    props: {
        initial_user: String
    },
    data() {
        return {
            user: this.initial_user,
            cart: {
                'active': false,
                'user': this.initial_user,
                'items': {},
                'total': 0
            },
            auth: false,
            headers: {
                'Content-Type': 'application/json'
            },
            shit: {}
        }
    },
    mounted() {
        this.$emit('update:initial_user', this.initial_user)
        this.getCart()
    },
    methods: {
        checkAuth() {
            if (this.user === '0') {
                swal({
                    title: 'Please Log In',
                    text: "Please register and log in first.",
                    button: {
                        text: 'Okay!',
                        className: "happySwalButton",
                        icon: 'info'
                    }
                })
                return false
            }
        },
        async addAndCheckout(item, selectedPack) {
            if (this.checkAuth() === false) {
                return
            }
            await this.addToCart(item, selectedPack)
            return this.startCheckout()
        },
        startCheckout() {
            if (this.checkAuth() === false) {
                return
            }

            window.location.href = '/checkout'

        },
        incrementProduct(item) {
            if (this.checkAuth() === false) {
                return
            }

            let product = {
                'pack_id':  item.pivot.seed_pack_id,
                'quantity': 1,
                'name': item.strainName
            }

            this.pushToLocalStorage(product)
            this.updateCart()
        },
        decrementProduct(item) {
            if (this.checkAuth() === false) {
                return
            }

            let product = {
                'pack_id':  item.pivot.seed_pack_id,
                'quantity': -1,
                'name': item.strainName
            }

            this.pushToLocalStorage(product)

            if (Number(localStorage.getItem('pack_id_' + String(product.pack_id))) <= 0) {
                this.removeProduct(item)
            }

            this.updateCart()
        },
        removeProduct(item) {
            if (this.checkAuth() === false) {
                return
            }

            let product = {
                'pack_id':  item.pivot.seed_pack_id,
                'quantity': -100,
                'name': item.strainName
            }
            this.removeFromLocalStorage(product)

            return this.updateCart()

        },
        async addToCart(item, selectedPack) {
            if (this.checkAuth() === false) {
                return
            }
            if (selectedPack === 0) {
                return swal({
                    title: 'Uh Oh!',
                    text: "You haven't selected a pack yet.",
                    button: {
                        text: 'Despair!',
                        className: "sadSwalButton",
                        icon: 'warning'
                    }
                })
            }

            let selectionValid = false

            item.seed_packs.forEach(function (pack) {
                if (Number(selectedPack) === Number(pack.id)) {
                    return selectionValid = true
                }
            })

            if (selectionValid === true) {
                let product = {
                    'pack_id': selectedPack,
                    'quantity': item.quantity,
                    'name': item.name
                }

                this.pushToLocalStorage(product)

                if (this.cart.active === true) {
                    await this.updateCart()
                } else {
                    await this.createCart()
                }
                return swal({
                    title: 'Updated Cart',
                    text: "Added " + item.quantity + " packs of " + item.name + " to your cart.",
                    button: {
                        text: 'Joy!',
                        className: "happySwalButton",
                        icon: 'success'
                    },
                    timer: 2000
                })
            } else {
                return swal({
                    title: 'Uh Oh!',
                    text: "You clicked on an unselected pack. Please select a pack from this strain",
                    button: {
                        text: 'oops',
                        className: "sadSwalButton",
                        icon: 'warning'
                    }
                })
            }
        },
        getCart() {
            axios.get('/cart', this.headers)
                .then(response => {
                    Promise.resolve(response)
                    if (response.data.cart !== undefined) {
                        this.cart.items = response.data.cart.seed_packs
                        this.cart.total = response.data.total
                    }
                    if (response.status === 200) {return this.cart.active = true}
                    return

                })
                .catch(error => {
                    Promise.reject(error)
                    return this.cart.active = false
                })
        },
        async createCart() {
            this.buildFromLocalStorage()
            await axios.post('/cart', this.shit, this.headers)
                .then(response => {
                    this.cart.active = true
                    this.cart = response.data
                    this.cart.total = response.data.total
                    this.getCart()
                    return Promise.resolve(response)
                })
                .catch(error => {
                    Promise.reject(error)
                    this.cart.active = false
                    return swal({
                        title: 'Uh Oh!',
                        text: "Cart save failed",
                        button: {
                            text: 'Despair!',
                            className: "sadSwalButton",
                            icon: 'error'
                        }
                    })
                })
        },
        async updateCart() {
            this.buildFromLocalStorage()
            await axios.put('/cart', this.shit, this.headers)
            .then(response => {
                if (response.data.cart === undefined) {
                    axios.delete('/cart', this.user, this.headers)
                        .then(response => {
                            localStorage.clear()
                            this.cart.active = false
                            this.getCart()
                            return Promise.resolve(response)
                        })
                        .catch(error => {
                            return Promise.reject(error)
                        })
                }
                this.getCart()

                if (response.status === 204) {
                    return this.cart.active = false
                }
                this.$emit('update:initial_user', this.initial_user)
                this.cart.active = true
                return Promise.resolve(response)
            })
            .catch(error => {
                Promise.reject(error)
                return swal({
                    title: 'Uh Oh!',
                    text: "Failed to update cart.",
                    button: {
                        text: 'Despair!',
                        className: "sadSwalButton",
                        icon: 'error'
                    }
                })
            })
        },
        async deleteCart() {
            await swal({
                title: "Are you sure?",
                text: "Do you want to empty you cart completely?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                  if (willDelete) {
                      axios.delete('/cart', this.user, this.headers)
                          .then(response => {
                              Promise.resolve(response)
                              localStorage.clear()
                              this.cart.active = false
                              this.getCart()
                              return swal("Poof! Your cart has been deleted!", {
                                  icon: "success",
                                  timer:1500
                              });
                          })
                          .catch(error => {
                            Promise.reject(error)
                            return swal({
                                title: 'Uh Oh!',
                                text: "Failed to delete your cart.",
                                button: {
                                    text: 'Despair!',
                                    className: "sadSwalButton",
                                    icon: 'error'
                                }
                            })
                          })
                } else {
                  swal("Your cart is safe!");
                }
              });

        },
        pushToLocalStorage(product) {
            const id = 'pack_id_' + product.pack_id
            if (localStorage.key(id) === null) {
                localStorage.setItem('pack_id_' + product.pack_id, product.quantity)
            } else {
                    let existingQuantity = Number(localStorage.getItem(id))
                    let newQuantity = product.quantity + existingQuantity
                    localStorage.removeItem('pack_id_' + product.pack_id)
                    localStorage.setItem('pack_id_' + product.pack_id, newQuantity)
            }
        },
        buildFromLocalStorage() {
            this.shit = {}
            this.shit.uuid = this.user
            for (var i = 0, len = localStorage.length; i < len; ++i)
            {
                let key = localStorage.key(i).substr(8)
                this.shit[key] = localStorage.getItem(localStorage.key(i))
            }
        },
        removeFromLocalStorage(product) {
            return localStorage.removeItem('pack_id_' + product.pack_id)
        }
    },
    watch: {

    }
}


