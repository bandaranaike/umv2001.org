<script setup lang="ts">
import type { HTMLAttributes } from 'vue';

defineOptions({
    inheritAttrs: false,
});

type Props = {
    className?: HTMLAttributes['class'];
};

defineProps<Props>();
</script>

<template>
    <img
        src="/images/umv2001-logo.png"
        alt="UMV 2001 O/L Alumni Association logo"
        :class="className"
        v-bind="$attrs"
    >
</template>
