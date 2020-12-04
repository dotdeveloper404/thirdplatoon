<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contacts
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4"
                >
                    <div
                        class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                        role="alert"
                        v-if="$page.flash.message"
                    >
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ $page.flash.message }}</p>
                            </div>
                        </div>
                    </div>

                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">No.</th>
                                <th class="px-4 py-2">User</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Phone</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="row in data" :key="row.id">
                                <td class="border px-4 py-2">{{ row.id }}</td>
                                <td class="border px-4 py-2">
                                    {{ row.name }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ row.email }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ row.phone }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ row.description }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ row.created_at }}
                                </td>
                                <!-- <td class="border px-4 py-2">
                                    <a
                                        :href="
                                            route('admin.ads.contact', row.id)
                                        "
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded"
                                    >
                                        View
                                    </a>
                                </td> -->
                            </tr>
                        </tbody>
                    </table>
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
    props: ["data", "categories", "errors", "users"],
    data() {
        return {
            editMode: false,
            isOpen: false,
            form: {
                title: null,
                price: null,
                description: null,
                category_id: null,
                user_id: null,
                ad_image: null
            }
        };
    },
    methods: {
        openModal: function() {
            this.isOpen = true;
        },
        closeModal: function() {
            this.isOpen = false;
            this.reset();
            this.editMode = false;
        },
        reset: function() {
            this.form = {
                title: null,
                price: null,
                description: null,
                category_id: null,
                user_id: null,
                ad_image
            };
        },
        save: function(data) {
            this.$inertia.post("/admin/ads", data);
            this.reset();
            this.closeModal();
            this.editMode = false;
        },
        edit: function(data) {
            //  console.log(this.$router);
            this.form = Object.assign({}, data);
            this.editMode = true;
            this.openModal();
        },
        update: function(data) {
            data._method = "PUT";
            this.$inertia.post("/admin/ads/" + data.id, data);
            this.reset();
            this.closeModal();
        },
        deleteRow: function(data) {
            if (!confirm("Are you sure want to remove?")) return;
            data._method = "DELETE";
            this.$inertia.post("/admin/ads/" + data.id, data);
            this.reset();
            this.closeModal();
        },
        previewFiles(e) {
            var files = e.target.files || e.dataTransfer.files;

            if (!files.length) return;
            this.ad_image = files[0];
        }
    }
};
</script>
