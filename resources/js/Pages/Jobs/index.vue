<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Jobs</h2>
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
                    <inertia-link :href="route('admin.jobs.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 inline-block">Create New job</inertia-link>
                    <inertia-link :href="route('admin.jobs.categories.index')" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded my-3 inline-block" v-if="$page.user.user_type == 'admin'">All Jobs Categories</inertia-link>
                    <table class="table-fixed w-full" v-if="jobs.data.length>0">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="border px-4 py-2 w-20">No.</th>
                                <th class="border px-4 py-2">Company Name</th>
                                <th class="border px-4 py-2">Job Type</th>
                                <th class="border px-4 py-2">Category</th>
                                <th class="border px-4 py-2">Valid Till</th>
                                <th class="border px-4 py-2">Status</th>
                                <th class="border px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <transition-group tag="tbody" name="fade">
                            <tr v-for="job in jobs.data" :key="job.id">
                                <td class="border px-4 py-2">{{ job.id }}</td>
                                <td class="border px-4 py-2">{{ job.company_name }}</td>
                                <td class="border px-4 py-2">{{ job.type }}</td>
                                <td class="border px-4 py-2">{{ job.category.title }}</td>
                                <td class="border px-4 py-2">{{ job.deadline_date }}</td>
                                <td class="border px-4 py-2">
                                    <status-button :item="job"></status-button>
                                </td>
                                <td class="border px-4 py-2">
                                    <inertia-link :href="job.applied_url" class="text-sm mb-2 bg-purple-500 hover:bg-purple-700 text-white font-bold py-1 px-3 rounded inline-block">Applied ({{ job.job_users.length }})</inertia-link>
                                    <inertia-link :href="job.show_url" class="text-sm mb-2 bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded inline-block">View</inertia-link>
                                    <inertia-link :href="job.edit_url" class="text-sm mb-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded inline-block">Edit</inertia-link>
                                    <delete-button :item="job" v-if="job.job_users.length==0"></delete-button>
                                </td>
                            </tr>
                        </transition-group>
                    </table>
                    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500" v-if="jobs.data.length==0">
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

    props: ["jobs", "errors"],

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