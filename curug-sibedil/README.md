# Curug Sibedil E-Ticketing System

A Web-Based Online Ticket Booking Information System for Curug Sibedil Tourism, developed using the Extreme Programming method. This platform simplifies the ticket purchasing process for visitors by providing an integrated automated payment gateway and a downloadable E-Ticket feature.

## 🚀 Features

* **User Authentication:** Secure login, registration, and custom password reset functionalities.
* **Informative Landing Page:** Displays tourism information, facilities, photo gallery, and Google Maps integration.
* **Online Booking System:** Allows visitors to select visit dates and ticket quantities with real-time total price calculation.
* **Automated Payment Gateway:** Integrated with **Midtrans** (Snap) to handle various payment methods (QRIS, E-Wallet, Virtual Account) automatically.
* **E-Ticket Generation:** Automatically generates downloadable PDF tickets (via **DomPDF**) once the payment is settled.
* **Booking History:** A dedicated dashboard for users to track their booking status (Pending, Settlement, Expire).
* **Responsive Design:** Mobile-friendly user interface with modern glassmorphism aesthetics.

## 🛠️ Tech Stack

**Backend:**
* [Laravel](https://laravel.com/) (PHP Framework)
* MySQL (Database)

**Frontend:**
* [Tailwind CSS](https://tailwindcss.com/) (Dashboard & Profile Styling)
* [Materialize CSS](https://materializecss.com/) (Landing Page Styling)
* [Alpine.js](https://alpinejs.dev/) & [jQuery](https://jquery.com/) (Interactivity & DOM Manipulation)

**Libraries & APIs:**
* [Midtrans API](https://midtrans.com/) (Payment Gateway)
* [DomPDF](https://github.com/dompdf/dompdf) (PDF E-Ticket Generator)

## ⚙️ Prerequisites

Before you begin, ensure you have met the following requirements:
* PHP >= 8.1
* Composer
* Node.js & NPM
* MySQL
* A Midtrans Account (Server Key & Client Key for Sandbox/Production)

## 📦 Installation & Setup'

1. **Clone the repository:**
   ```bash
   git clone [https://github.com/yourusername/curug-sibedil-ticketing.git](https://github.com/yourusername/curug-sibedil-ticketing.git)
   cd curug-sibedil-ticketing
    ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install NPM dependencies:**
   ```bash
   npm install
   npm run build
   ```

4. **Environment Setup:**
   Copy the `.env.example` file and rename it to `.env`.
   ```bash
   cp .env.example .env
   ```
   
   **Generate the application key:**
   ```bash
   php artisan key:generate
   ```
   
5. **Database Configuration:**
   Update your `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```
   
6. **Midtrans Configuration:**
   Add your Midtrans keys to the `.env` file:
   ```env
   MIDTRANS_SERVER_KEY=your_server_key
   MIDTRANS_CLIENT_KEY=your_client_key
   MIDTRANS_IS_PRODUCTION=false
   MIDTRANS_IS_SANITIZED=true
   MIDTRANS_IS_3DS=true
   ```
   
7. **Run Migrations:**
   ```bash
   php artisan migrate
   ```

8. **Start the local development server:**
   ```bash
   php artisan serve
   ```



**👨‍💻 Author**
Nurdin

Web3 Content Creator & Developer

Telkom University Purwokerto - Informatics Engineering

Built for Curug Sibedil Tourism, Kabupaten Pemalang.
