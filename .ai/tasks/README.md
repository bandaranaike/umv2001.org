# Task Authoring Guide

Raw task inputs are collected in `.ai/task_inbox.md`. When organizing work, create structured task files in this folder and use the project docs as the source of truth:

- `.ai/docs/01-project-specification.md`
- `.ai/docs/02-business-domain-context.md`
- `.ai/docs/03-ui-ux-design-system.md`

Tasks should be written and implemented to use the minimum practical Codex quota. Keep each task narrow, reuse existing project patterns, read only the relevant context, and run focused verification before broader checks.

## Task File Template

```md
# Task: Short Descriptive Title

Status: Pending

## Raw Input

Paste the original task text from `.ai/task_inbox.md`.

## Goal

Describe the concrete outcome in one or two sentences.

## Relevant Source Docs

- `.ai/docs/01-project-specification.md`
- `.ai/docs/02-business-domain-context.md`
- `.ai/docs/03-ui-ux-design-system.md`

## Scope

- Include:
- Exclude:

## Acceptance Criteria

- The expected behavior is testable.
- Public/member/admin access rules are clear.
- UI follows the design system when frontend work is involved.

## Implementation Notes

- Use Laravel 13, Inertia v3, Vue 3, TypeScript, Tailwind CSS v4, Fortify, Wayfinder, and Pest conventions already present in the project.
- Use Form Requests, policies/gates, named routes, and Wayfinder route helpers where applicable.
- Keep private member, family, bank, payment, and contact message data out of public views.
- Reuse existing components, controllers, requests, policies, factories, and tests before creating new patterns.

## Verification Plan

- Add or update focused Pest tests for changed behavior.
- Run the minimum relevant test command with `php artisan test --compact`.
- Run `vendor/bin/pint --dirty --format agent` after PHP changes.
- Broaden test/build commands only when the change touches shared behavior or frontend build-critical code.

## Privacy/Security Notes

- Note any personal, family, bank, payment, contact, admin-only, or uploaded-file data touched by this task.

## Codex Quota Notes

- List the smallest relevant docs/files to read before implementation.
- Identify existing files/components/tests to reuse.
- State the focused commands needed for verification.
- Avoid unrelated refactors, dependency changes, and broad exploratory work.
```
