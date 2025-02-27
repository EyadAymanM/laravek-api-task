# Laravel API Task

This is a simple Laravel API project that manages venues. The project utilizes Laravel's authentication, middleware, and routing features to provide secure access to venue data.

## 🚀 Features
- Authentication using **Sanctum**
- CRUD operations for **Venues**
- Middleware protection for API routes
- JSON API responses
- Docker support for MySQL database

## 🛠 Installation
### 1️⃣ Clone the Repository
```sh
 git clone https://github.com/EyadAymanM/laravek-api-task.git
 cd laravek-api-task
```

### 2️⃣ Install Dependencies
```sh
composer install
```

### 3️⃣ Set Up MySQL Database with Docker (Recommended)
If you don’t have MySQL installed, you can use Docker to set up a MySQL database easily.

#### Install Docker:
- **Windows**: Download and install [Docker Desktop](https://www.docker.com/products/docker-desktop/).
- **Linux**: Install Docker using your package manager. For example:
  ```sh
  sudo apt update && sudo apt install docker.io -y
  sudo systemctl start docker
  sudo systemctl enable docker
  ```
### Change the values of enviroment variables passed in `docker-compose.yml`
```yml
environment:
      MYSQL_DATABASE: your_database_name
      MYSQL_USER: user
      MYSQL_PASSWORD: user_password
      MYSQL_ROOT_PASSWORD: root_password
```
Update your `.env` file with the same as above credentials:
```env
DB_CONNECTION=mysql 
DB_HOST=127.0.0.1 #this is set to localhost to access it form the docker container up in
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=user
DB_PASSWORD=user_password
```
#### Run MySQL Container:
```sh
docker-compose up -d # -d flag to start the container in the background
```



###  Set Up Environment
```sh
cp .env.example .env
php artisan key:generate
```
Update your `.env` file with the database credentials.


### 4️⃣ Run Migrations
```sh
php artisan migrate 
```

### 5️⃣ Serve the Application
```sh
php artisan serve
```

## 🔑 Authentication
The API uses **Laravel Sanctum** for authentication. To get a token, register a user and log in.

### Register a User
```http
POST /api/register
```
```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password",
  "password_confirmation": "password"
}
```

### Login
```http
POST /api/login
```
```json
{
  "email": "john@example.com",
  "password": "password"
}
```
**Response:**
```json
{
  "user": "user data object",
  "access_token": "your-access-token"
}
```
Use this token in **Authorization** headers:
```http
Authorization: Bearer your-access-token
```

## 📌 API Endpoints
### Public Routes (No Authentication Required)
| Method | Endpoint         | Description        |
|--------|------------------|--------------------|
| GET    | /api/venues      | List all venues    |
| GET    | /api/venues/{id} | Show venue details |

### Protected Routes (Require Authentication)
| Method | Endpoint         | Description        |
|--------|------------------|--------------------|
| POST   | /api/venues      | Create a new venue |
| PUT    | /api/venues/{id} | Update a venue     |
| DELETE | /api/venues/{id} | Delete a venue     |

## 🛠 Middleware
Some routes are protected using `auth:sanctum` middleware. Public endpoints (`index` and `show`) are excluded.

## Testing the API
- To test API requests, use **Postman** or **cURL**.


---
 _Let me know if you need further tweaks! 💡_

