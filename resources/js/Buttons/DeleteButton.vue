
<template>
    <button type="button" class="text-sm mb-2 text-white font-bold py-1 px-3 rounded inline-block bg-red-500 hover:bg-red-700" @click="destroy()">Delete</button>
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