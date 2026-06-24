<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

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
    <div>
        <h1
            class="text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50"
        >
            My Payments
        </h1>
        <div
            class="mt-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900"
        >
            <table
                class="min-w-full divide-y divide-slate-200 dark:divide-slate-800"
            >
                <thead class="bg-slate-50 dark:bg-slate-950">
                    <tr>
                        <th
                            class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-slate-500 uppercase dark:text-slate-400"
                        >
                            Period
                        </th>
                        <th
                            class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-slate-500 uppercase dark:text-slate-400"
                        >
                            Amount
                        </th>
                        <th
                            class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-slate-500 uppercase dark:text-slate-400"
                        >
                            Paid date
                        </th>
                        <th
                            class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-slate-500 uppercase dark:text-slate-400"
                        >
                            Method
                        </th>
                        <th
                            class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-slate-500 uppercase dark:text-slate-400"
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
                        <td
                            class="px-4 py-4 text-sm text-slate-700 dark:text-slate-300"
                        >
                            {{ payment.month }}/{{ payment.year }}
                        </td>
                        <td
                            class="px-4 py-4 text-sm text-slate-700 dark:text-slate-300"
                        >
                            {{ payment.amount }}
                        </td>
                        <td
                            class="px-4 py-4 text-sm text-slate-700 dark:text-slate-300"
                        >
                            {{ payment.paid_at }}
                        </td>
                        <td
                            class="px-4 py-4 text-sm text-slate-700 dark:text-slate-300"
                        >
                            {{ payment.payment_method }}
                        </td>
                        <td
                            class="px-4 py-4 text-sm text-slate-700 dark:text-slate-300"
                        >
                            {{ payment.reference || '-' }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
