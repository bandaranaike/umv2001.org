<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

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
    <div>
        <div class="flex items-center justify-between gap-4">
            <h1
                class="text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50"
            >
                Events
            </h1>
            <Link
                href="/admin/events/create"
                class="rounded-xl bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white transition-colors hover:bg-emerald-800 dark:bg-emerald-600 dark:hover:bg-emerald-700"
                >Create Event</Link
            >
        </div>
        <div
            class="mt-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900"
        >
            <table
                class="min-w-full divide-y divide-slate-200 dark:divide-slate-800"
            >
                <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                    <tr
                        v-for="event in events.data"
                        :key="event.id"
                        class="transition-colors hover:bg-slate-50/50 dark:hover:bg-slate-800/30"
                    >
                        <td class="px-4 py-4">
                            <p
                                class="font-medium text-slate-900 dark:text-slate-100"
                            >
                                {{ event.title }}
                            </p>
                            <p
                                class="text-sm text-slate-500 dark:text-slate-400"
                            >
                                {{ event.slug }}
                            </p>
                        </td>
                        <td
                            class="px-4 py-4 text-sm text-slate-700 dark:text-slate-300"
                        >
                            {{ event.start_date }} · {{ event.location }}
                        </td>
                        <td class="px-4 py-4 text-sm">
                            <span
                                :class="
                                    event.is_published
                                        ? 'bg-emerald-50 text-emerald-700 ring-emerald-200 dark:bg-emerald-950/30 dark:text-emerald-400 dark:ring-emerald-800/30'
                                        : 'bg-slate-100 text-slate-600 ring-slate-200 dark:bg-slate-800 dark:text-slate-400 dark:ring-slate-700'
                                "
                                class="inline-flex rounded-full px-2.5 py-1 text-xs font-medium ring-1 ring-inset"
                            >
                                {{ event.is_published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td class="px-4 py-4 text-right text-sm">
                            <Link
                                :href="`/admin/events/${event.id}/edit`"
                                class="font-semibold text-emerald-700 hover:text-emerald-800 dark:text-emerald-400 dark:hover:text-emerald-300"
                                >Edit</Link
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
