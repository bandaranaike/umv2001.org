<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

defineProps<{
    metrics: Record<string, number | string>;
}>();
</script>

<template>
    <Head title="Admin Dashboard" />
    <div>
        <h1 class="text-3xl font-bold tracking-tight text-slate-900">Admin Dashboard</h1>
        <div class="mt-8 grid gap-4 md:grid-cols-3">
            <div v-for="(value, key) in metrics" :key="key" class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm capitalize text-slate-500">{{ String(key).replaceAll('_', ' ') }}</p>
                <p class="mt-2 text-2xl font-semibold text-slate-900">{{ value }}</p>
            </div>
        </div>
    </div>
</template>
