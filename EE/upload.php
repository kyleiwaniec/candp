<?php

// upload photo
              $target = "uploads/"; 
              $target = $target . basename( $_FILES['file']['name']); 
              //Writes the photo to the server 
                  if (($_FILES["file"]["type"] == "image/jpeg") && ($_FILES["file"]["size"] < 1000000)) // 1000000bytes =  1mb
                     {
                      if ($_FILES["file"]["error"] > 0)
                        {
                        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
                        }
                          else
                            {
                            if (file_exists("uploads/" . $_FILES["file"]["name"]))
                              {
                              echo $_FILES["file"]["name"] . " already exists.";
                              }
                                else
                                  {
                                    echo "Your file was sucessfully uploaded.<br /><br />";	
                                    echo "File Name: " . $_FILES["file"]["name"] . "<br />";
                                    echo "Type: " . $_FILES["file"]["type"] . "<br />";
                                    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br /><br />";
                                //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

                                    move_uploaded_file($_FILES["file"]["tmp_name"], $target);

                          }
                        }
                      }
                  else
                      {
                      echo "If you tried to upload a NEW image, you're getting this message because the file could not be uploaded because it is either not a jpeg or exceeds 9MB. If you didn't make changes to the image, ignore this message.";
                      }
		
