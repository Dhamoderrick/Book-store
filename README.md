# README

### requirements

-   Composer
-   Nodejs
-   Elastic Search in you local system

### How do I get set up?

-   Clone the repository.
-   Change the directory to project root
-   Put the **.env** file in the root directory
-   add **ELASTICSEARCH_HOST=localhost** and **ELASTICSEARCH_PORT=9200** to your **.env**
-   make sure elasticsearch is running in your system. If you are in linux use **sudo systemctl start elasticsearch**
-   Create the database and add the DB details in .env file
-   Run **composer install**
-   Run **npm install**
-   Run **php artisan key:generate**
-   Migrate tables using **php artisan migrate**
-   Seed sample data into **books** table using **php artisan db:seed**
-   Add Index in Elasticsearch for seeded dummy data using **php artisan search:addIndex**
-   Run **npm run dev**
-   Run **php artisan serve**
-   Now the app is running on the port **8000**

### Who do I talk to?

-   dharandhamo117@gmail.com
