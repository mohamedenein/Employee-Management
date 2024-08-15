# Employee Management System

Welcome to the **Employee Management System**! This Laravel application is designed to manage employees, departments, and tasks within an organization.

## Features

- **User Authentication**
  - Secure login using email or phone with a predefined complex password.

- **Employee Management**
  - Add, edit, search, and delete employee records.
  - Manage employee details including first name, last name, salary, image, and manager.
  - Full name is dynamically derived from first and last names.

- **Department Management**
  - Add, edit, search, and delete departments.
  - View the count of employees and total salary within each department.
  - Prevent deletion of departments with assigned employees.

- **Task Management**
  - Managers can create and assign tasks to their direct reports.
  - Employees can view and update their own tasks and change their status.
  - Track tasks with statuses including pending, in progress, and completed.

## Technologies Used

- **Laravel:** PHP framework for backend development.
- **Blade Components:** For creating dynamic and reusable views.
- **MySQL:** Database management system.

## Database Design

### Users Table

Stores information about employees and managers.

- **id (PK):** Unique identifier for each user.
- **email:** User's email address.
- **phone:** User's phone number.
- **password:** User's hashed password.
- **first_name:** User's first name.
- **last_name:** User's last name.
- **salary:** User's salary.
- **image:** URL or path to the user's profile image.
- **manager_id (FK):** References the `id` of the user's manager (self-referencing).
- **department_id (FK):** References the `id` of the department to which the user belongs.

### Departments Table

Stores information about departments within the organization.

- **id (PK):** Unique identifier for each department.
- **name:** Name of the department.

### Tasks Table

Stores information about tasks assigned to employees.

- **id (PK):** Unique identifier for each task.
- **title:** Title of the task.
- **description:** Detailed description of the task.
- **status:** Current status of the task (e.g., pending, in progress, completed).
- **user_id (FK):** References the `id` of the user (employee) the task is assigned to.
- **created_at:** Timestamp when the task was created.
- **updated_at:** Timestamp when the task was last updated.

### ER Diagram

```plaintext
+----------------+       +-----------------+       +----------------+
|    users       |       |   departments   |       |     tasks      |
+----------------+       +-----------------+       +----------------+
| id (PK)        |<------| id (PK)         |       | id (PK)        |
| email          |       | name            |       | title          |
| phone          |       +-----------------+       | description    |
| password       |                                  | status         |
| first_name     |                                  | user_id (FK)   |
| last_name      |                                  | created_at     |
| salary         |                                  | updated_at     |
| image          |                                  +----------------+
| manager_id (FK)|
| department_id (FK)|
+----------------+
