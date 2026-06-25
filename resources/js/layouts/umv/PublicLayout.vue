<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import AppLogo from '@/components/AppLogo.vue';
import AppearanceToggle from '@/components/AppearanceToggle.vue';
import { about, contact, home, login } from '@/routes';
import { index as eventsIndex } from '@/routes/events';
import { dashboard as adminDashboard } from '@/routes/admin';
import { dashboard as memberDashboard } from '@/routes/member';

const page = usePage();

const authenticatedAreaUrl = computed(() => {
    if (page.props.auth.user?.role === 'admin') {
        return adminDashboard().url;
    }

    return memberDashboard().url;
});

const authenticatedAreaLabel = computed(() => {
    if (page.props.auth.user?.role === 'admin') {
        return 'Admin Area';
    }

    return 'Member Area';
});
</script>

<template>
    <div
        class="relative flex min-h-screen flex-col overflow-hidden bg-white text-slate-900 transition-colors duration-300 dark:bg-slate-950 dark:text-slate-50"
    >
        <div
            class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-80 bg-[radial-gradient(circle_at_top,rgba(12,76,138,0.18),transparent_55%)] dark:bg-[radial-gradient(circle_at_top,rgba(12,76,138,0.16),transparent_55%)]"
        />
        <header
            class="sticky top-0 z-30 border-b border-slate-200/80 bg-white/85 backdrop-blur dark:border-slate-800/80 dark:bg-slate-950/85"
        >
            <div
                class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8"
            >
                <Link :href="home().url" class="shrink-0">
                    <AppLogo />
                </Link>
                <nav class="hidden items-center gap-8 md:flex">
                    <Link
                        :href="home().url"
                        class="text-sm font-medium text-slate-600 transition-colors hover:text-brand-700 dark:text-slate-400 dark:hover:text-brand-400"
                    >
                        Home
                    </Link>
                    <Link
                        :href="about().url"
                        class="text-sm font-medium text-slate-600 transition-colors hover:text-brand-700 dark:text-slate-400 dark:hover:text-brand-400"
                    >
                        About
                    </Link>
                    <Link
                        :href="eventsIndex().url"
                        class="text-sm font-medium text-slate-600 transition-colors hover:text-brand-700 dark:text-slate-400 dark:hover:text-brand-400"
                    >
                        Events
                    </Link>
                    <Link
                        :href="contact().url"
                        class="text-sm font-medium text-slate-600 transition-colors hover:text-brand-700 dark:text-slate-400 dark:hover:text-brand-400"
                    >
                        Contact
                    </Link>
                </nav>
                <div class="flex items-center gap-2">
                    <AppearanceToggle />
                    <Link
                        v-if="$page.props.auth.user"
                        :href="authenticatedAreaUrl"
                        class="rounded-lg bg-brand-700 px-4 py-2 text-sm font-semibold text-white shadow-sm transition-colors hover:bg-brand-800 dark:bg-brand-600 dark:hover:bg-brand-500"
                    >
                        {{ authenticatedAreaLabel }}
                    </Link>
                    <Link
                        v-else
                        :href="login().url"
                        class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700 transition-colors hover:border-slate-400 hover:bg-slate-50 dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-900"
                    >
                        Login
                    </Link>
                </div>
            </div>
        </header>

        <main class="relative flex-1">
            <slot />
        </main>

        <footer
            class="border-t border-slate-200/80 bg-slate-50/80 transition-colors duration-300 dark:border-slate-800/80 dark:bg-slate-900/40"
        >
            <div
                class="mx-auto grid max-w-7xl gap-10 px-4 py-12 sm:px-6 md:grid-cols-[1.3fr_0.85fr_0.85fr] lg:px-8"
            >
                <div class="space-y-4">
                    <Link :href="home().url" class="inline-flex">
                        <AppLogo />
                    </Link>
                    <p class="max-w-md text-sm leading-6 text-slate-600 dark:text-slate-400">
                        A community-focused welfare society of alumni of
                        Udadumbara Maha Vidyalaya.
                    </p>
                </div>
                <div class="flex flex-col gap-3 text-sm">
                    <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">
                        Explore
                    </p>
                    <Link
                        :href="about().url"
                        class="text-slate-600 transition-colors hover:text-brand-700 dark:text-slate-400 dark:hover:text-brand-400"
                    >
                        About
                    </Link>
                    <Link
                        :href="eventsIndex().url"
                        class="text-slate-600 transition-colors hover:text-brand-700 dark:text-slate-400 dark:hover:text-brand-400"
                    >
                        Events
                    </Link>
                    <Link
                        :href="contact().url"
                        class="text-slate-600 transition-colors hover:text-brand-700 dark:text-slate-400 dark:hover:text-brand-400"
                    >
                        Contact
                    </Link>
                </div>
                <div class="flex flex-col gap-3 text-sm">
                    <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">
                        Policies
                    </p>
                    <Link
                        href="/terms-of-use"
                        class="text-slate-600 transition-colors hover:text-brand-700 dark:text-slate-400 dark:hover:text-brand-400"
                    >
                        Terms of Use
                    </Link>
                    <Link
                        href="/privacy-policy"
                        class="text-slate-600 transition-colors hover:text-brand-700 dark:text-slate-400 dark:hover:text-brand-400"
                    >
                        Privacy Policy
                    </Link>
                    <Link
                        href="/cookie-policy"
                        class="text-slate-600 transition-colors hover:text-brand-700 dark:text-slate-400 dark:hover:text-brand-400"
                    >
                        Cookie Policy
                    </Link>
                </div>
            </div>
        </footer>
    </div>
</template>
