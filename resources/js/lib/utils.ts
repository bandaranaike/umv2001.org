import type { InertiaLinkProps } from '@inertiajs/vue3';
import { clsx } from 'clsx';
import type { ClassValue } from 'clsx';
import { twMerge } from 'tailwind-merge';

export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs));
}

export function toUrl(href: NonNullable<InertiaLinkProps['href']>) {
    return typeof href === 'string' ? href : href?.url;
}

function parseDateValue(value: string): Date | null {
    if (/^\d{4}-\d{2}-\d{2}$/.test(value)) {
        const [year, month, day] = value.split('-').map(Number);

        return new Date(year, month - 1, day);
    }

    const normalizedValue = value.replace(
        /\.(\d{3})\d+(Z|[+-]\d{2}:?\d{2})$/,
        '.$1$2',
    );
    const date = new Date(normalizedValue);

    return Number.isNaN(date.getTime()) ? null : date;
}

export function formatDate(value: string | null | undefined): string {
    if (!value) {
        return '-';
    }

    const date = parseDateValue(value);

    if (!date) {
        return value;
    }

    return new Intl.DateTimeFormat(undefined, {
        day: 'numeric',
        month: 'short',
        year: 'numeric',
    }).format(date);
}

export function formatDateTime(value: string | null | undefined): string {
    if (!value) {
        return '-';
    }

    const date = parseDateValue(value);

    if (!date) {
        return value;
    }

    return new Intl.DateTimeFormat(undefined, {
        day: 'numeric',
        hour: 'numeric',
        minute: '2-digit',
        month: 'short',
        year: 'numeric',
    }).format(date);
}
