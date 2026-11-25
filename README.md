# RUTSIRO MINING LTD

PHP 8+ / MySQL foundation for a bilingual B2B mineral trading and recruitment website.

## Current scope: Phase 1 only

Project directories, placeholder pages, brand tokens, shared includes, environment configuration and PDO connection helper are in place. **This is not a finished website.** The approved homepage reference is preserved at `docs/reference-homepage.png`; no replacement design has been introduced. Homepage implementation awaits Phase 2 approval.

No orders, quotes, contact messages, applications, admin logins or notifications are processed. There are no default admin credentials. Translation files are starter dictionaries only; full translation and switching are scheduled for Phase 3. Company contact details and operational claims require verification.

## Local setup — XAMPP / VS Code

1. Install XAMPP with PHP 8.0 or newer, MySQL/MariaDB, and Apache. Enable `pdo_mysql`, `session`, `json`, and `fileinfo` in PHP. Restart Apache after changing PHP configuration.
2. Place the repository folder at `C:\xampp\htdocs\rutsiro-mining` (Windows) or your XAMPP `htdocs/rutsiro-mining` directory. Open that folder in VS Code.
3. Copy `config/.env.example` to `config/.env`. Set database host, port, user and password. The example uses local XAMPP defaults only; never use an unprotected root account in production. No real mail address is configured.
4. Start Apache and MySQL in the XAMPP control panel.
5. Open `http://localhost/phpmyadmin`, choose **Import**, and import `database/rutsiro_mining.sql`. Phase 1 creates only `rutsiro_mining_db`; tables arrive in Phase 8.
6. Visit `http://localhost/rutsiro-mining/index.php`.

Use Apache with `.htaccess` support (`AllowOverride All`, authorization core enabled). Direct access to internal folders and uploads is denied. Do not use PHP's built-in server on a public interface: it does not enforce `.htaccess`. No production deployment is ready yet. The asset/navigation base path is currently `/rutsiro-mining`; update the shared header/footer when deploying to a different path.

Bootstrap and Google Fonts are optional external presentation dependencies at this stage; system font fallbacks exist. Vendor assets locally in the performance phase for offline use.

## File map — where files belong

All paths are relative to this repository root; no manual copy of individual files is required.

| Location | Purpose |
| --- | --- |
| `index.php` | Homepage placeholder; Phase 2 |
| `about.php` | Company page placeholder; Phase 4 |
| `products.php`, `product-details.php` | Catalog placeholders; Phase 5 |
| `how-it-works.php`, `request-quote.php` | Inquiry workflow placeholders; Phase 6 |
| `careers.php`, `job-details.php` | Recruitment placeholders; Phase 7 |
| `contact.php` | Contact placeholder; processing in Phase 9 |
| `assets/css/style.css`, `responsive.css` | Brand tokens and scaffold styles, not final homepage |
| `assets/js/main.js`, `language.js` | JavaScript entry points |
| `assets/images/`, `assets/icons/` | Future public visual assets |
| `config/database.php`, `.env.example` | Lazy PDO connection and environment template |
| `includes/header.php`, `footer.php`, `functions.php` | Shared layout and helper foundation |
| `languages/en.json`, `rw.json` | Central starter dictionaries |
| `backend/submit-*.php` | Disabled submission endpoints (HTTP 503) |
| `admin/login.php`, `dashboard.php` | Disabled administration pages (HTTP 503) |
| `admin/products/`, `quotations/`, `careers/`, `applications/`, `settings/` | Future admin modules |
| `uploads/` | Private upload placeholder; no upload handler yet |
| `database/rutsiro_mining.sql` | Database creation only; no business tables yet |
| `docs/reference-homepage.png` | Supplied visual target; not a public website image |

## Phase 1 verification

Run the following from a terminal with PHP available:

```sh
php -v
php -m
# macOS/Linux/Git Bash: lint every PHP file
find . -name '*.php' -not -path './vendor/*' -exec php -l {} \;
# After configuring .env and importing SQL:
php -r 'require "config/database.php"; echo dbAvailable() ? "Database reachable\n" : "Database unavailable\n";'
```

Manual checks in XAMPP:

- Open each public page using the navigation and direct URLs for detail pages; expect setup-only notices, no forms and no missing CSS/JS.
- Resize to mobile width; ensure navigation remains usable. Final responsive navigation belongs to Phase 3.
- Visit `/rutsiro-mining/admin/login.php` and `admin/dashboard.php`: expect HTTP 503, no login form or customer data.
- POST to each `backend/submit-*.php`: expect HTTP 503 JSON, never a saved-request confirmation.
- Request `config/.env`, `config/database.php`, `database/rutsiro_mining.sql`, `includes/functions.php`, `uploads/`, and `docs/reference-homepage.png` through Apache: expect HTTP 403.
- Stop MySQL and load a public page: it should still work because connection creation is lazy. The CLI check should report unavailable without exposing credentials.
- Check that `.env` and future uploaded files do not appear in `git status`.

The Arena workspace did not provide PHP or MySQL during Phase 1 preparation. PHP linting, Apache behavior and live database tests must therefore be run in XAMPP; they have not been claimed as passing here.

## Next phases

2. Approved-reference homepage design.
3. Responsive navigation and complete bilingual system.
4. Company information.
5. Mineral catalog and details.
6. Quotation/customer inquiry workflow.
7. Careers and applications.
8. MySQL relationships, indexes and tables.
9. Backend validation, persistence and notifications.
10. Secure role-based administration.
11. Security, testing and performance.
12. Deployment preparation.

Stop after Phase 1 until the owner confirms proceeding.
