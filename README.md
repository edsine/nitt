<<<<<<< HEAD
# Getting Started with Create React App

This project was bootstrapped with [Create React App](https://github.com/facebook/create-react-app).

## Available Scripts

In the project directory, you can run:

### `npm start`

Runs the app in the development mode.\
Open [http://localhost:3000](http://localhost:3000) to view it in your browser.

The page will reload when you make changes.\
You may also see any lint errors in the console.

### `npm test`

Launches the test runner in the interactive watch mode.\
See the section about [running tests](https://facebook.github.io/create-react-app/docs/running-tests) for more information.

### `npm run build`

Builds the app for production to the `build` folder.\
It correctly bundles React in production mode and optimizes the build for the best performance.

The build is minified and the filenames include the hashes.\
Your app is ready to be deployed!

See the section about [deployment](https://facebook.github.io/create-react-app/docs/deployment) for more information.

### `npm run eject`

**Note: this is a one-way operation. Once you `eject`, you can't go back!**

If you aren't satisfied with the build tool and configuration choices, you can `eject` at any time. This command will remove the single build dependency from your project.

Instead, it will copy all the configuration files and the transitive dependencies (webpack, Babel, ESLint, etc) right into your project so you have full control over them. All of the commands except `eject` will still work, but they will point to the copied scripts so you can tweak them. At this point you're on your own.

You don't have to ever use `eject`. The curated feature set is suitable for small and middle deployments, and you shouldn't feel obligated to use this feature. However we understand that this tool wouldn't be useful if you couldn't customize it when you are ready for it.

## Learn More

You can learn more in the [Create React App documentation](https://facebook.github.io/create-react-app/docs/getting-started).

To learn React, check out the [React documentation](https://reactjs.org/).

### Code Splitting

This section has moved here: [https://facebook.github.io/create-react-app/docs/code-splitting](https://facebook.github.io/create-react-app/docs/code-splitting)

### Analyzing the Bundle Size

This section has moved here: [https://facebook.github.io/create-react-app/docs/analyzing-the-bundle-size](https://facebook.github.io/create-react-app/docs/analyzing-the-bundle-size)

### Making a Progressive Web App

This section has moved here: [https://facebook.github.io/create-react-app/docs/making-a-progressive-web-app](https://facebook.github.io/create-react-app/docs/making-a-progressive-web-app)

### Advanced Configuration

This section has moved here: [https://facebook.github.io/create-react-app/docs/advanced-configuration](https://facebook.github.io/create-react-app/docs/advanced-configuration)

### Deployment

This section has moved here: [https://facebook.github.io/create-react-app/docs/deployment](https://facebook.github.io/create-react-app/docs/deployment)

### `npm run build` fails to minify

This section has moved here: [https://facebook.github.io/create-react-app/docs/troubleshooting#npm-run-build-fails-to-minify](https://facebook.github.io/create-react-app/docs/troubleshooting#npm-run-build-fails-to-minify)
=======
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
>>>>>>> b5f7d8d50fa2a94d9adad34b05dce5f36247b6ea
