
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
        addAndCheckout(item, selectedPack) {
            if (this.checkAuth() === false) {
                return
            }
            this.addToCart(item, selectedPack)
            return this.startCheckout()
        },
        startCheckout() {
            if (this.checkAuth() === false) {
                return
            }

            window.location.href = '/checkout'

        },
        addToCart(item, selectedPack) {
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

            let product = {
                'pack_id': selectedPack,
                'quantity': item.quantity,
                'name': item.name
            }
            this.pushToLocalStorage(product)

            if (this.cart.active === true) {
                this.updateCart()
            } else {
                this.createCart()
            }

            return swal({
                title: 'Updated Cart',
                text: "Added " + item.quantity + " packs of " + item.name + " to your cart.",
                button: {
                    text: 'Joy!',
                    className: "happySwalButton",
                    icon: 'success'
                },
                timer: 3000
            })
        },
        createCart() {
            this.buildFromLocalStorage()
            axios.post('/cart', this.shit, this.headers)
                .then(response => {
                    Promise.resolve(response)
                    localStorage.clear()
                    this.cart.active = true
                    this.cart = response.data
                    this.cart.total = response.data.total
                })
                .catch(error => {
                    Promise.reject(error)
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
        updateCart() {
            this.buildFromLocalStorage()
            axios.put('/cart', this.shit, this.headers)
                .then(response => {
                    Promise.resolve(response)
                    localStorage.clear()
                })
                .catch(error => {
                    Promise.reject(error)
                    return swal({
                        title: 'Uh Oh!',
                        text: "Checkout step failed",
                        button: {
                            text: 'Despair!',
                            className: "sadSwalButton",
                            icon: 'error'
                        }
                    })
                })
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
        }

    },
    watch: {

    }
}

