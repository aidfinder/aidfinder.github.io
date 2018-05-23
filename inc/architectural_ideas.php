﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider Theme - Jssor Slider, Carousel, Slideshow with Javascript Source Code</title>
</head>
<body style="font-family:Arial, Verdana;background-color:#fff;">
    <!-- Jssor Slider Begin -->
    <script type="text/javascript" src="./slider-master/js/jssor.slider.min.js"></script>
    <script>

        jssor_slider2_starter = function (containerId) {
            var options = {
                $AutoPlay: 1,                                    //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $Idle: 4000,                                        //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,                          //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0,                                   //[Optional] Space between each slide in pixels, default value is 0
                $Cols: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                },

                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $AutoCenter: 3,                                 //[Optional] Auto center thumbnail items in the thumbnail navigator container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 3
                    $Rows: 1,                                      //[Optional] Specify lanes to arrange thumbnails, default value is 1
                    $SpacingX: 3,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $SpacingY: 3,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                    $Cols: 9,                              //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 260,                          //[Optional] The offset position to park thumbnail
                    $Orientation: 1,                                //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
                    $NoDrag: false                            //[Optional] Disable drag or not, default value is false
                }
            };

            var jssor_slider2 = new $JssorSlider$(containerId, options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var parentWidth = jssor_slider2.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider2.$ScaleWidth(Math.min(parentWidth, 600));
                else
                    $Jssor$.$Delay(ScaleSlider, 30);
            }

            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);

            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>
    <!-- To move inline styles to css file/block, please specify a class name for each element. --> 
    <div id="slider2_container" style="position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;border:1px solid gray; ">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="position: absolute; left: 0px; top: 0px; width: 600px; height: 300px; overflow: hidden;">
            <?php
            $query = $model->all_architecturalDesignIdeas();  //FROM MODEL
            if( $result = $model->fetch($query) ){
                do{
            ?>
            <div>
                <img u="image" src="ARCHITECT ADMIN/design_img/<?php echo $result['design_id']; ?>.jpg" />
                <img u="thumb" src="ARCHITECT ADMIN/design_img/<?php echo $result['design_id']; ?>.jpg"  />
            </div>
            <?php 
                }while($result = $model->fetch($query));
            } ?>
        </div>
        
        <!--#region Arrow Navigator Skin Begin -->
        <!-- Help: http://www.jssor.com/development/slider-with-arrow-navigator-no-jquery.html -->
        <style>
            /* jssor slider arrow navigator skin 02 css */
            /*
            .jssora02l                  (normal)
            .jssora02r                  (normal)
            .jssora02l:hover            (normal mouseover)
            .jssora02r:hover            (normal mouseover)
            .jssora02l.jssora02ldn      (mousedown)
            .jssora02r.jssora02rdn      (mousedown)
            .jssora02l.jssora02lds      (disabled)
            .jssora02r.jssora02rds      (disabled)
            */
            .jssora02l, .jssora02r {
                display: block;
                position: absolute;
                /* size of arrow element */
                width: 55px;
                height: 55px;
                cursor: pointer;
                background: url(../img/a02.png) no-repeat;
                overflow: hidden;
            }
            .jssora02l { background-position: -3px -33px; }
            .jssora02r { background-position: -63px -33px; }
            .jssora02l:hover { background-position: -123px -33px; }
            .jssora02r:hover { background-position: -183px -33px; }
            .jssora02l.jssora02ldn { background-position: -3px -33px; }
            .jssora02r.jssora02rdn { background-position: -63px -33px; }

            .jssora02l.jssora02lds { background-position: -3px -33px; opacity: .3; pointer-events: none; }
            .jssora02r.jssora02rds { background-position: -63px -33px; opacity: .3; pointer-events: none; }
        </style>
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora02l" style="top: 123px; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora02r" style="top: 123px; right: 8px;">
        </span>
        <!--#endregion Arrow Navigator Skin End -->
        <!--#region Thumbnail Navigator Skin Begin -->
        <!-- Help: http://www.jssor.com/development/slider-with-thumbnail-navigator-no-jquery.html -->
        <style>
            /* jssor slider thumbnail navigator skin 03 css */
            /*
            .jssort03 .p            (normal)
            .jssort03 .p:hover      (normal mouseover)
            .jssort03 .pav          (active)
            .jssort03 .pdn          (mousedown)
            */

            .jssort03 {
                position: absolute;
                /* size of thumbnail navigator container */
                width: 600px;
                height: 60px;
            }

                .jssort03 .p {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 62px;
                    height: 32px;
                }

                .jssort03 .t {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    border: none;
                }

                .jssort03 .w, .jssort03 .pav:hover .w {
                    position: absolute;
                    width: 60px;
                    height: 30px;
                    border: white 1px dashed;
                    box-sizing: content-box;
                }

                .jssort03 .pdn .w, .jssort03 .pav .w {
                    border-style: solid;
                }

                .jssort03 .c {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 62px;
                    height: 32px;
                    background-color: #000;
                    filter: alpha(opacity=45);
                    opacity: .45;
                    transition: opacity .6s;
                    -moz-transition: opacity .6s;
                    -webkit-transition: opacity .6s;
                    -o-transition: opacity .6s;
                }

                .jssort03 .p:hover .c, .jssort03 .pav .c {
                    filter: alpha(opacity=0);
                    opacity: 0;
                }

                .jssort03 .p:hover .c {
                    transition: none;
                    -moz-transition: none;
                    -webkit-transition: none;
                    -o-transition: none;
                }

                * html .jssort03 .w {
                    width /**/: 62px;
                    height /**/: 32px;
                }
        </style>

        <!-- thumbnail navigator container -->
        <div u="thumbnavigator" class="jssort03" style="left: 0px; bottom: 0px;">

            <!-- the following background element is optional -->
            <div style=" background-color: #000; filter:alpha(opacity=30); opacity:.3; width: 100%; height:100%;"></div>

            <!-- Thumbnail Item Skin Begin -->
            <div u="slides" style="cursor: default;">
                <div u="prototype" class="p">
                    <div class=w><div u="thumbnailtemplate" class="t"></div></div>
                    <div class=c></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!--#endregion Thumbnail Navigator Skin End -->
        <a style="display: none" href="http://www.jssor.com">jQuery Slider</a>
        <!-- Trigger -->
        <script>
            jssor_slider2_starter('slider2_container');
        </script>
    </div>
    <!-- Jssor Slider End -->
</body>
</html>