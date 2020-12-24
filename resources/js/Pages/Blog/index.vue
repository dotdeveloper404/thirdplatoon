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
                    <inertia-link :href="route('admin.blog.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 inline-block">Create New Post</inertia-link>
                    <table class="table-fixed w-full" v-if="posts.data.length>0">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="border px-4 py-2 w-20">No.</th>
                                <th class="border px-4 py-2">Title</th>
                                <th class="border px-4 py-2">Category</th>
                                <th class="border px-4 py-2">Image</th>
                                <th class="border px-4 py-2">Status</th>
                                <th class="border px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <transition-group tag="tbody" name="fade">
                            <tr v-for="post in posts.data" :key="post.id">
                                <td class="border px-4 py-2">{{ post.id }}</td>
                                <td class="border px-4 py-2">{{ post.title }}</td>
                                <td class="border px-4 py-2">{{ post.category.title }}</td>
                                <td class="border px-4 py-2">
                                    <img :src="post.image_path" class="w-20 border-4 border-gray-200">
                                </td>
                                <td class="border px-4 py-2">
                                    <status-button :item="post"></status-button>
                                </td>
                                <td class="border px-4 py-2">
                                    <inertia-link :href="post.edit_url" class="text-sm mb-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded inline-block">Edit</inertia-link>
                                    <delete-button :item="post"></delete-button>
                                </td>
                            </tr>
                        </transition-group>
                    </table>
                    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500" v-if="posts.data.length==0">
                        <span class="inline-block align-middle">
                            <strong>No Record Found!</strong>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import StatusButton from "@/Buttons/StatusButton";
import DeleteButton from "@/Buttons/DeleteButton";

export default {
    components: {
        AppLayout,
        StatusButton,
        DeleteButton
    },

    props: ["posts", "errors"],

    data() {
        return {
        };
    },

    methods: {
    },
    
    mounted() {
    }
};
</script>

<style>
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-leave-to {
  background-color: rgb(255 0 0 / 45%);
  opacity: 0;
}
</style>