<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Contact" />
    <section class="bg-white dark:bg-slate-950 py-16 sm:py-20 transition-colors duration-300">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50 md:text-4xl">Contact Us</h1>
            <p class="mt-4 text-base leading-7 text-slate-600 dark:text-slate-400">
                Please provide either your email address or phone number so we can contact you.
            </p>

            <Form action="/contact" method="post" reset-on-success class="mt-8 space-y-5" #default="{ errors, processing, wasSuccessful }">
                <div class="space-y-2">
                    <label for="name" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Name <span class="text-red-500">*</span></label>
                    <input id="name" name="name" class="block w-full rounded-xl border border-slate-300 dark:border-slate-800 bg-white dark:bg-slate-900 px-4 py-2.5 text-slate-900 dark:text-slate-100 shadow-sm focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-none" />
                    <p v-if="errors.name" class="text-sm text-red-600">{{ errors.name }}</p>
                </div>
                <div class="grid gap-5 md:grid-cols-2">
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Email</label>
                        <input id="email" name="email" type="email" class="block w-full rounded-xl border border-slate-300 dark:border-slate-800 bg-white dark:bg-slate-900 px-4 py-2.5 text-slate-900 dark:text-slate-100 shadow-sm focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-none" />
                        <p v-if="errors.email" class="text-sm text-red-600">{{ errors.email }}</p>
                    </div>
                    <div class="space-y-2">
                        <label for="phone" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Phone</label>
                        <input id="phone" name="phone" class="block w-full rounded-xl border border-slate-300 dark:border-slate-800 bg-white dark:bg-slate-900 px-4 py-2.5 text-slate-900 dark:text-slate-100 shadow-sm focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-none" />
                        <p v-if="errors.phone" class="text-sm text-red-600">{{ errors.phone }}</p>
                    </div>
                </div>
                <div class="space-y-2">
                    <label for="message" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Message <span class="text-red-500">*</span></label>
                    <textarea id="message" name="message" rows="6" class="block w-full rounded-xl border border-slate-300 dark:border-slate-800 bg-white dark:bg-slate-900 px-4 py-2.5 text-slate-900 dark:text-slate-100 shadow-sm focus:border-brand-600 focus:ring-2 focus:ring-brand-600/20 focus:outline-none" />
                    <p v-if="errors.message" class="text-sm text-red-600">{{ errors.message }}</p>
                </div>
                <div v-if="wasSuccessful" class="rounded-xl border border-brand-200 dark:border-brand-800/30 bg-brand-50 dark:bg-brand-950/30 p-4 text-sm text-brand-700 dark:text-brand-400">
                    Thank you. Your message has been received.
                </div>
                <button :disabled="processing" class="inline-flex items-center justify-center rounded-xl bg-brand-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-800 disabled:cursor-not-allowed disabled:opacity-50">
                    {{ processing ? 'Sending...' : 'Send Message' }}
                </button>
            </Form>
        </div>
    </section>
</template>
