# API Documentation

This API documentation provides details on the endpoints available in the Laravel application. The routes are organized based on their functionalities.

## Authentication Endpoints

### User Authentication

- **POST /api/auth/login**
  - **Description:** Logs in a user.
  - **Parameters:**
    - email (string): User's email address.
    - password (string): User's password.
  - **Returns:**
    - Token: Authorization token for accessing protected routes.

- **POST /api/auth/logout**
  - **Description:** Logs out the currently authenticated user.
  - **Authentication Required:** Yes

- **POST /api/auth/register**
  - **Description:** Registers a new user.
  - **Parameters:**
    - name (string): User's name.
    - email (string): User's email address.
    - password (string): User's password.
  - **Returns:**
    - User details: Newly registered user's information.

- **POST /api/auth/recover**
  - **Description:** Initiates the password recovery process.
  - **Parameters:**
    - email (string): User's email address.
  - **Returns:**
    - Success message: Indicates that a password recovery email has been sent.

- **POST /api/auth/reset**
  - **Description:** Resets the user's password.
  - **Parameters:**
    - email (string): User's email address.
    - token (string): Password reset token.
    - password (string): New password.
  - **Returns:**
    - Success message: Indicates that the password has been reset successfully.

## User Management Endpoints

### User Profile

- **GET /api/user**
  - **Description:** Retrieves the details of the authenticated user.
  - **Authentication Required:** Yes

### User CRUD Operations

- **GET /api/users**
  - **Description:** Retrieves a list of all users.
  - **Authentication Required:** Yes
  - **Permissions Required:** View users

- **POST /api/users**
  - **Description:** Creates a new user.
  - **Parameters:**
    - name (string): User's name.
    - email (string): User's email address.
    - password (string): User's password.
  - **Authentication Required:** Yes
  - **Permissions Required:** Create users

- **PUT /api/users/{id}**
  - **Description:** Updates the details of a user.
  - **Parameters:**
    - name (string): User's name.
    - email (string): User's email address.
  - **Authentication Required:** Yes
  - **Permissions Required:** Update users

- **DELETE /api/users/{id}**
  - **Description:** Deletes a user.
  - **Authentication Required:** Yes
  - **Permissions Required:** Delete users

### User Profile Management

- **PUT /api/users/update_profile/{id}**
  - **Description:** Updates the profile of a user.
  - **Parameters:**
    - name (string): User's name.
    - email (string): User's email address.
  - **Authentication Required:** Yes

- **POST /api/users/update_profile_image/{id}**
  - **Description:** Updates the profile image of a user.
  - **Parameters:**
    - image (file): User's profile image.
  - **Authentication Required:** Yes

- **POST /api/users/change_password/{id}**
  - **Description:** Changes the password of a user.
  - **Parameters:**
    - current_password (string): Current password.
    - new_password (string): New password.
  - **Authentication Required:** Yes

## Miscellaneous Endpoints

- **GET /api/helpers**
  - **Description:** Retrieves helper data.

- **POST /api/dashboard**
  - **Description:** Retrieves dashboard data.

## Data Management Endpoints

### CRUD Operations for Various Data Entities

(Endpoints related to various data entities like passenger road transport, air transport, maritime data, railway data, etc. These endpoints follow the CRUD operations pattern for managing data related to different transportation modes.)

For detailed documentation on these endpoints, please refer to the respective controller files in the Laravel application.

## File Upload Endpoints

- **POST /api/railway_passengers/upload**
  - **Description:** Uploads bulk data for railway passengers.
  - **Parameters:**
    - file (file): CSV file containing railway passenger data.

- **POST /api/gross_domestic_products/upload**
  - **Description:** Uploads bulk data for gross domestic products.
  - **Parameters:**
    - file (file): CSV file containing GDP data.

- **POST /api/ship_container_traffics/upload**
  - **Description:** Uploads bulk data for ship container traffics.
  - **Parameters:**
    - file (file): CSV file containing ship container traffic data.

## License Renewal and Verification Endpoints (continued)

(Include additional endpoints related to other license types, if applicable.)

## Traffic Offenses Endpoints

- **GET /api/traffic_offences**
  - **Description:** Manages records of traffic offenses.

## Vehicle Operations Endpoints

- **GET /api/vehicle_registrations**
  - **Description:** Manages vehicle registration records.

## Driving Test Records Endpoints

- **GET /api/driving_test_records**
  - **Description:** Manages driving test records.

## Fleet Operations Endpoints

- **GET /api/fleet_accidents**
  - **Description:** Manages fleet accident records.

- **GET /api/corporation_passenger_traffics**
  - **Description:** Manages corporation passenger traffic records.

- **GET /api/fleet_size_compositions**
  - **Description:** Manages fleet size composition records.

- **GET /api/fleet_operator_brands**
  - **Description:** Manages fleet operator brand records.

## Air Transport Endpoints

- **GET /api/air_mode_data**
  - **Description:** Manages air mode data records.

## Frontend Authentication and Verification Endpoints

- **POST /api/auth/login**
  - **Description:** Authenticates a user and provides access token.

- **POST /api/auth/logout**
  - **Description:** Logs out the currently authenticated user.
  - **Authentication Required:** Yes

- **POST /api/auth/register**
  - **Description:** Registers a new user.

- **POST /api/auth/recover**
  - **Description:** Initiates the password recovery process.

- **POST /api/auth/reset**
  - **Description:** Resets the user's password.

- **POST /api/auth/verify**
  - **Description:** Sends email verification link.

## Miscellaneous Endpoints

- **GET /api/helpers**
  - **Description:** Retrieves helper data.

- **POST /api/dashboard**
  - **Description:** Retrieves dashboard data.

---

This documentation covers various endpoints available in the Laravel application, categorized based on their functionalities.
