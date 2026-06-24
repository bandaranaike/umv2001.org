# UMV2001.org - UI/UX Design System

## Purpose

This document defines the visual design, user experience rules, Tailwind CSS style direction, and reusable UI patterns for the UMV2001.org website.

The goal is to create a **minimal, clean, modern, warm, and trustworthy** website for the UMV 2001 O/L Alumni Association.

The design should feel:

* Friendly
* Simple
* Community-focused
* Professional
* Respectful
* Easy to use

Avoid designs that feel:

* Too corporate
* Too colorful
* Too complex
* Too decorative
* Too commercial

---

# Design Principles

## 1. Simplicity First

Every screen should be easy to understand.

Use:

* Clear page titles
* Short descriptions
* Simple forms
* Clear buttons
* Good spacing

Avoid:

* Too many colors
* Too many card styles
* Complex layouts
* Decorative elements without purpose

---

## 2. Mobile First

Most users may access the website from mobile phones.

Design every page mobile-first.

Minimum requirements:

* Responsive navigation
* Readable text on small screens
* Buttons easy to tap
* Forms easy to complete
* Tables should become cards or scroll horizontally on mobile

---

## 3. Privacy-Aware Design

Because the system stores personal member data, private information must feel protected.

Use:

* Clear private area separation
* “Member Area” labels
* “Admin Area” labels
* Confirmation before destructive actions
* Friendly helper text for sensitive fields

Do not publicly expose:

* Member contact details
* Family details
* Payment records
* Bank/account details

---

## 4. Accessibility

The UI should be usable by all members.

Requirements:

* Good color contrast
* Visible focus states
* Labels for every form field
* Error messages close to fields
* Buttons with clear text
* Do not rely on color alone

---

# Color System

Use a calm, simple color palette.

## Primary Color

Use emerald green as the primary color.

Tailwind classes:

```txt
emerald-50
emerald-100
emerald-600
emerald-700
emerald-800
```

Primary button:

```txt
bg-emerald-700 hover:bg-emerald-800 text-white
```

Primary text highlight:

```txt
text-emerald-700
```

Soft background:

```txt
bg-emerald-50
```

## Neutral Colors

Use neutral gray/slate for structure.

Recommended:

```txt
slate-50
slate-100
slate-200
slate-300
slate-500
slate-600
slate-700
slate-800
slate-900
```

Main page background:

```txt
bg-white
```

Section alternate background:

```txt
bg-slate-50
```

Text:

```txt
text-slate-900
text-slate-700
text-slate-500
```

Borders:

```txt
border-slate-200
```

## Status Colors

Success:

```txt
bg-emerald-50 text-emerald-700 border-emerald-200
```

Warning:

```txt
bg-amber-50 text-amber-700 border-amber-200
```

Danger:

```txt
bg-red-50 text-red-700 border-red-200
```

Info:

```txt
bg-blue-50 text-blue-700 border-blue-200
```

---

# Typography

Use the default Laravel/Tailwind font stack unless a custom font is already installed.

Recommended:

```txt
font-sans
```

## Headings

Page title:

```txt
text-3xl md:text-4xl font-bold tracking-tight text-slate-900
```

Section title:

```txt
text-2xl md:text-3xl font-semibold tracking-tight text-slate-900
```

Card title:

```txt
text-lg font-semibold text-slate-900
```

## Body Text

Normal paragraph:

```txt
text-base leading-7 text-slate-600
```

Small text:

```txt
text-sm text-slate-500
```

Helper text:

```txt
text-sm text-slate-500
```

Error text:

```txt
text-sm text-red-600
```

---

# Layout System

## Page Container

Use consistent max width.

```txt
mx-auto max-w-7xl px-4 sm:px-6 lg:px-8
```

For narrow content pages:

```txt
mx-auto max-w-3xl px-4 sm:px-6 lg:px-8
```

## Section Spacing

Public page section:

```txt
py-16 sm:py-20
```

Compact dashboard section:

```txt
py-8
```

## Card Spacing

Card:

```txt
rounded-2xl border border-slate-200 bg-white p-6 shadow-sm
```

Compact card:

```txt
rounded-xl border border-slate-200 bg-white p-4 shadow-sm
```

---

