<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { login } from '@/routes';
</script>

<template>
    <div class="min-h-screen bg-white text-slate-900">
        <header class="sticky top-0 z-30 border-b border-slate-200 bg-white/90 backdrop-blur">
            <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-4 py-4 sm:px-6 lg:px-8">
                <Link href="/" class="text-sm font-bold text-slate-900 sm:text-base">
                    UMV 2001 O/L Alumni Association
                </Link>
                <nav class="hidden items-center gap-8 md:flex">
                    <Link href="/" class="text-sm font-medium text-slate-600 hover:text-emerald-700">Home</Link>
                    <Link href="/about" class="text-sm font-medium text-slate-600 hover:text-emerald-700">About</Link>
                    <Link href="/events" class="text-sm font-medium text-slate-600 hover:text-emerald-700">Events</Link>
                    <Link href="/contact" class="text-sm font-medium text-slate-600 hover:text-emerald-700">Contact</Link>
                </nav>
                <Link
                    v-if="$page.props.auth.user"
                    href="/member/dashboard"
                    class="rounded-xl bg-emerald-700 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-800"
                >
                    Member Area
                </Link>
                <Link
                    v-else
                    :href="login()"
                    class="rounded-xl border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50"
                >
                    Login
                </Link>
            </div>
        </header>

        <main>
            <slot />
        </main>

        <footer class="border-t border-slate-200 bg-slate-50">
            <div class="mx-auto grid max-w-7xl gap-8 px-4 py-10 sm:px-6 md:grid-cols-3 lg:px-8">
                <div>
                    <p class="font-semibold text-slate-900">UMV 2001 O/L Alumni Association</p>
                    <p class="mt-3 text-sm leading-6 text-slate-600">
                        A community-focused welfare society of alumni of Udadumbara Maha Vidyalaya.
                    </p>
                </div>
                <div class="flex flex-col gap-2 text-sm">
                    <Link href="/about" class="text-slate-600 hover:text-emerald-700">About</Link>
                    <Link href="/events" class="text-slate-600 hover:text-emerald-700">Events</Link>
                    <Link href="/contact" class="text-slate-600 hover:text-emerald-700">Contact</Link>
                </div>
                <div class="flex flex-col gap-2 text-sm">
                    <Link href="/terms-of-use" class="text-slate-600 hover:text-emerald-700">Terms of Use</Link>
                    <Link href="/privacy-policy" class="text-slate-600 hover:text-emerald-700">Privacy Policy</Link>
                    <Link href="/cookie-policy" class="text-slate-600 hover:text-emerald-700">Cookie Policy</Link>
                </div>
            </div>
        </footer>
    </div>
</template>
