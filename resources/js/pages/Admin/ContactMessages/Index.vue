<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import { formatDateTime } from '@/lib/utils';

defineProps<{
    messages: {
        data: Array<{
            id: number;
            name: string;
            email: string | null;
            phone: string | null;
            message: string;
            is_read: boolean;
            created_at: string;
        }>;
    };
}>();
</script>

<template>
    <Head title="Contact Messages" />
    <div class="space-y-6">
        <div
            class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 dark:border-slate-800 dark:bg-slate-900"
        >
            <p class="text-sm font-medium text-brand-700 dark:text-brand-400">
                Admin Area
            </p>
            <h1
                class="mt-2 text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50"
            >
                Contact Messages
            </h1>
            <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600 dark:text-slate-400">
                Review public contact form submissions and keep the inbox tidy.
            </p>
        </div>
        <div class="mt-8 grid gap-4">
            <article
                v-for="message in messages.data"
                :key="message.id"
                class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm ring-1 ring-slate-200/60 dark:ring-slate-800/80 dark:border-slate-800 dark:bg-slate-900"
            >
                <div class="flex flex-wrap items-start justify-between gap-4">
                    <div>
                        <p
                            class="font-semibold text-slate-900 dark:text-slate-100"
                        >
                            {{ message.name }}
                        </p>
                        <p
                            class="mt-1 text-sm text-slate-500 dark:text-slate-400"
                        >
                            {{ message.email || 'No email' }} ·
                            {{ message.phone || 'No phone' }} ·
                            {{ formatDateTime(message.created_at) }}
                        </p>
                    </div>
                    <span
                        :class="
                            message.is_read
                                ? 'bg-slate-100 text-slate-600 ring-slate-200 dark:bg-slate-800 dark:text-slate-400 dark:ring-slate-700'
                                : 'bg-amber-50 text-amber-700 ring-amber-200 dark:bg-amber-950/30 dark:text-amber-400 dark:ring-amber-800/30'
                        "
                        class="inline-flex rounded-lg px-2.5 py-1 text-xs font-medium ring-1 ring-inset"
                    >
                        {{ message.is_read ? 'Read' : 'Unread' }}
                    </span>
                </div>
                <p
                    class="mt-4 text-sm leading-6 text-slate-700 dark:text-slate-300"
                >
                    {{ message.message }}
                </p>
                <div class="mt-4 flex gap-3">
                    <Form
                        v-if="!message.is_read"
                        :action="`/admin/contact-messages/${message.id}/read`"
                        method="patch"
                    >
                        <button
                            class="text-sm font-semibold text-brand-700 transition-colors hover:text-brand-800 dark:text-brand-400 dark:hover:text-brand-300"
                        >
                            Mark as read
                        </button>
                    </Form>
                    <Form
                        :action="`/admin/contact-messages/${message.id}`"
                        method="delete"
                    >
                        <button
                            class="text-sm font-semibold text-red-600 transition-colors hover:text-red-700 dark:text-red-500 dark:hover:text-red-400"
                        >
                            Delete
                        </button>
                    </Form>
                </div>
            </article>
        </div>
    </div>
</template>
