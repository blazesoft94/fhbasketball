<?php 
    include_once "../includes/connect_db.php";

    $limit = mysql_escape_string(htmlspecialchars($_GET["limit"]));
?>
<?php 
    $sql = "select * from gallery order by gallery_id__blazeweb desc limit $limit, 6";
    $result = $con->query($sql);
    $c = 0;
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            if($c>=6){break;}
            $c++;
            $image_name = $row["gallery_image__blazeweb"];
            $image_text = $row["gallery_text__blazeweb"];
?>
        <div class="gallery__item category<?php echo $row["gallery_category__blazeweb"] ?>">
            <div class="gallery__item__img">
                <div class="gallery-img-holder"><img src="img/clubGallery/<?php echo $image_name?>-thumb.jpg" alt="gc"></div>
                
                <a class="hover-link-g mfp-gallery" href="img/clubGallery/<?php echo $image_name?>">
                    <div class="inside">
                        <i class="icon-cross"></i>
                        <p><?php echo $image_text?></p>
                    </div>	
                </a>
            </div>
        </div>
<?php
    //closing the while loop	
    }}
?>