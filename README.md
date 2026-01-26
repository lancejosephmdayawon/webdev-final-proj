# 📚 ISKO-LIB  
**A Web-Based Library Management System built with Laravel**

ISKO-LIB is a full-stack web application designed to modernize and simplify library operations for academic institutions. Built with **Laravel** and **MySQL**, it provides an efficient way to manage books, categories, and user interactions through a clean and responsive interface.

This project was developed as part of an academic requirement and deployed to a live hosting environment, following real-world development and deployment practices.

---

## ✨ Features

- 📖 **Book Management**
  - Add, update, view, and organize books
  - Category-based classification

- 🗂️ **Category Management**
  - Dynamic book categorization
  - Relational database structure

- 👤 **User Roles**
  - Admin / Librarian dashboard
  - Secure authentication

- 📊 **Inventory Overview**
  - Real-time book listings
  - Clean and sortable tables

- 🎨 **Responsive UI**
  - Optimized for desktop and mobile devices
  - Simple and user-friendly design

- 🚀 **Deployed Live**
  - Production-ready configuration
  - Environment-based setup

---

## 🛠️ Tech Stack

- **Backend:** Laravel  
- **Frontend:** Blade, CSS, JavaScript  
- **Database:** MySQL  
- **Build Tool:** Vite  
- **Deployment:** Shared Hosting (Hostinger)  
- **Version Control:** Git & GitHub  

---

## 📂 Project Structure (Simplified)

```text
webdev-final-proj/
├── app/
├── database/
├── public/
├── resources/
├── routes/
├── storage/
└── .env
```

---

## ⚙️ Installation & Setup

### 1. Clone the Repository
```bash
git clone https://github.com/your-username/iskolib.git
cd iskolib
```

### 2. Install Dependencies
```bash
composer install
npm install
npm run build
```

### 3. Environment Configuration
```bash
cp .env.example .env
php artisan key:generate
```

Update your database credentials in `.env`:
```env
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Run Migrations
```bash
php artisan migrate
```

### 5. Serve the Application
```bash
php artisan serve
```

---

## 🌐 Deployment Notes

- Public files are correctly mapped to the hosting root
- Environment variables are secured
- Vite assets are compiled for production
- Storage permissions configured for live hosting

---

## 📸 Screenshots

_Add screenshots here (Dashboard, Inventory, Login, etc.)_

---

## 📌 Lessons Learned

This project provided hands-on experience with:

- Laravel MVC architecture  
- Eloquent ORM and database relationships  
- Debugging production errors  
- Shared hosting deployment workflows  
- UI responsiveness and UX improvements  

---

## 🔮 Future Improvements

- Activity logs
- Advanced search and filtering
- Role-based access enhancements
- UI/UX animations and polish

---

## 👨‍💻 Author

**WebDev Group 1-1**  
BSIT 3-3 Students | Polytechnic University of the Philippines

Built with patience, prayer, and persistence.

> *“Commit your work to the Lord, and your plans will be established.”*  
> — Proverbs 16:3
