<?php $hash = time(); ?>
<?php 
$fh = file_get_contents("cv_content.json"); 
$json = json_decode($fh, true);
?>
<!doctype html>
<html class="no-js" lang="nl-NL">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Heidi Ulrich - Curriculum Vitae</title>
        <meta name="description" content="Curriculum vitae van Heidi Ulrich">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/main.css?<?php echo $hash ?>">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <strong>Curriculum vitae</strong>
                </div>
            </div>
            <div class="card-section double">
                <div>
                    Naam
                </div>
                <div>
                    En adresgegevens
                </div>
            </div>
            <?php foreach($json as $section => $items) 
            { 
                print '<div class="card-section one-two" id="'.$section.'">'."\r\n";
                    print '<div><h2>'.$section.'</h2></div>'."\r\n";
                    print '<div>'."\r\n";
                    foreach ($items as $item)
                    {
                        print '<div class="row mb-3">'."\r\n";
                        print '<div class="col-6"><strong>'.$item['role'].$item['level'].' '.$item['study'].'</strong><br>'.$item['company'].$item['institution'].', '.$item['city'].'</div>'."\r\n";
                        print '<div class="col-6">'.$item['from'].' - '.$item['to']."\r\n";
                        if ($item['honours'] == true) { $honours = 'met lof ';} else { $honours = null; }
                        if ($item['certification'] == true) { print '<br>Diploma '.$honours.'behaald in '.$item['to']; }
                        print '</div>'."\r\n";
                        print '</div>'."\r\n";
                    }
                    print '</div>'."\r\n";
                print '</div>'."\r\n";
            } 
            ?>                
        </div>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113792138-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-113792138-1');
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    </body>
</html>