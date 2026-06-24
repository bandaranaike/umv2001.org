<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';

defineProps<{
    event: {
        id: number;
        title: string;
        slug: string;
        short_description: string;
        description: string;
        location: string;
        start_date: string;
        end_date: string | null;
        start_time: string | null;
        end_time: string | null;
        is_published: boolean;
        photos: Array<{
            id: number;
            url: string;
            caption: string | null;
            sort_order: number;
        }>;
    };
}>();
</script>

<template>
    <Head title="Edit Event" />
    <div class="max-w-4xl space-y-8">
        <h1
            class="text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50"
        >
            Edit Event
        </h1>
        <Form
            :action="`/admin/events/${event.id}`"
            method="patch"
            class="grid gap-5 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:grid-cols-2 dark:border-slate-800 dark:bg-slate-900"
            #default="{ processing }"
        >
            <input
                name="title"
                :value="event.title"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="slug"
                :value="event.slug"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="short_description"
                :value="event.short_description"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden md:col-span-2 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <textarea
                name="description"
                rows="6"
                :value="event.description"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden md:col-span-2 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="location"
                :value="event.location"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="start_date"
                type="date"
                :value="event.start_date"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="end_date"
                type="date"
                :value="event.end_date"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="start_time"
                type="time"
                :value="event.start_time"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="end_time"
                type="time"
                :value="event.end_time"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="photos[]"
                type="file"
                multiple
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 file:text-slate-900 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:file:text-slate-100"
            />
            <label
                class="flex items-center gap-2 text-sm text-slate-700 dark:text-slate-300"
                ><input
                    type="checkbox"
                    name="is_published"
                    value="1"
                    :checked="event.is_published"
                    class="rounded text-emerald-600 focus:ring-emerald-500 dark:border-slate-800 dark:bg-slate-950"
                />
                Published</label
            >
            <button
                :disabled="processing"
                class="rounded-xl bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white transition-colors hover:bg-emerald-800 md:col-span-2 dark:bg-emerald-600 dark:hover:bg-emerald-700"
            >
                Save Event
            </button>
        </Form>

        <section
            class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900"
        >
            <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-50">
                Photos
            </h2>
            <div class="mt-4 grid gap-4 md:grid-cols-3">
                <figure
                    v-for="photo in event.photos"
                    :key="photo.id"
                    class="rounded-xl border border-slate-200 p-3 dark:border-slate-800"
                >
                    <img
                        :src="photo.url"
                        :alt="photo.caption || event.title"
                        class="aspect-[4/3] w-full rounded-lg object-cover"
                    />
                    <figcaption
                        class="mt-2 text-sm text-slate-500 dark:text-slate-400"
                    >
                        {{ photo.caption || 'Event photo' }}
                    </figcaption>
                    <Form
                        :action="`/admin/events/${event.id}/photos/${photo.id}`"
                        method="delete"
                        class="mt-3"
                    >
                        <button
                            class="text-sm font-semibold text-red-600 dark:text-red-500"
                        >
                            Delete photo
                        </button>
                    </Form>
                </figure>
            </div>
        </section>
    </div>
</template>
