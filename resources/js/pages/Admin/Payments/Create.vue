<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';

defineProps<{
    members: Array<{
        id: number;
        name: string;
        membership_number: string | null;
    }>;
}>();
</script>

<template>
    <Head title="Record Payment" />
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
                Record Payment
            </h1>
            <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600 dark:text-slate-400">
                Add a membership payment record for a member and keep the
                ledger current.
            </p>
        </div>
        <Form
            action="/admin/payments"
            method="post"
            class="grid gap-5 rounded-xl border border-slate-200 bg-white p-6 shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 md:grid-cols-2 dark:border-slate-800 dark:bg-slate-900"
            #default="{ processing, errors }"
        >
            <select
                name="user_id"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden md:col-span-2 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            >
                <option
                    v-for="member in members"
                    :key="member.id"
                    :value="member.id"
                    class="dark:bg-slate-950 dark:text-slate-100"
                >
                    {{ member.name }} -
                    {{ member.membership_number || 'No number' }}
                </option>
            </select>
            <input
                name="month"
                type="number"
                min="1"
                max="12"
                placeholder="Month"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
            />
            <input
                name="year"
                type="number"
                placeholder="Year"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
            />
            <input
                name="amount"
                type="number"
                step="0.01"
                placeholder="Amount"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
            />
            <input
                name="paid_at"
                type="date"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="payment_method"
                placeholder="Payment method"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
            />
            <input
                name="reference"
                placeholder="Reference"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
            />
            <textarea
                name="notes"
                placeholder="Notes"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden md:col-span-2 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
            />
            <p
                v-if="errors.user_id_month_year"
                class="text-sm text-red-600 md:col-span-2 dark:text-red-500"
            >
                {{ errors.user_id_month_year }}
            </p>
            <button
                :disabled="processing"
                class="rounded-lg bg-brand-700 px-5 py-3 text-sm font-semibold text-white shadow-sm transition-colors hover:bg-brand-800 md:col-span-2 dark:bg-brand-600 dark:hover:bg-brand-700"
            >
                Record Payment
            </button>
        </Form>
    </div>
</template>
