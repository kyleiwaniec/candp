<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
$("#sitedivs div:eq("+k+")").animate({ 
                                      "left": $("#sitedivs div:eq("+k+")").position().left+$(window).width()+"px"
                                      }, {
                                            duration: 1500, 
                                            specialEasing: {
                                                left: "easeInOutExpo"
                                                }
                                            }, 
                                            complete: function() {
                                                $("#sitedivs div:eq("+i+")").css("left", i*$(window).width()+"px" );
                                            }
                                        });

                                        
                                        
                      $("#sitedivs div:eq("+k+")").animate({ 
                                      "left": $("#sitedivs div:eq("+k+")").position().left+$(window).width()+"px"
                                       }, 1500, "easeInOutExpo", function() {
                                                $("#sitedivs div:eq("+i+")").css("left", i*$(window).width()+"px" );
                                            }
                                        });
