<script setup lang="ts">
import { Moon, Sun } from '@lucide/vue';
import { computed } from 'vue';
import { useAppearance } from '@/composables/useAppearance';
import { Button } from '@/components/ui/button';

const { resolvedAppearance, updateAppearance } = useAppearance();

const isDark = computed(() => resolvedAppearance.value === 'dark');

function toggleAppearance() {
    updateAppearance(isDark.value ? 'light' : 'dark');
}
</script>

<template>
    <Button
        type="button"
        variant="ghost"
        size="icon"
        class="size-9 rounded-lg text-slate-600 transition-colors hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white"
        :aria-label="isDark ? 'Switch to light theme' : 'Switch to dark theme'"
        :title="isDark ? 'Switch to light theme' : 'Switch to dark theme'"
        @click="toggleAppearance"
    >
        <Sun v-if="isDark" class="size-5" />
        <Moon v-else class="size-5" />
    </Button>
</template>
