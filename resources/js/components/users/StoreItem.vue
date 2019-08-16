<template>
        <thead>
            <tr v-if ="state === 'default'">
                <td>{{ store.code }}</td>
                <td>{{ store.name }}</td>
                <td>{{ store.address }}</td>
                <td v-if="store.user">{{ store.user.account }}</td>
                <td v-else></td>
                <td>
                    <edit-store v-bind:state="state" @edit-store="editing($event)"></edit-store>
                    <delete-store v-bind:id="store.id" @delete-store="deleteStore($event)"></delete-store>
                </td>
            </tr>
            <view-edit v-else v-bind:store="store"
                @update-store="updateStore($event)"
                @cancel-edit="cancel($event)">
            </view-edit>
        </thead>
</template>
<script>
import Edit from './EditStore'
import ViewEdit from './ViewEdit'
import Delete from './Delete'

export default {
    props: ['store'],
    components: {
        'edit-store': Edit,
        'view-edit': ViewEdit,
        'delete-store': Delete
    },
    data() {
        return {
            state: 'default',
        }
    },
    methods: {
        editing($event) {
           this.state = $event.state;
        },
        cancel($event) {
            this.state = 'default';
            this.store.code = $event.code;
            this.store.name = $event.name;
            this.store.address = $event.address;
            this.store.user_id = $event.user_id;
        },
        updateStore($event) {
            this.state = 'default';
            this.$emit('store-updated', {
                'id': this.store.id,
                'code': $event.code,
                'name': $event.name,
                'address': $event.address,
                'user_id': $event.user_id
            });
        },
        deleteStore($event) {
            this.$emit('store-deleted', {
                'id': $event.id,
            });
        }
    }
}
</script>