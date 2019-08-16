<template>
   <button class="btn btn-info" @click="editTask">Edit</button>
</template>
<script>
export default {
    props: ['state'],
    methods: {
        editTask() {
            this.$emit('edit-store', {
                'state': 'editing',
            });
        }
    },
}
</script>