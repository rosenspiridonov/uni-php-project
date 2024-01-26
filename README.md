# Learning Management System (LMS)

This is a simple Learning Management System built with Laravel. It allows for the management of courses, organizations, and admin users.

## Features

- User authentication.
- CRUD operations for courses and organizations.
- Course search functionality.
- Admin management.

## Directory Structure

- `app/Http/Controllers/Admin`: Contains controllers related to admin activities.
- `app/Http/Controllers/Course`: Contains controllers for course-related actions.
- `app/Models`: Eloquent models for the application.
- `resources/views`: Blade templates for the application's views.
- `public`: Publicly accessible assets, including images, CSS, and JavaScript files.
- `routes`: Application routes.

## Usage

### Admin Features

- Login as admin to manage the system.
- Add, edit, view, and delete courses and organizations.
- Create new admin users and manage existing ones.

### Course Management

- View all courses and their details.
- Add new courses with name, date, duration, price, teacher, and associated image.
- Delete courses and automatically remove associated images from the file system.

### Organization Management

- View all organizations.
- Add new organizations with name, image, category, and associated course.
- Delete organizations and their images.

