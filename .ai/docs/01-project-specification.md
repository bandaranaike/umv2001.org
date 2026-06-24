# UMV2001.org Website Build Specification

## Project

Build a minimal, clean, modern website for **UMV 2001 O/L Alumni Association**, a welfare society of Alumni of Udadumbara Maha Vidyalaya, now Udadumbara Secondary School.

Domain: **umv2001.org**
Project path: `/var/www/umv2001`

## Technology

Use:

* Laravel 13
* Inertia.js
* Vue 3 preferred, not both React and Vue
* TypeScript
* Tailwind CSS
* MySQL or MariaDB
* Laravel authentication
* Laravel Policies / Gates
* Laravel Form Requests
* Vite

Laravel’s Vue starter kit uses Inertia, Vue Composition API, TypeScript, Tailwind, and shadcn-vue, so follow that structure where possible. Inertia allows SPA-style Vue pages while still using Laravel routing and controllers.

## Design Direction

Create a very minimal, clean, modern UI.

Style:

* White background
* Soft gray sections
* Dark text
* One primary color: emerald/green or deep blue
* Rounded cards
* Good spacing
* Mobile-first responsive design
* No heavy animations
* No clutter
* Simple typography

Public layout:

* Header with logo/name
* Navigation: Home, About, Events, Contact
* Login button
* Footer with quick links and policies

Authenticated layout:

* Simple sidebar or top navigation
* Dashboard
* My Profile
* My Payments
* Events
* Logout

Admin layout:

* Dashboard
* Members
* Payments
* Events
* Contact Messages
* Settings

## User Roles

Create roles using a simple enum or database field.

Roles:

* `admin`
* `member`

Only admins can manage members, payments, events, and contact messages.

Members can only view and update their own profile and view their own payment history.

## Main Database Tables

### users

Use Laravel default users table and add:

* `role`
* `membership_number`
* `phone`
* `address`
* `is_active`
* `joined_at`

### member_profiles

Fields:

* `id`
* `user_id`
* `full_name`
* `email`
* `phone`
* `address`
* `membership_number`
* `nic_optional`
* `date_of_birth_optional`
* `occupation_optional`
* `account_name_optional`
* `bank_name_optional`
* `branch_optional`
* `account_number_optional`
* `created_at`
* `updated_at`

Important: Bank/account details are private. Admin can see them. Members can view/update their own details.

### member_family_members

Fields:

* `id`
* `user_id`
* `relationship`

Allowed relationship values:

* `mother`
* `father`
* `spouse`
* `child`
* `other`

Fields:

* `name`
* `phone_optional`
* `date_of_birth_optional`
* `notes_optional`

### membership_payments

Fields:

* `id`
* `user_id`
* `month`
* `year`
* `amount`
* `paid_at`
* `payment_method`
* `reference_optional`
* `notes_optional`
* `recorded_by`
* `created_at`
* `updated_at`

Rules:

* Admin creates and updates payment records.
* Member can only view own records.
* Prevent duplicate payment for same member, month, and year.

### events

Fields:

* `id`
* `title`
* `slug`
* `short_description`
* `description`
* `location`
* `start_date`
* `end_date_optional`
* `start_time_optional`
* `end_time_optional`
* `is_published`
* `published_at_optional`
* `created_by`
* `created_at`
* `updated_at`

### event_photos

Fields:

* `id`
* `event_id`
* `image_path`
* `caption_optional`
* `sort_order`
* `created_at`
* `updated_at`

### contact_messages

Fields:

* `id`
* `name`
* `email_optional`
* `phone_optional`
* `message`
* `is_read`
* `created_at`
* `updated_at`

Validation:

* `name` is required
* `message` is required
* At least one of `email` or `phone` is required
* If email is provided, validate as email
* If phone is provided, validate as string with reasonable max length

## Public Pages

### Home Page

Route: `/`

Sections:

* Hero section:

    * Title: UMV 2001 O/L Alumni Association
    * Subtitle: Welfare society of old boys and girls of Udadumbara Maha Vidyalaya
    * CTA: View Events
    * CTA: Contact Us

* About preview

* Latest events

* Social wellness programs section

* Contact CTA

### About Page

Route: `/about`

Content:

* Who we are
* Our school history mention
* Welfare society purpose
* Social wellness and anti-drug awareness programs
* Community support goals

### Events Index

Route: `/events`

Show published events only.

Each card:

* Title
* Date
* Location
* Short description
* Cover/latest photo if available
* View details button

### Event Detail

Route: `/events/{slug}`

Show:

* Title
* Date/duration
* Location
* Description
* Photo gallery

### Contact Page

Route: `/contact`

Form fields:

* Name: required
* Email: optional, but required if phone is empty
* Phone: optional, but required if email is empty
* Message: required

After submit:

* Store in `contact_messages`
* Show success message
* Do not send email initially unless mail config exists

### Legal Pages

Create simple static pages:

* `/terms-of-use`
* `/privacy-policy`
* `/cookie-policy`

Privacy page must mention that member personal details, family details, and payment records are private and not publicly displayed.

## Member Area

Routes must be behind auth middleware.

### Member Dashboard

Route: `/member/dashboard`

Show:

* Welcome message
* Membership number
* Profile completion status
* Latest payment status
* Upcoming/latest events

### My Profile

Route: `/member/profile`

Member can view and update:

* Name
* Email
* Phone
* Address
* Account details
* Family details

Do not allow member to change:

* Role
* Membership number
* Payment records
* Active status

### My Payments

Route: `/member/payments`

Show table:

* Month
* Year
* Amount
* Paid date
* Method
* Reference
* Notes

## Admin Area

Routes must be behind auth and admin middleware.

### Admin Dashboard

Route: `/admin/dashboard`

Show:

