<?php require("header.php"); ?>


<div data-pageid="gallery" class="page_gallery wrapper">
    
    <div class="content">
        
        <div class="content_wrap">


            <div class="center row">
               <button data-href="video.php" class="capsuleLeft">Bring Nadine To Your School</button>
                <button data-href="gallery.php" class="capsuleRight active" >Get Featured In Candy Magazine</button>


            </div>
            <div class="center row">
                <h2 class="center">I've Taken The <br/><i class="hashtag">#</i>creamsilkhairdare Challenge!</h2> 
                <p>If you have taken the #CreamSilkHairDare Challenge in your school, share your own  #CreamSilkHairDare photo on Facebook, Twitter and get a chance to be featured on Candy magazine! Read on for Full Mechanics <a class="" href="" style="font-weight: bold; text-decoratin: underline; color: #fff;" data-featherlight="#fl_mechphoto">Here</a></p>
                <!--<p>Share it on Twitter with the caption “I Want Nadine to bring the #CreamSilkHairDare” <br>along with a hashtag of your school’s name </p>--> 
               
                  <?php if($notinner) {?>
                      <a class="button" href="entries.php">See those who dared</a>
                  <?php }else { ?>
                       <a class="button" href="gallery.php">Back To Gallery</a>
                 <?php } ?>
            
            </div>
            <div class="row">

              <?php if($notinner) {?>

                  <ul class="gallery_wrap">
                    <?php
                      getAlbums();   
                    ?>
                       
                  </ul>
              
              <?php } else { ?>

              <ul class="gallery_inner_wrap">
                <?php
                      getPhotos($albumName);   
                       
                    ?>
                 
              </ul>
              <?php } ?>
                  <div class="clearfix"></div>

                          
                  </div>
            </div>
        </div>
    </div>

</div><!-- end wrapper -->


<?php require("footer.php"); ?>