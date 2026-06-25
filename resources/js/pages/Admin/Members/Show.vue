<script setup lang="ts">
import { Form, Head, Link } from '@inertiajs/vue3';
import { formatDate } from '@/lib/utils';

defineProps<{
    member: {
        id: number;
        name: string;
        email: string;
        membership_number: string | null;
        phone: string | null;
        address: string | null;
        is_active: boolean;
        family_members: Array<{
            id: number;
            relationship: string;
            name: string;
            phone: string | null;
        }>;
        payments: Array<{
            id: number;
            month: number;
            year: number;
            amount: string;
            paid_at: string;
            payment_method: string;
            reference: string | null;
        }>;
    };
}>();
</script>

<template>
    <Head :title="member.name" />
    <div class="space-y-8">
        <div
            class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 dark:border-slate-800 dark:bg-slate-900"
        >
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="text-sm font-medium text-brand-700 dark:text-brand-400">
                        Admin Area
                    </p>
                    <h1
                        class="mt-2 text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50"
                    >
                        {{ member.name }}
                    </h1>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                        {{ member.email }} ·
                        {{ member.membership_number || 'No membership number' }}
                    </p>
                </div>
                <div class="flex gap-3">
                    <Link
                        :href="`/admin/members/${member.id}/edit`"
                        class="rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 transition-colors hover:bg-slate-50 dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-800"
                        >Edit</Link
                    >
                    <Form
                        :action="`/admin/members/${member.id}/reset-password`"
                        method="post"
                    >
                        <button
                            class="rounded-lg bg-amber-600 px-4 py-2.5 text-sm font-semibold text-white transition-colors hover:bg-amber-700 dark:bg-amber-700 dark:hover:bg-amber-800"
                        >
                            Reset Password
                        </button>
                    </Form>
                </div>
            </div>
        </div>
        <section
            class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 dark:border-slate-800 dark:bg-slate-900"
        >
            <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-50">
                Private family details
            </h2>
            <div class="mt-4 grid gap-3 md:grid-cols-2">
                <div
                    v-for="familyMember in member.family_members"
                    :key="familyMember.id"
                    class="rounded-lg border border-slate-200 bg-slate-50/70 p-4 dark:border-slate-800 dark:bg-slate-950/20"
                >
                    <p class="font-medium text-slate-900 dark:text-slate-100">
                        {{ familyMember.name }}
                    </p>
                    <p class="text-sm text-slate-500 dark:text-slate-400">
                        {{ familyMember.relationship }} ·
                        {{ familyMember.phone || '-' }}
                    </p>
                </div>
            </div>
        </section>
        <section
            class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 dark:border-slate-800 dark:bg-slate-900"
        >
            <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-50">
                Payment history
            </h2>
            <div class="mt-4 grid gap-3">
                <div
                    v-for="payment in member.payments"
                    :key="payment.id"
                    class="rounded-lg border border-slate-200 bg-slate-50/70 p-4 text-sm text-slate-700 dark:border-slate-800 dark:bg-slate-950/20 dark:text-slate-300"
                >
                    {{ payment.month }}/{{ payment.year }} ·
                    {{ payment.amount }} · {{ formatDate(payment.paid_at) }} ·
                    {{ payment.payment_method }}
                </div>
            </div>
        </section>
    </div>
</template>
