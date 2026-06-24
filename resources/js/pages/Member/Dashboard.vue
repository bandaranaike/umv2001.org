<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

defineProps<{
    summary: {
        name: string;
        membership_number: string | null;
        profile_completion: number;
        latest_payment_status: string;
    };
    events: Array<{ title: string; slug: string; location: string; start_date: string }>;
}>();
</script>

<template>
    <Head title="Member Dashboard" />
    <div class="space-y-8">
        <div>
            <p class="text-sm font-medium text-emerald-700">Member Area</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Welcome, {{ summary.name }}</h1>
        </div>
        <div class="grid gap-4 md:grid-cols-3">
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm text-slate-500">Membership number</p>
                <p class="mt-2 text-xl font-semibold text-slate-900">{{ summary.membership_number || 'Not assigned' }}</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm text-slate-500">Profile completion</p>
                <p class="mt-2 text-xl font-semibold text-slate-900">{{ summary.profile_completion }}%</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm text-slate-500">Current month payment</p>
                <p class="mt-2 text-xl font-semibold text-slate-900">{{ summary.latest_payment_status }}</p>
            </div>
        </div>
        <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between gap-4">
                <h2 class="text-lg font-semibold text-slate-900">Latest events</h2>
                <Link href="/events" class="text-sm font-semibold text-emerald-700">View all</Link>
            </div>
            <div class="mt-4 grid gap-4 md:grid-cols-3">
                <Link v-for="event in events" :key="event.slug" :href="`/events/${event.slug}`" class="rounded-xl border border-slate-200 p-4 hover:bg-slate-50">
                    <p class="text-sm text-slate-500">{{ event.start_date }} · {{ event.location }}</p>
                    <p class="mt-2 font-medium text-slate-900">{{ event.title }}</p>
                </Link>
            </div>
        </section>
    </div>
</template>
