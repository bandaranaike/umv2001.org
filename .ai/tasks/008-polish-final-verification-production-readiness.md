# Task: Responsive Polish, Full Verification, and Production Readiness

Status: Completed

## Raw Input

Derived from `.ai/docs/01-project-specification.md`, especially Design Direction, Security Requirements, Implementation Steps 15-19, Testing Requirements, and Final Goal.

## Goal

Polish the complete UMV2001 application, verify behavior with focused tests, and prepare a production-readiness checklist.

## Relevant Source Docs

- `.ai/docs/01-project-specification.md`
- `.ai/docs/02-business-domain-context.md`
- `.ai/docs/03-ui-ux-design-system.md`

## Scope

- Include: responsive UI pass, accessibility pass, privacy review, route/access review, validation review, test coverage review, formatting, build verification, migrations/seeding verification, and deployment checklist.
- Exclude: New feature development beyond fixes needed to meet the specification.

## Acceptance Criteria

- Public, member, and admin UI are mobile-first, clean, minimal, and consistent with the design system.
- Forms have labels, error messages near fields, loading/disabled states, and accessible focus states.
- Public pages do not expose private member, family, bank/account, payment, contact, or unpublished event data.
- Admin and member route protections are verified server-side.
- Required tests exist for public pages, contact validation, member privacy, admin management, payment management, event management, and published-only public events.
- Relevant Pest tests pass.
- PHP code is formatted with Pint.
- Frontend build or dev workflow is verified enough to catch obvious Vite/TypeScript issues.
- Production-readiness notes cover HTTPS, database backups, uploaded image storage, environment configuration, and deployment steps.

## Implementation Notes

- Fix gaps found during the review rather than adding unrelated refinements.
- Use the minimum relevant commands first, then broaden testing if shared behavior changed.
- Do not create production credentials or make destructive production changes.

## Verification Plan

- Run focused Pest suites first, then the full relevant test suite if needed.
- Run `vendor/bin/pint --dirty --format agent`.
- Run the frontend build/check command used by the project if available.
- Review route list for public/member/admin separation.

## Privacy/Security Notes

- Final review must specifically verify privacy boundaries for member, family, bank/account, payment, contact message, and unpublished event data.
