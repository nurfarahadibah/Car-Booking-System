# 🚗 Vehicle Booking System

## 1. System Introduction

### 1.1 System Overview
The **Vehicle Booking System** is designed to simplify vehicle reservations for customers while ensuring that administrators manage the vehicle inventory efficiently. It is organized around two primary user roles: **customers** and **administrators**.

- **Customers** can quickly book vehicles, view their reservation history, search for bookings, modify or cancel reservations, and keep their profiles up to date.
- **Admins** have a toolkit for efficiently managing vehicle inventory, processing bookings, and diving into a dashboard packed with helpful information.

### 1.2 System Users
- **Customer**: Customers are the primary users of the system who interact with the reservation functionalities, view their booking history, and manage their profiles.
- **Admin**: Admins have access to functions that involve vehicle management, booking approval, and a dashboard providing an overview of the vehicle inventory and booking information.

## 2. System Design

### 2.1 Use Case Diagram
!Use Case Diagram

### 2.2 Conceptual ERD
!Conceptual ERD

## 3. Development

### 3.1 Software, Language, Technology, and Tools

| Aspect              | Technology      | Description |
|---------------------|-----------------|-------------|
| **UML Diagrams**    | draw.io         | draw.io 🎨, an adaptable online tool, facilitates the crafting of Unified Modeling Language (UML) diagrams. With support for various diagram types like class and use case diagrams, it serves as an excellent platform for visualizing and planning the architectural components of the Vehicle Booking System. |
| **Database**        | MySQL (phpMyAdmin) | MySQL 🗄️, a widely used relational database management system, teams up with phpMyAdmin 🌐, a web-based management tool. This duo offers a robust and user-friendly environment for designing, organizing, and manipulating database structures and data within the Vehicle Booking System. |
| **System Template** | Bootstrap       | Bootstrap 🎨, a dynamic front-end framework, simplifies the creation of responsive and mobile-friendly web interfaces. With its pre-designed components like grids, forms, and navigation bars, Bootstrap ensures the development of visually appealing and consistent user interfaces. |
| **Programming Languages** | PHP, HTML, CSS, JavaScript, JSON | The combination of PHP for server-side scripting and HTML, CSS, JavaScript, and JSON for front-end development forms the backbone of the Vehicle Booking System. This ensemble enables the creation of dynamic and interactive web applications, fostering seamless communication between the server and the user's browser. |
| **Hosting Provider** | JimatHosting   | As a dependable web hosting provider, JimatHosting 🌐 offers a variety of hosting services. It provides the essential infrastructure for deploying and running web applications, ensuring their accessibility to users across the internet. |

## 4. Database Design

### 4.1 phpMyAdmin Screenshot
!phpMyAdmin Screenshot

### 4.2 Screenshot of the Designer in phpMyAdmin
!Designer Screenshot

## 5. Development Steps

| Step | Phase                  | Description |
|------|------------------------|-------------|
| 1    | Requirements Gathering | Identify specific requirements of customers and administrators. Define core functionalities, such as reservation processes and user roles. |
| 2    | System Design          | Create Entity Relationship Diagram (ERD) for database structure. Design user interfaces with user-friendly navigation. |
| 3    | Database Setup         | Implement tables for customers, vehicles, and reservations. Establish relationships between tables. |
| 4    | User Authentication and Authorization | Define user roles and set up authorization mechanisms. |
| 5    | Reservation Functionality | Develop a reservation process, considering availability and pricing. Implement modification and cancellation features. |
| 6    | Vehicle Inventory      | Create functionalities for managing vehicle inventory where the admin can make a vehicle inactive or active. |
| 7    | User Profiles          | Design edit user profile pages with security measures. |
| 8    | Develop Admin Features | Implement an admin dashboard with key metrics. Confirmation and Verification: Implement confirmation and verification messages when customers cancel a booking and when staff delete a vehicle. |
| 9    | Security Measures      | Implement measures to prevent SQL injection. |
| 10   | UI Enhancements        | Refine UI based on the HCI principle. Ensure responsiveness on different devices. |
