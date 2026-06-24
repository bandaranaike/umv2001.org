# Task: Admin Dashboard, Member Management, and Payment Management

Status: Completed

## Raw Input

Derived from `.ai/docs/01-project-specification.md`, especially Admin Dashboard, Manage Members, Manage Payments, User Roles, Main Database Tables, Suggested Laravel Structure, Security Requirements, and Testing Requirements.

## Goal

Build admin-only tools for managing members and manually recorded membership payments.

## Relevant Source Docs

- `.ai/docs/01-project-specification.md`
- `.ai/docs/02-business-domain-context.md`
- `.ai/docs/03-ui-ux-design-system.md`

## Scope

- Include: admin layout/navigation, `/admin/dashboard`, member index/create/edit/show, payment index/create/edit, filtering by member/month/year, admin Form Requests, policies, pagination, and tests.
- Exclude: Event management, contact message management, online payment processing, payment export unless later requested.

## Acceptance Criteria

- Admin routes are behind auth and admin middleware.
- Admin dashboard shows total members, active members, total payments this month, unread contact messages, and published events.
- Admin can create members, edit members, assign membership numbers, activate/deactivate members, reset temporary passwords, view member family details, and view member payment history.
- Admin can create and edit monthly payment records.
- Payment list can filter by member, month, and year.
- Duplicate payment records for the same member, month, and year are prevented and surfaced as validation errors.
- Admin tables are paginated and usable on mobile.
- Non-admin users cannot access admin pages or admin actions.

## Implementation Notes

- Use Form Requests for admin member and payment validation.
- Use policies/gates for admin-only behavior.
- Reset temporary password behavior should follow existing authentication conventions.
- Keep table queries paginated and scoped.

## Verification Plan

- Add Pest tests for admin access, non-admin denial, member create/update, payment create/update, duplicate payment validation, and filters.
- Run focused admin member/payment tests with `php artisan test --compact`.
- Run `vendor/bin/pint --dirty --format agent` after PHP changes.

## Privacy/Security Notes

- Admin pages expose sensitive member, family, bank/account, and payment data.
- Ensure admin access is enforced server-side for every route and mutation.
