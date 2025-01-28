# PHP CRUD Application

This is a simple PHP CRUD (Create, Read, Update, Delete) application that allows users to manage records in a MySQL database. The application is built using PHP and MySQL and features a clean and simple UI for managing records.

---

## Features

- Display all records from the database in a table format.
- Add new records.
- Edit existing records.
- Delete records.
- Validation for input fields.
- Styled using Bootstrap.

---

## Prerequisites

Ensure you have the following installed on your system:

1. **PHP** (>=7.4)
2. **MySQL**
3. **XAMPP/WAMP/LAMP** server (or any local server environment).
4. **Composer** (optional for managing dependencies).

---

## Setup Instructions

1. **Clone or Download the Repository:**
   ```bash
   git clone <repository-url>
   cd <repository-folder>
   ```

2. **Start the Server:**
   - If you're using XAMPP, place the project folder inside `htdocs`.
   - Start Apache and MySQL from the XAMPP control panel.

3. **Create the Database and Table:**
   - Open your MySQL client (phpMyAdmin, MySQL Workbench, or CLI).
   - Create a database:
     ```sql
     CREATE DATABASE task1_crud_php;
     ```
   - Switch to the `crud_php` database:
     ```sql
     USE task1_crud_php;
     ```
   - Create the `users` table:
     ```sql
     CREATE TABLE users (
         id INT AUTO_INCREMENT PRIMARY KEY,
         name VARCHAR(255) NOT NULL,
         email VARCHAR(255) NOT NULL UNIQUE,
         password VARCHAR(255) NOT NULL,
         phone_number VARCHAR(15) NOT NULL
     );
     ```

4. **Insert Sample Data:**
   - Add sample records:
     ```sql
     INSERT INTO users (name, email, password, phone_number)
     VALUES
     ('John Doe', 'johndoe@example.com', 'password123', '1234567890'),
     ('Jane Smith', 'janesmith@example.com', 'securepass', '0987654321');
     ```

5. **Configure the Connection:**
   - Open `connection.php` and set your database credentials:
     ```php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "task1_crud_php";
     ```

6. **Run the Application:**
   - Open your browser and navigate to:
     ```
     http://localhost/<project-folder>/index.php
     ```

---

## Folder Structure

```
project-folder/
├── connection.php     
├── index.php           # Displays records (Read ).
├── AddUser.php          # Adds new records (Create operation).
├── edit.php
├── update.php         
├── delete.php          # Deletes records (Delete operation).
├── layout.php          # Common layout file for header and footer.
├── About_us.php          # Deletes records (Delete operation).
├── Contact_us.php
```

---

## Screenshots

### 1. **Home Page (Display Records)**

![image](https://github.com/user-attachments/assets/be97f383-9e82-4dca-b655-8b8052944c47)

### 2. **Add Record Form**

![image](https://github.com/user-attachments/assets/c1022f1d-b940-4bf1-9af1-b1b5445d9194)

### 3. **Edit Record Form**

![image](https://github.com/user-attachments/assets/a75d100f-0c6c-4c41-89ae-26a3bbfd9040)

### 4. **About Us**

![image](https://github.com/user-attachments/assets/03467d22-21f0-4258-945d-a85853bc34e1)

### 5. **Contact Us**

![image](https://github.com/user-attachments/assets/8afe6474-decd-4b16-82f8-e73705d8f0c0)

---

## Technologies Used

- **Backend:** PHP
- **Database:** MySQL
- **Frontend:** HTML, CSS, Bootstrap

---

## License

This project is licensed under the MIT License.

---

## Contribution

Feel free to fork this repository and contribute by submitting a pull request. All contributions are welcome!

---

## Contact

For any queries or suggestions, please contact:
- **Email:** kinzapython@gmail.com

