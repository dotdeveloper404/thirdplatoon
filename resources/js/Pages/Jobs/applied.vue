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
                    <inertia-link :href="route('admin.jobs.index')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 inline-block">All Jobs</inertia-link>
                    <table class="table-fixed w-full" v-if="job.job_users.length>0">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="border px-4 py-2 w-20">No.</th>
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Attachment</th>
                                <th class="border px-4 py-2">Comment</th>
                                <th class="border px-4 py-2">Status</th>
                            </tr>
                        </thead>
                        <transition-group tag="tbody" name="fade">
                            <tr v-for="job_user in job.job_users" :key="job_user.id">
                                <td class="border px-4 py-2">{{ job_user.id }}</td>
                                <td class="border px-4 py-2">{{ job_user.user_data.name }}</td>
                                <td class="border px-4 py-2">
                                    <a :href="job_user.attachment_path" class="text-sm bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded my-3 inline-block" target="_blank">Download</a>
                                </td>
                                <td class="border px-4 py-2">{{ job_user.comments }}</td>
                                <td class="border px-4 py-2">
                                    <form :action="job_user.status_url" method="POST">
                                        <input type="hidden" name="_token" :value="csrf">
                                        <select name="status" id="status" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" onchange="this.form.submit()">
                                            <option value="pending" :selected="job_user.status == 'pending'">Pending</option>
                                            <option value="applied" :selected="job_user.status == 'applied'">Applied</option>
                                            <option value="refused" :selected="job_user.status == 'refused'">Refused</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        </transition-group>
                    </table>
                    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500" v-if="job.job_users.length==0">
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

export default {
    components: {
        AppLayout
    },

    props: ["csrf", "job", "errors"],

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