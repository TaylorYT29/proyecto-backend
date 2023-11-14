<?php
    require_once '../database.php';
    
    include('simple_html_dom.php');

    //link
    $link = "https://www.allrecipes.com/recipes/722/world-cuisine/european/german/";

    // $link="https://www.allrecipes.com/recipes/77/drinks/";

    $filenames = [];
    $menu_item_names = [];
    $menu_item_descriptions = [];
    $image_urls = [];

    $menu_items = 10;

    $items = file_get_html($link);

    //save meals info and filenames for the images
    foreach ($items->find('.card--no-image') as $item){
        
        $title = $item->find('.card__title-text');
        
        $details = file_get_html($item->href);
        $description = $details->find('.article-subheading');
        $image = $details->find('.primary-image__image');

        if(count($image) > 0){
            $image_urls[] = $image[0]->src;
        }else{
            $replace_img = $item->find('.universal-image__image');
            if(count($replace_img) > 0){
                $image_urls[] = $replace_img[0]->{'data-src'};
            }
        }
       
        if(count($description) > 0){
            if($menu_items == 0) break;

            $menu_item_names[] = trim($title[0]->plaintext);
            $menu_item_descriptions[] = $description[0]->plaintext;
            
            $filename = strtolower(trim($title[0]->plaintext));
            $filename = str_replace(' ', '-', $filename);
            $filenames[] = $filename;

            $menu_items--;
        }

    }

    foreach($filenames as $index=>$item){
        echo "******************";
        echo "<br>";
        echo $item;
        echo "<br>";
        echo $menu_item_names[$index];
        echo "<br>";
        echo $menu_item_descriptions[$index];
        echo "<br>";
        echo $image_urls[$index];
        echo "<br>";
        echo rand (1*10, 70*10)/10;
        echo "<br>";
        //$menu_items--;
        //if($menu_items == 0) break;
    }

    //get and download images
    //  foreach ($filenames as $index=>$image){
    //      file_put_contents("./images/".$image.".jpg", file_get_contents($image_urls[$index]));
    //  }

    //insert info
    // Reference: https://medoo.in/api/insert


     for($index=0; $index<10; $index++){
          $database->insert("dish_information",[
             "name"=> $menu_item_names[$index],
             "image"=> "images".$filenames[$index].".jpg",
             "category"=> "category",
             "isFeatured"=> "isFeatured",
             "description"=> $menu_item_descriptions[$index],
             "people_quantity"=>"people_quantity",
      ]);
     }
 
?>