import Client from "./Client";
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
                'user': this.initial_user
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
        addAndCheckout(item, selectedPack) {
            this.addToCart(item, selectedPack)
            return this.startCheckout()
        },
        startCheckout() {
            this.shit.uuid = this.user
            console.log(this.shit)
                for (var i = 0, len = localStorage.length; i < len; ++i)
                {
                    let key = localStorage.key(i).substr(8)
                    this.shit[key] = localStorage.getItem(localStorage.key(i))
                }
                axios.post('/cart', this.shit, this.headers)
                    .then(response => {
                        console.log(response.data)
                        Promise.resolve(response)
                        window.location.href = '/checkout'
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
        addToCart(item, selectedPack) {
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
            const id = 'pack_id_' + product.pack_id
            if (localStorage.key(id) === null) {
                localStorage.setItem('pack_id_' + product.pack_id, product.quantity)
            } else {
                    let existingQuantity = Number(localStorage.getItem(id))
                    let newQuantity = product.quantity + existingQuantity
                    localStorage.removeItem('pack_id_' + product.pack_id)
                    localStorage.setItem('pack_id_' + product.pack_id, newQuantity)
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
        }

    },
    watch: {

    }
}

