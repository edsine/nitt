# Project README

This repository contains a combination of a React frontend and a Laravel backend. Below are instructions on how to set up both projects individually.

## React Project Setup

1. **Clone the Repository**: Begin by cloning this repository to your local machine using the following command:

git clone <repository-url>


2. **Navigate to the React Project Directory**: Move into the React project directory:

cd fronted


3. **Install Dependencies**: Install the required dependencies by running:

npm install


4. **Setting up Environment Variables**: Create a `.env` file in the root of the React project. Copy the following variables into it, adjusting the values as needed:

REACT_APP_API_URL="http://127.0.0.1:8000/api"
REACT_APP_BACKEND_URL="http://127.0.0.1:8000"


5. **Run the Development Server**: Start the development server by executing:

npm start


6. **Accessing the Application**: You can now access the React application in your browser at `http://localhost:3000`.



## Laravel Project Setup

1. **Navigate to the Laravel Project Directory**: Move into the Laravel project directory:

cd backend


2. **Install Composer Dependencies**: Install the PHP dependencies using Composer:

composer install


3. **Create Environment File**: Make a copy of the `.env.example` file and save it as `.env`:

cp .env.example .env


4. **Generate Application Key**: Generate an application key for Laravel:

php artisan key:generate


5. **Configure Database**: Create a database for your Laravel application and update the database details in the `.env` file:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password


6. **Run Migrations**: If you have set up your database, you can run migrations to create the necessary tables:

php artisan migrate

7. **Seed Database**: You can seed the database tables with:

php artisan db:seed


8. **Start the Laravel Development Server**: Start the Laravel development server by running:

php artisan serve


9. **Accessing the Laravel Application**: You can now access the Laravel application in your browser at `http://localhost:8000`.



## Setting Backend URL in React .env File

Ensure that the `REACT_APP_API_URL` and `REACT_APP_BACKEND_URL` variables in the React `.env` file match the backend URL where the Laravel application is running. Update these variables accordingly if you are hosting the backend elsewhere or using different ports.

---

You have now successfully set up both the React frontend and the Laravel backend. If you encounter any issues during the setup process, feel free to reach out for assistance. Happy coding!
