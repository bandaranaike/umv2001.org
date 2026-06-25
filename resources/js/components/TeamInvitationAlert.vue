<script setup lang="ts">
import { Info } from '@lucide/vue';
import { Alert, AlertDescription } from '@/components/ui/alert';
import type { TeamInvitationContext } from '@/types';

type Props = {
    invitation: TeamInvitationContext;
    action: 'Log in' | 'Register';
};

defineProps<Props>();
</script>

<template>
    <div data-test="team-invitation-alert">
        <Alert
            class="border-brand-200 bg-brand-50 text-brand-900 dark:border-brand-900/50 dark:bg-brand-950/50 dark:text-brand-100 [&>svg]:text-brand-600 dark:[&>svg]:text-brand-400"
        >
            <Info class="size-4" />
            <AlertDescription class="text-brand-900 dark:text-brand-100">
                {{ action }} to join the "{{ invitation.teamName }}" team.
            </AlertDescription>
        </Alert>
    </div>
</template>
