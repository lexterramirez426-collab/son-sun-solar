
# Son Sun Solar

## Team Name
Paper Rex

## Team Member
- Lexter Ramirez

## Project Description
Son Sun Solar is a responsive website for a solar energy company. It provides information about solar consultation, installation, and maintenance services.

The system was developed using CodeIgniter 4, PHP, MySQL, HTML, and CSS. It provides separate account access for customers and employees.

## Features
- Responsive company homepage
- Company information and solar services
- Customer registration and input validation
- Secure customer password hashing
- Customer login, dashboard, and logout
- Employee login and dashboard
- Employee role display
- Session-based access checks
- MySQL database integration

## Technologies Used
- CodeIgniter 4
- PHP
- MySQL
- HTML5
- CSS3
- XAMPP
- Composer

## Installation and Setup
1. Install XAMPP and Composer.
2. Open the project folder in VS Code.
3. Install project dependencies:

   ```bash
   composer install
   ```

4. Copy the `env` file and rename the copy to `.env`.
5. Configure the database settings in `.env`.
6. Import the database SQL file into phpMyAdmin.
7. Run the development server:

   ```bash
   php spark serve
   ```

8. Open `http://localhost:8080` in your browser.

## Employee Accounts
Employee accounts are managed by an authorized administrator or HR personnel. Employees cannot register themselves through a public registration form.

## Security Notes
- Do not upload `.env` to GitHub.
- Do not publish passwords or private credentials.
- Use your own local database credentials.
