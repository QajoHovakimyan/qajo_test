<?php
defined('ISHOP') or die('Access denied');
/* ===Կատալոգ - դուրս բերել, որպես մասիվ=== */
function catalog(){
    $query = "SELECT * FROM brands ORDER BY parent_id, brand_name";
    $res = mysql_query($query) or die(mysql_query());
    // Կատեգորիաների մասիվ
    $cat = array();
    while($row = mysql_fetch_assoc($res)){
        if(!$row['parent_id']){
            $cat[$row['brand_id']][] = $row['brand_name'];
        }else{
            $cat[$row['parent_id']]['sub'][$row['brand_id']] = $row['brand_name'];
        }
    }
    return $cat;
}
/* ===Ինֆորմերներ - դուրս բերել, որպես մասիվ=== */
function informer(){
    $query = "SELECT * FROM links
                INNER JOIN informers ON
                    links.parent_informer = informers.informer_id
                        ORDER BY informer_position, links_position";
    $res = mysql_query($query) or die(mysql_query());
    
    $informers = array();
    $name = ''; // Ինֆորմերի անուն
    while($row = mysql_fetch_assoc($res)){
        if($row['informer_name'] != $name){ // եթե տվյալ անունով ինֆորմեր չկա
            $informers[$row['informer_id']][] = $row['informer_name']; // մասիվում ավելացնենեք ինֆորմեր
            $name = $row['informer_name'];
        }
        $informers[$row['parent_informer']]['sub'][$row['link_id']] = $row['link_name']; // միցնենք էջերը ինֆորմերին
    }
    return $informers;
}
/* ===Կատալոգի դուրս բերումը=== */
function eyestopper($eyestopper){
    $query = "SELECT goods_id, name, img, price FROM goods
                WHERE visible='1' AND $eyestopper='1'";
    $res = mysql_query($query) or die(mysql_error());
    
    $eyestoppers = array();
    while($row = mysql_fetch_assoc($res)){
        $eyestoppers[] = $row;
    }
    
    return $eyestoppers;
}

/* ===Ապրանքների մասիվի ստացում=== */
function products($category){
    $query = "(SELECT goods_id, name, img, anons, price, hits, new, sale
                 FROM goods
                     WHERE goods_brandid = $category AND visible='1')
               UNION      
               (SELECT goods_id, name, img, anons, price, hits, new, sale
                 FROM goods 
                     WHERE goods_brandid IN 
                (
                    SELECT brand_id FROM brands WHERE parent_id = $category
                ) AND visible='1')";
    $res = mysql_query($query) or die(mysql_error());
    
    $products = array();
    while($row = mysql_fetch_assoc($res)){
        $products[] = $row;
    }
    
    return $products;
}

/* ===Զամբյուղում ապրանքների գումարային գինը և ապրանքները===*/
function total_sum($goods){
    $total_sum = 0;
    
    $str_goods = implode(',',array_keys($goods));
    
    $query = "SELECT goods_id, name, price, img
                FROM goods
                    WHERE goods_id IN ($str_goods)";
    $res = mysql_query($query) or die(mysql_error());
    
    while($row = mysql_fetch_assoc($res)){
        $_SESSION['cart'][$row['goods_id']]['name'] = $row['name'];
        $_SESSION['cart'][$row['goods_id']]['price'] = $row['price'];
        $_SESSION['cart'][$row['goods_id']]['img'] = $row['img'];
        $total_sum += $_SESSION['cart'][$row['goods_id']]['qty'] * $row['price'];
    }
    return $total_sum;
}

/* ===Registration=== */
function registration(){
    $error = ''; // Դատարկ դաշտերի ստուգում
    
    $login = clear($_POST['login']);
    $pass = trim($_POST['pass']);
    $name = clear($_POST['name']);
    $email = clear($_POST['email']);
    $phone = clear($_POST['phone']);
    $address = clear($_POST['address']);
    
    if(empty($login)) $error .= '<li>Մուտքանունը լրացված չէ</li>';
    if(empty($pass)) $error .= '<li>Գաղտնաբառը լրացված չէ</li>';
    if(empty($name)) $error .= '<li>ԱԱՀ - ը լրացված չէ</li>';
    if(empty($email)) $error .= '<li>Էլ. փոստը լրացված չէ</li>';
    if(empty($phone)) $error .= '<li>Հեռախոսահամարը լրացված չէ</li>';
    if(empty($address)) $error .= '<li>Հասցեն լրացված չէ</li>';
    
    if(empty($error)){
        // Եթե բոլոր դաշտերը լրացված են
        // Տվյալ մուտքանունով օգտատիրոջ ստուգում
        $query = "SELECT customer_id FROM customers WHERE login = '$login' LIMIT 1";
        $res = mysql_query($query) or die(mysql_error());
        $row = mysql_num_rows($res); // 1 - այդպիսի օգտատեր կա, 0 - չկա
        if($row){
            // Եթե ա՛դպիսի մուտքանուն կա
            $_SESSION['reg']['res'] = "<div class='error'>Մուտքանունն արդեն զբաղված է խնդրում ենք ընտրել մեկ այլ մուտքանուն</div>";
            $_SESSION['reg']['name'] = $name;
            $_SESSION['reg']['email'] = $email;
            $_SESSION['reg']['phone'] = $phone;
            $_SESSION['reg']['addres'] = $address;
        }else{
            // Եթե ամեն ինչ հաջող է, ապա գրանցում
            $pass = md5($pass);
            $query = "INSERT INTO customers (name, email, phone, address, login, password)
                        VALUES ('$name', '$email', '$phone', '$address', '$login', '$pass')";
            $res = mysql_query($query) or die(mysql_error());
            if(mysql_affected_rows() > 0){
                // Եթե բազայում նոր օգտատերը ավելացվեց
                $_SESSION['reg']['res'] = "<div class='success'>Գրանցումը հաջողությամբ ավարտվեց</div>";
                $_SESSION['auth']['user'] = $name;
                $_SESSION['auth']['customer_id'] = mysql_insert_id();
            }
        }
     }else{
        // Եթե պարտադիր դաշտերը լրացված չեն
        $_SESSION['reg']['res'] = "<div class='error'>Պարտադիր լրացման դաշտեր <ul> $error </ul></div>";
        $_SESSION['reg']['login'] = $login;
        $_SESSION['reg']['name'] = $name;
        $_SESSION['reg']['email'] = $email;
        $_SESSION['reg']['phone'] = $phone;
        $_SESSION['reg']['addres'] = $address;
    }
}

