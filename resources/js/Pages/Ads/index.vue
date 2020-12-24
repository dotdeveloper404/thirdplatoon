<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ads
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
                    <button
                        @click="openModal()"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3"
                    >
                        Create New Ad
                    </button>
                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">No.</th>
                                <th class="px-4 py-2">Category</th>
                                <th class="px-4 py-2">User</th>
                                <th class="px-4 py-2">Title</th>
                                <th class="px-4 py-2">Slug</th>
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="row in data" :key="row.id">
                                <td class="border px-4 py-2">{{ row.id }}</td>
                                <td class="border px-4 py-2">
                                    {{ row.category.title }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ row.user.name }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ row.title }}
                                </td>
                                <td class="border px-4 py-2">{{ row.slug }}</td>
                                <td class="border px-4 py-2">
                                    {{ row.price }}
                                </td>
                                <td class="border px-4 py-2">
                                    <a
                                        :href="
                                            route('admin.ads.contact', row.id)
                                        "
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded"
                                    >
                                        Contacts
                                    </a>
                                    <button
                                        @click="edit(row)"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    >
                                        Edit
                                    </button>
                                    <button
                                        @click="deleteRow(row)"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div
                        class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400"
                        v-if="isOpen"
                    >
                        <div
                            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
                        >
                            <div class="fixed inset-0 transition-opacity">
                                <div
                                    class="absolute inset-0 bg-gray-500 opacity-75"
                                ></div>
                            </div>
                            <!-- This element is to trick the browser into centering the modal contents. -->
                            <span
                                class="hidden sm:inline-block sm:align-middle sm:h-screen"
                            ></span
                            >​
                            <div
                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                                role="dialog"
                                aria-modal="true"
                                aria-labelledby="modal-headline"
                            >
                                <form>
                                    <div
                                        class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4"
                                    >
                                        <div class="">
                                            <div class="mb-4">
                                                <label
                                                    for="exampleFormControlInput1"
                                                    class="block text-gray-700 text-sm font-bold mb-2"
                                                    >Category Type:</label
                                                >
                                                <select
                                                    v-model="form.category_id"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                >
                                                    <option
                                                        v-for="item in categories"
                                                        :key="item.id"
                                                        :value="item.id"
                                                        >{{
                                                            item.title
                                                        }}</option
                                                    >
                                                </select>

                                                <div
                                                    v-if="
                                                        $page.errors.category_id
                                                    "
                                                    class="text-red-500"
                                                >
                                                    {{
                                                        $page.errors
                                                            .category_id[0]
                                                    }}
                                                </div>
                                            </div>

                                            <div class="mb-4" v-if="$page.user.user_type == 'admin'">
                                                <label
                                                    for="exampleFormControlInput1"
                                                    class="block text-gray-700 text-sm font-bold mb-2"
                                                    >Select User :</label
                                                >
                                                <select
                                                    v-model="form.user_id"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                >
                                                    <option
                                                        v-for="item in users"
                                                        :key="item.id"
                                                        :value="item.id"
                                                        >{{ item.name }}</option
                                                    >
                                                </select>

                                                <div
                                                    v-if="$page.errors.user_id"
                                                    class="text-red-500"
                                                >
                                                    {{
                                                        $page.errors.user_id[0]
                                                    }}
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label
                                                    for="exampleFormControlInput1"
                                                    class="block text-gray-700 text-sm font-bold mb-2"
                                                    >Title:</label
                                                >
                                                <input
                                                    type="text"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="exampleFormControlInput1"
                                                    placeholder="Enter Title"
                                                    v-model="form.title"
                                                />
                                                <div
                                                    v-if="$page.errors.title"
                                                    class="text-red-500"
                                                >
                                                    {{ $page.errors.title[0] }}
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label
                                                    for="exampleFormControlInput1"
                                                    class="block text-gray-700 text-sm font-bold mb-2"
                                                    >Price:</label
                                                >
                                                <input
                                                    type="number"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="exampleFormControlInput1"
                                                    placeholder="Enter Price"
                                                    v-model="form.price"
                                                />
                                                <div
                                                    v-if="$page.errors.price"
                                                    class="text-red-500"
                                                >
                                                    {{ $page.errors.price[0] }}
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label
                                                    for="exampleFormControlInput2"
                                                    class="block text-gray-700 text-sm font-bold mb-2"
                                                    >Description:</label
                                                >
                                                <textarea
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="exampleFormControlInput2"
                                                    v-model="form.description"
                                                    placeholder="Enter Description"
                                                ></textarea>
                                                <div
                                                    v-if="
                                                        $page.errors.description
                                                    "
                                                    class="text-red-500"
                                                >
                                                    {{
                                                        $page.errors
                                                            .description[0]
                                                    }}
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label
                                                    for="exampleFormControlInput1"
                                                    class="block text-gray-700 text-sm font-bold mb-2"
                                                    >Ad Image:</label
                                                >
                                                <input
                                                    type="file"
                                                    @change="
                                                        previewFiles($event)
                                                    "
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="exampleFormControlInput1"
                                                />
                                                <div
                                                    v-if="$page.errors.image"
                                                    class="text-red-500"
                                                >
                                                    {{ $page.errors.image[0] }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                                    >
                                        <span
                                            class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto"
                                        >
                                            <button
                                                wire:click.prevent="store()"
                                                type="button"
                                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                                v-show="!editMode"
                                                @click="save(form)"
                                            >
                                                Save
                                            </button>
                                        </span>
                                        <span
                                            class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto"
                                        >
                                            <button
                                                wire:click.prevent="store()"
                                                type="button"
                                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                                v-show="editMode"
                                                @click="update(form)"
                                            >
                                                Update
                                            </button>
                                        </span>
                                        <span
                                            class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto"
                                        >
                                            <button
                                                @click="closeModal()"
                                                type="button"
                                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                            >
                                                Cancel
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                ad_image: null
            };
        },
        save: function(data) {
            var fd = new FormData();
            fd.append("ad_image", this.ad_image);
            _.forEach(this.form, function(value, key) {
                fd.append(key, value);
            });
            this.$inertia.post("/admin/ads", fd, {
                headers: {
                    "content-type": "multipart/form-data"
                }
            });

            //this.$inertia.post("/admin/ads", data);
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
            var fd = new FormData();
            fd.append("ad_image", this.ad_image);
            fd.append("_method", 'PUT');
            _.forEach(this.form, function(value, key) {
                fd.append(key, value);
            });
            this.$inertia.post("/admin/ads/" + data.id, fd);
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
