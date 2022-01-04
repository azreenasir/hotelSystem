# hotelSystem

This is a project for ICT502 (DATABASE ENGINEERING)

# Configuration

Install Laravel <br />
Install Oracle 11g XE <br />
Install SQL Developer <br />

# How to Install Laravel 

Install composer at their website <br />
Link: https://getcomposer.org/ <br />

# Install Oracle 11g XE 

Download and install <br />
Link: https://www.oracle.com/technical-resources/articles/database/sql-11g-xe-quicktour.html <br />


# Install SQL Developer

Download and install <br />
Link: https://www.oracle.com/database/technologies/appdev/sqldeveloper-landing.html <br />


# Create database on oracle 11g XE

Go to oracle 11gxe and click to run <br />
It will go to their host to create the database <br />
Go to application express column and insert the system and password which you install just now <br />

(Configuration) <br />

Create new <br />
Database username = hotel <br />
Application express username = hotel <br />
Passowrd = hotel <br />
Confirm password = hotel <br />

Click create workspace <br />
And you are done <br />

# Open the Database that we create on SQL Developer

Go to SQL Developer and click to run <br />
Under connection click the "+" icon to connect to database <br />

Insert the information as below: <br />
Name: hotel <br />
Username: hotel <br />
Password: hotel <br />

The rest leave it as default. <br />

# Download the source code project and extract it

Go to main page of this code <br />
Click code and the dropddown will appear <br />
Select Download ZIP <br />
After the download has finish, extract the files.

# Open the source code and install the composer that this project require.

You can navigate to composer.json to check the composer that we need to install<br />

First composer:<br />
Laravel OCI8: Oracle DB driver for Laravel<br />
Link: https://github.com/yajra/laravel-oci8<br />

How to install the composer?<br />
Open terminal on windows or vscode<br />
Make sure the path of terminal is the same as the project path<br />
Copy & Paste this composer command: composer require yajra/laravel-oci8 <br />

You don't need to configure the .env files as I already did it in this project. <br />

Second composer:<br />
Laravel UI<br />
Link: https://github.com/laravel/ui<br />

How to install the composer?<br />
Open terminal on windows or vscode<br />
Make sure the path of terminal is the same as the project path<br />
Copy & Paste this composer command: composer require laravel/ui <br />

Once the laravel/ui package has been installed, you may install the frontend scaffolding using the ui Artisan command:<br />

run this command: php artisan ui bootstrap --auth<br />
Make sure you have install the node packages.<br />
Link: https://nodejs.org/en/<br />
Before compiling your CSS, install your project's frontend dependencies using the Node package manager (NPM):<br />
run this command: npm install & npm run dev
run this command again  until laravel mix successful: npm run dev



