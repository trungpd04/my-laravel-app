# Laravel Product Management System

A Laravel-based product management system with AdminLTE dashboard, user authentication, and comprehensive product CRUD operations.

## Features

- 🔐 User Authentication (Login/Register)
- 📦 Product Management (Create, Read, Update, Delete)
- 👥 User Management
- 🎨 AdminLTE Admin Dashboard
- 📱 Responsive Bootstrap UI
- 🔄 Database Migrations & Seeders
- ✨ Custom Error Pages (404)

## Requirements

Before you begin, ensure you have the following installed on your system:

- **PHP** >= 8.2
- **Composer** (Latest version)
- **Node.js** >= 18.x and **npm** >= 9.x
- **Database**: MySQL, MariaDB, PostgreSQL, or SQLite
- **Web Server**: Apache or Nginx (or use Laravel's built-in server)

## Installation

Follow these steps to get your development environment running:

### 1. Clone the Repository

```bash
git clone <repository-url>
cd my-app
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node Dependencies

```bash
npm install
```

### 4. Environment Configuration

Copy the `.env.example` file to create your environment configuration:

```bash
# Windows (PowerShell)
copy .env.example .env

# Linux/Mac
cp .env.example .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Configure Database

Open the `.env` file and configure your database settings:

#### Option A: Using SQLite (Recommended for Quick Start)

```env
DB_CONNECTION=sqlite
# DB_DATABASE will default to database/database.sqlite
```

Create the SQLite database file:

```bash
# Windows (PowerShell)
New-Item -Path database\database.sqlite -ItemType File

# Linux/Mac
touch database/database.sqlite
```

#### Option B: Using MySQL/MariaDB

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Make sure to create the database first:

```sql
CREATE DATABASE your_database_name;
```

### 7. Run Database Migrations

Run migrations to create all necessary tables:

```bash
php artisan migrate
```

### 8. Seed Database (Optional)

If you want to populate the database with sample data:

```bash
php artisan db:seed
```

### 9. Publish AdminLTE Assets

Publish the AdminLTE vendor assets:

```bash
php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\AdminLteServiceProvider" --tag=assets
```

### 10. Build Frontend Assets

Compile the CSS and JavaScript:

```bash
npm run build
```

## Running the Application

### Option 1: Quick Start (Recommended for Development)

Run all services concurrently (server, queue, and vite):

```bash
composer dev
```

This will start:
- Laravel development server at `http://localhost:8000`
- Queue worker
- Vite development server

### Option 2: Manual Start

#### Start the Development Server

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

#### Watch Frontend Assets (Optional - For Development)

In a separate terminal:

```bash
npm run dev
```

#### Run Queue Worker (Optional - If using queues)

In a separate terminal:

```bash
php artisan queue:work
```

## Quick Setup (All-in-One Command)

For a fresh installation, you can use the setup script:

```bash
composer setup
```

This will:
- Install all Composer dependencies
- Create `.env` file from `.env.example`
- Generate application key
- Run database migrations
- Install npm dependencies
- Build frontend assets

## Default Routes

After installation, you can access:

- **Home Page**: `http://localhost:8000/`
- **Admin Login**: `http://localhost:8000/admin/login`
- **Admin Register**: `http://localhost:8000/admin/register`
- **Products List**: `http://localhost:8000/products`
- **Admin Dashboard**: `http://localhost:8000/admin` (requires authentication)

## Database Structure

The application includes the following main tables:

- `users` - User accounts with authentication
- `products` - Product information with stock management
- `cache` - Application cache storage
- `jobs` - Queue job management
- `sessions` - User session data

## Testing

Run the test suite:

```bash
composer test
```

Or use PHPUnit directly:

```bash
php artisan test
```

## Common Issues & Troubleshooting

### Issue: "No application encryption key has been specified"

**Solution**: Run `php artisan key:generate`

### Issue: Database connection errors

**Solution**: 
- Check your `.env` database credentials
- Ensure your database server is running
- Verify the database exists

### Issue: Permission errors on storage/logs

**Solution**: Grant write permissions

```bash
# Linux/Mac
chmod -R 775 storage bootstrap/cache

# Or
sudo chown -R www-data:www-data storage bootstrap/cache
```

### Issue: AdminLTE assets not loading

**Solution**: Republish AdminLTE assets

```bash
php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\AdminLteServiceProvider" --tag=assets --force
```

### Issue: Vite manifest not found

**Solution**: Build the assets

```bash
npm run build
```

## Additional Commands

### Clear Application Cache

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Optimize Application (Production)

```bash
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Create New Admin User (via Tinker)

```bash
php artisan tinker
```

Then run:

```php
$user = new App\Models\User();
$user->name = 'Admin User';
$user->email = 'admin@example.com';
$user->password = bcrypt('password');
$user->save();
```

## Tech Stack

- **Backend**: Laravel 12.x
- **Frontend**: Vite, Bootstrap 5
- **Admin Template**: AdminLTE 3.x
- **Database**: MySQL/SQLite/PostgreSQL
- **Authentication**: Laravel Breeze/Custom

## Project Structure

```
my-app/
├── app/
│   ├── Http/Controllers/     # Application controllers
│   ├── Models/               # Eloquent models
│   └── Middleware/           # Custom middleware
├── database/
│   ├── migrations/           # Database migrations
│   ├── seeders/              # Database seeders
│   └── factories/            # Model factories
├── public/                   # Public assets
├── resources/
│   ├── views/                # Blade templates
│   ├── css/                  # CSS files
│   └── js/                   # JavaScript files
├── routes/                   # Application routes
└── storage/                  # Application storage
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

If you encounter any issues or have questions, please open an issue in the repository.
