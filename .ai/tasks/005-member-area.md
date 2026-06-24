# Task: Member Dashboard, Profile, and Payments

Status: Completed

## Raw Input

Derived from `.ai/docs/01-project-specification.md`, especially Member Area, Member frontend pages, User Roles, Main Database Tables, Security Requirements, and Testing Requirements.

## Goal

Build the authenticated member area where members can manage their own profile/family/account information and view their own payment history.

## Relevant Source Docs

- `.ai/docs/01-project-specification.md`
- `.ai/docs/02-business-domain-context.md`
- `.ai/docs/03-ui-ux-design-system.md`

## Scope

- Include: member layout/navigation, `/member/dashboard`, `/member/profile`, `/member/payments`, profile update Form Request, member-only authorization, payment listing, profile completion and latest payment summary.
- Exclude: Admin member management, admin payment creation/editing, online payment processing.

## Acceptance Criteria

- Member routes are behind auth middleware.
- Member dashboard shows welcome message, membership number, profile completion status, latest payment status, and upcoming/latest events.
- Member profile page allows a member to view and update their own name, email, phone, address, account details, and family details.
- Members cannot change role, membership number, payment records, or active status.
- Member payments page shows only the authenticated member's payment history with month, year, amount, paid date, method, reference, and notes.
- A member cannot view or update another member's profile or payments.
- UI clearly communicates the private member area and follows the design system.

## Implementation Notes

- Use policies/gates and scoped queries for privacy.
- Use Form Requests for profile updates.
- Consider transaction handling when updating profile and family rows together.
- Use Wayfinder route helpers in Vue links/forms where available.

## Verification Plan

- Add Pest tests proving a member can view/update their own profile, cannot access another profile, can view own payments, and cannot view another member's payments.
- Run focused member tests with `php artisan test --compact`.
- Run `vendor/bin/pint --dirty --format agent` after PHP changes.

## Privacy/Security Notes

- This task touches personal data, family data, bank/account details, and payment data.
- Never expose private member data publicly or to other members.
