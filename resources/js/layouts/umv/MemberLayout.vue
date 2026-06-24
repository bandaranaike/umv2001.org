<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { logout } from '@/routes';
</script>

<template>
    <div class="min-h-screen bg-slate-50 text-slate-900">
        <header class="border-b border-slate-200 bg-white">
            <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-4 py-4 sm:px-6 lg:px-8">
                <Link href="/member/dashboard" class="font-semibold text-slate-900">Member Area</Link>
                <nav class="flex flex-wrap items-center gap-3 text-sm">
                    <Link href="/member/dashboard" class="rounded-xl px-3 py-2 text-slate-600 hover:bg-slate-100">Dashboard</Link>
                    <Link href="/member/profile" class="rounded-xl px-3 py-2 text-slate-600 hover:bg-slate-100">My Profile</Link>
                    <Link href="/member/payments" class="rounded-xl px-3 py-2 text-slate-600 hover:bg-slate-100">My Payments</Link>
                    <Link href="/events" class="rounded-xl px-3 py-2 text-slate-600 hover:bg-slate-100">Events</Link>
                    <Link :href="logout()" method="post" as="button" class="rounded-xl px-3 py-2 text-slate-600 hover:bg-slate-100">
                        Logout
                    </Link>
                </nav>
            </div>
        </header>
        <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <slot />
        </main>
    </div>
</template>
