# COACHTECH お問い合わせフォーム

## 環境構築

### Dockerビルド

・git clone https://github.com/ta647/contact-form-test  
・docker-compose up -d --build

### Laravel環境構築

・docker-compose exec php bash  
・composer install  
・cp .env.example .env  
・php artisan key:generate  
・php artisan migrate  
・php artisan db:seed  

### 開発環境

・お問い合わせ画面：http://localhost/  
・ユーザー登録：http://localhost/register  
・phpMyAdmin：http://localhost:8080/


## 使用技術（実行環境）

・PHP 8.1  
・Laravel 8.x  
・MySQL 8.0  
・Docker / Docker Compose  
・nginx 1.21  

## ER図

![ER図](ER.drawio.png)

## URL

開発環境：http://localhost
