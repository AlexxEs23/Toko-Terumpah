# 🛍️ Terumpah Kulit - E-Commerce Platform

[![Laravel](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-purple.svg)](https://getbootstrap.com)

> **Terumpah Kulit** adalah platform e-commerce modern yang dibangun dengan Laravel 12 untuk menjual produk kulit berkualitas premium seperti terumpah, sandal, tas, dan aksesori kulit lainnya.

## 📸 Screenshots

### 🏠 Homepage
![Homepage](docs/screenshots/homepage.png)

### 🛒 Product Catalog
![Products](docs/screenshots/products.png)

### 👤 Admin Dashboard
![Admin Dashboard](docs/screenshots/admin-dashboard.png)

## ✨ Features

### 🎯 Core Features
- **🔐 Authentication System** - Login, Register, Logout
- **👥 Role-based Access Control** - Admin & User roles
- **🛍️ Product Management** - CRUD operations for products
- **📦 Order Management** - Complete order lifecycle
- **📱 Responsive Design** - Mobile-friendly interface
- **🎨 Modern UI/UX** - Professional and clean design

### 👤 User Features
- **Browse Products** - View available leather products
- **Product Details** - Detailed product information
- **Shopping Cart** - Add products to cart
- **Order Placement** - Complete order with delivery details
- **Order History** - View past orders and status
- **Account Management** - Profile and order management

### 🔧 Admin Features
- **Dashboard** - Overview of sales and orders
- **Product Management** - Add, edit, delete products
- **Order Management** - View and update order status
- **User Management** - Manage customer accounts
- **Sales Reports** - Track business performance

### 🛡️ Security Features
- **CSRF Protection** - Secure forms
- **Password Hashing** - Bcrypt encryption
- **Session Management** - Secure user sessions
- **Input Validation** - Data sanitization
- **SQL Injection Protection** - Eloquent ORM

## 🚀 Tech Stack

### Backend
- **[Laravel 12](https://laravel.com)** - PHP Framework
- **[PHP 8.2+](https://php.net)** - Programming Language
- **[Eloquent ORM](https://laravel.com/docs/eloquent)** - Database ORM
- **[SQLite](https://sqlite.org)** - Database (easily migrate to MySQL)

### Frontend
- **[Bootstrap 5.3](https://getbootstrap.com)** - CSS Framework
- **[Font Awesome 6](https://fontawesome.com)** - Icons
- **[Google Fonts](https://fonts.google.com)** - Typography
- **[JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)** - Interactive Elements

### Tools & Services
- **[Composer](https://getcomposer.org)** - Dependency Management
- **[NPM](https://npmjs.com)** - Package Manager
- **[Vite](https://vitejs.dev)** - Asset Bundling

## 📋 Requirements

- **PHP >= 8.2**
- **Composer**
- **Node.js & NPM**
- **SQLite** (or MySQL/PostgreSQL for production)
- **Web Server** (Apache/Nginx)

## 🛠️ Installation

### 1. Clone Repository
```bash
git clone https://github.com/yourusername/terumpah-kulit.git
cd terumpah-kulit
```

### 2. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment Configuration
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup
```bash
# Create SQLite database
touch database/database.sqlite

# Run migrations
php artisan migrate

# Seed sample data (optional)
php artisan db:seed
```

### 5. Build Assets
```bash
# Compile assets for development
npm run dev

# Or for production
npm run build
```

### 6. Storage Link
```bash
# Create storage symbolic link
php artisan storage:link
```

### 7. Start Development Server
```bash
php artisan serve
```

Visit `http://localhost:8000` to see your application!

## ⚙️ Configuration

### Environment Variables
```env
APP_NAME="Terumpah Kulit"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite

MAIL_DRIVER=log
```

### Production Configuration
```bash
# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

## 📊 Database Schema

### Users Table
- `id` - Primary key
- `name` - User full name
- `email` - User email (unique)
- `password` - Encrypted password
- `role` - User role (admin/user)
- `created_at` - Registration date
- `updated_at` - Last update

### Products (Produks) Table
- `id` - Primary key
- `name` - Product name
- `description` - Product description
- `price` - Product price
- `stock` - Available quantity
- `image` - Product image path
- `created_at` - Creation date
- `updated_at` - Last update

### Orders Table
- `id` - Primary key
- `user_id` - Foreign key to users
- `product_id` - Foreign key to products
- `jumlah` - Order quantity
- `total_harga` - Total price
- `phone` - Customer phone
- `address` - Delivery address
- `status` - Order status
- `created_at` - Order date
- `updated_at` - Last update

## 🎯 Usage

### Default Admin Account
```
Email: admin@terumpahkulit.com
Password: admin123
```

### User Registration
- Visit `/register` to create new user account
- All new registrations have 'user' role by default

### Admin Functions
- Access admin panel at `/admin/produk/data_product`
- Manage products, orders, and users
- Update order status and track sales

## 🚀 Deployment

### Production Checklist
- [ ] Set `APP_ENV=production`
- [ ] Set `APP_DEBUG=false`
- [ ] Configure production database
- [ ] Set up SSL certificate
- [ ] Configure web server
- [ ] Set proper file permissions
- [ ] Enable caching
- [ ] Set up backups

### Recommended Hosting
- **Shared Hosting**: Hostinger, Niagahoster
- **VPS**: DigitalOcean, AWS, Google Cloud
- **Laravel Hosting**: Laravel Forge, Ploi

## 🤝 Contributing

1. Fork the repository
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👨‍💻 Author

**Your Name**
- GitHub: [@yourusername](https://github.com/yourusername)
- Email: your.email@example.com
- LinkedIn: [Your LinkedIn](https://linkedin.com/in/yourprofile)

## 🙏 Acknowledgments

- **Laravel Team** - Amazing framework
- **Bootstrap Team** - Beautiful UI components
- **Font Awesome** - Great icon library
- **Google Fonts** - Typography
- **All contributors** who helped make this project better

## 📚 Documentation

### API Endpoints
- `GET /` - Homepage
- `GET /login` - Login page
- `POST /loginPost` - Process login
- `GET /register` - Registration page
- `POST /registerPost` - Process registration
- `POST /logout` - Logout (Admin)
- `POST /user-logout` - Logout (User)

### Admin Routes
- `GET /admin/produk/data_product` - Product list
- `GET /admin/produk/add_product` - Add product form
- `POST /admin/produk/addProductProcess` - Process new product
- `GET /admin/order/data_order` - Order list
- `GET /admin/user/data_user` - User list

### User Routes
- `POST /order` - Place new order
- `GET /my-orders` - User order history
- `GET /order-success/{id}` - Order confirmation

## 🔮 Future Enhancements

- [ ] **Payment Gateway Integration** (Midtrans, Stripe)
- [ ] **Email Notifications** for orders
- [ ] **Product Image Upload** functionality
- [ ] **Rating & Review System**
- [ ] **Advanced Search & Filters**
- [ ] **Inventory Management**
- [ ] **Sales Reports & Analytics**
- [ ] **Multi-language Support**
- [ ] **Mobile App** (React Native/Flutter)
- [ ] **Social Media Integration**

## 📱 Mobile Responsive

This application is fully responsive and works perfectly on:
- 📱 Mobile phones (320px+)
- 📱 Tablets (768px+)
- 💻 Desktops (1024px+)
- 🖥️ Large screens (1200px+)

## 🐛 Bug Reports

If you find any bugs, please open an issue with:
- Bug description
- Steps to reproduce
- Expected behavior
- Screenshots (if applicable)
- Browser/device information

---

<div align="center">
  <p>Made with ❤️ for Indonesian Leather Craft Industry</p>
  <p>⭐ Star this repo if you find it helpful!</p>
</div>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
