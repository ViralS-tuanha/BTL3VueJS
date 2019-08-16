<template>
        <thead>
            <tr v-if ="state === 'default'">
                <td>{{ product.code }}</td>
                <td>{{ product.name }}</td>
                <td>{{ product.desc }}</td>
                <td>
                    <edit-product v-bind:state="state" @edit-product="editing($event)"></edit-product>
                    <delete-product v-bind:id="product.id" @delete-product="deleteProduct($event)"></delete-product>
                </td>
            </tr>
            <view-edit v-else v-bind:product="product"
                @update-product="updateProduct($event)"
                @cancel-edit="cancel($event)">
            </view-edit>
        </thead>
</template>
<script>
import Edit from './EditProduct'
import ViewEdit from './ViewEdit'
import Delete from './Delete'

export default {
    props: ['product'],
    components: {
        'edit-product': Edit,
        'view-edit': ViewEdit,
        'delete-product': Delete
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
            this.product.code = $event.code;
            this.product.name = $event.name;
            this.product.desc = $event.desc;
        },
        updateProduct($event) {
            this.state = 'default';
            this.$emit('product-updated', {
                'id': this.product.id,
                'code': $event.code,
                'name': $event.name,
                'desc': $event.desc
            });
        },
        deleteProduct($event) {
            this.$emit('product-deleted', {
                'id': $event.id,
            });
        }
    }
}
</script>