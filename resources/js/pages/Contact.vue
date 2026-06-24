<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Contact" />
    <section class="bg-white py-16 sm:py-20">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-slate-900 md:text-4xl">Contact Us</h1>
            <p class="mt-4 text-base leading-7 text-slate-600">
                Please provide either your email address or phone number so we can contact you.
            </p>

            <Form action="/contact" method="post" reset-on-success class="mt-8 space-y-5" #default="{ errors, processing, wasSuccessful }">
                <div class="space-y-2">
                    <label for="name" class="block text-sm font-medium text-slate-700">Name <span class="text-red-500">*</span></label>
                    <input id="name" name="name" class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 shadow-sm focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-none" />
                    <p v-if="errors.name" class="text-sm text-red-600">{{ errors.name }}</p>
                </div>
                <div class="grid gap-5 md:grid-cols-2">
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                        <input id="email" name="email" type="email" class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 shadow-sm focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-none" />
                        <p v-if="errors.email" class="text-sm text-red-600">{{ errors.email }}</p>
                    </div>
                    <div class="space-y-2">
                        <label for="phone" class="block text-sm font-medium text-slate-700">Phone</label>
                        <input id="phone" name="phone" class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 shadow-sm focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-none" />
                        <p v-if="errors.phone" class="text-sm text-red-600">{{ errors.phone }}</p>
                    </div>
                </div>
                <div class="space-y-2">
                    <label for="message" class="block text-sm font-medium text-slate-700">Message <span class="text-red-500">*</span></label>
                    <textarea id="message" name="message" rows="6" class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 shadow-sm focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-none" />
                    <p v-if="errors.message" class="text-sm text-red-600">{{ errors.message }}</p>
                </div>
                <div v-if="wasSuccessful" class="rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-700">
                    Thank you. Your message has been received.
                </div>
                <button :disabled="processing" class="inline-flex items-center justify-center rounded-xl bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-emerald-800 disabled:cursor-not-allowed disabled:opacity-50">
                    {{ processing ? 'Sending...' : 'Send Message' }}
                </button>
            </Form>
        </div>
    </section>
</template>
