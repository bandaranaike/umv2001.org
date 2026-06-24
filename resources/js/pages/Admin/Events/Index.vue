<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

defineProps<{
    events: { data: Array<{ id: number; title: string; slug: string; location: string; start_date: string; is_published: boolean }> };
}>();
</script>

<template>
    <Head title="Events" />
    <div>
        <div class="flex items-center justify-between gap-4">
            <h1 class="text-3xl font-bold tracking-tight text-slate-900">Events</h1>
            <Link href="/admin/events/create" class="rounded-xl bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white">Create Event</Link>
        </div>
        <div class="mt-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <table class="min-w-full divide-y divide-slate-200">
                <tbody class="divide-y divide-slate-200">
                    <tr v-for="event in events.data" :key="event.id">
                        <td class="px-4 py-4">
                            <p class="font-medium text-slate-900">{{ event.title }}</p>
                            <p class="text-sm text-slate-500">{{ event.slug }}</p>
                        </td>
                        <td class="px-4 py-4 text-sm text-slate-700">{{ event.start_date }} · {{ event.location }}</td>
                        <td class="px-4 py-4 text-sm">
                            <span :class="event.is_published ? 'bg-emerald-50 text-emerald-700 ring-emerald-200' : 'bg-slate-100 text-slate-600 ring-slate-200'" class="inline-flex rounded-full px-2.5 py-1 text-xs font-medium ring-1 ring-inset">
                                {{ event.is_published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td class="px-4 py-4 text-right text-sm"><Link :href="`/admin/events/${event.id}/edit`" class="font-semibold text-emerald-700">Edit</Link></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
