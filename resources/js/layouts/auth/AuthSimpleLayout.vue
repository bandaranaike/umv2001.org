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
        class="flex min-h-svh flex-col items-center justify-center gap-6 bg-[radial-gradient(circle_at_top,rgba(12,76,138,0.10),transparent_52%)] p-6 md:p-10"
    >
        <div class="w-full max-w-sm">
            <div class="flex flex-col gap-8">
                <div class="flex flex-col items-center gap-5">
                    <Link
                        :href="home().url"
                        class="flex flex-col items-center gap-4 font-medium"
                    >
                        <AppLogo />
                        <span class="sr-only">{{ title }}</span>
                    </Link>
                    <div class="space-y-2 text-center">
                        <h1 class="text-xl font-semibold tracking-tight">
                            {{ title }}
                        </h1>
                        <p class="text-center text-sm text-slate-500">
                            {{ description }}
                        </p>
                    </div>
                </div>
                <slot />
            </div>
        </div>
    </div>
</template>
