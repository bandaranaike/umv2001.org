# Task: Admin Event Management and Contact Messages

Status: Completed

## Raw Input

Derived from `.ai/docs/01-project-specification.md`, especially Manage Events, Contact Messages, events and event_photos tables, contact_messages table, Security Requirements, and Testing Requirements.

## Goal

Build admin-only event/photo management and contact message management.

## Relevant Source Docs

- `.ai/docs/01-project-specification.md`
- `.ai/docs/02-business-domain-context.md`
- `.ai/docs/03-ui-ux-design-system.md`

## Scope

- Include: admin event index/create/edit, publish/unpublish, slug editing, photo upload, photo delete, photo sorting, admin contact message index, mark-as-read, delete, Form Requests, policies, upload validation, and tests.
- Exclude: Public event pages except for verifying published/unpublished visibility; email notification workflow.

## Acceptance Criteria

- Admin can create, edit, publish, and unpublish events.
- Admin can edit event slugs safely.
- Admin can upload event photos with file type and size validation.
- Admin can delete and sort event photos.
- Uploaded images are stored safely and rendered on public event pages only when the event is published.
- Admin can view contact messages, mark messages as read, and delete messages.
- Non-admin users cannot access event management or contact message management.

## Implementation Notes

- Use Form Requests for event and upload validation.
- Store uploaded images through Laravel storage conventions.
- Use policies/gates for event and contact message access.
- Add confirmation UI for destructive delete actions.

## Verification Plan

- Add Pest tests for admin event CRUD, publish visibility, upload validation if test storage is configured, contact message read/delete actions, and non-admin denial.
- Run focused admin event/contact tests with `php artisan test --compact`.
- Run `vendor/bin/pint --dirty --format agent` after PHP changes.

## Privacy/Security Notes

- Contact messages are private admin data.
- Uploaded files must be validated and stored safely.
- Unpublished event content must not be publicly visible.
