<template>
    <button @click="cancelEdit" class="btn btn-warning">Cancel</button>
</template>
<script>
export default {
    methods: {
        cancelEdit(){
            this.$emit('cancel-edit');
        }
    }
}
</script>
