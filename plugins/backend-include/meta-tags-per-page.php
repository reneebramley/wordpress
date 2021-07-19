<?php
/* META TAGS PER PAGE */
add_action('wp_head', 'ranaay_add_meta_data', 1);
function ranaay_add_meta_data() {
    //About Us. 1176.
    //About Us. Contact Us. 1178.
    //About Us. Credit Application. 384.
    //About Us. Meet The Team. 1313.
    //About Us. Product Partners. 1317.
    
    //Home Page. 
    if ( is_page('1180') ) { 
        echo'<meta name="keywords" content="electrical products, engineering systems, industrial safety, safety systems">';
    // Description. CellTec sells a complete range of engineering, industrial safety, software and electrical products. Also the proud owner of Zone Safety Systems. Our consultants are experts in the industry can design and manufacture customised solutions for your business.
    }

    /* //Resources.
    if ( is_singular('1357') ) { 
        echo'<meta name="keywords" content="embedded pc windows">';
        echo'<meta name="title" content="Engineering Resource Centre - CellTec">';
    // Description. CellTec's resource centre features articles, training and product videos and catalogues. Keep up with the latest trends in engineering. Learn more!
    }
   //Resources. Articles. 911.
   //Resources. Downloads.1307.
   //Resources. Videos. 909.*/
   
   //Store
    if ( is_shop() ) { 
        echo'<meta name="keywords" content="variable speed drives, safety systems, electrical products online, engineering products online">';
        echo'<meta name="title" content="Buy variable speed drives and other electrical products online - CellTec">';
    // Description. CellTec's products suit most engineering applications. Buy Zone Safety Systems, LED Warning Signs, PLC's, variable speed drives and more! Buy electrical products online and shop for engineering products online today.
    }
    
    /* //Store. Control & Automation Components .
    if ( is_product_category('1106') ) { 
        echo'<meta name="keywords" content="automation components, terminal boxes, terminal enclosures, bootlace ferrules">';
        echo'<meta name="title" content="Control & Automation Components - terminal boxes, bootlace ferrules all sold online - CellTec">';
    // Description. 
    } */

}
?>