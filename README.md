# Car Service Log App

This is a Laravel Livewire-based single-page application for managing car service logs. It dynamically displays clients, their cars, and related service logs using data loaded from JSON files.

---

## Tech Stack

* **PHP**: 8.2+
* **Laravel**: 11+
* **Livewire**: 3+
* **Tailwind CSS**: 3+
* **MySQL**: 8+ (or MariaDB / SQLite)

---

## Setup Instructions

1. **Clone the project**

   ```bash
   git clone <repo-url>
   cd carservice
   ```

2. **Install dependencies**

   ```bash
   composer install
   npm install && npm run build
   ```

3. **Set up environment**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   Update `.env` with your database credentials:

   ```env
   DB_DATABASE=carservice
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

4. **Run migrations and seeders**

   > The system automatically seeds the database if tables are empty.

   ```bash
   php artisan migrate
   ```

5. **Start the development server**

   ```bash
   php artisan serve
   ```
   
   Visit `http://127.0.0.1:8000`

---

## JSON Seeding

On first load (if all 3 tables are empty), the app loads:

* `/database/seeders/json/clients.json`
* `/database/seeders/json/cars.json`
* `/database/seeders/json/services.json`

---
