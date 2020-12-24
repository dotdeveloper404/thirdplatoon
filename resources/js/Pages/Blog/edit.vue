<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Blog</h2>
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
                        <inertia-link :href="route('admin.blog.index')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 inline-block">All Posts</inertia-link>
                    </div>
                    <form enctype="multipart/form-data" @submit.prevent="update()">
                        <div class="mb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                                        <input type="text" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Title" v-model="form.title">
                                        <div v-if="$page.errors.title" class="text-red-500">
                                            {{ $page.errors.title[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                                        <select id="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="form.category">
                                            <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.title }}</option>
                                        </select>
                                        <div v-if="$page.errors.category" class="text-red-500">
                                            {{ $page.errors.category[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Upload Image:</label>
                                        <input type="file" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" @change="selectImage">
                                        <div v-if="$page.errors.image" class="text-red-500">
                                            {{ $page.errors.image[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                                        <textarea id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Description" rows="6" v-model="form.description"></textarea>
                                        <div v-if="$page.errors.description" class="text-red-500">
                                            {{ $page.errors.description[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
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

export default {
    components: {
        AppLayout
    },

    props: ["post", "categories", "errors"],

    data() {
        return {
            form: {
                title: this.post.title,
                category: this.post.category.id,
                description: this.post.description,
            },
            image: ''
        };
    },

    methods: {
        update() {
            var fd = new FormData();
            fd.append('image', this.image);
            _.forEach(this.form, function(value, key) {
                fd.append(key, value);
            });
            fd.append('_method', 'PUT');
            this.$inertia.post(this.post.update_url, fd, {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            });
        },

        selectImage(e) {
            var files = e.target.files || e.dataTransfer.files;

            if (!files.length) return;
            this.image = files[0];
        }
    },

    mounted() {
    }
};
</script>
