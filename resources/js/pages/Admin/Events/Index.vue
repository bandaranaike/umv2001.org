<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { formatDate } from '@/lib/utils';

defineProps<{
    events: {
        data: Array<{
            id: number;
            title: string;
            slug: string;
            location: string;
            start_date: string;
            is_published: boolean;
        }>;
    };
}>();
</script>

<template>
    <Head title="Events" />
    <div class="space-y-6">
        <div
            class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 dark:border-slate-800 dark:bg-slate-900"
        >
            <div class="flex items-center justify-between gap-4">
                <div>
                    <p class="text-sm font-medium text-brand-700 dark:text-brand-400">
                        Admin Area
                    </p>
                    <h1
                        class="mt-2 text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50"
                    >
                        Events
                    </h1>
                </div>
                <Link
                    href="/admin/events/create"
                    class="rounded-lg bg-brand-700 px-5 py-3 text-sm font-semibold text-white shadow-sm transition-colors hover:bg-brand-800 dark:bg-brand-600 dark:hover:bg-brand-700"
                >
                    Create Event
                </Link>
            </div>
        </div>
        <div
            class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 dark:border-slate-800 dark:bg-slate-900"
        >
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-800">
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                        <tr
                            v-for="event in events.data"
                            :key="event.id"
                            class="transition-colors hover:bg-slate-50/50 dark:hover:bg-slate-800/30"
                        >
                            <td class="px-5 py-4">
                                <p class="font-medium text-slate-900 dark:text-slate-100">
                                    {{ event.title }}
                                </p>
                                <p class="text-sm text-slate-500 dark:text-slate-400">
                                    {{ event.slug }}
                                </p>
                            </td>
                            <td class="px-5 py-4 text-sm text-slate-700 dark:text-slate-300">
                                {{ formatDate(event.start_date) }} · {{ event.location }}
                            </td>
                            <td class="px-5 py-4 text-sm">
                                <span
                                    :class="
                                        event.is_published
                                            ? 'bg-brand-50 text-brand-700 ring-brand-200 dark:bg-brand-950/30 dark:text-brand-400 dark:ring-brand-800/30'
                                            : 'bg-slate-100 text-slate-600 ring-slate-200 dark:bg-slate-800 dark:text-slate-400 dark:ring-slate-700'
                                    "
                                    class="inline-flex rounded-lg px-2.5 py-1 text-xs font-medium ring-1 ring-inset"
                                >
                                    {{ event.is_published ? 'Published' : 'Draft' }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-right text-sm">
                                <Link
                                    :href="`/admin/events/${event.id}/edit`"
                                    class="font-semibold text-brand-700 hover:text-brand-800 dark:text-brand-400 dark:hover:text-brand-300"
                                >
                                    Edit
                                </Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
