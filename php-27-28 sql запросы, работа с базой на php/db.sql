CREATE TABLE IF NOT EXISTS `posts` (
	`id` integer primary key NOT NULL UNIQUE,
	`title` TEXT NOT NULL,
	`content` TEXT,
	`user_id` INTEGER NOT NULL,
	`category_id` INTEGER NOT NULL,
FOREIGN KEY(`user_id`) REFERENCES `users`(`id`),
FOREIGN KEY(`category_id`) REFERENCES `posts_categories`(`category_id`)
);
CREATE TABLE IF NOT EXISTS `categories` (
	`id` integer primary key NOT NULL UNIQUE,
	`name` TEXT NOT NULL
);
CREATE TABLE IF NOT EXISTS `users` (
	`id` integer primary key NOT NULL UNIQUE,
	`email` TEXT NOT NULL UNIQUE,
	`passport_id` INTEGER NOT NULL UNIQUE,
	`name` INTEGER NOT NULL,
FOREIGN KEY(`passport_id`) REFERENCES `passports`(`id`)
);
CREATE TABLE IF NOT EXISTS `passports` (
	`id` integer primary key NOT NULL UNIQUE,
	`number` INTEGER NOT NULL UNIQUE
);
CREATE TABLE IF NOT EXISTS `posts_categories` (
	`post_id` INTEGER NOT NULL,
	`category_id` INTEGER NOT NULL,
FOREIGN KEY(`post_id`) REFERENCES `posts`(`id`),
FOREIGN KEY(`category_id`) REFERENCES `categories`(`id`)
);
CREATE TABLE IF NOT EXISTS `comments` (
	`id` integer primary key NOT NULL UNIQUE,
	`post_id` INTEGER NOT NULL,
	`user_id` INTEGER NOT NULL,
	`comment_text` TEXT NOT NULL,
FOREIGN KEY(`post_id`) REFERENCES `posts`(`id`),
FOREIGN KEY(`user_id`) REFERENCES `users`(`id`)
);
CREATE TABLE IF NOT EXISTS `posts_tags` (
	`tag_id` integer primary key NOT NULL,
	`post_id` INTEGER NOT NULL,
FOREIGN KEY(`tag_id`) REFERENCES `tags`(`id`),
FOREIGN KEY(`post_id`) REFERENCES `posts`(`id`)
);
CREATE TABLE IF NOT EXISTS `tags` (
	`id` integer primary key NOT NULL UNIQUE,
	`name` TEXT NOT NULL
);