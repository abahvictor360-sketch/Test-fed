# Coalition WordPress skills test

The PSD design (`CT_SkillTest_v1.psd`), built as a responsive WordPress theme
on top of the supplied Underscores base theme (`ct-custom`).

This folder holds the theme source, the database dump and the Apache vhost.
The full submission is a separate zip of the WordPress site with
`coalitiontest.sql` in its root folder.

| Item | Value |
| --- | --- |
| Site / home URL | `http://coalitiontest.local` |
| Admin user / password | `coalitiontest` / `wordpresstest` |
| Database | `coalitiontest` (DB user `coalitiontest` / `wordpresstest`, host `localhost`) |
| WordPress | 7.1.3 |
| Plugin | Contact Form 7 6.2.3 |

## Restoring locally

1. Add `127.0.0.1 coalitiontest.local` to your hosts file.
2. Add the vhost from `coalitiontest.local.vhost.conf`. Change `DocumentRoot`
   if your web root is somewhere else.
3. Create the database and user:
   ```sql
   CREATE DATABASE coalitiontest CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   CREATE USER 'coalitiontest'@'localhost' IDENTIFIED BY 'wordpresstest';
   GRANT ALL ON coalitiontest.* TO 'coalitiontest'@'localhost';
   ```
4. Import the dump: `mysql -u coalitiontest -pwordpresstest coalitiontest < coalitiontest.sql`
5. Unzip the site into the document root and open http://coalitiontest.local.

## What was built

- **`homepage.php`** (Template Name: Homepage). It is assigned to the page
  **"Homepage"**, which is set as the static front page.
- **Theme Settings** (top-level admin menu, built with the Settings API, no
  plugin): logo upload through the media library, company name, address, phone,
  fax, and Facebook/Twitter/LinkedIn/Pinterest links. The settings feed the
  logo, the top-bar "Call us now" number, the "Reach us" block and the social
  icons.
- **Menu**: "Main Menu" is created in Appearance → Menus and assigned to
  *Primary*. It has 7 top-level items, a dropdown under Title 2 and a
  third-level flyout, as in the PSD.
- **Contact Form 7**: "Homepage Contact Form" (Name, Phone, Email, Message).
- **Content you can edit in WordPress**: the intro text is the page editor
  content. The heading, the two section titles and the form shortcode are in
  the "Homepage Sections" meta box on the page.
- **Responsive**: under 900px the menu collapses behind a hamburger button and
  submenus are shown nested. Under 768px the contact columns stack. Under 480px
  the form fields go full width.

Theme code added or changed: `homepage.php`, `header.php`, `footer.php`,
`functions.php`, `inc/theme-settings.php`, `inc/homepage.php`,
`js/theme-settings.js`, `css/theme.css`, `images/logo.png`.
