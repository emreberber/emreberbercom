<?php include 'head.php'; ?>
<?php 

$articlequery=$db->prepare("SELECT * FROM article WHERE article_id=:article_id");
$articlequery->execute(array(
	'article_id'=>$_GET['article_id']
));

$getarticle=$articlequery->fetch(PDO::FETCH_ASSOC);

 ?>




    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../css/article.css">

    <link rel="stylesheet"href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
      <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
  <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

  
<link rel="stylesheet" href="ckeditor/plugins/codesnippet/lib/highlight/styles/monokai.css">

<script src="ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js" type="text/javascript"></script>
  <script>hljs.initHighlightingOnLoad();</script>

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


    

    <!-- Top Menu Baslangıc -->
    <div class="row">
        <div class="col l12 m12 s12 top z-depth-1 valign-wrapper">
            <div class="container top-in">
                <div class="col l4 m4 s2 left-align">
                    <a href="blog.php"><i class="material-icons z-depth-5">arrow_back</i></a>
                </div>
                <div class="col l4 m4 s8 center-align top-in-text">EMRE BERBER</div>
                <div class="col l4 m4 s2 right-align">
                    <a href="index.php"><i class="material-icons z-depth-5">home</i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Menu Bitis -->


    <!-- Head - Content - Bottom aynı Container içinde -->


    <div class="container">
        <!-- Head Baslangıc -->
        <div class="row head">
            <div class="col l12 m12 s12 head-title"><?php echo $getarticle['article_title'] ?></div>
            <div class="col l12 m12 s12 head-date">
                <i class=""><?php echo $getarticle['article_date'] ?></i>
                <i class=""><?php echo $getarticle['article_category'] ?></i>
            </div>
        </div>
        <!-- Head Bitis -->


        <!-- Content Baslangıc -->
        <div class="row content">
            <div class="col l12 m12 s12 content-text">
            <?php echo $getarticle['article_content'] ?>
            </div>
        </div>
        <!-- Content Bitis -->


        <!-- Bottom Baslangıc -->
        <div class="row bottom">
            <div class="col l12 m12 s12 bottom-in">
                <a href="#"><i class="bottom-in-twitter">Share on Twitter</i></a>
                <?php 
                
                $keys=explode(',',$getarticle['article_keywords']); 
                
                foreach ($keys as $keysstep) { ?>
                    <i><?php echo $keysstep ?></i>    
                
                <?php }  ?>

            </div>
        </div>
        <!-- Bottom Bitis -->


    </div>


    <!-- Disqus Yorum Baslangıc -->
    <div class="container">
        <div class="col l12 m12 s12 comment-disqus">
            <div id="disqus_thread"></div>
            <script>
                (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document,
                        s = d.createElement('script');
                    s.src = 'https://www-emreberber-com.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        </div>
    </div>
    <!-- Disqus Yorum Bitis -->


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
    <script id="dsq-count-scr" src="//www-emreberber-com.disqus.com/count.js" async></script>

</body>

</html>