# Public Website Layout

## Header

Header should be minimal and sticky optional.

Recommended style:

```txt
border-b border-slate-200 bg-white/90 backdrop-blur
```

Header content:

* Association name/logo
* Navigation links
* Login button

Desktop nav:

```txt
hidden md:flex items-center gap-8
```

Mobile nav:

* Use hamburger menu
* Keep links simple
* Show Login button clearly

Navigation links:

```txt
text-sm font-medium text-slate-600 hover:text-emerald-700
```

Active link:

```txt
text-emerald-700
```

## Footer

Footer should include:

* Association name
* Short description
* Quick links
* Legal links
* Copyright

Footer style:

```txt
border-t border-slate-200 bg-slate-50
```

---

# Home Page Design

## Hero Section

The hero should be simple, warm, and community-focused.

Recommended structure:

* Badge: “UMV 2001 O/L Alumni Association”
* Main heading
* Short description
* Two buttons
* Optional simple image/card area

Hero title example:

```txt
text-4xl font-bold tracking-tight text-slate-900 sm:text-6xl
```

Hero paragraph:

```txt
mt-6 text-lg leading-8 text-slate-600
```

Primary CTA:

```txt
rounded-full bg-emerald-700 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-emerald-800
```

Secondary CTA:

```txt
rounded-full border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50
```

## Home Sections

Recommended sections:

1. Hero
2. About preview
3. Social wellness programs
4. Latest events
5. Contact CTA

Keep each section short.

---

# Event Pages

## Event Card

Use cards for event listings.

Card style:

```txt
overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md
```

Image:

```txt
aspect-[16/9] w-full object-cover
```

Content:

```txt
p-5
```

Event metadata:

```txt
text-sm text-slate-500
```

Event title:

```txt
text-lg font-semibold text-slate-900
```

## Event Detail Page

Layout:

* Title
* Date and location
* Main description
* Photo gallery

Gallery grid:

```txt
grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3
```

Photo:

```txt
aspect-[4/3] w-full rounded-xl object-cover
```

---

# Forms

Forms should be simple and clear.

## Form Group

```txt
space-y-2
```

## Label

```txt
block text-sm font-medium text-slate-700
```

## Input

```txt
block w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 shadow-sm placeholder:text-slate-400 focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20
```

## Textarea

```txt
block w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 shadow-sm placeholder:text-slate-400 focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20
```

## Select

```txt
block w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-slate-900 shadow-sm focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20
```

## Required Field Indicator

Use:

```txt
<span class="text-red-500">*</span>
```

## Error Message

```txt
mt-1 text-sm text-red-600
```

## Help Text

```txt
mt-1 text-sm text-slate-500
```

---

# Buttons

## Primary Button

```txt
inline-flex items-center justify-center rounded-xl bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-emerald-800 focus:outline-none focus:ring-2 focus:ring-emerald-600/30 disabled:cursor-not-allowed disabled:opacity-50
```

## Secondary Button

```txt
inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-400/30
```

## Danger Button

```txt
inline-flex items-center justify-center rounded-xl bg-red-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500/30
```

## Ghost Button

```txt
inline-flex items-center justify-center rounded-xl px-4 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-100 hover:text-slate-900
```

---

# Member Area Design

Member area should feel calm and secure.

## Member Dashboard Cards

Use simple cards:

```txt
rounded-2xl border border-slate-200 bg-white p-6 shadow-sm
```

Dashboard metrics:

* Membership number
* Current month payment status
* Profile completion
* Latest event

## Member Navigation

Use clear labels:

* Dashboard
* My Profile
* My Payments
* Events

Active state:

```txt
bg-emerald-50 text-emerald-700
```

Inactive state:

```txt
text-slate-600 hover:bg-slate-50 hover:text-slate-900
```

---

# Admin Area Design

Admin area should prioritize efficiency and clarity.

## Admin Sidebar

Sidebar items:

* Dashboard
* Members
* Payments
* Events
* Contact Messages

Sidebar style:

```txt
border-r border-slate-200 bg-white
```

Active item:

```txt
bg-emerald-50 text-emerald-700
```

## Admin Tables

Use tables on desktop.

Table wrapper:

```txt
overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm
```

