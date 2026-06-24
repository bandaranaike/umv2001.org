# Task: Public Website Pages

Status: Pending

## Raw Input

Derived from `.ai/docs/01-project-specification.md`, especially Design Direction, Public Pages, Frontend Pages, Shared Components, Security Requirements, Implementation Steps 7 and 14, and Testing Requirements.

## Goal

Build the public UMV2001 website pages with a clean, mobile-first Inertia Vue experience for visitors.

## Relevant Source Docs

- `.ai/docs/01-project-specification.md`
- `.ai/docs/02-business-domain-context.md`
- `.ai/docs/03-ui-ux-design-system.md`

## Scope

- Include: public layout, header, footer, home page, about page, legal pages, public navigation, shared UI components needed by public pages, and responsive styling.
- Exclude: Contact form persistence, event listing/detail behavior, member area, admin area.

## Acceptance Criteria

- `/` renders a home page with hero, UMV 2001 O/L Alumni Association title, subtitle, View Events CTA, Contact Us CTA, about preview, latest events area, social wellness programs section, and contact CTA.
- `/about` explains who the association is, school history context, welfare society purpose, social wellness and anti-drug awareness programs, and community support goals.
- `/terms-of-use`, `/privacy-policy`, and `/cookie-policy` render simple readable static legal pages.
- Privacy policy states that member personal details, family details, and payment records are private and not publicly displayed.
- Public layout includes association name/logo area, Home, About, Events, Contact navigation, Login button, and footer links.
- UI follows the minimal white/slate/emerald, rounded, mobile-first design direction.
- Public pages load without authentication.

## Implementation Notes

- Use Inertia server-side routing with `Inertia::render()`.
- Vue pages should live under `resources/js/pages`.
- Use named routes and Wayfinder route helpers in frontend links where available.
- Use reusable layout/button/page-header components if existing components do not already cover the need.

## Verification Plan

- Add or update Pest feature tests proving public pages load.
- Run `php artisan test --compact` with the relevant public page test file or filter.
- Run frontend formatting/build checks only if frontend configuration requires it for changed files.

## Privacy/Security Notes

- Public pages must not expose member lists, member contact details, family details, bank/account details, payment records, or unpublished events.
