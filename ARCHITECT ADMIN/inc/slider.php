
    <!-- Jssor Slider Begin -->
    <script type="text/javascript" src="js/jssor.slider.min.js"></script>
    
    <script>
        jssor_slider1_starter = function (containerId) {
            var options = {
                $AutoPlay: 1,                                    //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
                $Idle: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)
                $UISearchMode: 0,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).

                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $Loop: 1,                                       //[Optional] Enable loop(circular) of carousel or not, 0: stop, 1: loop, 2 rewind, default value is 1
                    $SpacingX: 3,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $SpacingY: 3,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                    $Cols: 6,                              //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 253,                          //[Optional] The offset position to park thumbnail,

                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                        $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                        $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                        $Steps: 6                                       //[Optional] Steps to go for each navigation request, default value is 1
                    }
                }
            };

            var jssor_slider1 = new $JssorSlider$(containerId, options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider1.$ScaleWidth(Math.min(parentWidth, 720));
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
    <div id="slider1_container" style="box-shadow: 10px 0px #cc7e7e;position: relative; width: 720px;
        height: 390px; overflow: hidden;">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="position: absolute; left: 50px; top: 0px ;width: 720px; height: 390px;
            overflow: hidden;">
            <?php
                $count=0;
                $query = $model->all_accomplished_project();  //FROM MODEL
                if( $result = $model->fetch($query) ){
                do{
                $count++;
            ?> 
            <div>
                <img u="image" src="accomplished_img/<?php echo $result['accomp_id']; ?>.jpg" />
                <img u="thumb" src="accomplished_img/<?php echo $result['accomp_id']; ?>.jpg" />
            </div>
            <?php }while($result = $model->fetch($query)); } ?>

        </div>

        <!--#region Thumbnail Navigator Skin Begin -->
        <!-- Help: http://www.jssor.com/development/slider-with-thumbnail-navigator-no-jquery.html -->
        <style>
            /* jssor slider thumbnail navigator skin 07 css */
            /*
            .jssort07 .p            (normal)
            .jssort07 .p:hover      (normal mouseover)
            .jssort07 .pav          (active)
            .jssort07 .pav:hover    (active mouseover)
            .jssort07 .pdn          (mousedown)
            */
            .jssort07 {
                position: absolute;
                /* size of thumbnail navigator container */
                width: 800px;
                height: 100px;
            }

                .jssort07 .p {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 99px;
                    height: 66px;
                }

                .jssort07 .i {
                    position: absolute;
                    top: 0px;
                    left: 0px;
                    width: 99px;
                    height: 66px;
                    filter: alpha(opacity=80);
                    opacity: .8;
                }

                .jssort07 .p:hover .i, .jssort07 .pav .i {
                    filter: alpha(opacity=100);
                    opacity: 1;
                }

                .jssort07 .o {
                    position: absolute;
                    top: 0px;
                    left: 0px;
                    width: 97px;
                    height: 64px;
                    border: 1px solid #000;
                    box-sizing: content-box;
                    transition: border-color .6s;
                    -moz-transition: border-color .6s;
                    -webkit-transition: border-color .6s;
                    -o-transition: border-color .6s;
                }

                .jssort07 .pav .o {
                    border-color: #0099ff;
                }

                .jssort07 .p:hover .o {
                    border-color: #fff;
                    transition: none;
                    -moz-transition: none;
                    -webkit-transition: none;
                    -o-transition: none;
                }

                .jssort07 .p.pdn .o {
                    border-color: #0099ff;
                }

                * html .jssort07 .o {
                    /* ie quirks mode adjust */
                    width /**/: 99px;
                    height /**/: 66px;
                }
        </style>
        <!-- thumbnail navigator container -->
        <div u="thumbnavigator" class="jssort07" style="width: 720px; height: 100px; left: 0px; bottom: 0px;">
            <!-- Thumbnail Item Skin Begin -->
            <div u="slides" style="cursor: default;">
                <div u="prototype" class="p">
                    <div u="thumbnailtemplate" class="i"></div>
                    <div class="o"></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
            <!--#region Arrow Navigator Skin Begin -->
            <!-- Help: http://www.jssor.com/development/slider-with-arrow-navigator-no-jquery.html -->
            <style>
                /* jssor slider arrow navigator skin 11 css */
                /*
                .jssora11l                  (normal)
                .jssora11r                  (normal)
                .jssora11l:hover            (normal mouseover)
                .jssora11r:hover            (normal mouseover)
                .jssora11l.jssora11ldn      (mousedown)
                .jssora11r.jssora11rdn      (mousedown)
                .jssora11l.jssora11lds      (disabled)
                .jssora11r.jssora11rds      (disabled)
                */
                .jssora11l, .jssora11r {
                    display: block;
                    position: absolute;
                    /* size of arrow element */
                    width: 37px;
                    height: 37px;
                    cursor: pointer;
                    background: url(../img/a11.png) no-repeat;
                    overflow: hidden;
                }
                .jssora11l { background-position: -11px -41px; }
                .jssora11r { background-position: -71px -41px; }
                .jssora11l:hover { background-position: -131px -41px; }
                .jssora11r:hover { background-position: -191px -41px; }
                .jssora11l.jssora11ldn { background-position: -251px -41px; }
                .jssora11r.jssora11rdn { background-position: -311px -41px; }

                .jssora11l.jssora11lds { background-position: -11px -41px; opacity: .3; pointer-events: none; }
                .jssora11r.jssora11rds { background-position: -71px -41px; opacity: .3; pointer-events: none; }
            </style>
            <!-- Arrow Left -->
            <span u="arrowleft" class="jssora11l" style="top: 123px; left: 8px;">
            </span>
            <!-- Arrow Right -->
            <span u="arrowright" class="jssora11r" style="top: 123px; right: 8px;">
            </span>
            <!--#endregion Arrow Navigator Skin End -->
        </div>
        <!--#endregion Thumbnail Navigator Skin End -->
        <a style="display: none" href="http://www.jssor.com">jQuery Slider</a>
        <!-- Trigger -->
        <script>
            jssor_slider1_starter('slider1_container');
        </script>

    </div>
    <!-- Jssor Slider End -->