/* ===Մուտք=== */
function authorization(){
    $login = mysql_real_escape_string(trim($_POST['login']));
    $pass = trim($_POST['pass']);
    
    if(empty($login) OR empty($pass)){
        // Եթե մուտքանունը կամ գաղտնաբառը լրացված չեն
        $_SESSION['auth']['error'] = "Մուտքանունը և գաղտնաբառը պարտադիր են լրացման համար";
    }else{
        // Եթե տվյալները բազայից ստացվեցին
        $pass = md5($pass);
        
        $query = "SELECT customer_id, name FROM customers WHERE login = '$login' AND password = '$pass' LIMIT 1";
        $res = mysql_query($query) or die(mysql_error());
        if(mysql_num_rows($res) == 1){
            // Եթե մուտքը հաջողվեց
            $row = mysql_fetch_row($res);
            $_SESSION['auth']['customer_id'] = $row[0];
            $_SESSION['auth']['user'] = $row[1];
        }else{
            // Եթե մուտքանունը և գաղտնաբառը սխալ են
            $_SESSION['auth']['error'] = "Սխալ մուտքանուն կամ գաղտնաբառ";
        }
    }
}
/* ===Առաքման տեսակները=== */
function get_dostavka(){
    $query = "SELECT * FROM dostavka";
    $res = mysql_query($query);
    
    $dostavka = array();
    while($row = mysql_fetch_assoc($res)){
        $dostavka[] = $row;
    }
    
    return $dostavka;
}
/* ===Պատվերի ավելացում=== */
function add_order(){
    // Բոլոր տվյալների ստացում
    $dostavka_id = (int)$_POST['dostavka'];
    if(!$dostavka_id) $dostavka_id = 1;
    $prim = clear($_POST['prim']);
    if($_SESSION['auth']['user']) $customer_id = $_SESSION['auth']['customer_id'];// login եղած հաճախորդներ
    
    if(!$_SESSION['auth']['user']){
        $error = ''; // Դատարկ դաշտերի ստուգումй
    
        $name = clear($_POST['name']);
        $email = clear($_POST['email']);
        $phone = clear($_POST['phone']);
        $address = clear($_POST['address']);
        
        if(empty($name)) $error .= '<li>ԱԱՀ - ն պարտադիր է լրացման համար</li>';
        if(empty($email)) $error .= '<li>Էլ. փոստը պարտադիր է լրացման համար</li>';
        if(empty($phone)) $error .= '<li>Հեռախոսահամարը պարտադիր է լրացման համար</li>';
        if(empty($address)) $error .= '<li>Հասցեն պարտադիր է լրացման համար</li>';
        
        if(empty($error)){
            // Առանց գրանցման հյուրի ավելացում
            $customer_id = add_customer($name, $email, $phone, $address);
            if(!$customer_id) return false; 
        }else{
            // Եթե պարտադիր դաշտերը լրացված չեն
            $_SESSION['order']['res'] = "<div class='error'>Պարտադիր լրացման դաշտեր <ul> $error </ul></div>";
            $_SESSION['order']['name'] = $name;
            $_SESSION['order']['email'] = $email;
            $_SESSION['order']['phone'] = $phone;
            $_SESSION['order']['addres'] = $address;
            $_SESSION['order']['prim'] = $address;
            return false;
        }
    }
    //save_order($customer_id, $dostavka_id, $prim);
}
/* ===Հյուր պատվիրատույի ավելացում=== */
function add_customer($name, $email, $phone, $address){
    
}

/* ===Պատվերի պահպանում=== */
function save_order(){
    
}













