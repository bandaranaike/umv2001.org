<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { formatDate } from '@/lib/utils';

defineProps<{
    payments: {
        data: Array<{
            id: number;
            month: number;
            year: number;
            amount: string;
            paid_at: string;
            payment_method: string;
            reference: string | null;
            notes: string | null;
        }>;
    };
}>();
</script>

<template>
    <Head title="My Payments" />
    <div class="space-y-6">
        <div
            class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 dark:border-slate-800 dark:bg-slate-900"
        >
            <p class="text-sm font-medium text-brand-700 dark:text-brand-400">
                Member Area
            </p>
            <h1
                class="mt-2 text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50"
            >
                My Payments
            </h1>
            <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600 dark:text-slate-400">
                Review your own membership payment history and keep track of
                each recorded contribution.
            </p>
        </div>
        <div
            class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 dark:border-slate-800 dark:bg-slate-900"
        >
            <div class="overflow-x-auto">
                <table
                    class="min-w-full divide-y divide-slate-200 dark:divide-slate-800"
                >
                    <thead class="bg-slate-50/80 dark:bg-slate-950/60">
                        <tr>
                            <th
                                class="px-5 py-3 text-left text-xs font-semibold tracking-wide text-slate-500 uppercase dark:text-slate-400"
                            >
                                Period
                            </th>
                            <th
                                class="px-5 py-3 text-left text-xs font-semibold tracking-wide text-slate-500 uppercase dark:text-slate-400"
                            >
                                Amount
                            </th>
                            <th
                                class="px-5 py-3 text-left text-xs font-semibold tracking-wide text-slate-500 uppercase dark:text-slate-400"
                            >
                                Paid date
                            </th>
                            <th
                                class="px-5 py-3 text-left text-xs font-semibold tracking-wide text-slate-500 uppercase dark:text-slate-400"
                            >
                                Method
                            </th>
                            <th
                                class="px-5 py-3 text-left text-xs font-semibold tracking-wide text-slate-500 uppercase dark:text-slate-400"
                            >
                                Reference
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                        <tr
                            v-for="payment in payments.data"
                            :key="payment.id"
                            class="transition-colors hover:bg-slate-50/50 dark:hover:bg-slate-800/30"
                        >
                            <td class="px-5 py-4 text-sm text-slate-700 dark:text-slate-300">
                                {{ payment.month }}/{{ payment.year }}
                            </td>
                            <td class="px-5 py-4 text-sm text-slate-700 dark:text-slate-300">
                                {{ payment.amount }}
                            </td>
                            <td class="px-5 py-4 text-sm text-slate-700 dark:text-slate-300">
                                {{ formatDate(payment.paid_at) }}
                            </td>
                            <td class="px-5 py-4 text-sm text-slate-700 dark:text-slate-300">
                                {{ payment.payment_method }}
                            </td>
                            <td class="px-5 py-4 text-sm text-slate-700 dark:text-slate-300">
                                {{ payment.reference || '-' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
