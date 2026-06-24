<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';

defineProps<{
    profile: {
        name: string;
        email: string;
        phone: string | null;
        address: string | null;
        membership_number: string | null;
        nic: string | null;
        date_of_birth: string | null;
        occupation: string | null;
        account_name: string | null;
        bank_name: string | null;
        branch: string | null;
        account_number: string | null;
        family_members: Array<{
            id: number;
            relationship: string;
            name: string;
            phone: string | null;
            date_of_birth: string | null;
            notes: string | null;
        }>;
    };
}>();
</script>

<template>
    <Head title="My Profile" />
    <div class="max-w-4xl">
        <h1
            class="text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50"
        >
            My Profile
        </h1>
        <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
            Private member details. Your role, membership number, active status,
            and payment records cannot be changed here.
        </p>

        <Form
            action="/member/profile"
            method="patch"
            class="mt-8 space-y-8"
            #default="{ errors, processing }"
        >
            <section
                class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900"
            >
                <h2
                    class="text-lg font-semibold text-slate-900 dark:text-slate-50"
                >
                    Personal details
                </h2>
                <div class="mt-5 grid gap-5 md:grid-cols-2">
                    <label
                        class="space-y-2 text-sm font-medium text-slate-700 dark:text-slate-300"
                        >Name
                        <input
                            name="name"
                            :value="profile.name"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
                        />
                        <span
                            v-if="errors.name"
                            class="block text-sm text-red-600 dark:text-red-500"
                            >{{ errors.name }}</span
                        >
                    </label>
                    <label
                        class="space-y-2 text-sm font-medium text-slate-700 dark:text-slate-300"
                        >Email
                        <input
                            name="email"
                            type="email"
                            :value="profile.email"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
                        />
                        <span
                            v-if="errors.email"
                            class="block text-sm text-red-600 dark:text-red-500"
                            >{{ errors.email }}</span
                        >
                    </label>
                    <label
                        class="space-y-2 text-sm font-medium text-slate-700 dark:text-slate-300"
                        >Phone
                        <input
                            name="phone"
                            :value="profile.phone"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
                        />
                    </label>
                    <label
                        class="space-y-2 text-sm font-medium text-slate-700 dark:text-slate-300"
                        >Membership number
                        <input
                            :value="profile.membership_number || 'Not assigned'"
                            disabled
                            class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-slate-500 dark:border-slate-800 dark:bg-slate-950/50 dark:text-slate-400"
                        />
                    </label>
                    <label
                        class="space-y-2 text-sm font-medium text-slate-700 md:col-span-2 dark:text-slate-300"
                        >Address
                        <textarea
                            name="address"
                            rows="3"
                            :value="profile.address"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
                        />
                    </label>
                    <label
                        class="space-y-2 text-sm font-medium text-slate-700 dark:text-slate-300"
                        >NIC
                        <input
                            name="nic"
                            :value="profile.nic"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
                        />
                    </label>
                    <label
                        class="space-y-2 text-sm font-medium text-slate-700 dark:text-slate-300"
                        >Date of birth
                        <input
                            name="date_of_birth"
                            type="date"
                            :value="profile.date_of_birth"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
                        />
                    </label>
                    <label
                        class="space-y-2 text-sm font-medium text-slate-700 md:col-span-2 dark:text-slate-300"
                        >Occupation
                        <input
                            name="occupation"
                            :value="profile.occupation"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
                        />
                    </label>
                </div>
            </section>

            <section
                class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900"
            >
                <h2
                    class="text-lg font-semibold text-slate-900 dark:text-slate-50"
                >
                    Private account details
                </h2>
                <div class="mt-5 grid gap-5 md:grid-cols-2">
                    <input
                        name="account_name"
                        :value="profile.account_name"
                        placeholder="Account name"
                        class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
                    />
                    <input
                        name="bank_name"
                        :value="profile.bank_name"
                        placeholder="Bank name"
                        class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
                    />
                    <input
                        name="branch"
                        :value="profile.branch"
                        placeholder="Branch"
                        class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
                    />
                    <input
                        name="account_number"
                        :value="profile.account_number"
                        placeholder="Account number"
                        class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
                    />
                </div>
            </section>

            <section
                class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900"
            >
                <h2
                    class="text-lg font-semibold text-slate-900 dark:text-slate-50"
                >
                    Family details
                </h2>
                <div class="mt-5 space-y-4">
                    <div
                        v-for="(familyMember, index) in profile.family_members"
                        :key="familyMember.id"
                        class="grid gap-3 rounded-xl border border-slate-200 p-4 md:grid-cols-2 dark:border-slate-800"
                    >
                        <input
                            :name="`family_members[${index}][name]`"
                            :value="familyMember.name"
                            placeholder="Name"
                            class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
                        />
                        <select
                            :name="`family_members[${index}][relationship]`"
                            :value="familyMember.relationship"
                            class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
                        >
                            <option
                                value="mother"
                                class="dark:bg-slate-950 dark:text-slate-100"
                            >
                                Mother
                            </option>
                            <option
                                value="father"
                                class="dark:bg-slate-950 dark:text-slate-100"
                            >
                                Father
                            </option>
                            <option
                                value="spouse"
                                class="dark:bg-slate-950 dark:text-slate-100"
                            >
                                Spouse
                            </option>
                            <option
                                value="child"
                                class="dark:bg-slate-950 dark:text-slate-100"
                            >
                                Child
                            </option>
                            <option
                                value="other"
                                class="dark:bg-slate-950 dark:text-slate-100"
                            >
                                Other
                            </option>
                        </select>
                        <input
                            :name="`family_members[${index}][phone]`"
                            :value="familyMember.phone"
                            placeholder="Phone"
                            class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
                        />
                        <input
                            :name="`family_members[${index}][date_of_birth]`"
                            type="date"
                            :value="familyMember.date_of_birth"
                            class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
                        />
                    </div>
                    <div
                        class="grid gap-3 rounded-xl border border-dashed border-slate-300 p-4 md:grid-cols-2 dark:border-slate-700"
                    >
                        <input
                            name="family_members[99][name]"
                            placeholder="Add family member name"
                            class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-600"
                        />
                        <select
                            name="family_members[99][relationship]"
                            class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600/20 focus:outline-hidden dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
                        >
                            <option
                                value="other"
                                class="dark:bg-slate-950 dark:text-slate-100"
                            >
                                Other
                            </option>
                            <option
                                value="mother"
                                class="dark:bg-slate-950 dark:text-slate-100"
                            >
                                Mother
                            </option>
                            <option
                                value="father"
                                class="dark:bg-slate-950 dark:text-slate-100"
                            >
                                Father
                            </option>
                            <option
                                value="spouse"
                                class="dark:bg-slate-950 dark:text-slate-100"
                            >
                                Spouse
                            </option>
                            <option
                                value="child"
                                class="dark:bg-slate-950 dark:text-slate-100"
                            >
                                Child
                            </option>
                        </select>
                    </div>
                </div>
            </section>

            <button
                :disabled="processing"
                class="rounded-xl bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white hover:bg-emerald-800 disabled:opacity-50 dark:bg-emerald-600 dark:hover:bg-emerald-700"
            >
                {{ processing ? 'Saving...' : 'Save Profile' }}
            </button>
        </Form>
    </div>
</template>
