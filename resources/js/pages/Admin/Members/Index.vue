<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

defineProps<{
    members: {
        data: Array<{ id: number; name: string; email: string; membership_number: string | null; phone: string | null; is_active: boolean }>;
    };
}>();
</script>

<template>
    <Head title="Members" />
    <div>
        <div class="flex items-center justify-between gap-4">
            <h1 class="text-3xl font-bold tracking-tight text-slate-900">Members</h1>
            <Link href="/admin/members/create" class="rounded-xl bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white">Create Member</Link>
        </div>
        <div class="mt-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <table class="min-w-full divide-y divide-slate-200">
                <tbody class="divide-y divide-slate-200">
                    <tr v-for="member in members.data" :key="member.id">
                        <td class="px-4 py-4">
                            <p class="font-medium text-slate-900">{{ member.name }}</p>
                            <p class="text-sm text-slate-500">{{ member.email }}</p>
                        </td>
                        <td class="px-4 py-4 text-sm text-slate-700">{{ member.membership_number || '-' }}</td>
                        <td class="px-4 py-4 text-sm text-slate-700">{{ member.phone || '-' }}</td>
                        <td class="px-4 py-4 text-sm">
                            <span :class="member.is_active ? 'bg-emerald-50 text-emerald-700 ring-emerald-200' : 'bg-amber-50 text-amber-700 ring-amber-200'" class="inline-flex rounded-full px-2.5 py-1 text-xs font-medium ring-1 ring-inset">
                                {{ member.is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-4 py-4 text-right text-sm">
                            <Link :href="`/admin/members/${member.id}`" class="font-semibold text-emerald-700">View</Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
