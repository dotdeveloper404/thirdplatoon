<template>
    <button type="button" class="text-sm text-white mb-2 font-bold py-1 px-3 rounded inline-block" :class="classes" v-on:click="toggleStatus()">{{ toggleText }}</button>
</template>

<script>
export default {
    props: ['item'],

    data() {
        return {
            active: this.item.status
        }
    },

    computed: {
        toggleText() {
            return this.active ? 'Active' : 'Deactive'
        },

        classes() {
            return this.active ? 'bg-blue-500 hover:bg-blue-700' : 'bg-red-500 hover:bg-red-700'
        }  
    },

    methods: {
        async toggleStatus() {
            await this.$inertia.post(this.item.status_url);
            this.active = !this.active;
        }
    }
}
</script>

<style>

</style>