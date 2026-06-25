<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import {
    CalendarDays,
    CreditCard,
    BookOpen,
    FolderGit2,
    LayoutGrid,
    Mail,
    Palette,
    Shield,
    User,
    Users,
} from '@lucide/vue';
import { computed } from 'vue';
import AppLogo from '@/components/AppLogo.vue';
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import TeamSwitcher from '@/components/TeamSwitcher.vue';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { edit as appearanceEdit } from '@/routes/appearance';
import { dashboard as adminDashboard } from '@/routes/admin';
import { index as adminContactMessagesIndex } from '@/routes/admin/contact-messages';
import { index as adminEventsIndex } from '@/routes/admin/events';
import { index as adminMembersIndex } from '@/routes/admin/members';
import { index as adminPaymentsIndex } from '@/routes/admin/payments';
import { dashboard as memberDashboard } from '@/routes/member';
import { edit as memberProfileEdit } from '@/routes/member/profile';
import { index as memberPaymentsIndex } from '@/routes/member/payments';
import { edit as profileEdit } from '@/routes/profile';
import { edit as securityEdit } from '@/routes/security';
import type { NavItem } from '@/types';

const page = usePage();
const user = computed(() => page.props.auth.user);

const dashboardUrl = computed(() =>
    user.value?.role === 'admin'
        ? adminDashboard().url
        : memberDashboard().url,
);

const memberNavItems = computed<NavItem[]>(() => [
    {
        title: 'Dashboard',
        href: memberDashboard().url,
        icon: LayoutGrid,
    },
    {
        title: 'My Profile',
        href: memberProfileEdit().url,
        icon: User,
    },
    {
        title: 'My Payments',
        href: memberPaymentsIndex().url,
        icon: CreditCard,
    },
    {
        title: 'Events',
        href: '/events',
        icon: CalendarDays,
    },
]);

const adminNavItems = computed<NavItem[]>(() => [
    {
        title: 'Dashboard',
        href: adminDashboard().url,
        icon: LayoutGrid,
    },
    {
        title: 'Members',
        href: adminMembersIndex().url,
        icon: Users,
    },
    {
        title: 'Payments',
        href: adminPaymentsIndex().url,
        icon: CreditCard,
    },
    {
        title: 'Events',
        href: adminEventsIndex().url,
        icon: CalendarDays,
    },
    {
        title: 'Contact Messages',
        href: adminContactMessagesIndex().url,
        icon: Mail,
    },
]);

const settingsNavItems = computed<NavItem[]>(() => [
    {
        title: 'Profile Settings',
        href: profileEdit().url,
        icon: User,
    },
    {
        title: 'Security',
        href: securityEdit().url,
        icon: Shield,
    },
    {
        title: 'Appearance',
        href: appearanceEdit().url,
        icon: Palette,
    },
]);

const footerNavItems: NavItem[] = [
    {
        title: 'Repository',
        href: 'https://github.com/laravel/vue-starter-kit',
        icon: FolderGit2,
    },
    {
        title: 'Documentation',
        href: 'https://laravel.com/docs/starter-kits#vue',
        icon: BookOpen,
    },
];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader class="px-2 pt-2">
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="dashboardUrl">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
            <SidebarMenu>
                <SidebarMenuItem>
                    <TeamSwitcher />
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent class="gap-1">
            <NavMain
                v-if="user?.role === 'member' || user?.role === 'admin'"
                :items="memberNavItems"
                label="Member Area"
            />
            <NavMain
                v-if="user?.role === 'admin'"
                :items="adminNavItems"
                label="Admin Area"
            />
            <NavMain :items="settingsNavItems" label="Settings" />
        </SidebarContent>

        <SidebarFooter class="gap-2">
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
