<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scrolling Logo/Thumbnail Slider Demo - Jssor Slider, Carousel, Slideshow with Javascript Source Code</title>
</head>
<body style="font-family:Arial, Verdana;background-color:#fff;">
    <!-- Jssor Slider Begin -->
    <script type="text/javascript" src="./slider-master/js/jssor.slider.min.js"></script>
    
    <script>
        jssor_slider1_starter = function (containerId) {
            var options = {
                $AutoPlay: 1,                       //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
                $AutoPlaySteps: 1,                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $Idle: 0,                           //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 4,                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   		//[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideEasing: $Jease$.$Linear,      //[Optional] Specifies easing for right to left animation, default value is $Jease$.$OutQuad
                $SlideDuration: 1600,                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,          //[Optional] Minimum drag offset to trigger slide , default value is 20
                $SlideWidth: 140,                   //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 100,                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					//[Optional] Space between each slide in pixels, default value is 0
                $Cols: 7,                           //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1                 //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)
            };

            var jssor_slider1 = new $JssorSlider$(containerId, options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider1.$ScaleWidth(Math.min(parentWidth, 980));
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
    <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 980px; height: 100px; overflow: hidden; ">

      
        <!-- Slides Container -->
        <div u="slides" style="position: absolute; left: 0px; top: 0px; width: 980px; height: 100px; overflow: hidden;">
            <?php
                $query = $model->all_advertisements();  //FROM MODEL
                if( $result = $model->fetch($query) ){
                do{
            ?>
            <div>
                <a href="#" data-toggle="modal" data-target="#myModalAds<?php echo $result['advertisement_id']; ?>"><center><img u="image" src="SUPER ADMIN/advertisement_img/<?php echo $result['advertisement_id']; ?>.jpg" style="width:100%;height:100%;" /></center></a>
            </div>
            <?php 
                }while($result = $model->fetch($query));
                } 
            ?>
        </div>
        <script>
            jssor_slider1_starter('slider1_container');
        </script>

    </div>
    <!-- Jssor Slider End -->
</body>
</html>