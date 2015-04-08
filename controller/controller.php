<?php
defined('ISHOP') or die('Access denied');
session_start();
// Մուդելի միացում
require_once MODEL;
// Ֆունկցիաների գրադարանի միացում
require_once 'functions/functions.php';
// Կատալոգի մասիվի ստացում
$cat = catalog(); 
// Ինֆորմերների մասիվի ստացում
$informers = informer();
// Գրանցում
if($_POST['reg']){
    registration();
    redirect();
}
// Մուտք
if($_POST['auth']){
    authorization();
    if($_SESSION['auth']['user']){
        // Եթե մուտքը հածողվեց
        echo "<p>Բարի գալուստ, {$_SESSION['auth']['user']}</p>";
        exit;
    }else{
        // Եթե մուտքը չհաջողվեց
        echo $_SESSION['auth']['error'];
        unset($_SESSION['auth']);
        exit;
    }
}
// Ելք
if($_GET['do'] == 'logout'){
    logout();
    redirect();
}
// Շաբլոնի դինամիկ մասերի միացում
$view = empty($_GET['view']) ? 'hits' : $_GET['view'];
switch($view){
    case('hits'):
        // Ամենավաճառվողները
        $eyestoppers = eyestopper('hits');
    break;
    case('new'):
        // Նորույթներ
        $eyestoppers = eyestopper('new');
    break;
    case('sale'):
        // Զեղչեր
        $eyestoppers = eyestopper('sale');
    break;
    case('cat'):
        // Կատեգորիաների ապրանքներ
        $category = abs((int)$_GET['category']);
        $products = products($category); // model.php - ից մասիվի ստացում
    break;
    case('addtocart'):
        // Զամբյուղում ապրանքի ավելացում
        $goods_id = abs((int)$_GET['goods_id']);
        addtocart($goods_id);
        $_SESSION['total_sum'] = total_sum($_SESSION['cart']);
          
        // Զամբյուղում ապրանքների քանակը
        total_quantity();
        redirect();
    break;
    case('cart'):
        /* Զամբյուղ */
		// Առաքման տեսակների դուրս բերում
        $dostavka = get_dostavka();
        // Զամբյուղի վերահաշվարկ
        if(isset($_GET['id'], $_GET['qty'])){
            $goods_id = abs((int)$_GET['id']);
            $qty = abs((int)$_GET['qty']);
            
            $qty = $qty - $_SESSION['cart'][$goods_id]['qty'];
            addtocart($goods_id, $qty); //Վերջնական արժեքների հետ աշխատանք
            
            $_SESSION['total_sum'] = total_sum($_SESSION['cart']); // Պատվերի ըգումար
            
            total_quantity(); // Ապրանքների արժեքներ
            redirect();
        }
        // Զամբյուղից ապրանքի մաքրում
        if(isset($_GET['delete'])){
            $id = abs((int)$_GET['delete']);
            if($id){
                delete_from_cart($id);
            }
            redirect();
        }
		if($_POST['order_x']){
            add_order();
            //redirect();
        }
    break;
    case('reg'):
        // Գրանցում
    break;
    default:
        // Մնացած բոլոր դեպքերում Առաջին էջ
        $view = 'hits';
        $eyestoppers = eyestopper('hits');
}

// Template - ի միացում
require_once TEMPLATE.'index.php';