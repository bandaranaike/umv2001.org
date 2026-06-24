<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

const props = defineProps<{
    event: {
        title: string;
        description: string;
        location: string;
        start_date: string;
        end_date: string | null;
        start_time: string | null;
        end_time: string | null;
        photos: Array<{ id: number; url: string; caption: string | null }>;
    };
}>();
</script>

<template>
    <Head :title="props.event.title" />
    <section class="bg-white dark:bg-slate-950 py-16 sm:py-20 transition-colors duration-300">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <p class="text-sm font-medium text-emerald-700 dark:text-emerald-400">{{ event.start_date }} · {{ event.location }}</p>
            <h1 class="mt-3 text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50 md:text-4xl">{{ event.title }}</h1>
            <p class="mt-6 whitespace-pre-line text-base leading-7 text-slate-600 dark:text-slate-400">{{ event.description }}</p>

            <div v-if="event.photos.length" class="mt-10 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <figure v-for="photo in event.photos" :key="photo.id">
                    <img :src="photo.url" :alt="photo.caption || event.title" class="aspect-[4/3] w-full rounded-xl object-cover" />
                    <figcaption v-if="photo.caption" class="mt-2 text-sm text-slate-500 dark:text-slate-400">{{ photo.caption }}</figcaption>
                </figure>
            </div>
        </div>
    </section>
</template>
