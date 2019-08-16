<template>
   <button @click="editTask" class="btn btn-danger">Delete</button>
</template>
<script>
export default {
    props: ['id'],
    methods: {
        editTask() {
            if (confirm("Ban co muon xoa san pham nay")) {
                this.$emit('delete-store', {
                    'id': this.id,
                });
            } else {
                //
            }
        }
    }
}
</script>