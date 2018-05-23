<?php if(isset($_SESSION['userlogged'])){?>
											<?php include('rating_plugin_css.php');?>	
						                    <script>
						                        $(document).ready(function () {
						                            $("#demo1 .stars").click(function () {
						                                $.post('rating_plugin/rating.php',{rate:$(this).val(),sid:$('#sID').val(),tid:$('#tID').val()},function(d){
						                                    if(d>0)
						                                    {
						                                        alert('You already rated');
						                                    }else{
						                                        alert('Thanks For Rating');
						                                    }
						                                });
						                                $(this).attr("checked");
						                            });
						                        });
						                    </script>
						                    <fieldset id='demo1' class="rating">
						                        <input type="hidden" id="tID" value="<?php echo $_SESSION['userlogged']['user_id']; ?>" >
						                        <input type="hidden" id="sID" value="<?php echo $_GET['id']; ?>" >
						                        <input class="stars" type="radio" id="star5" name="rating" value="5" />
						                        <label class = "full" for="star5" title="Awesome"></label>
						                        <input class="stars" type="radio" id="star4" name="rating" value="4" />
						                        <label class = "full" for="star4" title="Pretty good"></label>
						                        <input class="stars" type="radio" id="star3" name="rating" value="3" />
						                        <label class = "full" for="star3" title="Good"></label>
						                        <input class="stars" type="radio" id="star2" name="rating" value="2" />
						                        <label class = "full" for="star2" title="Kinda Bad"></label>
						                        <input class="stars" type="radio" id="star1" name="rating" value="1" />
						                        <label class = "full" for="star1" title="Needs Improvement"></label>
						                    </fieldset>
						                    <script>
						                        (function (i, s, o, g, r, a, m) {
						                            i['GoogleAnalyticsObject'] = r;
						                            i[r] = i[r] || function () {
						                                (i[r].q = i[r].q || []).push(arguments)
						                            }, i[r].l = 1 * new Date();
						                            a = s.createElement(o),
						                                    m = s.getElementsByTagName(o)[0];
						                            a.async = 1;
						                            a.src = g;
						                            m.parentNode.insertBefore(a, m)
						                        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

						                        ga('create', 'UA-43091346-1', 'devzone.co.in');
						                        ga('send', 'pageview');

						                    </script>
						                <?php }else{ ?>
						                	<h4>Sign In to rate this architect</h4>
						                <?php } ?>