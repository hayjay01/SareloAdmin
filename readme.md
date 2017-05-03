#SARELO

##Installation
* Navigate to the project root and run `composer install` to install all the project's dependencies.
* run laravel migration `php artisan migrate`
* copy `.env.example` and name the copy `.env`
* setup database configuration
* setup sparkpost or other email service provider (App was tested with sparkpost)
* setup facebook and google app for social login
* Modify sender's name in email template and signature in email template
* setup a subdomain to serve as cdn for uploaded images