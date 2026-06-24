<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Create Event" />
    <div class="max-w-4xl">
        <h1
            class="text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50"
        >
            Create Event
        </h1>
        <Form
            action="/admin/events"
            method="post"
            class="mt-8 grid gap-5 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:grid-cols-2 dark:border-slate-800 dark:bg-slate-900"
            #default="{ processing, errors }"
        >
            <input
                name="title"
                placeholder="Title"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
            />
            <input
                name="slug"
                placeholder="slug"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
            />
            <input
                name="short_description"
                placeholder="Short description"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden md:col-span-2 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
            />
            <textarea
                name="description"
                rows="6"
                placeholder="Description"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden md:col-span-2 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
            />
            <input
                name="location"
                placeholder="Location"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
            />
            <input
                name="start_date"
                type="date"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="end_date"
                type="date"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="start_time"
                type="time"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="end_time"
                type="time"
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
                    class="rounded text-emerald-600 focus:ring-emerald-500 dark:border-slate-800 dark:bg-slate-950"
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
                class="rounded-xl bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white transition-colors hover:bg-emerald-800 md:col-span-2 dark:bg-emerald-600 dark:hover:bg-emerald-700"
            >
                Create Event
            </button>
        </Form>
    </div>
</template>
