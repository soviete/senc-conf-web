<?php $currentPage=currentPage();
print "
<div id='lang'>
<a href='$currentPage?lang=ca'>CAT</a></li>
<a href='$currentPage?lang=es'>ESP</a></li>
<a href='$currentPage?lang=en'>ENG</a></li>
</div>"
?>
<div id="contact">
        <p id="legal"><?php echo $langVoc['contact1'];?>
            <a href="mailto:bioinfodesigning@gmail.com?subject=Feedback" >bioinfodesigning@gmail.com</a></p>
</div>
<div id="header">
    <div id="logo">
        <h1><a href="index.php"><?php echo $langVoc['conferenceReg'];?></a></h1>
        <h2><a href="index.php">"El Cervell Envaeix la Ciutat"</a></h2>
    </div>
    <div id="menu">
        <ul>
            <li><a href="index.php"><?php echo $langVoc['registration']; ?></a></li>
            <li><a href="gestio.php">Admin</a></li>
        </ul>
    </div>
</div>
<link rel="shortcut icon" href="images/favicon.ico">


            <!--[if IE]>
                <style type="text/css">
                    #header {
            clear: both;
            width: 710px;
            height: 90px;
            margin: 0 auto;
            background: url(images/img05A.gif) no-repeat left bottom;
            }
                </style>
            <![endif]-->

