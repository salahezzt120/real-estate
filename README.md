# 🏡 Real Estate Management System

## 📌 Overview
The **Real Estate Management System** is a web-based platform designed to simplify property listings, agent management, and customer inquiries. It supports multilingual functionality (English & Arabic) and provides an intuitive interface for users, agents, and administrators.

## 🎯 Features
- **Property Listings:** View, add, edit, and remove property listings with images and details.
- **Advanced Search & Filtering:** Filter properties by location, price, type, and more.
- **User & Agent Authentication:** Secure login and role-based access.
- **Multilingual Support:** English & Arabic language options.
- **Admin Dashboard:** Manage users, listings, and inquiries efficiently.
- **Interactive Map Integration:** Display property locations dynamically.
- **Contact & Inquiry System:** Users can send inquiries to property agents.

## 🛠️ Technologies Used
- **Frontend:** React.js / Vue.js (Choose one based on your preference)
- **Backend:** Laravel (PHP) or Django (Python)
- **Database:** MySQL / PostgreSQL
- **Authentication:** JWT-based authentication
- **Deployment:** Docker / AWS / Heroku

## 🚀 Getting Started
### 1️⃣ Clone the Repository
```bash
git clone https://github.com/salahezzt120/real-estate.git
cd real-estate
```

### 2️⃣ Install Dependencies
#### Backend (Laravel Example)
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```
#### Frontend (React.js Example)
```bash
cd frontend
npm install
npm start
```

### 3️⃣ Database Setup
Ensure you have MySQL running and update `.env` file with:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=real_estate_db
DB_USERNAME=root
DB_PASSWORD=yourpassword
```
Then run migrations:
```bash
php artisan migrate --seed
```

## 📜 API Endpoints
| Method | Endpoint | Description |
|--------|----------|------------|
| GET | `/api/properties` | Get list of properties |
| POST | `/api/register` | User registration |
| POST | `/api/login` | User login |
| GET | `/api/users/{id}` | Get user details |
| POST | `/api/inquiries` | Submit property inquiry |

## 👤 User Roles
- **Buyer/User:** Search and inquire about properties.
- **Agent:** List and manage properties, respond to inquiries.
- **Administrator:** Manage users, listings, and system settings.

## 🔒 Security Measures
- Encrypted password storage using bcrypt.
- Role-based access control (RBAC).
- Data validation and secure API authentication.

## 📌 Contributing
We welcome contributions! Please follow these steps:
1. Fork the repository.
2. Create a new branch (`feature-xyz`).
3. Commit your changes.
4. Submit a pull request.

## 📝 License
This project is licensed under the MIT License.

---
