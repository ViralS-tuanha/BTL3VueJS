<template>
    <tr>
        <td scope="col"><input v-model="store.code" class="form-control"></td>
        <td scope="col"><input v-model="store.name" class="form-control"></td>
        <td scope="col"><input v-model="store.address" class="form-control"></td>
        <td scope="col">
            <select v-model="store.user_id" class="form-control">
                <option v-for="option in optionUser"
                    :key="option.id"
                    :value="option.id">
                    {{ option.account }}
                </option>
            </select>
        </td>
        <td scope="col">
            <save @update-store="update($event)"></save>
            <cancel @cancel-edit="cancel($event)"></cancel>
        </td>
    </tr>
</template>
<script>
import Save from './SaveStore'
import Cancel from './CancelEdit'

export default {
    components: {
        'save': Save,
        'cancel': Cancel,
    },
    props: ['store'],
    data() {
        return {
            optionUser: [],
            oldStore : {
                code: this.store.code,
                name: this.store.name,
                address: this.store.address,
                user_id: this.store.user_id
            }
        }
    },
    methods: {
        update($event) {
            this.$emit('update-store', {
                'code': this.store.code,
                'name': this.store.name,
                'address': this.store.address,
                'user_id': this.store.user_id,
            });
        },
        cancel($event) {
            this.$emit('cancel-edit', {
                'code': this.oldStore.code,
                'name': this.oldStore.name,
                'address': this.oldStore.address,
                'user_id': this.oldStore.user_id
            });
        }
    },
    mounted (){
        axios.get('/all-user')
        .then(response =>{
            // let dataUser = response.data.map(function(store){
            //     let newStore = {
            //         value: store.id,
            //         text: store.account
            //     }
            //     return newStore
            // })
            this.optionUser = response.data;
            console.log(this.optionUser);
        })
    }
}
</script>