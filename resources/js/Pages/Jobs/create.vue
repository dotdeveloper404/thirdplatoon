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
                    <div class="mb-5">
                        <inertia-link :href="route('admin.jobs.index')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 inline-block">All Jobs</inertia-link>
                    </div>
                    <form enctype="multipart/form-data" @submit.prevent="save()">
                        <div class="mb-5">
                            <div class="flex flex-wrap">
                                <div class="w-6/12 pr-3">
                                    <div class="mb-4">
                                        <label for="company_name" class="block text-gray-700 text-sm font-bold mb-2">Company Name:</label>
                                        <input type="text" id="company_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Company Name" v-model="form.company_name">
                                        <div v-if="$page.errors.company_name" class="block text-red-500">
                                            {{ $page.errors.company_name[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-6/12 pr-3">
                                    <div class="mb-4">
                                        <label for="company_logo" class="block text-gray-700 text-sm font-bold mb-2">Upload Company Logo:</label>
                                        <input type="file" id="company_logo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" @change="selectImage">
                                        <div v-if="$page.errors.company_logo" class="block text-red-500">
                                            {{ $page.errors.company_logo[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-6/12 pr-3">
                                    <div class="mb-4">
                                        <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                                        <select id="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="form.category">
                                            <option value="">Select Category</option>
                                            <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.title }}</option>
                                        </select>
                                        <div v-if="$page.errors.category" class="block text-red-500">
                                            {{ $page.errors.category[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-3/12 pr-3">
                                    <div class="mb-4">
                                        <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                                        <input type="text" id="location" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Location" v-model="form.location">
                                        <div v-if="$page.errors.location" class="block text-red-500">
                                            {{ $page.errors.location[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-3/12 pr-3">
                                    <div class="mb-4">
                                        <label for="country" class="block text-gray-700 text-sm font-bold mb-2">Country:</label>
                                        <input type="text" id="country" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Country" v-model="form.country">
                                        <div v-if="$page.errors.country" class="block text-red-500">
                                            {{ $page.errors.country[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-4/12 pr-3">
                                    <div class="mb-4">
                                        <label for="phone_number" class="block text-gray-700 text-sm font-bold mb-2">Phone Number:</label>
                                        <input type="text" id="phone_number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Phone Number" v-model="form.phone_number">
                                        <div v-if="$page.errors.phone_number" class="block text-red-500">
                                            {{ $page.errors.phone_number[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-4/12 pr-3">
                                    <div class="mb-4">
                                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                                        <input type="text" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Email" v-model="form.email">
                                        <div v-if="$page.errors.email" class="block text-red-500">
                                            {{ $page.errors.email[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-4/12 pr-3">
                                    <div class="mb-4">
                                        <label for="designation" class="block text-gray-700 text-sm font-bold mb-2">Designation:</label>
                                        <input type="text" id="designation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Designation" v-model="form.designation">
                                        <div v-if="$page.errors.designation" class="block text-red-500">
                                            {{ $page.errors.designation[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-6/12 pr-3">
                                    <div class="mb-4">
                                        <label for="job_type" class="block text-gray-700 text-sm font-bold mb-2">Job Type:</label>
                                        <select id="job_type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="form.job_type">
                                            <option value="">Select Job Type</option>
                                            <option value="internship">Internship</option>
                                            <option value="freelancer">Freelancer</option>
                                            <option value="part_time">Part Time</option>
                                            <option value="full_time">Full time</option>
                                            <option value="contract_base">Contract Base</option>
                                        </select>
                                        <div v-if="$page.errors.job_type" class="block text-red-500">
                                            {{ $page.errors.job_type[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-6/12 pr-3">
                                    <div class="mb-4">
                                        <label for="shift" class="block text-gray-700 text-sm font-bold mb-2">Shift:</label>
                                        <select id="shift" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="form.shift">
                                            <option value="">Select Shift</option>
                                            <option value="morning">Morning</option>
                                            <option value="evening">Evening</option>
                                            <option value="night">Night</option>
                                        </select>
                                        <div v-if="$page.errors.shift" class="block text-red-500">
                                            {{ $page.errors.shift[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-6/12 pr-3">
                                    <div class="mb-4">
                                        <label for="experience" class="block text-gray-700 text-sm font-bold mb-2">Experience:</label>
                                        <input type="text" id="experience" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Experience" v-model="form.experience">
                                        <div v-if="$page.errors.experience" class="block text-red-500">
                                            {{ $page.errors.experience[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-6/12 pr-3">
                                    <div class="mb-4">
                                        <label for="qualification" class="block text-gray-700 text-sm font-bold mb-2">Qualification:</label>
                                        <input type="text" id="qualification" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Qualification" v-model="form.qualification">
                                        <div v-if="$page.errors.qualification" class="block text-red-500">
                                            {{ $page.errors.qualification[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-3/12 pr-3">
                                    <div class="mb-4">
                                        <label for="currency" class="block text-gray-700 text-sm font-bold mb-2">Currency:</label>
                                        <select id="currency" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="form.currency">
                                            <option v-for="currency in currencies" :key="currency" :value="currency">{{ currency }}</option>
                                        </select>
                                        <div v-if="$page.errors.currency" class="block text-red-500">
                                            {{ $page.errors.currency[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-3/12 pr-3">
                                    <div class="mb-4">
                                        <label for="pay_start" class="block text-gray-700 text-sm font-bold mb-2">Pay Start:</label>
                                        <input type="number" id="pay_start" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Pay Start" v-model="form.pay_start">
                                        <div v-if="$page.errors.pay_start" class="block text-red-500">
                                            {{ $page.errors.pay_start[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-3/12 pr-3">
                                    <div class="mb-4">
                                        <label for="pay_end" class="block text-gray-700 text-sm font-bold mb-2">Pay End:</label>
                                        <input type="number" id="pay_end" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Pay End" v-model="form.pay_end">
                                        <div v-if="$page.errors.pay_end" class="block text-red-500">
                                            {{ $page.errors.pay_end[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-3/12 pr-3">
                                    <div class="mb-4">
                                        <label for="pay_type" class="block text-gray-700 text-sm font-bold mb-2">Pay Type:</label>
                                        <select id="pay_type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="form.pay_type">
                                            <option value="">Select Pay Type</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="daily">Daily</option>
                                            <option value="hourly">Hourly</option>
                                            <option value="yearly">Yearly</option>
                                        </select>
                                        <div v-if="$page.errors.pay_type" class="block text-red-500">
                                            {{ $page.errors.pay_type[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full pr-3">
                                    <div class="mb-4">
                                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                                        <vue-editor id="description" v-model="form.description" :editor-toolbar="customToolbar"></vue-editor>
                                        <div v-if="$page.errors.description" class="block text-red-500">
                                            {{ $page.errors.description[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full pr-3">
                                    <div class="mb-4">
                                        <label for="allownces" class="block text-gray-700 text-sm font-bold mb-2">Allownces:</label>
                                        <vue-editor id="allownces" v-model="form.allownces" :editor-toolbar="customToolbar"></vue-editor>
                                        <div v-if="$page.errors.allownces" class="block text-red-500">
                                            {{ $page.errors.allownces[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full pr-3">
                                    <div class="mb-4">
                                        <label for="requirements" class="block text-gray-700 text-sm font-bold mb-2">Requirements:</label>
                                        <vue-editor id="requirements" v-model="form.requirements" :editor-toolbar="customToolbar"></vue-editor>
                                        <div v-if="$page.errors.requirements" class="block text-red-500">
                                            {{ $page.errors.requirements[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-6/12 pr-3">
                                    <div class="mb-4">
                                        <label for="valid_till" class="block text-gray-700 text-sm font-bold mb-2">Valid Till:</label>
                                        <input type="date" id="valid_till" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Valid Till" v-model="form.valid_till">
                                        <div v-if="$page.errors.valid_till" class="block text-red-500">
                                            {{ $page.errors.valid_till[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-6/12 pr-3">
                                    <div class="mb-4">
                                        <label for="job_status" class="block text-gray-700 text-sm font-bold mb-2">Job Status:</label>
                                        <select id="job_status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="form.job_status">
                                            <option value="">Select Job Status</option>
                                            <option value="pending">Pending</option>
                                            <option value="no_longer_available">No Longer Available</option>
                                        </select>
                                        <div v-if="$page.errors.job_status" class="block text-red-500">
                                            {{ $page.errors.job_status[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-2/12 pr-3">
                                    <div class="mb-4">
                                        <label class="text-gray-700 text-lg font-bold flex items-center p-4 max-w-xs mx-auto bg-white border rounded bg-gray-100">
                                            <input type="checkbox" id="urgent" class="h-5 w-5 mr-2" v-model="form.urgent">
                                            <span>Urgent</span>
                                        </label>
                                        <div v-if="$page.errors.urgent" class="block text-red-500">
                                            {{ $page.errors.urgent[0] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-2/12 pr-3">
                                    <div class="mb-4">
                                        <label class="text-gray-700 text-lg font-bold flex items-center p-4 max-w-xs mx-auto bg-white border rounded bg-gray-100">
                                            <input type="checkbox" id="featured" class="h-5 w-5 mr-2" v-model="form.featured">
                                            <span>Featured</span>
                                        </label>
                                        <div v-if="$page.errors.featured" class="block text-red-500">
                                            {{ $page.errors.featured[0] }}
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

    props: ["categories", "currencies", "errors"],

    data() {
        return {
            customToolbar: [
                ["bold", "italic", "underline"],
                [{ list: "bullet" }]
            ],
            form: {
                category: '',
                company_name: '',
                location: '',
                country: '',
                phone_number: '',
                email: '',
                designation: '',
                job_type: '',
                shift: '',
                experience: '',
                qualification: '',
                currency: '',
                pay_start: '',
                pay_end: '',
                pay_type: '',
                description: '',
                allownces: '',
                requirements: '',
                valid_till: '',
                job_status: '',
                urgent: false,
                featured: false,
            },
            company_logo: ''
        };
    },

    methods: {

        reset() {
            this.form.category = '';
            this.form.company_name = '';
            this.form.location = '';
            this.form.country = '';
            this.form.phone_number = '';
            this.form.email = '';
            this.form.designation = '';
            this.form.job_type = '';
            this.form.shift = '';
            this.form.experience = '';
            this.form.qualification = '';
            this.form.currency = '';
            this.form.pay_start = '';
            this.form.pay_end = '';
            this.form.pay_type = '';
            this.form.description = '';
            this.form.allownces = '';
            this.form.requirements = '';
            this.form.valid_till = '';
            this.form.job_status = '';
            this.form.urgent = false;
            this.form.featured = false;
            this.company_logo = '';
        },

        save() {
            var fd = new FormData();
            fd.append('company_logo', this.company_logo);
            _.forEach(this.form, function(value, key) {
                fd.append(key, value);
            });
            this.$inertia.post("/admin/jobs", fd, {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            });

            this.reset();
        },

        selectImage(e) {
            var files = e.target.files || e.dataTransfer.files;

            if (!files.length) return;
            this.company_logo = files[0];
        }
    }
};
</script>