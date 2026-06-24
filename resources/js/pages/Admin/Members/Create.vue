<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Create Member" />
    <div class="max-w-3xl">
        <h1 class="text-3xl font-bold tracking-tight text-slate-900">Create Member</h1>
        <Form action="/admin/members" method="post" class="mt-8 grid gap-5 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:grid-cols-2" #default="{ errors, processing }">
            <input name="name" placeholder="Name" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="email" type="email" placeholder="Email" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="password" type="password" placeholder="Password" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="password_confirmation" type="password" placeholder="Confirm password" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="membership_number" placeholder="Membership number" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="phone" placeholder="Phone" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <textarea name="address" placeholder="Address" class="rounded-xl border border-slate-300 px-4 py-2.5 md:col-span-2" />
            <label class="flex items-center gap-2 text-sm text-slate-700"><input type="checkbox" name="is_active" value="1" checked /> Active member</label>
            <p v-if="Object.keys(errors).length" class="text-sm text-red-600 md:col-span-2">Please check the form fields.</p>
            <button :disabled="processing" class="rounded-xl bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white md:col-span-2">Create Member</button>
        </Form>
    </div>
</template>
