# Task: Contact Message Flow

Status: Pending

## Raw Input

Derived from `.ai/docs/01-project-specification.md`, especially Contact Page, Contact Form Validation Example, contact_messages table, Security Requirements, and Testing Requirements.

## Goal

Implement the public contact form and backend storage for contact messages.

## Relevant Source Docs

- `.ai/docs/01-project-specification.md`
- `.ai/docs/02-business-domain-context.md`
- `.ai/docs/03-ui-ux-design-system.md`

## Scope

- Include: `/contact` page, contact form UI, `StoreContactMessageRequest`, contact message storage, success feedback, and validation tests.
- Exclude: Sending email notifications unless mail configuration already exists and the user asks for it; admin contact message management screen.

## Acceptance Criteria

- `/contact` renders a form with name, email, phone, and message fields.
- Name and message are required.
- At least one of email or phone is required.
- Email is validated when present.
- Phone is validated as a string with reasonable max length when present.
- Valid submissions create a `contact_messages` record with `is_read` defaulting to false.
- Successful submission shows a user-facing success message.
- The implementation does not attempt to send email initially unless mail configuration exists and the user has approved it.

## Implementation Notes

- Use a Laravel Form Request for validation.
- Use Inertia form helpers or the project's existing form pattern.
- Follow the UI design system for fields, errors, helper text, and button loading state.

## Verification Plan

- Add Pest tests for page load, successful submission, required name/message validation, email-or-phone validation, and email format validation.
- Run the focused contact test file with `php artisan test --compact`.
- Run `vendor/bin/pint --dirty --format agent` after PHP changes.

## Privacy/Security Notes

- Contact messages may contain personal data and must only be visible to admins.
- Validate and persist only expected fields.
