<template>
    <button @click="update" class="btn btn-success">Save</button>
</template>
<script>
export default {
    methods: {
        update(){
            this.$emit('update-store');
        }
    }
}
</script>
