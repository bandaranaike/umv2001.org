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
    <div class="max-w-3xl">
        <h1
            class="text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50"
        >
            Edit Payment
        </h1>
        <Form
            :action="`/admin/payments/${payment.id}`"
            method="patch"
            class="mt-8 grid gap-5 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:grid-cols-2 dark:border-slate-800 dark:bg-slate-900"
            #default="{ processing }"
        >
            <select
                name="user_id"
                :value="payment.user_id"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden md:col-span-2 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
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
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="year"
                type="number"
                :value="payment.year"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="amount"
                type="number"
                step="0.01"
                :value="payment.amount"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="paid_at"
                type="date"
                :value="payment.paid_at"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="payment_method"
                :value="payment.payment_method"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <input
                name="reference"
                :value="payment.reference"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <textarea
                name="notes"
                :value="payment.notes"
                class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden md:col-span-2 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
            />
            <button
                :disabled="processing"
                class="rounded-xl bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white transition-colors hover:bg-emerald-800 md:col-span-2 dark:bg-emerald-600 dark:hover:bg-emerald-700"
            >
                Save Payment
            </button>
        </Form>
    </div>
</template>
