<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { formatDate } from '@/lib/utils';

defineProps<{
    events: {
        data: Array<{
            title: string;
            slug: string;
            short_description: string;
            location: string;
            start_date: string;
            cover_url: string | null;
        }>;
    };
}>();
</script>

<template>
    <Head title="Events" />
    <section class="bg-white dark:bg-slate-950 py-16 sm:py-20 transition-colors duration-300">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50 md:text-4xl">Events</h1>
            <p class="mt-4 max-w-3xl text-base leading-7 text-slate-600 dark:text-slate-400">Published association events and community activities.</p>

            <div v-if="events.data.length" class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <article v-for="event in events.data" :key="event.slug" class="overflow-hidden rounded-2xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                    <img v-if="event.cover_url" :src="event.cover_url" :alt="event.title" class="aspect-[16/9] w-full object-cover" />
                    <div v-else class="aspect-[16/9] bg-brand-50 dark:bg-brand-950/20" />
                    <div class="p-5">
                        <p class="text-sm text-slate-500 dark:text-slate-400">
                            {{ formatDate(event.start_date) }} · {{ event.location }}
                        </p>
                        <h2 class="mt-2 text-lg font-semibold text-slate-900 dark:text-slate-50">{{ event.title }}</h2>
                        <p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-400">{{ event.short_description }}</p>
                        <Link :href="`/events/${event.slug}`" class="mt-4 inline-flex text-sm font-semibold text-brand-700 dark:text-brand-400">View details</Link>
                    </div>
                </article>
            </div>
            <div v-else class="mt-10 rounded-2xl border border-dashed border-slate-300 dark:border-slate-800 bg-slate-50 dark:bg-slate-900 p-8 text-center">
                <p class="font-medium text-slate-900 dark:text-slate-50">No events found</p>
                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">There are no published events at the moment. Please check again later.</p>
            </div>
        </div>
    </section>
</template>
