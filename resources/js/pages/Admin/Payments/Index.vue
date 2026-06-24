<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

defineProps<{
    payments: { data: Array<{ id: number; member_name: string; month: number; year: number; amount: string; paid_at: string; payment_method: string }> };
}>();
</script>

<template>
    <Head title="Payments" />
    <div class="mx-auto w-full max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-4">
            <h1 class="text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50">Payments</h1>
            <Link href="/admin/payments/create" class="rounded-xl bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white hover:bg-emerald-800 transition-colors">Record Payment</Link>
        </div>
        <div class="mt-8 overflow-hidden rounded-2xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 shadow-sm">
            <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-800">
                <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                    <tr v-for="payment in payments.data" :key="payment.id" class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="px-4 py-4 text-sm text-slate-700 dark:text-slate-300">{{ payment.member_name }}</td>
                        <td class="px-4 py-4 text-sm text-slate-700 dark:text-slate-300">{{ payment.month }}/{{ payment.year }}</td>
                        <td class="px-4 py-4 text-sm text-slate-700 dark:text-slate-300">{{ payment.amount }}</td>
                        <td class="px-4 py-4 text-sm text-slate-700 dark:text-slate-300">{{ payment.paid_at }}</td>
                        <td class="px-4 py-4 text-right text-sm"><Link :href="`/admin/payments/${payment.id}/edit`" class="font-semibold text-emerald-700 dark:text-emerald-400 hover:text-emerald-800 dark:hover:text-emerald-300">Edit</Link></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
