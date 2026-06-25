<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { formatDate } from '@/lib/utils';

defineProps<{
    summary: {
        name: string;
        membership_number: string | null;
        profile_completion: number;
        latest_payment_status: string;
    };
    events: Array<{
        title: string;
        slug: string;
        location: string;
        start_date: string;
    }>;
}>();
</script>

<template>
    <Head title="Member Dashboard" />
    <div class="space-y-8">
        <div
            class="rounded-3xl border border-brand-100 bg-gradient-to-br from-brand-50 via-white to-slate-50 p-6 shadow-sm dark:border-brand-950/40 dark:from-brand-950/20 dark:via-slate-900 dark:to-slate-900"
        >
            <p class="text-sm font-medium text-brand-700 dark:text-brand-400">
                Member Area
            </p>
            <h1
                class="mt-2 text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50"
            >
                Welcome, {{ summary.name }}
            </h1>
            <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600 dark:text-slate-400">
                Keep your profile current, review your payment history, and
                stay up to date with recent association activities.
            </p>
        </div>
        <div class="grid gap-4 md:grid-cols-3">
            <div
                class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 dark:border-slate-800 dark:bg-slate-900"
            >
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Membership number
                </p>
                <p
                    class="mt-2 text-xl font-semibold text-slate-900 dark:text-slate-100"
                >
                    {{ summary.membership_number || 'Not assigned' }}
                </p>
            </div>
            <div
                class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 dark:border-slate-800 dark:bg-slate-900"
            >
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Profile completion
                </p>
                <p
                    class="mt-2 text-xl font-semibold text-slate-900 dark:text-slate-100"
                >
                    {{ summary.profile_completion }}%
                </p>
            </div>
            <div
                class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 dark:border-slate-800 dark:bg-slate-900"
            >
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Current month payment
                </p>
                <p
                    class="mt-2 text-xl font-semibold text-slate-900 dark:text-slate-100"
                >
                    {{ summary.latest_payment_status }}
                </p>
            </div>
        </div>
        <section
            class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 dark:border-slate-800 dark:bg-slate-900"
        >
            <div class="flex items-center justify-between gap-4">
                <h2
                    class="text-lg font-semibold text-slate-900 dark:text-slate-50"
                >
                    Latest events
                </h2>
                <Link
                    href="/events"
                    class="text-sm font-semibold text-brand-700 dark:text-brand-400"
                    >View all</Link
                >
            </div>
            <div class="mt-4 grid gap-4 md:grid-cols-3">
                <Link
                    v-for="event in events"
                    :key="event.slug"
                    :href="`/events/${event.slug}`"
                    class="rounded-xl border border-slate-200 p-4 transition-colors hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800/50"
                >
                    <p class="text-sm text-slate-500 dark:text-slate-400">
                        {{ formatDate(event.start_date) }} · {{ event.location }}
                    </p>
                    <p
                        class="mt-2 font-medium text-slate-900 dark:text-slate-100"
                    >
                        {{ event.title }}
                    </p>
                </Link>
            </div>
        </section>
    </div>
</template>
