<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Job Category</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" v-if="$page.flash.message">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ $page.flash.message }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <inertia-link :href="route('admin.jobs.categories.index')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 inline-block">All Categories</inertia-link>
                    </div>
                    <form enctype="multipart/form-data" @submit.prevent="update()">
                        <div class="mb-5">
                            <div class="flex flex-wrap">
                                <div class="w-full pr-3">
                                    <div class="mb-4">
                                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                                        <input type="text" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Company Name" v-model="form.title">
                                        <div v-if="$page.errors.title" class="block text-red-500">
                                            {{ $page.errors.title[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full pr-3">
                                    <div class="mb-4">
                                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                                        <textarea id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Description" rows="5" v-model="form.description"></textarea>
                                        <div v-if="$page.errors.description" class="block text-red-500">
                                            {{ $page.errors.description[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full pr-3">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 inline-block">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import { VueEditor } from "vue2-editor";

export default {
    components: {
        AppLayout,
        VueEditor
    },

    props: ["job_category", "errors"],

    data() {
        return {
            form: {
                title: this.job_category.title,
                description: this.job_category.description,
                _method: 'PUT'
            }
        };
    },

    methods: {
        update() {
            this.$inertia.post(this.job_category.update_url, this.form);
        }
    },

    mounted() {
    }
};
</script>
