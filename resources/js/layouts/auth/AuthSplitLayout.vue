<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import AppLogo from '@/components/AppLogo.vue';
import { home } from '@/routes';

defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
    <div
        class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0"
    >
        <div
            class="relative hidden h-full flex-col overflow-hidden bg-slate-900 p-10 text-white lg:flex dark:border-r"
        >
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(12,76,138,0.22),transparent_46%)]" />
            <div class="absolute inset-0 bg-[linear-gradient(145deg,rgba(15,23,42,0.95),rgba(15,23,42,0.82))]" />
            <Link
                :href="home().url"
                class="relative z-20 flex items-center text-lg font-medium"
            >
                <AppLogo tone="inverse" />
            </Link>
            <div class="relative z-20 mt-auto max-w-sm space-y-3">
                <p class="text-sm font-medium uppercase tracking-[0.24em] text-brand-300/80">
                    Member portal
                </p>
                <p class="text-2xl font-semibold tracking-tight text-white">
                    Private access for members and administrators.
                </p>
                <p class="text-sm leading-6 text-slate-300">
                    Keep member records, payments, and association work in one
                    calm, secure place.
                </p>
            </div>
        </div>
        <div class="lg:p-8">
            <div
                class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[360px]"
            >
                <div class="flex flex-col space-y-2 text-center">
                    <h1 class="text-xl font-medium tracking-tight" v-if="title">
                        {{ title }}
                    </h1>
                    <p class="text-sm text-muted-foreground" v-if="description">
                        {{ description }}
                    </p>
                </div>
                <slot />
            </div>
        </div>
    </div>
</template>
