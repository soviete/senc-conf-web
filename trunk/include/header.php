<?php $currentPage=currentPage();
print "
<div id='lang'>
   <ul>
        <li><a href='$currentPage?lang=ca'>CAT</a></li>
        <li><a href='$currentPage?lang=es'>ESP</a></li>
        <li><a href='$currentPage?lang=en'>ENG</a></li>
    </ul>
</div>"
?>
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

