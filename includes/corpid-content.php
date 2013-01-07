<div id="outer-wrapper">
    <div id="inner-wrapper">
        <div id="top">
            <?php require_once "nav.php" ?>
        </div>

        <div id="content">
            <div class="title"><h1>[ <a href="websites.php">Websites</a> ]&nbsp;&nbsp;&nbsp;Corp Id&nbsp;&nbsp;&nbsp;[ <a href="print">Print</a> ]</h1></div>
            <div class="portfolio-items">
                <?php    

                    $filenames = glob("images/portfolio/*logo.jpg");
              
                    foreach($filenames as $file){

                       echo "<div class='corpidItem'>
                             <img class='lazy' data-original='$file' src='/images/placeholder.gif'/>
                             </div><!-- corpid item -->";
                    }
                ?>

            </div><!-- web item -->
            
            </div><!-- #portfolio-content -->
        </div>
    </div>
</div>