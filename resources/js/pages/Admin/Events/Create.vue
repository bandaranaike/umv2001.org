<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
</script>

<template>
    <Head title="Create Event" />
    <div class="max-w-5xl space-y-6">
        <div
            class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 dark:border-slate-800 dark:bg-slate-900"
        >
            <p class="text-sm font-medium text-brand-700 dark:text-brand-400">
                Admin Area
            </p>
            <h1
                class="mt-2 text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50"
            >
                Create Event
            </h1>
            <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600 dark:text-slate-400">
                Publish a new public event and attach its details in one place.
            </p>
        </div>
        <Form
            action="/admin/events"
            method="post"
            class="grid gap-5 rounded-xl border border-slate-200 bg-white p-6 shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 md:grid-cols-2 dark:border-slate-800 dark:bg-slate-900"
            #default="{ processing, errors }"
        >
            <div class="space-y-1.5">
                <input
                    name="title"
                    placeholder="Title"
                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
                />
                <InputError :message="errors.title" />
            </div>
            <div class="space-y-1.5">
                <input
                    name="slug"
                    placeholder="Slug (optional)"
                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
                />
                <InputError :message="errors.slug" />
            </div>
            <div class="space-y-1.5 md:col-span-2">
                <input
                    name="short_description"
                    placeholder="Short description"
                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
                />
                <InputError :message="errors.short_description" />
            </div>
            <div class="space-y-1.5 md:col-span-2">
                <textarea
                    name="description"
                    rows="6"
                    placeholder="Description"
                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
                />
                <InputError :message="errors.description" />
            </div>
            <div class="space-y-1.5">
                <input
                    name="location"
                    placeholder="Location"
                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
                />
                <InputError :message="errors.location" />
            </div>
            <div class="space-y-1.5">
                <input
                    name="start_date"
                    type="date"
                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
                />
                <InputError :message="errors.start_date" />
            </div>
            <div class="space-y-1.5">
                <input
                    name="end_date"
                    type="date"
                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
                />
                <InputError :message="errors.end_date" />
            </div>
            <div class="space-y-1.5">
                <input
                    name="start_time"
                    type="time"
                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
                />
                <InputError :message="errors.start_time" />
            </div>
            <div class="space-y-1.5">
                <input
                    name="end_time"
                    type="time"
                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
                />
                <InputError :message="errors.end_time" />
            </div>
            <div class="space-y-1.5">
                <input
                    name="photos[]"
                    type="file"
                    multiple
                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 file:text-slate-900 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:file:text-slate-100"
                />
                <InputError :message="errors.photos" />
            </div>
            <label
                class="flex items-center gap-2 text-sm text-slate-700 dark:text-slate-300"
                ><input
                    type="checkbox"
                    name="is_published"
                    value="1"
                    class="rounded text-brand-600 focus:ring-brand-500 dark:border-slate-800 dark:bg-slate-950"
                />
                Publish now</label
            >
            <p
                v-if="Object.keys(errors).length"
                class="text-sm text-red-600 md:col-span-2 dark:text-red-500"
            >
                Please check the event fields.
            </p>
            <button
                :disabled="processing"
                class="rounded-lg bg-brand-700 px-5 py-3 text-sm font-semibold text-white shadow-sm transition-colors hover:bg-brand-800 md:col-span-2 dark:bg-brand-600 dark:hover:bg-brand-700"
            >
                Create Event
            </button>
        </Form>
    </div>
</template>
