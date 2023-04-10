<?php

const DB_HOST="localhost";
const DB_USERNAME="root";
const DB_PASSWORD="";
const DB_NAME="simple_ecommerce";

// Create database if not exists
function createdatabase()
{
    $connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
    if (!$connection)
    {
        echo " Not connection sql".mysqli_connect_error();
    }
    else
    {
        $sql= "CREATE DATABASE IF NOT EXISTS `simple_ecommerce` CHARACTER SET UTF8  ";
        mysqli_query($connection,$sql);
        mysqli_close($connection);
    }

}

function connectdatabase()
{
    $connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
    if (!$connection)
    {
        echo " Not connection sql".mysqli_connect_error();
    }
    return $connection;
}



$connection =connectdatabase();
                                    // Create Table User
    $CT="CREATE TABLE  IF NOT EXISTS user(

    `id`INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(200) NOT NULL ,
    `email` VARCHAR(200) NOT NULL ,
    `password` VARCHAR(200) NOT NULL ,
    `address` VARCHAR(200) NOT NULL ,
    `status` VARCHAR(200)  DEFAULT 'user'
    

 )";
    mysqli_query($connection,$CT);


// Create Table category

$C="CREATE TABLE  IF NOT EXISTS category(

    `id`INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(200) NOT NULL ,
    `description` VARCHAR(200) NOT NULL ,
    `image` VARCHAR(200) NOT NULL 
    
 )";
mysqli_query($connection,$C);


// Create Table Product

$C="CREATE TABLE  IF NOT EXISTS product(

    `id`INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(200) NOT NULL ,
    `description` VARCHAR(200) NOT NULL ,
    `price` VARCHAR(200) NOT NULL ,
    `image` VARCHAR(200) NOT NULL ,
    `category_id` INT NOT NULL ,
    FOREIGN KEY(category_id) REFERENCES category(id)
    
 )";
mysqli_query($connection,$C);

$C="CREATE TABLE  IF NOT EXISTS card(

    `id`INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(200) NOT NULL ,
    `description` VARCHAR(200) NOT NULL ,
    `price` VARCHAR(200) NOT NULL ,
    `image` VARCHAR(200) NOT NULL ,
    `user_id` INT NOT NULL ,
    FOREIGN KEY(user_id) REFERENCES user(id)
    
 )";
mysqli_query($connection,$C);



$s="CREATE TABLE  IF NOT EXISTS payment (

    `id`INT PRIMARY KEY AUTO_INCREMENT,
    `product_name` VARCHAR(200) NOT NULL ,
    `product_price` VARCHAR(200) NOT NULL ,
    `product_image` VARCHAR(200) NOT NULL ,
    `username` VARCHAR(200) NOT NULL ,
    `adrress_user` VARCHAR(200) NOT NULL ,
    `user_id` INT NOT NULL ,
    FOREIGN KEY(user_id) REFERENCES user(id)

 )";
mysqli_query($connection,$s);

mysqli_close($connection);