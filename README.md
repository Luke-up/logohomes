# Logo Homes Website

This project is a server-rendered PHP website with static frontend assets.

## Architecture

- **Entry point:** `home_directory/public_html/index.php`
- **Shared layout:** `home_directory/includes/header.php` and `home_directory/includes/footer.php`
- **Main page content:** `home_directory/public_html/home.php`
- **Sitemap page:** `home_directory/public_html/sitemap.php`
- **Contact submission handler:** `home_directory/includes/submit.php`
- **Shared helper functions:** `home_directory/includes/functions.php`
- **Frontend assets:** `home_directory/public_html/assets/css` and `home_directory/public_html/assets/js`

### Request flow

1. Browser requests a route.
2. `index.php` reads `$_SERVER['REQUEST_URI']`.
3. It includes a page script (for example `home.php` or `sitemap.php`).
4. The page includes shared header/footer templates.
5. CSS/JS assets are loaded from `public_html/assets`.

### Contact form flow

1. Contact form posts to `public_html/submit.php`.
2. That script forwards handling to `includes/submit.php`.
3. `includes/submit.php` sanitizes/validates fields.
4. PHPMailer sends email through SMTP.

## Live development

### 1) Prerequisite

Install PHP and verify:

```powershell
php -v
```

### 2) Start local server

From repo root (`C:/Users/Luke/projects/logohomes`):

```powershell
php -S localhost:8000 -t home_directory/public_html
```

### 3) Open local URLs

- `http://localhost:8000/`
- `http://localhost:8000/sitemap`
- `http://localhost:8000/contact`

## Contact email setup

Set SMTP values in `home_directory/includes/submit.php` before testing real sends:

- `$mail->Host`
- `$mail->Username`
- `$mail->Password`
- `$mail->setFrom(...)`
- `$mail->addAddress(...)`

Note: encryption and port should match provider requirements (`STARTTLS` commonly uses port `587`, SSL commonly uses `465`).
