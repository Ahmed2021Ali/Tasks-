<?php

const DB_HOST="localhost";
const DB_USERNAME="root";
const DB_PASSWORD="";
const DB_NAME="ecommerce";

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
        $sql= "CREATE DATABASE IF NOT EXISTS `ToDoApp` CHARACTER SET UTF8  ";
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



$connection = mysqli_connect("localhost","root","","ecommerce");

if (!$connection)
{
    echo " Not connection sql".mysqli_connect_error();
}
else
{
    echo "connection successfully <br>";

    $CT="CREATE TABLE  IF NOT EXISTS user(

    `id`INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(200) NOT NULL,
    `email` VARCHAR(200) NOT NULL,
    `password` VARCHAR(200) NOT NULL,
 )";
    mysqli_query($connection,$CT);

// create of category

    $CT="CREATE TABLE  IF NOT EXISTS category(

    `id`INT PRIMARY KEY AUTO_INCREMENT,
    `name_of_category` VARCHAR(200) NOT NULL,
    `image_of_category` VARCHAR(200) NOT NULL
 )";
    mysqli_query($connection,$CT);

    // create of category

    $CT="CREATE TABLE  IF NOT EXISTS product(

    `id`INT PRIMARY KEY AUTO_INCREMENT,
    `name_of_product` VARCHAR(200) NOT NULL,
    `price_of_product` VARCHAR(200) NOT NULL,
    `image_of_product` VARCHAR(200) NOT NULL,
 )";
    mysqli_query($connection,$CT);


    echo mysqli_error($connection);

    mysqli_close($connection);
}