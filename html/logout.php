<?php
session_start(); // १. सेसन सुरु गर्ने (कुन युजर हो चिन्नको लागि)
session_unset(); // २. सेसनभित्र भएका सबै विवरण (id, name) खाली गर्ने
session_destroy(); // ३. सेसनलाई पूर्ण रूपमा नष्ट गर्ने

// ४. लगआउट भएपछि सिधै होमपेज वा लगइन पेजमा फिर्ता पठाइदिने
header("Location: online-consult-page.php"); 
exit();
?>