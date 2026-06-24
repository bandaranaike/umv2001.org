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
        <h1 class="text-3xl font-bold tracking-tight text-slate-900">My Payments</h1>
        <div class="mt-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-slate-500 uppercase">Period</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-slate-500 uppercase">Amount</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-slate-500 uppercase">Paid date</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-slate-500 uppercase">Method</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-slate-500 uppercase">Reference</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    <tr v-for="payment in payments.data" :key="payment.id">
                        <td class="px-4 py-4 text-sm text-slate-700">{{ payment.month }}/{{ payment.year }}</td>
                        <td class="px-4 py-4 text-sm text-slate-700">{{ payment.amount }}</td>
                        <td class="px-4 py-4 text-sm text-slate-700">{{ payment.paid_at }}</td>
                        <td class="px-4 py-4 text-sm text-slate-700">{{ payment.payment_method }}</td>
                        <td class="px-4 py-4 text-sm text-slate-700">{{ payment.reference || '-' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
