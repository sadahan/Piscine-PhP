<?php
session_start();
require('app/model/connexion_class.php');


if ($_GET['view'] == 'sign_up') {
    require('app/view/sign_up.php');
} else if ($_GET['view'] == 'sign_in') {
    require('app/view/login.php');
} else if ($_GET['view'] == 'basket') {
    require('app/view/basket.php');
} else if ($_GET['view'] == 'product') {
    require('app/view/product_page.php');
} else if ($_GET['view'] == 'order') {
    require('app/view/order.php');
} else if ($_GET['view'] == 'contact') {
    require('app/view/contact.php');
} else if ($_GET['view'] == 'cgv') {
    require('app/view/cgv.php');
} else if ($_GET['view'] == 'faq') {
    require('app/view/faq.php');
} 
else if ($_GET['view'] == 'admin') {
    require('app/view/admin_page.php');
} 
else if ($_GET['view'] == 'add_new_item') {
    require('app/view/admin_add_new_item.php');
}
else if ($_GET['view'] == 'modif_item') {
    require('app/view/admin_modif_item.php');
}
else if ($_GET['view'] == 'add_user') {
    require('app/view/admin_add_user.php');
}
else if ($_GET['view'] == 'sup_user') {
    require('app/view/admin_sup_user.php');
}
else if ($_GET['view'] == 'list_orders') {
    require('app/view/admin_list_orders.php');
}
else if ($_GET['view'] == 'sup_item') {
    require('app/view/admin_sup_item.php');
}
else {
    require('app/view/home.php');
}
