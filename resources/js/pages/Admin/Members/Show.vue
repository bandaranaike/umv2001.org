<script setup lang="ts">
import { Form, Head, Link } from '@inertiajs/vue3';

defineProps<{
    member: {
        id: number;
        name: string;
        email: string;
        membership_number: string | null;
        phone: string | null;
        address: string | null;
        is_active: boolean;
        family_members: Array<{ id: number; relationship: string; name: string; phone: string | null }>;
        payments: Array<{ id: number; month: number; year: number; amount: string; paid_at: string; payment_method: string; reference: string | null }>;
    };
}>();
</script>

<template>
    <Head :title="member.name" />
    <div class="space-y-8">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-slate-900">{{ member.name }}</h1>
                <p class="mt-1 text-sm text-slate-500">{{ member.email }} · {{ member.membership_number || 'No membership number' }}</p>
            </div>
            <div class="flex gap-3">
                <Link :href="`/admin/members/${member.id}/edit`" class="rounded-xl border border-slate-300 px-4 py-2.5 text-sm font-semibold">Edit</Link>
                <Form :action="`/admin/members/${member.id}/reset-password`" method="post">
                    <button class="rounded-xl bg-amber-600 px-4 py-2.5 text-sm font-semibold text-white">Reset Password</button>
                </Form>
            </div>
        </div>
        <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-900">Private family details</h2>
            <div class="mt-4 grid gap-3 md:grid-cols-2">
                <div v-for="familyMember in member.family_members" :key="familyMember.id" class="rounded-xl border border-slate-200 p-4">
                    <p class="font-medium text-slate-900">{{ familyMember.name }}</p>
                    <p class="text-sm text-slate-500">{{ familyMember.relationship }} · {{ familyMember.phone || '-' }}</p>
                </div>
            </div>
        </section>
        <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-900">Payment history</h2>
            <div class="mt-4 grid gap-3">
                <div v-for="payment in member.payments" :key="payment.id" class="rounded-xl border border-slate-200 p-4 text-sm text-slate-700">
                    {{ payment.month }}/{{ payment.year }} · {{ payment.amount }} · {{ payment.paid_at }} · {{ payment.payment_method }}
                </div>
            </div>
        </section>
    </div>
</template>
