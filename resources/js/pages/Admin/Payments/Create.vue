<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';

defineProps<{ members: Array<{ id: number; name: string; membership_number: string | null }> }>();
</script>

<template>
    <Head title="Record Payment" />
    <div class="max-w-3xl">
        <h1 class="text-3xl font-bold tracking-tight text-slate-900">Record Payment</h1>
        <Form action="/admin/payments" method="post" class="mt-8 grid gap-5 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:grid-cols-2" #default="{ processing, errors }">
            <select name="user_id" class="rounded-xl border border-slate-300 px-4 py-2.5 md:col-span-2">
                <option v-for="member in members" :key="member.id" :value="member.id">{{ member.name }} - {{ member.membership_number || 'No number' }}</option>
            </select>
            <input name="month" type="number" min="1" max="12" placeholder="Month" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="year" type="number" placeholder="Year" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="amount" type="number" step="0.01" placeholder="Amount" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="paid_at" type="date" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="payment_method" placeholder="Payment method" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="reference" placeholder="Reference" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <textarea name="notes" placeholder="Notes" class="rounded-xl border border-slate-300 px-4 py-2.5 md:col-span-2" />
            <p v-if="errors.user_id_month_year" class="text-sm text-red-600 md:col-span-2">{{ errors.user_id_month_year }}</p>
            <button :disabled="processing" class="rounded-xl bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white md:col-span-2">Record Payment</button>
        </Form>
    </div>
</template>
