
<template>
    <button type="button" class="text-white font-bold py-2 px-4 rounded inline-block bg-red-500 hover:bg-red-700" @click="destroy()">Delete</button>
</template>

<script>
export default {

    props: ['item'],

    methods: {
        async destroy() {
            await this.$inertia.post(this.item.delete_url, {
                _method: 'DELETE'
            });
        }   
    }
}
</script>

<style>

</style>