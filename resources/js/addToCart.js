import Axios from "axios";

export default {
    methods: {
        addToCart(item) {
            let productId = item.id
            Axios
                .post('/cart/', item)
                .then(response => {
                    return response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },
    }
}
