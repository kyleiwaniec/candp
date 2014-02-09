<div id="outer-wrapper">
    <div id="inner-wrapper">
        <div id="top">
            <?php require_once "nav.php" ?>
        </div>

        <div id="content">
            <div class="title"><h1>[ <a href="websites.php">Websites</a> ] [ <a href="corpid.php">Corp Id</a> ]&nbsp;&nbsp;&nbsp;Print</h1></div>
            <div class="portfolio-items">
                <?php    

                    $filenames = glob("images/portfolio/print/print*");
              
                    foreach($filenames as $file){

                       echo "<div class='printItem'>
                             <img class='lazy' data-original='$file' src='/images/placeholder.png'/>
                             </div><!-- corpid item -->";
                    }
                ?>

            </div><!-- web item -->
            
            </div><!-- #portfolio-content -->
        </div>
    </div>
</div>