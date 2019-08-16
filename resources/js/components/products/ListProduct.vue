<template>
    <div>
        <div>
            <add-product></add-product>
            <br>
        </div>
         <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <product-item v-for="product in listProducts.data"
                    :key="product.id"
                    :product="product"
                    @product-updated="updateProduct($event)"
                    @product-deleted="deleteProduct($event)">
            </product-item>
        </table>
        <br>
        <div>
            <pagination :data="listProducts" @pagination-change-page="getResults"></pagination>
        </div>
    </div>
</template>
<script>
import AddProduct from './AddProduct'
import ProductItem from './ProductItem'
import Pagination from 'laravel-vue-pagination'

export default {
    components: {
        'product-item': ProductItem,
        'pagination': Pagination,
        'add-product': AddProduct
    },
    data() {
        return {
            'listProducts': {},
        }
    },
    created() {
        this.getResults();
    },
    methods: {
        getResults(page){
            if (typeof page === 'undefined') {
                page = 1;
            }
            axios.get('/product?page=' + page)
            .then(response => {
                this.listProducts = response.data
            })
        },
        updateProduct($event) {
            let index = this.listProducts.data.findIndex((element) => {
                return element.id === $event.id;
            });
            axios.put(`/product/${$event.id}`, $event)
            .then(response => {
                this.listProducts.data[index].code = $event.code;
                this.listProducts.data[index].name = $event.name;
                this.listProducts.data[index].desc = $event.desc;
            })
        },
        deleteProduct($event) {
            let index = this.listProducts.data.findIndex((element) => {
                return element.id === $event.id;
            });
            axios.delete(`/product/${$event.id}`)
            .then(response => {
                this.listProducts.data.splice(index, 1);
            })
            .catch(error => {});
        },
    }
}
</script>