<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

defineProps<{
    payments: { data: Array<{ id: number; member_name: string; month: number; year: number; amount: string; paid_at: string; payment_method: string }> };
}>();
</script>

<template>
    <Head title="Payments" />
    <div>
        <div class="flex items-center justify-between gap-4">
            <h1 class="text-3xl font-bold tracking-tight text-slate-900">Payments</h1>
            <Link href="/admin/payments/create" class="rounded-xl bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white">Record Payment</Link>
        </div>
        <div class="mt-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <table class="min-w-full divide-y divide-slate-200">
                <tbody class="divide-y divide-slate-200">
                    <tr v-for="payment in payments.data" :key="payment.id">
                        <td class="px-4 py-4 text-sm text-slate-700">{{ payment.member_name }}</td>
                        <td class="px-4 py-4 text-sm text-slate-700">{{ payment.month }}/{{ payment.year }}</td>
                        <td class="px-4 py-4 text-sm text-slate-700">{{ payment.amount }}</td>
                        <td class="px-4 py-4 text-sm text-slate-700">{{ payment.paid_at }}</td>
                        <td class="px-4 py-4 text-right text-sm"><Link :href="`/admin/payments/${payment.id}/edit`" class="font-semibold text-emerald-700">Edit</Link></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
