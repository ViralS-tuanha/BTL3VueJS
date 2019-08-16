<template>
   <button class="btn btn-info" @click="editTask">edit</button>
</template>
<script>
export default {
    props: ['state'],
    methods: {
        editTask() {
            this.$emit('edit-product', {
                'state': 'editing',
            });
        }
    }
}
</script>