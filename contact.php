<?php 
$title = "copy &amp; paste generation - contact";
$body_id = "contact";
require_once "header.php";
?>
<div id="outer-wrapper">
    <div id="inner-wrapper">
        <div id="top">
            <?php require_once "nav.php" ?>
        </div>

        <div id="content">
            <div class="title"><h1>Contact</h1></div>
                
                <div id="form">
                        <form id="contact-form">    
                            <div><p>
                                    We'd love to hear from you. <br />
                                    Please fill in this form and we will get back to you within 24hours.
                                </p>
                            </div>
                            <span class="hidden"><label for="FirstName" >First Name:</label><br /></span>
                            <input type="text" name="FirstName" id="FirstName" placeholder="First Name" class="required"/>
                            <br />
                            <span class="hidden"><label for="LastName" >Last Name:</label><br /></span>
                            <input type="text" name="LastName" id="LastName" placeholder="Last Name"  class="required"/>
                            <br />
                            <span class="hidden"><label for="email" >Email:</label><br /></span>
                            <input type="email" id="email" name="email" placeholder="Email"  class="required"/>
                            <br /> 
                            <span class="hidden"><label for="phone" >Phone No. (Incl. Area Code):</label><br /></span>
                            <input type="tel" name="phone" id="phone" placeholder="Phone No. (Incl. Area Code)"  class="required"/>


                            <br />
                            <span class="hidden"><label for="notes" >Tell us about your project:</label><br /> </span>
                            <textarea name="notes" placeholder="Tell us about your project" class="notesArea required" id="notes"></textarea><br /> <br />

                            <input type="submit" value="send" class="mb mb-single" />
                        </form>
                    </div><!-- end form -->
                    <div id="thanks">
                         <h1>
Thank You <span style="text-transform:uppercase;" id="yourname"></span>
</h1>
    <div>
<p>Your form was successfully submitted.<br />
  We will get back to you within 24hours. </p>
<canvas id="canvas" width="300">
    <em> (You can't see this really cute animation, because your browser doesn't support &lt;canvas&gt;.<br />
        For a better internet experience go <a href="http://www.google.com/chrome">download google chrome</a>)</em>
      
    </canvas>
<script src="/js/heart_only.js"></script>
    </div>
                    </div>

            </div><!-- #innerContent -->

            </div>     
        </div>
<?php require_once "footer.php"; ?>
