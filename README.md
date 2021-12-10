# Bloggerman



## Installation

### I assume you already have Laravel installed <p>[Official Documentation](https://laravel.com/docs/8.x/installation#installation)</p>


### Clone the repository 

   <p> git clone https://github.com/Nenadsavkic/Bloggerman.git </p>

   ### Switch to the repository cloned folder

   <p> example path:  PS C:\Users> cd bloggerman  </p>

### Install all the dependencies using composer

   ``` bash
   composer install
   ```

### Copy the '.env.example' file in the '.env' file
    
   ```bash
   cp .env.example .env
   ```

### Generate a new application key
    
   ```bash
   php artisan key:generate
   ```
### Link storage directory

   ```bash
   php artisan storage:link
   ```

### Create database 'bloggerman' in your local server (xamp), then run migration
### Check the database connection in .env before migrating

   ```bash
   php artisan migrate
   ```

### Start your server

   ```bash
   php artisan serve
   ```

<p> You can now access the server at http://localhost:8000</p>

    

