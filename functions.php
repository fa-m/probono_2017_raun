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
            include_once ('inc/main.php');
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
        'add' => 'inc/addResource.php',
    );

    return $allowed_pages;

}

function getTagCloud($tags, $cssfields, $target) {

        $cloudTags = '';

        foreach ($tags as $key => $value) {

            shuffle($cssfields);
            $tag = $cssfields[0];

            $cloudTags .= '<a href="'.$value['url'].'" target="' .
                $target.'" class="'.$tag.'">'.$value['tag'].'</a> ';
        }

        return $cloudTags;
}


function getGridData(){

    $data = [];
        $data[0]['id'] = 0;
        $data[0]['title'] = 'Fracking';
        $data[0]['description'] = 'Energy';
        $data[0]['link'] = 'http://www.google.de';
        $data[0]['type'] = 'Paper';
        $data[0]['user'] = 'Franz';

        $data[1]['id'] = 1;
        $data[1]['title'] = 'Crime';
        $data[1]['description'] = 'Crime Statistic';
        $data[1]['link'] = 'http://www.google.de';
        $data[1]['type'] = 'Link';
        $data[1]['user'] = 'Peter';

    $data[2]['id'] = 2;
    $data[2]['title'] = 'Security';
    $data[2]['description'] = 'Security Paper - 2017';
    $data[2]['link'] = 'http://www.google.de';
    $data[2]['type'] = 'Scientific Article';
    $data[2]['user'] = 'Dr. Otto';

    $data[3]['id'] = 3;
    $data[3]['title'] = 'Human Rights';
    $data[3]['description'] = 'Youtube Video about Human Rights';
    $data[3]['link'] = 'http://www.google.de';
    $data[3]['type'] = 'Human Rights';
    $data[3]['user'] = 'Mario';


    return json_encode($data);
}


function getCategories(){
    $data = [];

    $data[] = 'Migration';
    $data[] = 'Environment';
    $data[] = 'Development';
    $data[] = 'Crime';
    $data[] = 'Security';
    $data[] = 'Human Rights';

    return $data;
}


function getResourceType(){
    $data = [];

    $data[] = 'Scientific Article';
    $data[] = 'Media';
    $data[] = 'URL';
    $data[] = 'Book';
    $data[] = 'Other';

    return $data;
}


function callAPI($method, $url, $data = false, $contentType='application/json')
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($curl, CURLOPT_HTTPHEADER,     array('Content-Type: '.$contentType));

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}