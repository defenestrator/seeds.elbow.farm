import axios from "axios";

export default {
    methods: {
        addToCart(item, selectedPack) {
            item.seed_packs.forEach((pack) => {
                if (pack.id === this.selectedPack) {
                    axios.post('/cart/', item)
                    .then(response => {
                        return response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
                    return
                }
            })

        },
    }
}
