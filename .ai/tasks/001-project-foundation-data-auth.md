# Task: Project Foundation, Data Model, and Access Control

Status: Pending

## Raw Input

Derived from `.ai/docs/01-project-specification.md`, especially Technology, User Roles, Main Database Tables, Suggested Laravel Structure, Security Requirements, Seed Data, Implementation Steps 1-6, and Testing Requirements.

## Goal

Establish the Laravel 13 + Inertia Vue foundation for UMV2001 with the required database schema, models, roles, authentication, middleware, policies, factories, and seeders.

## Relevant Source Docs

- `.ai/docs/01-project-specification.md`
- `.ai/docs/02-business-domain-context.md`
- `.ai/docs/03-ui-ux-design-system.md`

## Scope

- Include: Laravel app readiness, Inertia Vue structure check, database configuration check, migrations, models, relationships, factories, seeders, `admin`/`member` role support, active-user protection, admin middleware, policies/gates, and core authorization tests.
- Exclude: Public page UI, member dashboard/profile pages, admin CRUD screens, event photo upload UI, production deployment.

## Acceptance Criteria

- The app uses Laravel 13, Inertia.js, Vue 3, TypeScript, Tailwind CSS, Vite, Laravel authentication, Form Requests, and policies/gates where applicable.
- `users` has `role`, `membership_number`, `phone`, `address`, `is_active`, and `joined_at`.
- `member_profiles`, `member_family_members`, `membership_payments`, `events`, `event_photos`, and `contact_messages` tables exist with fields from the specification.
- `membership_payments` prevents duplicate records for the same user, month, and year.
- Models exist with appropriate relationships and fillable/cast definitions.
- Admin and member roles are enforceable through middleware and/or policies.
- Inactive users can be blocked from protected areas where required.
- Factories and seeders can create the admin user, sample members, sample events, and sample payments.
- Authorization tests prove members cannot access admin capabilities.

## Implementation Notes

- Prefer enum or constrained database field for roles.
- Use Laravel make commands for controllers, models, policies, requests, middleware, migrations, factories, and tests.
- Use soft deletes where useful for members, events, and payments.
- Keep private fields out of public queries and serialized public props.

## Verification Plan

- Add focused Pest tests for role access, member privacy boundaries, and duplicate payment prevention.
- Run the relevant migration and test commands.
- Run `vendor/bin/pint --dirty --format agent` after PHP changes.

## Privacy/Security Notes

- This task creates the private data model for members, family information, bank/account details, payments, and contact messages.
- Authorization must be server-side, not only UI-based.
