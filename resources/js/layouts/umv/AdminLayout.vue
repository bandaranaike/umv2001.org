<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { logout } from '@/routes';
</script>

<template>
    <div class="min-h-screen bg-slate-50 text-slate-900">
        <div class="mx-auto flex max-w-7xl">
            <aside class="hidden min-h-screen w-64 border-r border-slate-200 bg-white p-5 md:block">
                <Link href="/admin/dashboard" class="text-lg font-semibold text-slate-900">Admin Area</Link>
                <nav class="mt-8 flex flex-col gap-2 text-sm">
                    <Link href="/admin/dashboard" class="rounded-xl px-3 py-2 text-slate-600 hover:bg-emerald-50 hover:text-emerald-700">Dashboard</Link>
                    <Link href="/admin/members" class="rounded-xl px-3 py-2 text-slate-600 hover:bg-emerald-50 hover:text-emerald-700">Members</Link>
                    <Link href="/admin/payments" class="rounded-xl px-3 py-2 text-slate-600 hover:bg-emerald-50 hover:text-emerald-700">Payments</Link>
                    <Link href="/admin/events" class="rounded-xl px-3 py-2 text-slate-600 hover:bg-emerald-50 hover:text-emerald-700">Events</Link>
                    <Link href="/admin/contact-messages" class="rounded-xl px-3 py-2 text-slate-600 hover:bg-emerald-50 hover:text-emerald-700">Contact Messages</Link>
                    <Link :href="logout()" method="post" as="button" class="mt-4 rounded-xl px-3 py-2 text-left text-slate-600 hover:bg-slate-100">
                        Logout
                    </Link>
                </nav>
            </aside>
            <main class="min-w-0 flex-1 px-4 py-8 sm:px-6 lg:px-8">
                <slot />
            </main>
        </div>
    </div>
</template>
