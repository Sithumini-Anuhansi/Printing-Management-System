# Printing Management System

A role-based web application for running a printing business: orders, products,
raw materials, suppliers, and a separate dashboard for each staff role.

Built with **Laravel 9**, **MySQL**, Blade templates, Vite and Tailwind CSS.

## Features

- Login by **email + password + role** (the role must match the account's role)
- Seven role-based dashboards, each protected by role middleware
- CRUD screens for **Orders**, **Products**, **Materials** and **Suppliers**, limited by role
- Profile management, password reset and email verification (Laravel Breeze)
- Login rate limiting (5 failed attempts)

## Roles and access

| Role | Dashboard | CRUD access |
|---|---|---|
| Owner/Admin | `/dashboards/owner` | Materials, Suppliers, Orders, Products |
| Manager | `/dashboards/manager` | Materials, Suppliers, Orders, Products |
| Finance Officer | `/dashboards/finance` | none |
| Sales Officer | `/dashboards/sales` | Orders, Products |
| Production Manager | `/dashboards/production` | none |
| Inventory Manager | `/dashboards/inventory` | Materials, Suppliers |
| Logistics Officer | `/dashboards/logistics` | none |

Public self-registration (`/register`) always creates a **Sales Officer**.
Other roles must be created by an admin or by the seeder.

## Requirements

- PHP 8.0.2 or newer (with the `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json` extensions)
- Composer 2
- Node.js 16+ and npm
- MySQL 5.7+ / MariaDB 10.3+

## Setup

```bash
# 1. Install dependencies
composer install
npm install

# 2. Create your environment file and app key
cp .env.example .env
php artisan key:generate

# 3. Create an empty database
mysql -u root -p -e "CREATE DATABASE \`printing-management-system\` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# 4. Edit .env so the DB settings match
#    DB_DATABASE=printing-management-system
#    DB_USERNAME=root
#    DB_PASSWORD=<your password>

# 5. Create the tables and load the demo users
php artisan migrate --seed

# 6. Build the assets and start the server (two terminals)
npm run dev
php artisan serve
```

Open <http://127.0.0.1:8000/login>.

To reset everything and re-seed:

```bash
php artisan migrate:fresh --seed
```

To (re)seed only the users, without touching other data:

```bash
php artisan db:seed --class=UserSeeder
```

The seeder is idempotent: users are matched by email and updated in place, so
running it twice does not create duplicates. It refuses to run when
`APP_ENV=production`.

## Demo accounts

Log in at `/login`. Choose the **role** that matches the account, otherwise login fails.

| Role | Email | Password |
|---|---|---|
| Owner/Admin | `owner1@printing.test` | `Owner@123` |
| Owner/Admin | `owner2@printing.test` | `Owner@123` |
| Manager | `manager1@printing.test` | `Manager@123` |
| Manager | `manager2@printing.test` | `Manager@123` |
| Finance Officer | `finance1@printing.test` | `Finance@123` |
| Finance Officer | `finance2@printing.test` | `Finance@123` |
| Sales Officer | `sales1@printing.test` | `Sales@123` |
| Sales Officer | `sales2@printing.test` | `Sales@123` |
| Production Manager | `production1@printing.test` | `Production@123` |
| Production Manager | `production2@printing.test` | `Production@123` |
| Inventory Manager | `inventory1@printing.test` | `Inventory@123` |
| Inventory Manager | `inventory2@printing.test` | `Inventory@123` |
| Logistics Officer | `logistics1@printing.test` | `Logistics@123` |
| Logistics Officer | `logistics2@printing.test` | `Logistics@123` |

> **Development use only.** These credentials are published in this file. Never
> seed them into a production database, and change or delete them before deploying.

Each seeded user also gets a row in its role table (`owner`, `manager`,
`financeofficer`, `salesofficer`, `productionmanager`, `inventorymanager`,
`logisticsofficer`) with sample figures.

## Project structure

```
app/Http/Controllers/        Dashboards (one per role) + Order/Product/Material/Supplier CRUD
app/Http/Middleware/EnsureUserHasRole.php   The `role:` middleware
app/Http/Requests/Auth/LoginRequest.php     Email + password + role authentication
app/Models/User.php          Uses table `users`, primary key `UserID`, column `Role`
database/migrations/         Full schema (users, orders, production, finance, reports, ...)
database/seeders/            DatabaseSeeder -> UserSeeder
resources/views/dashboards/  One Blade view per role
routes/web.php               Routes and role restrictions
```

## Adding another user manually

```bash
php artisan tinker
```

```php
\App\Models\User::create([
    'Name' => 'Jane Doe', 'Email' => 'jane@printing.test', 'Password' => 'Secret@123',
    'Role' => 'Manager', 'Age' => 30, 'Address' => 'Colombo',
]);
```

`Role` must be exactly one of: `Owner/Admin`, `Manager`, `Finance Officer`,
`Sales Officer`, `Production Manager`, `Inventory Manager`, `Logistics Officer`.

## Troubleshooting

- **"These credentials do not match our records"**: check that the selected role matches the account in the table above.
- **Too many attempts**: login is limited to 5 failures per email and IP; wait a minute or clear the cache with `php artisan cache:clear`.
- **Blank or unstyled pages**: run `npm run dev` (or `npm run build`) so Vite assets exist.
- **`SQLSTATE ... Unknown database`**: create the database from step 3 and check `DB_DATABASE` in `.env`.
- **Login fails when "Remember Me" is ticked**: the `users` table has no `remember_token` column. Either leave the box unticked or add the column in a migration.

## Running tests

```bash
php artisan test
```

## License

MIT
