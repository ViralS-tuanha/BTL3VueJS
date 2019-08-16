<template>
    <div>
        <div>
            <add-store></add-store>
            <br>
        </div>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Manager</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <store-item v-for="store in listStores.data"
                    :key="store.id"
                    :store="store"
                    @store-updated="updateStore($event)"
                    @store-deleted="deleteStore($event)">
            </store-item>
        </table>
        <br>
        <div>
            <pagination :data="listStores" @pagination-change-page="getResults"></pagination>
        </div>
    </div>
</template>
<script>
import AddStore from './AddStore'
import StoreItem from './StoreItem'
import Pagination from 'laravel-vue-pagination'

export default {
    components: {
        'store-item': StoreItem,
        'pagination': Pagination,
        'add-store': AddStore
    },
    data() {
        return {
            'listStores': {},
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
            axios.get('/store?page=' + page)
            .then(response => {
                this.listStores = response.data
            })
        },
        updateStore($event) {
            let index = this.listStores.data.findIndex((element) => {
                return element.id === $event.id;
            });
            axios.put(`/store/${$event.id}`, $event)
            .then(response => {
                this.listStores.data[index].code = $event.code;
                this.listStores.data[index].name = $event.name;
                this.listStores.data[index].address = $event.address;
                this.listStores.data[index].user_id = $event.user_id;
                this.listStores.data[index].user = response.data.user;
            })
        },
        deleteStore($event) {
            let index = this.listStores.data.findIndex((element) => {
                return element.id === $event.id;
            });
            axios.delete(`/store/${$event.id}`)
            .then(response => {
                this.listStores.data.splice(index, 1);
            })
            .catch(error => {});
        },
    }
}
</script>