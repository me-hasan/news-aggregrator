# Project Name : News Aggregration






<!-- HOW TO RUN -->


Please follow the below instructions to run this branch in your machine:


1. Clone this repository -
   ```sh
   https://github.com/k-hasan/news-aggregrator
   ```
2. Go to the cloned project directory
   ```sh
   cd news-aggregrator
   ```
3. Create a network 
   ```sh
   docker network create --driver bridge --subnet=192.168.20.0/24 --gateway=192.168.20.1 newsnet
   ```


      
4. Docker compose command
   ```sh
   docker compose up -d
   ```

5. Go to the news-php container
   ```sh
   docker exec -it news-php sh
   cd /public_html   
   ```

6. check following configuration
   ```sh
    DB_CONNECTION=mysql
    DB_HOST=news-db
    DB_PORT=3306
    DB_DATABASE=news_aggregator_db
    DB_USERNAME=root
    DB_PASSWORD=myrootpassword    
   ```
7. Go to the news-db container
   ```sh
   cd /
   connect container database
   create database news-db   
   ```
8. Go to the news-php container
   ```sh
   sudo docker exec -it news-php sh
   cd /public_html   
   php artisan migrate:fresh --seed
   php artisan update-news-archive:run
   ```

9. App should be available in http://localhost:8088

10. Backend API should be available in http://localhost:8089







