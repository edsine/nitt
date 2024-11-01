**Application Documentation: Visualization of Economic Data**

**1. Introduction:**
   The Visualization of Economic Data application is designed to display and analyze economic data in various visual formats such as charts and tables. The application provides users with the ability to select different economic datasets and visualize the data over specific time periods.

**2. Features:**
   - **Dataset Selection:** Users can select from a list of available economic datasets.
   - **Chart Visualization:** Visualize selected economic data using interactive charts.
   - **Table Display:** View the raw economic data in tabular format for detailed analysis.
   - **Year Selection:** Users can select specific years to view data trends over time.
   - **Chart Types:** Choose from different chart types (e.g., line chart, bar chart) for visualization.
   - **Error Handling:** Basic error handling is implemented to handle data fetching errors gracefully.

**3. Components:**
   - **DataSetDetails:** Displays details of the selected economic dataset, including a table view of the raw data.
   - **DataSetCharts:** Visualizes the selected economic dataset using interactive charts.
   - **NavBar:** Navigation bar for easy navigation between different sections of the application.

**4. Technologies Used:**
   - **React:** Frontend JavaScript library for building user interfaces.
   - **React Router:** Routing library for handling navigation within the application.
   - **Bootstrap:** Frontend framework for styling and layout.
   - **ApexCharts:** JavaScript charting library for creating interactive charts.
   - **Axios:** Promise-based HTTP client for making API requests.
   - **Chart.js:** Another JavaScript charting library used for visualization.
   - **Chartjs-adapter-moment:** Adapter for using Moment.js with Chart.js.
   - **React Chartjs 2:** React wrapper for Chart.js, providing easier integration with React components.
   - **Faker:** Library for generating fake data, likely used for testing purposes.

**5. Installation:**
   To run the application locally, follow these steps:
   - Clone the repository from GitHub: `git clone <https://github.com/edsine/nitt.git>`
   - Navigate to set up the backend project directory: `cd backend`
   - Install dependencies: `composer install`
   - Copy existing .env.example file to create your own: `cp .env.example .env`
   - Create Your Database on your MySQL Server and Update in .env file
   - Migrate to your database and seed: `php artisan migrate --seed`
   - Start the development server: `php artisan serve`
   - Navigate to the project directory: `cd ntdapp`
   - Install dependencies: `npm install`
   - Start the development server: `npm start`
   - Open the application in your browser: `http://localhost:3000`

**6. Usage:**
   - Upon launching the application, users are presented with a list of available economic datasets.
   - Selecting a dataset will display its details, including a table view of the raw data.
   - Users can navigate to the "View Chart" tab to visualize the selected dataset using interactive charts.
   - In the chart view, users can select specific years and chart types for visualization.
   - Navigation between different sections of the application is facilitated using the navigation bar.

**7. Future Enhancements:**
   - Implement more advanced data visualization features such as drill-down capabilities and interactive tooltips.
   - Enhance error handling to provide better feedback to users in case of data fetching failures.
   - Integrate additional economic datasets to provide users with more options for analysis.
   - Improve accessibility and responsiveness for a better user experience across different devices and screen sizes.

**8. Conclusion:**
   The Visualization of Economic Data application provides users with a powerful tool for exploring and analyzing economic datasets through interactive charts and tables. With its intuitive user interface and robust features, the application serves as a valuable resource for economists, researchers, and policymakers alike.