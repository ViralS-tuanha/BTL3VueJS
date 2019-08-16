<template>
    <tr>
        <td><input v-model="product.code"></td>
        <td><input v-model="product.name"></td>
        <td><input v-model="product.desc"></td>
        <td>
            <save @update-product="update($event)"></save>
            <cancel @cancel-edit="cancel($event)"></cancel>
        </td>
    </tr>
</template>
<script>
import Save from './SaveProduct'
import Cancel from './CancelEdit'

export default {
    components: {
        'save': Save,
        'cancel': Cancel,
    },
    props: ['product'],
    data() {
        return {
            oldProduct : {
                code: this.product.code,
                name: this.product.name,
                desc: this.product.desc,
            }
        }
    },
    methods: {
        update($event) {
            this.$emit('update-product', {
                'code': this.product.code,
                'name': this.product.name,
                'desc': this.product.desc,
            });
        },
        cancel($event) {
            this.$emit('cancel-edit', {
                'code': this.oldProduct.code,
                'name': this.oldProduct.name,
                'desc': this.oldProduct.desc,
            });
        }
    }
}
</script>