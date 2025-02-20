# EstateEase - Real Estate Listing Platform

## 🚀 Introduction
EstateEase is a feature-rich real estate listing platform built with **Laravel** and **Tailwind CSS**. The platform provides a seamless experience for **buyers, renters, property owners, and agents** by offering advanced search filters, property listings, inquiry management, and appointment scheduling. 

## 🌟 Features
- **User Authentication** (Registration & Login via Laravel )
- **Role-Based Access Control** (Admin, Agent, User)
- **Property Listings** (Buy, Rent, and Sell)
- **Advanced Property Search & Filters**
- **Inquiry & Appointment Management**
- **Agent Rating & Review System**
- **User Dashboards** for  Agents, and Buyers
- **Contact Form for Customer Support**
- **Mobile-Friendly UI with Tailwind CSS**

## 🛠️ Technologies Used
- **Backend:** Laravel (PHP Framework)
- **Frontend:** Blade Templates, Tailwind CSS
- **Database:** MySQL
- **Authentication:** Laravel
- **Version Control:** Git & GitHub
- **Third-Party Integrations:** Gmail SMTP

## 📂 Project Structure
```
EstateEase/
│── app/
│── bootstrap/
│── config/
│── database/
│── public/
│── resources/
│── routes/
│── storage/
│── tests/
│── .env.example
│── artisan
│── composer.json
│── package.json
│── README.md
```

## ⚙️ Installation Guide
### Prerequisites
Ensure you have the following installed:
- PHP 8+
- Composer
- Node.js & npm
- MySQL Database
- XAMPP (if using Windows)

### Steps
1. **Clone the Repository**
   ```sh
   git clone https://github.com/yourusername/EstateEase.git
   cd EstateEase
   ```
2. **Install Dependencies**
   ```sh
   composer install
   npm install && npm run build
   ```
3. **Setup Environment Variables**
   ```sh
   cp .env.example .env
   ```
   Configure your `.env` file with your database credentials.

4. **Generate Application Key**
   ```sh
   php artisan key:generate
   ```

5. **Run Migrations & Seeders**
   ```sh
   php artisan migrate --seed
   ```

6. **Start the Development Server**
   ```sh
   php artisan serve
   ```

7. **Access the Application**
   Open `http://127.0.0.1:8000` in your browser.

## 🔐 Role-Based Access
| Role     | Permissions |
|----------|------------|
| Admin    | Manage users, properties, inquiries |
| Owner(User)    | Add, edit, delete properties |
| Agent    | Respond to inquiries, manage appointments |
| User     | Browse properties, make inquiries |

## 🛠️ API Endpoints
| Method | Endpoint                 | Description |
|--------|--------------------------|-------------|
| GET    | /api/properties          | Fetch all properties |
| POST   | /api/properties          | Create a new property (Owner only) |
| POST   | /api/inquiries           | Submit an inquiry |
| GET    | /api/agents/{id}/reviews | Get agent reviews |

## 🤝 Contributing
We welcome contributions! Follow these steps:
1. Fork the repository.
2. Create a new branch: `git checkout -b feature-name`.
3. Commit changes: `git commit -m 'Added new feature'`.
4. Push the branch: `git push origin feature-name`.
5. Submit a pull request.

## 📜 License
This project is licensed under the **MIT License**.

## 📞 Contact
For any inquiries, reach out to **Issa Alayan** at [issaalayan2017@gmail.com].

---
### ⭐ Show Some Support
If you like this project, give it a **star ⭐ on GitHub**!

