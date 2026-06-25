<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';

defineProps<{
    payment: {
        id: number;
        user_id: number;
        month: number;
        year: number;
        amount: string;
        paid_at: string;
        payment_method: string;
        reference: string | null;
        notes: string | null;
    };
    members: Array<{
        id: number;
        name: string;
        membership_number: string | null;
    }>;
}>();
</script>

<template>
    <Head title="Edit Payment" />
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
                Edit Payment
            </h1>
            <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600 dark:text-slate-400">
                Update the payment record if the month, amount, or reference
                needs correction.
            </p>
        </div>
        <Form
            :action="`/admin/payments/${payment.id}`"
            method="patch"
            class="grid gap-5 rounded-xl border border-slate-200 bg-white p-6 shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 md:grid-cols-2 dark:border-slate-800 dark:bg-slate-900"
            #default="{ processing }"
        >
            <select
                name="user_id"
                :value="payment.user_id"
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
                :value="payment.month"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="year"
                type="number"
                :value="payment.year"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="amount"
                type="number"
                step="0.01"
                :value="payment.amount"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="paid_at"
                type="date"
                :value="payment.paid_at"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="payment_method"
                :value="payment.payment_method"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="reference"
                :value="payment.reference"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <textarea
                name="notes"
                :value="payment.notes"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-hidden md:col-span-2 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <button
                :disabled="processing"
                class="rounded-lg bg-brand-700 px-5 py-3 text-sm font-semibold text-white shadow-sm transition-colors hover:bg-brand-800 md:col-span-2 dark:bg-brand-600 dark:hover:bg-brand-700"
            >
                Save Payment
            </button>
        </Form>
    </div>
</template>