* Total members
* Active members
* Total payments this month
* Unread contact messages
* Published events

### Manage Members

Routes:

* `/admin/members`
* `/admin/members/create`
* `/admin/members/{user}/edit`
* `/admin/members/{user}`

Admin can:

* Create member
* Edit member
* Assign membership number
* Activate/deactivate member
* Reset temporary password
* View member family details
* View payment history

### Manage Payments

Routes:

* `/admin/payments`
* `/admin/payments/create`
* `/admin/payments/{payment}/edit`

Admin can:

* Add monthly payment
* Edit payment
* Filter by member, month, year
* Export later if needed

### Manage Events

Routes:

* `/admin/events`
* `/admin/events/create`
* `/admin/events/{event}/edit`

Admin can:

* Create event
* Upload photos
* Publish/unpublish
* Edit slug
* Delete photos
* Sort photos

### Contact Messages

Route: `/admin/contact-messages`

Admin can:

* View contact messages
* Mark as read
* Delete message

## Suggested Laravel Structure

Controllers:

* `Public/HomeController`
* `Public/AboutController`
* `Public/EventController`
* `Public/ContactController`
* `Public/LegalPageController`
* `Member/DashboardController`
* `Member/ProfileController`
* `Member/PaymentController`
* `Admin/DashboardController`
* `Admin/MemberController`
* `Admin/PaymentController`
* `Admin/EventController`
* `Admin/ContactMessageController`

Models:

* `User`
* `MemberProfile`
* `MemberFamilyMember`
* `MembershipPayment`
* `Event`
* `EventPhoto`
* `ContactMessage`

Form Requests:

* `StoreContactMessageRequest`
* `UpdateMemberProfileRequest`
* `StoreAdminMemberRequest`
* `UpdateAdminMemberRequest`
* `StoreMembershipPaymentRequest`
* `UpdateMembershipPaymentRequest`
* `StoreEventRequest`
* `UpdateEventRequest`

Policies:

* `UserPolicy`
* `MembershipPaymentPolicy`
* `EventPolicy`
* `ContactMessagePolicy`

Middleware:

* `EnsureUserIsAdmin`
* `EnsureUserIsActive`

## Frontend Pages

Use Vue pages under `resources/js/pages`.

Public:

* `Welcome.vue`
* `About.vue`
* `Events/Index.vue`
* `Events/Show.vue`
* `Contact.vue`
* `Legal/TermsOfUse.vue`
* `Legal/PrivacyPolicy.vue`
* `Legal/CookiePolicy.vue`

Member:

* `Member/Dashboard.vue`
* `Member/Profile/Edit.vue`
* `Member/Payments/Index.vue`

Admin:

* `Admin/Dashboard.vue`
* `Admin/Members/Index.vue`
* `Admin/Members/Create.vue`
* `Admin/Members/Edit.vue`
* `Admin/Members/Show.vue`
* `Admin/Payments/Index.vue`
* `Admin/Payments/Create.vue`
* `Admin/Payments/Edit.vue`
* `Admin/Events/Index.vue`
* `Admin/Events/Create.vue`
* `Admin/Events/Edit.vue`
* `Admin/ContactMessages/Index.vue`

Shared components:

* `PublicLayout.vue`
* `MemberLayout.vue`
* `AdminLayout.vue`
* `FormInput.vue`
* `FormTextarea.vue`
* `FormSelect.vue`
* `PrimaryButton.vue`
* `SecondaryButton.vue`
* `DangerButton.vue`
* `PageHeader.vue`
* `EmptyState.vue`
* `DataTable.vue`
* `StatusBadge.vue`

## Contact Form Validation Example

Use Laravel Form Request.

Rules:

* `name`: required, string, max:255
* `email`: nullable, email, max:255, required_without:phone
* `phone`: nullable, string, max:30, required_without:email
* `message`: required, string, max:5000

Custom message:

* “Please provide either an email address or phone number.”

## Security Requirements

* Use HTTPS in production
* Do not expose member list publicly
* Do not expose family details publicly
* Do not expose account details publicly
* Use authorization policies
* Protect admin routes
* Validate all requests
* Use CSRF protection
* Store uploaded images safely
* Limit event photo uploads by file type and size
* Use pagination for admin tables
* Use soft deletes where useful for members, events, and payments
* Add database backups before production

## Seed Data

Create seeders:

* Admin user:

    * Email: [admin@umv2001.org](mailto:admin@umv2001.org)
    * Password: password
    * Role: admin

* Example members

* Example events

* Example payments

Force password change later if needed.

## Implementation Steps

1. Confirm Laravel 13 app runs in `/var/www/umv2001`.
2. Install/configure Laravel Vue Inertia starter kit if not already installed.
3. Configure database in `.env`.
4. Create migrations, models, factories, and seeders.
5. Create authentication.
6. Add roles and middleware.
7. Build public pages.
8. Build contact form and contact message storage.
9. Build member dashboard/profile/payment pages.
10. Build admin dashboard.
11. Build member management.
12. Build payment management.
13. Build event management with photo upload.
14. Build legal pages.
15. Add responsive UI polish.
16. Add validation and authorization tests.
17. Run migrations and seeders.
18. Run formatting and tests.
19. Prepare production deployment checklist.

## Testing Requirements

Write tests for:

* Public pages load
* Contact form validation
* Contact form requires email or phone
* Member can view own profile
* Member cannot view another member profile
* Member can view own payments
* Admin can manage members
* Admin can manage payments
* Admin can manage events
* Public users only see published events

## Final Goal

Deliver a clean, minimal, production-ready Laravel 13 + Inertia + Vue + Tailwind website for **umv2001.org**, with public event pages, member profile area, payment visibility, admin management, and basic privacy-conscious handling of member data.
