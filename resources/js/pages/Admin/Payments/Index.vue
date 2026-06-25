<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { formatDate } from '@/lib/utils';

defineProps<{
    payments: { data: Array<{ id: number; member_name: string; month: number; year: number; amount: string; paid_at: string; payment_method: string }> };
}>();
</script>

<template>
    <Head title="Payments" />
    <div class="space-y-6">
        <div
            class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 dark:border-slate-800 dark:bg-slate-900"
        >
            <div class="flex items-center justify-between gap-4">
                <div>
                    <p class="text-sm font-medium text-brand-700 dark:text-brand-400">
                        Admin Area
                    </p>
                    <h1
                        class="mt-2 text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50"
                    >
                        Payments
                    </h1>
                </div>
                <Link
                    href="/admin/payments/create"
                    class="rounded-lg bg-brand-700 px-5 py-3 text-sm font-semibold text-white shadow-sm transition-colors hover:bg-brand-800 dark:bg-brand-600 dark:hover:bg-brand-700"
                >
                    Record Payment
                </Link>
            </div>
        </div>
        <div
            class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 dark:border-slate-800 dark:bg-slate-900"
        >
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-800">
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                        <tr
                            v-for="payment in payments.data"
                            :key="payment.id"
                            class="transition-colors hover:bg-slate-50/50 dark:hover:bg-slate-800/30"
                        >
                            <td class="px-5 py-4 text-sm text-slate-700 dark:text-slate-300">
                                {{ payment.member_name }}
                            </td>
                            <td class="px-5 py-4 text-sm text-slate-700 dark:text-slate-300">
                                {{ payment.month }}/{{ payment.year }}
                            </td>
                            <td class="px-5 py-4 text-sm text-slate-700 dark:text-slate-300">
                                {{ payment.amount }}
                            </td>
                            <td class="px-5 py-4 text-sm text-slate-700 dark:text-slate-300">
                                {{ formatDate(payment.paid_at) }}
                            </td>
                            <td class="px-5 py-4 text-right text-sm">
                                <Link
                                    :href="`/admin/payments/${payment.id}/edit`"
                                    class="font-semibold text-brand-700 hover:text-brand-800 dark:text-brand-400 dark:hover:text-brand-300"
                                >
                                    Edit
                                </Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
