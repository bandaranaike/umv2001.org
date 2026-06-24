<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';

defineProps<{
    member: { id: number; name: string; email: string; membership_number: string | null; phone: string | null; address: string | null; is_active: boolean; joined_at: string | null };
}>();
</script>

<template>
    <Head title="Edit Member" />
    <div class="max-w-3xl">
        <h1 class="text-3xl font-bold tracking-tight text-slate-900">Edit Member</h1>
        <Form :action="`/admin/members/${member.id}`" method="patch" class="mt-8 grid gap-5 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:grid-cols-2" #default="{ processing }">
            <input name="name" :value="member.name" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="email" type="email" :value="member.email" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="membership_number" :value="member.membership_number" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="phone" :value="member.phone" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <input name="joined_at" type="date" :value="member.joined_at" class="rounded-xl border border-slate-300 px-4 py-2.5" />
            <label class="flex items-center gap-2 text-sm text-slate-700"><input type="checkbox" name="is_active" value="1" :checked="member.is_active" /> Active member</label>
            <textarea name="address" :value="member.address" class="rounded-xl border border-slate-300 px-4 py-2.5 md:col-span-2" />
            <button :disabled="processing" class="rounded-xl bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white md:col-span-2">Save Member</button>
        </Form>
    </div>
</template>
