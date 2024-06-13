# Socialbook

This social media project, built on Laravel 11 and PHP 8.2.12, offers a dynamic platform for users to connect, share, and interact. With a range of features including friend management, post engagement, and customizable profiles, users can tailor their social experience to suit their preferences. From liking and commenting on posts to receiving notifications and organizing content, this project fosters a vibrant online community while providing a seamless user experience.

## Getting Started

### Prerequisites

Before you begin, ensure you have the following installed on your system:

-   PHP 8.2.4
-   Composer 2.7.3
-   Laravel 11

### Installation

1.  Clone the repository to your local machine:
    
    git clone https://github.com/harshsheth0811/social_media.git
    
2.  Navigate to the project directory:
    
    cd social_media
    
3.  Install dependencies using Composer:
    
    composer install
    
4.  Create a copy of the  `.env.example`  file and rename it to  `.env`. Update the  `DB_DATABASE`  field in the  `.env`  file with your database name.
    
5.  Generate an application key:
    
    php artisan key:generate
    
6.  Configure your  `.env`  file with your database credentials and any other necessary configurations. Default  `DB_USERNAME`  is root,  `DB_CONNECTION`  is sqlite,  `DB_PASSWORD`  is empty.
    

   DB_CONNECTION=YOUR_CONNECTION_NAME
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=YOUR_DATABASE_NAME
   DB_USERNAME=YOUR_USERNAME
   DB_PASSWORD=YOUR_PASSWORD

7.  Migrate the database:
    
    php artisan migrate
    
8.  Serve the application:
    
    php artisan serve
    

Now you should be able to access the application at  [http://127.0.0.1:8000/](http://127.0.0.1:8000/).

### Usage

1.  Register an account using the normal registration process or by using a Gmail ID.
    
2.  Log in using your registered email ID and password.
    
3.  Explore the following core functionalities:
    

## Core Functionalities

### 1. Add/Remove Friend
Users can add or remove friends within the social media platform. This functionality enhances social interaction and network building.

### 2. Like/Unlike Post
Users have the ability to like or unlike posts shared by other users. This feature encourages engagement and interaction among users.

### 3. View Suggestion Friend List
Users can view a list of their top profile within the platform.

### 4. View Notifications
Users receive notifications when other users like their posts. This feature keeps users informed about interactions and engagements on their content.

### 5. Add/Update/Delete Post
Users can create new posts, update existing ones, or delete posts as needed, giving them control over their published content.

### 7. View All User Posts
Users can view posts from all users on the platform, fostering community engagement and interaction.

### 8. Edit Profile
Users can edit their profile information, including profile picture, bio, and other details, allowing them to customize their online presence.

### 9. Logout
Users can log out of their accounts securely, ending their current session on the platform.

### 10. Theme Mode
Users can switch between light and dark themes to customize their viewing experience.

### 11. Send Comments
Users can leave comments on posts shared by other users, facilitating discussions and interactions.

### 12. Reply to Comments
Users can reply to comments on posts, enabling threaded conversations and deeper engagement.

## Contact
For any inquiries or support, please contact  [harshsheth.ast@gmail.com]

----------

Thank you for choosing the Social Media project! We hope you enjoy using it. If you have any questions or need further assistance, don't hesitate to reach out. Happy socializing! 🎉
