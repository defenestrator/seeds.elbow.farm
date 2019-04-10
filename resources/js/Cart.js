import axios from "axios";

export default {
    methods: {
        addToCart(item, selectedPack) {
            item.seed_packs.forEach((pack) => {
                if (pack.id === selectedPack) {
                    item.selectedPack = selectedPack
                    axios.post('/cart/', item)
                    .then(response => {
                        Promise.resolve(response)
                        return response.data
                    })
                    .catch(error => {
                        Promise.reject(error)
                        console.log(error)
                    })
                    return
                }
            })

        },
    }
}
