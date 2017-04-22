<?php
/**
 * Created by PhpStorm.
 * User: fmalik
 * Date: 22.04.17
 * Time: 15:21
 */



/**
 * Prints a Hello World on the Screen. Part of the output can be changed.
 *
 * @author fmalik <info@fmalik.de>
 * @since  14.05.2015
 * @version 1.0
 *
 * @param string $str by sett
 * @param boolean $echo Wenn false dann wird erfolgt keine direkte Ausgabe.
 */
function helloWorld ($str="World", $echo=true) {

    $hello = 'Hello'.$str;

    if($echo === true) {
        echo $hello;
        return true;
    }

    return $hello;
}



/**
 * Print data
 *
 * @author fam
 * @return html
 */
function e($data) {
    echo '<pre>';
    var_dump ( $data );
    echo '</pre>';
}

/**
 * Print data
 *
 * @author fam
 * @return html
 */
function epr($data) {
    echo '<pre>';
    print_r ( $data );
    echo '</pre>';
}


function contentLoader(){
    $allowed_pages = allowedPages();
    if (isset ( $_GET ['p'] ) && array_key_exists ( $_GET ['p'], $allowed_pages )) {
        $p = $_GET ['p'];
        $file_to_include = $allowed_pages [$_GET ['p']];

        include $file_to_include;
    } else {
        // fallback

        if (! isset ( $_GET ['p'] ) || $_GET ['p'] == "") {
            include ('inc/main.php');
        } else {
            echo '<span class="highlightGrey">Page not found. Redirected to Main Page</span>';
            include ('inc/main.php');
        }
    }
}
/**
 * Array of Allowes Pages
 *
 * @author fam
 *
 */
function allowedPages() {

    $allowed_pages = array (
        'home' => 'inc/main.php',
        'dashboard' => 'inc/main.php',
    );

    return $allowed_pages;

}