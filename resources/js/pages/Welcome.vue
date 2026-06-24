<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

defineProps<{
    latestEvents: Array<{
        title: string;
        slug: string;
        short_description: string;
        location: string;
        start_date: string;
    }>;
}>();
</script>

<template>
    <Head title="UMV 2001 O/L Alumni Association" />

    <section class="bg-white">
        <div
            class="mx-auto grid max-w-7xl gap-10 px-4 py-16 sm:px-6 sm:py-20 lg:grid-cols-[1.15fr_0.85fr] lg:px-8"
        >
            <div>
                <p
                    class="inline-flex rounded-full bg-emerald-50 px-3 py-1 text-sm font-medium text-emerald-700"
                >
                    UMV 2001 O/L Alumni Association
                </p>
                <h1
                    class="mt-6 text-4xl font-bold tracking-tight text-slate-900 sm:text-6xl"
                >
                    Welfare society of Alumni of Udadumbara Maha Vidyalaya
                </h1>
                <p class="mt-6 text-lg leading-8 text-slate-600">
                    We maintain lifelong friendships while supporting education,
                    welfare, and social awareness programs in the Udadumbara
                    community.
                </p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <Link
                        href="/events"
                        class="rounded-full bg-emerald-700 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-emerald-800"
                    >
                        View Events
                    </Link>
                    <Link
                        href="/contact"
                        class="rounded-full border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50"
                    >
                        Contact Us
                    </Link>
                </div>
            </div>
            <div
                class="rounded-2xl border border-slate-200 bg-slate-50 p-6 shadow-sm"
            >
                <p class="text-sm font-medium text-emerald-700">
                    Community focus
                </p>
                <h2
                    class="mt-3 text-2xl font-semibold tracking-tight text-slate-900"
                >
                    Friendship, welfare, and social responsibility.
                </h2>
                <div class="mt-6 grid gap-4">
                    <div class="rounded-xl bg-white p-4 shadow-sm">
                        <p class="font-medium text-slate-900">
                            Anti-drug awareness
                        </p>
                        <p class="mt-1 text-sm text-slate-600">
                            Programs for students and young people in the area.
                        </p>
                    </div>
                    <div class="rounded-xl bg-white p-4 shadow-sm">
                        <p class="font-medium text-slate-900">School support</p>
                        <p class="mt-1 text-sm text-slate-600">
                            Educational and welfare initiatives for local
                            schools.
                        </p>
                    </div>
                    <div class="rounded-xl bg-white p-4 shadow-sm">
                        <p class="font-medium text-slate-900">Member welfare</p>
                        <p class="mt-1 text-sm text-slate-600">
                            A private member area for profiles and payment
                            records.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-slate-50 py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <h2
                    class="text-2xl font-semibold tracking-tight text-slate-900 md:text-3xl"
                >
                    About the association
                </h2>
                <p class="mt-4 text-base leading-7 text-slate-600">
                    UMV 2001 O/L Alumni Association brings together former
                    students who completed their Ordinary Level examination in
                    2001 at Udadumbara Maha Vidyalaya, now Udadumbara Secondary
                    School.
                </p>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-end justify-between gap-6">
                <div>
                    <h2
                        class="text-2xl font-semibold tracking-tight text-slate-900 md:text-3xl"
                    >
                        Latest events
                    </h2>
                    <p class="mt-3 text-sm text-slate-500">
                        Recent and upcoming public association activities.
                    </p>
                </div>
                <Link
                    href="/events"
                    class="text-sm font-semibold text-emerald-700 hover:text-emerald-800"
                    >View all</Link
                >
            </div>
            <div
                v-if="latestEvents.length"
                class="mt-8 grid gap-6 md:grid-cols-3"
            >
                <article
                    v-for="event in latestEvents"
                    :key="event.slug"
                    class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm"
                >
                    <p class="text-sm text-slate-500">
                        {{ event.start_date }} · {{ event.location }}
                    </p>
                    <h3 class="mt-3 text-lg font-semibold text-slate-900">
                        {{ event.title }}
                    </h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        {{ event.short_description }}
                    </p>
                    <Link
                        :href="`/events/${event.slug}`"
                        class="mt-4 inline-flex text-sm font-semibold text-emerald-700"
                        >View details</Link
                    >
                </article>
            </div>
            <div
                v-else
                class="mt-8 rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-8 text-center"
            >
                <p class="font-medium text-slate-900">No events found</p>
                <p class="mt-2 text-sm text-slate-500">
                    There are no published events at the moment. Please check
                    again later.
                </p>
            </div>
        </div>
    </section>
</template>
