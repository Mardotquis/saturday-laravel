<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
Creating Model and Migration
First, let's create a Model and Migration. We can do it with two artisan commands, or we can do it with one command make:model and provide -m, which means migration.

php artisan make:model Post -m
*/

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            /*
            Laravel has a syntax to create foreign keys. There are a few options, but I prefer the method foreignId() with constrained(). It will create both the DB column and the foreign key.

            The name of the relation column should have a format of "xxxxx_id", where "xxxxx" is a singular form of the relations table. And then, you define a constrained(), which is a shorter Laravel method for ->references('id')->on('categories').
            */
            $table->foreignId('category_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

/*
INSERT INTO saturday_laravel.posts
(id, title, `text`, category_id, created_at, updated_at)
VALUES(0, 'Post title 1','Very long text', 1, NOW(), NOW())
INSERT INTO saturday_laravel.posts
(id, title, `text`, category_id, created_at, updated_at)
VALUES(0, 'Post title 2','Very long text 2', 2, NOW(), NOW());
INSERT INTO saturday_laravel.posts
(id, title, `text`, category_id, created_at, updated_at)
VALUES(0, 'Post title 3','Very long text 3', 3, NOW(), NOW());
INSERT INTO saturday_laravel.posts
(id, title, `text`, category_id, created_at, updated_at)
VALUES(0, 'Post title 4','Very long text 4', 3, NOW(), NOW());

DELIMITER $$
CREATE PROCEDURE insert_multiple_posts()
BEGIN
    INSERT INTO saturday_laravel.posts (id, title, `text`, category_id, created_at, updated_at)
    VALUES (0, 'Post title 2', 'Very long text 2', 2, NOW(), NOW());

    INSERT INTO saturday_laravel.posts (id, title, `text`, category_id, created_at, updated_at)
    VALUES (0, 'Post title 3', 'Very long text 3', 3, NOW(), NOW());

    INSERT INTO saturday_laravel.posts (id, title, `text`, category_id, created_at, updated_at)
    VALUES (0, 'Post title 4', 'Very long text 4', 3, NOW(), NOW());
END$$
DELIMITER ;
*/