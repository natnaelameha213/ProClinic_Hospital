# ProClinic Hospital

> Clinic / hospital management system

**Live demo:** https://proclinic-hospital.freedev.app

## Screenshots

![Login](docs/screenshots/login.png)
![Dashboard](docs/screenshots/dashboard.png)

## Features

- Secure login with hashed passwords and role-based users (admin, doctor, receptionist)
- Dashboard with live KPIs and today's appointments
- Patients, doctors and appointments management
- Medical records, prescriptions and lab tests
- Billing and payments
- Reports and user management
- CSRF protection on every form, PDO prepared statements, XSS-safe output

## Tech stack

PHP 8 · MySQL (PDO) · Bootstrap 5 · JavaScript

## Demo login (local install)

| Role | Email / user | Password |
|---|---|---|
| Admin | `admin@proclinic.local` | `Admin123!` |

These are the default credentials of the seed data. The live demo's admin password is private.

## Run locally (XAMPP)

1. Copy this folder to `C:\xampp\htdocs\ProClinic_Hospital`
2. Start **Apache** and **MySQL** in XAMPP
3. Open phpMyAdmin → **Import** → `database/proclinic.sql`
4. Check the database settings in `config/config.php` (default: host `localhost`, user `root`, empty password)
5. Open `http://localhost/ProClinic_Hospital/`

### Deploying to shared hosting

Create an empty database in your hosting panel, delete the `CREATE DATABASE` / `USE` / `DROP DATABASE` lines at the top of `database/proclinic.sql`, import it, then put the host's database name, user and password in `config/config.php`.

## Notes

Portfolio / demo project. Before real production use add HTTPS, rate limiting, audit logs, backups and environment-based configuration.

## Author

Built by [natnaelameha213](https://github.com/natnaelameha213).
