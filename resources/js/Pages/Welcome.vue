<script setup>
import { Head } from '@inertiajs/vue3';
import MultiSelect from 'primevue/multiselect';
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
    <h1>Hello World</h1>

    <div class="card flex justify-center">
        <MultiSelect
            v-model="selectedCities"
            :options="cities"
            optionLabel="name"
            placeholder="Select Cities"
            :maxSelectedLabels="3"
            class="w-full md:w-[40rem]"
            :pt="{
               header: {
                   class: ['flex items-center justify-between', 'py-3 px-5', 'm-0', 'border-b', 'rounded-tl-md', 'rounded-tr-md', 'text-surface-700 dark:text-white/80', 'bg-amber-50 dark:bg-surface-800', 'border-surface-300 dark:border-surface-700']
                },
            }"
        />
    </div>
</template>
