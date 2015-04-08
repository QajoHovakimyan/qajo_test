<?php

defined('ISHOP') or die('Access denied');

function print_arr($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}
/* ===Մուտքային տվյալների ֆիլտրացիա=== */
function clear($var){
    $var = mysql_real_escape_string(strip_tags(trim($var)));
    return $var;
}
/* ===Գլխավոր էջի հասցե=== */
function redirect(){
    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    header("Location: $redirect");
    exit;
}

/* ===Ելք=== */
function logout(){
    unset($_SESSION['auth']);
}

/* ===Ավելացում զամբյուղում=== */
function addtocart($goods_id, $qty = 1){
    if(isset($_SESSION['cart'][$goods_id])){
        // Եթե մասիվում տվյալ ապրանքն արդեն ավելացված է
        $_SESSION['cart'][$goods_id]['qty'] += $qty;
        return $_SESSION['cart'];
    }else{
        // Եթե տվյալ ապրանքը զամբյուղ առաջին անգամ է ավելացվում
        $_SESSION['cart'][$goods_id]['qty'] = $qty;
        return $_SESSION['cart'];
    }
}
/* ===Զամբյուղից ապրանքի մաքրում=== */
function delete_from_cart($id){
    if($_SESSION['cart']){
        if(array_key_exists($id, $_SESSION['cart'])){
            $_SESSION['total_quantity'] -= $_SESSION['cart'][$id]['qty'];
            $_SESSION['total_sum'] -= $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
            unset($_SESSION['cart'][$id]);
        }
    }
}
/* ===Ապրանքների քանակի ստացում=== */
function total_quantity(){
    $_SESSION['total_quantity'] = 0;
    foreach($_SESSION['cart'] as $key => $value){
        if(isset($value['price'])){
            // Եթե ապրանքի գինը կա բազայում
            $_SESSION['total_quantity'] += $value['qty'];
        }else{
            // Հակառակ դեպքում մաքրում ենք այդ սեսիան
            unset($_SESSION['cart'][$key]);
        }
    }
}