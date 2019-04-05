import Axios from "axios";

export default {
    methods: {
        addToCart(item) {
            let productId = item.id
            Axios.post('/api/cart/', item)
            console.log(item)
        },
    }
}
