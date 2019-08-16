<template>
   <button @click="editTask" class="btn btn-danger">delete</button>
</template>
<script>
export default {
    props: ['id'],
    methods: {
        editTask() {
            if (confirm("Ban co muon xoa san pham nay")) {
                this.$emit('delete-product', {
                    'id': this.id,
                });
            } else {
                //
            }
        }
    }
}
</script>