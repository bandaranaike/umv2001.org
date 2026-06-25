<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

defineProps<{
    metrics: Record<string, number | string>;
}>();
</script>

<template>
    <Head title="Admin Dashboard" />
    <div class="space-y-8">
        <div
            class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 dark:border-slate-800 dark:bg-slate-900"
        >
            <p class="text-sm font-medium text-brand-700 dark:text-brand-400">
                Admin Area
            </p>
            <h1
                class="mt-2 text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50"
            >
                Admin Dashboard
            </h1>
            <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600 dark:text-slate-400">
                Overview of the association register, events, payments, and
                contact activity.
            </p>
        </div>
        <div class="grid gap-4 md:grid-cols-3">
            <div
                v-for="(value, key) in metrics"
                :key="key"
                class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 dark:border-slate-800 dark:bg-slate-900"
            >
                <p
                    class="text-sm text-slate-500 capitalize dark:text-slate-400"
                >
                    {{ String(key).replaceAll('_', ' ') }}
                </p>
                <p
                    class="mt-2 text-2xl font-semibold text-slate-900 dark:text-slate-100"
                >
                    {{ value }}
                </p>
            </div>
        </div>
    </div>
</template>
