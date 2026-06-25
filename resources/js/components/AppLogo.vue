<script setup lang="ts">
import AppLogoIcon from '@/components/AppLogoIcon.vue';

type Props = {
    tone?: 'default' | 'inverse';
};

withDefaults(defineProps<Props>(), {
    tone: 'default',
});
</script>

<template>
    <div class="flex items-center gap-3">
        <div
            class="flex size-14 items-center justify-center rounded-full ring-1 ring-inset"
            :class="
                tone === 'inverse'
                    ? 'bg-white/10 ring-white/15 backdrop-blur'
                    : 'bg-brand-50/50 ring-brand-100 dark:bg-brand-100/90 dark:ring-brand-100/90'
            "
        >
            <AppLogoIcon
                class="size-13 rounded-xl object-cover"
                alt=""
                aria-hidden="true"
                :class="
                    tone === 'inverse' ? 'shadow-sm shadow-black/10' : ''
                "
            />
        </div>
        <div class="grid text-left font-heading leading-tight">
            <span
                class="truncate text-sm font-semibold tracking-tight md:text-base"
                :class="
                    tone === 'inverse'
                        ? 'text-white'
                        : 'text-slate-900 dark:text-slate-100'
                "
            >
                UMV 2001
            </span>
            <span
                class="truncate text-xs font-medium"
                :class="
                    tone === 'inverse'
                        ? 'text-slate-300'
                        : 'text-slate-500 dark:text-slate-400'
                "
            >
                Alumni Association
            </span>
        </div>
    </div>
</template>
