<?php
include 'db_connect.php';
function getDaTa($sql)
{
    global $conn;
    $result = mysqli_query($conn, $sql);
    if ($result === false) {
        return [];
    }
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    mysqli_free_result($result);
    return $data;
}

function getUser(){
    $sql = 'SELECT * FROM tbl_admin';
    $users = getDaTa($sql);
    return $users;
}
function getAllHotTour()
{
    $sql = "SELECT tbl_tour.id AS tour_id, tbl_tour.id,tbl_tour.name, tbl_tour.note, tbl_tour.price, tbl_tour.day, tbl_tour.img_id, tbl_tour.status, tbl_media.name_file FROM tbl_tour LEFT JOIN tbl_media ON tbl_tour.img_id = tbl_media.id LIMIT 6";
    $tours = getDaTa($sql);
    return $tours;
}

function getAllTour()
{
    $sql = "SELECT tbl_tour.id AS tour_id, tbl_tour.id,tbl_tour.name, tbl_tour.note, tbl_tour.price, tbl_tour.day, tbl_tour.img_id, tbl_tour.status, tbl_media.name_file FROM tbl_tour LEFT JOIN tbl_media ON tbl_tour.img_id = tbl_media.id ";
    $tours = getDaTa($sql);
    return $tours;
}

function getTourLatest()
{
    $sql = "SELECT  tbl_tour.id AS tour_id,tbl_tour.name,tbl_tour.note,tbl_tour.price,tbl_tour.time_create,tbl_tour.day,tbl_tour.img_id,tbl_tour.status,tbl_media.name_file FROM tbl_tour LEFT JOIN tbl_media ON tbl_tour.img_id = tbl_media.id ORDER BY tbl_tour.time_create DESC LIMIT 3;";
    $tours = getDaTa($sql);
    return $tours;
}

function getTourDetail($id)
{
    $sql = "SELECT  tbl_tour.id AS tour_id,tbl_tour.id,tbl_tour.name,tbl_tour.description,tbl_tour.note,tbl_tour.price,tbl_tour.time_create,tbl_tour.plan_tour,tbl_tour.day,tbl_tour.img_id,tbl_tour.status,tbl_media.name_file FROM tbl_tour LEFT JOIN tbl_media ON tbl_tour.img_id = tbl_media.id WHERE $id = tbl_tour.id;";
    $tour_detail = getDaTa($sql);
    return $tour_detail;
}

function getAllTourLimit($per_page, $offset)
{
    $sql = "SELECT tbl_tour.id AS tour_id, tbl_tour.id, tbl_tour.name, tbl_tour.note, tbl_tour.price, tbl_tour.day, tbl_tour.img_id, tbl_tour.status, tbl_media.name_file 
            FROM tbl_tour 
            LEFT JOIN tbl_media ON tbl_tour.img_id = tbl_media.id
            LIMIT $per_page OFFSET $offset ";
    $tours = getDaTa($sql);
    return $tours;
}

function  searchTour($place){
    $sql = "SELECT tbl_tour.id AS tour_id, tbl_tour.id,tbl_tour.name, tbl_tour.note, tbl_tour.price, tbl_tour.day, tbl_tour.img_id, tbl_tour.status, tbl_media.name_file FROM tbl_tour LEFT JOIN tbl_media ON tbl_tour.img_id = tbl_media.id WHERE tbl_tour.place LIKE '%$place%'";
    $tours = getDaTa($sql);
    return $tours;
}
function getTour($id = null) {
    $sql = 'SELECT * FROM tbl_tour WHERE id = $id';
    $tours = getDaTa($sql);
    return $tours;
}

function getAllCustomer()
{
    $sql = "SELECT * FROM tbl_rls_tour_customer";
    $customers = getData($sql);
    return $customers;
}
function getAllCustomerID($id = null){
    global $conn;
    $sql = "SELECT * FROM tbl_rls_tour_customer";

    if ($id !== null) {
        $sql .= " WHERE id = $id";
    }

    return getDaTa($sql);
}
function getAllBlog()
{
    $sql = "SELECT tbl_blog.id AS blog_id,tbl_blog.id, tbl_blog.title, tbl_blog.content, tbl_blog.status, tbl_blog.time_create, tbl_blog.count, tbl_blog.img_id, tbl_media.name_file FROM tbl_blog LEFT JOIN tbl_media ON tbl_blog.img_id = tbl_media.id ";
    $blogs = getData($sql);
    return $blogs;
}


function getHotBlog()
{
    $sql = "SELECT tbl_blog.id AS blog_id,tbl_blog.id, tbl_blog.title, tbl_blog.content, tbl_blog.status,  tbl_blog.img_id,tbl_blog.count_like, tbl_media.name_file FROM tbl_blog LEFT JOIN tbl_media ON tbl_blog.img_id = tbl_media.id WHERE tbl_blog.status = 'blog_hot'";
    $blogs = getData($sql);
    return $blogs;
}

function getBlogLatest()
{
    $sql = "SELECT tbl_blog.id AS blog_id, tbl_blog.title, tbl_blog.content,tbl_blog.img_id,tbl_blog.time_create, tbl_media.name_file FROM tbl_blog LEFT JOIN tbl_media ON tbl_blog.img_id = tbl_media.id ORDER BY tbl_blog.time_create DESC LIMIT 3";
    $blogs_time = getDaTa($sql);
    return $blogs_time;
}

function getBlogDetail($id)
{
    $sql = "SELECT tbl_blog.id AS blog_id, tbl_blog.title, tbl_blog.content,tbl_blog.img_id,tbl_blog.count,tbl_blog.time_create,tbl_blog.count_like, tbl_media.name_file FROM tbl_blog LEFT JOIN tbl_media ON tbl_blog.img_id = tbl_media.id WHERE tbl_blog.id = $id";
    $blogs = getDaTa($sql);
    return $blogs;
}
function getAllBlogLimit($per_page, $offset)
{
    $sql = "SELECT tbl_blog.id AS blog_id,tbl_blog.id, tbl_blog.title, tbl_blog.content, tbl_blog.status, tbl_blog.time_create, tbl_blog.count, tbl_blog.img_id, tbl_media.name_file FROM tbl_blog LEFT JOIN tbl_media ON tbl_blog.img_id = tbl_media.id LIMIT $per_page OFFSET $offset ";
    $blogs = getDaTa($sql);
    return $blogs;
}

function getALLAssement()
{
    $sql = 'SELECT * FROM tbl_assement';
    $assements = getDaTa($sql);
    return $assements;
}

?>