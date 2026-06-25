<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Create Member" />
    <div class="mx-auto w-full max-w-5xl space-y-6">
        <div
            class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 dark:border-slate-800 dark:bg-slate-900"
        >
            <p class="text-sm font-medium text-brand-700 dark:text-brand-400">
                Admin Area
            </p>
            <h1
                class="mt-2 text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50"
            >
                Create Member
            </h1>
            <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600 dark:text-slate-400">
                Add a new member record with the minimum details needed for the
                association register.
            </p>
        </div>
        <Form
            action="/admin/members"
            method="post"
            class="grid gap-5 rounded-xl border border-slate-200 bg-white p-6 shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 md:grid-cols-2 dark:border-slate-800 dark:bg-slate-900"
            #default="{ errors, processing }"
        >
            <input
                name="name"
                placeholder="Name"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
            />
            <input
                name="email"
                type="email"
                placeholder="Email"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
            />
            <input
                name="password"
                type="password"
                placeholder="Password"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
            />
            <input
                name="password_confirmation"
                type="password"
                placeholder="Confirm password"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
            />
            <input
                name="membership_number"
                placeholder="Membership number"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
            />
            <input
                name="phone"
                placeholder="Phone"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
            />
            <textarea
                name="address"
                placeholder="Address"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden md:col-span-2 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
            />
            <label
                class="flex items-center gap-2 text-sm text-slate-700 dark:text-slate-300"
                ><input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    checked
                    class="rounded text-brand-600 focus:ring-brand-500 dark:border-slate-800 dark:bg-slate-950"
                />
                Active member</label
            >
            <p
                v-if="Object.keys(errors).length"
                class="text-sm text-red-600 md:col-span-2 dark:text-red-500"
            >
                Please check the form fields.
            </p>
            <button
                :disabled="processing"
                class="rounded-lg bg-brand-700 px-5 py-3 text-sm font-semibold text-white shadow-sm transition-colors hover:bg-brand-800 md:col-span-2 dark:bg-brand-600 dark:hover:bg-brand-700"
            >
                Create Member
            </button>
        </Form>
    </div>
</template>
