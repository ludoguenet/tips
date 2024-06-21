<script setup>
import MultiSelect from 'primevue/multiselect';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from "vue";

const selectedCities = ref();
const cities = ref([
    { name: 'New York', code: 'NY' },
    { name: 'Rome', code: 'RM' },
    { name: 'London', code: 'LDN' },
    { name: 'Istanbul', code: 'IST' },
    { name: 'Paris', code: 'PRS' }
]);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <MultiSelect
                    v-model="selectedCities"
                    :options="cities"
                    optionLabel="name"
                    filter
                    placeholder="Select Cities"
                    :maxSelectedLabels="3"
                    class="w-full md:w-80"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
