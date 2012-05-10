#Registration Management System

##Description
This is a project for my Software Engineering course, 
This project enables the students to register for courses
when registering for a new semester at his University.
Additionally, an option is given to him to be able to 
Add/Drop his courses.


##Installation Instructions
### Database 
For setting up the database for the project,
install "PHPMyAdmin" software, which will allow you to
easily see the database structure.
*You can also use the normal mysql command-line program for this*

* Now, Create a database named 'dbms'
* Now, Use the newly created 'dbms' database
* Import the mysql schema from the file **database/schema.sql**

### Web-Application
To use the Registration Management application, unzip the folder, and 
copy the contents into your Apache web directory
* */var/www/* for linux
* *C:/wamp/www/* for windows
Now browse to the index.php file using your browser.

And you are good to go.

The database has been pre-populated with some default users and courses.
For using the application, some useful data are:

#### Login as Dean
*username:*dean
*password:*dean

#### Login as Student
*username:*y09uc001 to y0ouc005
*password:*y09uc001 to y09uc005


##To Do
### Implemented multiple course registrations at one time
Replace the current radio-button type registration with a checkbox-type 
registration, so that a user can check all the courses he wants to register
in one go. The system should notify the user on a per-course basis whether 
his registration was successful or not.
