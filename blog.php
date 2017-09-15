<?php 

include 'head.php'; 

$articlequery=$db->prepare("SELECT * FROM article WHERE article_status=1 order by article_id DESC  limit 25");
$articlequery->execute();
$count=$articlequery->rowCount();


?>


<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="css/blog.css">


</head>

<body>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter45874329 = new Ya.Metrika({
                        id: 45874329,
                        clickmap: true,
                        trackLinks: true,
                        accurateTrackBounce: true,
                        webvisor: true
                    });
                } catch (e) {}
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function() {
                    n.parentNode.insertBefore(s, n);
                };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/45874329" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->



    <div class="container ">
        <div class="row">
            <div class="col l12 m12 s12 blog-head z-depth-5">
                <div class="col l4 m4 s4 blog-head-left"><a href="index.html"><i class="material-icons">home</i></a></div>
                <div class="col l4 l4 m4 s4 blog-head-top center-align">BLOG</div>
                <div class="col l4 l4 m4 s4 blog-head-right right-align"><i class="material-icons">bookmark</i></div>
            </div>
        </div>
        <div class="row">
            <div class="col l12 m12 s12 blog-nav z-depth-5">
                <div class="col l6 m6 s9  blog-nav-title" style="text-align:left">Title</div>
                <div class="col l2 m2 s3  blog-nav-title hide-on-small-only" style="text-align:left">Language</div>
                <div class="col l2 m2 s4  blog-nav-title hide-on-small-only" style="text-align:left">Category</div>
                <div class="col l2 m2 s3  blog-nav-title" style="text-align:left">Date</div>
            </div>
        </div>
        <div class="row">
            <div class="col l12 m12 s12   blog-main z-depth-5">

                <?php
                while($getarticle=$articlequery->fetch(PDO::FETCH_ASSOC))
            {  ?>

                    <div class="col l6 m6 s9  blog-main-item" style="text-align:left">
                        <a href="blog/<?=seo($getarticle["article_title"]).'-'.$getarticle["article_id"];?>">
                            <?php echo $getarticle['article_title']; ?>
                        </a>
                    </div>
                    <div class="col l2 m2 s3  blog-main-item hide-on-small-only" style="text-align:left">
                        <?php echo $getarticle['article_language']; ?>
                    </div>
                    <div class="col l2 m2 s3  blog-main-item hide-on-small-only" style="text-align:left">
                        <?php echo $getarticle['article_category']; ?>
                    </div>
                    <div class="col l2 m2 s3  blog-main-item" style="text-align:left">
                        <?php echo $getarticle['article_date']; ?>
                    </div>

                    <?php } ?>

            </div>
        </div>





        <!-- Scripts -->
        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-85774491-1', 'auto');
            ga('send', 'pageview');
        </script>



</body>

</html>