Table:

```txt
min-w-full divide-y divide-slate-200
```

Table head:

```txt
bg-slate-50
```

Table header cell:

```txt
px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500
```

Table body cell:

```txt
px-4 py-4 text-sm text-slate-700
```

On mobile:

* Use horizontal scroll
* Or convert important tables to stacked cards

---

# Badges

## Published

```txt
inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-200
```

## Draft

```txt
inline-flex items-center rounded-full bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-600 ring-1 ring-inset ring-slate-200
```

## Unpaid

```txt
inline-flex items-center rounded-full bg-amber-50 px-2.5 py-1 text-xs font-medium text-amber-700 ring-1 ring-inset ring-amber-200
```

## Paid

```txt
inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-200
```

---

# Empty States

Use friendly empty states.

Example:

Title:

```txt
No events found
```

Description:

```txt
There are no published events at the moment. Please check again later.
```

Container:

```txt
rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-8 text-center
```

---

# Alerts

## Success Alert

```txt
rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-700
```

## Error Alert

```txt
rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700
```

## Info Alert

```txt
rounded-xl border border-blue-200 bg-blue-50 p-4 text-sm text-blue-700
```

---

# Contact Page UX

The contact page form must be very simple.

Fields:

* Name
* Email
* Phone
* Message

Rules:

* Name is required.
* Message is required.
* User must provide either email or phone.
* Email and phone are not both required.
* If email is empty, phone is required.
* If phone is empty, email is required.

Show helper text:

```txt
Please provide either your email address or phone number so we can contact you.
```

Submit button text:

```txt
Send Message
```

Success message:

```txt
Thank you. Your message has been received.
```

---

# Legal Pages UX

Legal pages should be readable and narrow.

Use:

```txt
mx-auto max-w-3xl px-4 sm:px-6 lg:px-8 py-16
```

Text style:

```txt
prose prose-slate max-w-none
```

If Tailwind Typography plugin is not installed, use normal heading and paragraph classes.

---

# Loading States

Use simple loading states.

For forms:

* Disable submit button while processing.
* Change text to “Saving...” or “Sending...”

Example:

```txt
disabled:opacity-50 disabled:cursor-not-allowed
```

---

# Confirmation Dialogs

Use confirmation for destructive actions:

* Delete event
* Delete photo
* Delete contact message
* Deactivate member

Message style:

```txt
Are you sure you want to continue? This action cannot be undone.
```

---

# Icon Usage

Icons are optional.

If used, use simple outline icons.

Recommended library:

```txt
lucide-vue-next
```

Rules:

* Do not overuse icons.
* Use icons only where they improve scanning.
* Keep icon size consistent: `h-5 w-5`.

---

# Image Guidelines

Event photos:

* Use object-cover
* Keep rounded corners
* Avoid distorted images
* Use placeholders if no image exists

Placeholder style:

```txt
flex aspect-[16/9] items-center justify-center bg-slate-100 text-sm text-slate-500
```

---

# Component Naming

Create reusable Vue components where possible.

Suggested components:

* `AppLogo.vue`
* `PublicHeader.vue`
* `PublicFooter.vue`
* `PublicLayout.vue`
* `MemberLayout.vue`
* `AdminLayout.vue`
* `PageHeader.vue`
* `SectionHeader.vue`
* `PrimaryButton.vue`
* `SecondaryButton.vue`
* `DangerButton.vue`
* `TextInput.vue`
* `TextareaInput.vue`
* `SelectInput.vue`
* `InputError.vue`
* `InputLabel.vue`
* `StatusBadge.vue`
* `EmptyState.vue`
* `ConfirmDialog.vue`
* `DataTable.vue`
* `EventCard.vue`

---

# UI Copy Style

Use short and clear text.

Good examples:

```txt
My Payments
Update Profile
View Event
Send Message
Mark as Read
Add Payment
Create Event
```

Avoid vague labels:

```txt
Submit
Click Here
Manage Stuff
Proceed
```

---

# Final UI Goal

The final interface should look like a modern community association website, not a complex enterprise system.

It should be:

* Easy for older members to use
* Clear for administrators
* Friendly for public visitors
* Safe for private information
* Simple to maintain
* Consistent across every page
