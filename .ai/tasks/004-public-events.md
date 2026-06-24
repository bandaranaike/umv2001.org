# Task: Public Events Listing and Detail Pages

Status: Pending

## Raw Input

Derived from `.ai/docs/01-project-specification.md`, especially Events Index, Event Detail, events and event_photos tables, Frontend Pages, and Testing Requirements.

## Goal

Build public event discovery pages that show only published association events and their approved photos.

## Relevant Source Docs

- `.ai/docs/01-project-specification.md`
- `.ai/docs/02-business-domain-context.md`
- `.ai/docs/03-ui-ux-design-system.md`

## Scope

- Include: `/events`, `/events/{slug}`, published-event queries, event cards, event detail page, photo gallery display, empty state, and public event tests.
- Exclude: Admin event creation/editing, photo upload management, unpublished preview access.

## Acceptance Criteria

- `/events` lists only published events.
- Event cards show title, date, location, short description, cover/latest photo if available, and a View Details action.
- `/events/{slug}` shows title, date/duration, location, description, and photo gallery.
- Unpublished events are not visible publicly by index or direct slug access.
- Event pages use mobile-first card/gallery layouts from the design system.

## Implementation Notes

- Use route model binding by slug if practical.
- Keep event query projections focused on public fields.
- Use empty states when no published events exist.

## Verification Plan

- Add Pest tests proving published events appear and unpublished events do not appear.
- Add a direct-access test for unpublished event slugs.
- Run focused event tests with `php artisan test --compact`.

## Privacy/Security Notes

- Public event pages must expose only published event content and public photo assets.
