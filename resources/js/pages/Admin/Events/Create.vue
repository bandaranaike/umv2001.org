<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Create Event" />
    <div class="max-w-4xl">
        <h1 class="text-3xl font-bold tracking-tight text-slate-900">Create Event</h1>
        <Form action="/admin/events" method="post" class="mt-8 grid gap-5 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:grid-cols-2" #default="{ processing, errors }">
            <input name="title" placeholder="Title" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="slug" placeholder="slug" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="short_description" placeholder="Short description" class="rounded-xl border border-slate-300 px-4 py-2.5 md:col-span-2" />
            <textarea name="description" rows="6" placeholder="Description" class="rounded-xl border border-slate-300 px-4 py-2.5 md:col-span-2" />
            <input name="location" placeholder="Location" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="start_date" type="date" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="end_date" type="date" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="start_time" type="time" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="end_time" type="time" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="photos[]" type="file" multiple class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <label class="flex items-center gap-2 text-sm text-slate-700"><input type="checkbox" name="is_published" value="1" /> Publish now</label>
            <p v-if="Object.keys(errors).length" class="text-sm text-red-600 md:col-span-2">Please check the event fields.</p>
            <button :disabled="processing" class="rounded-xl bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white md:col-span-2">Create Event</button>
        </Form>
    </div>
</template>
