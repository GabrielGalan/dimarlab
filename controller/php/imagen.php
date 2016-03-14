<?php

$org_info = getimagesize("image.jpg");
echo $org_info[3].'<br><br>';
$rsr_org = imagecreatefromjpeg("image.jpg");
$rsr_scl = imagescale($rsr_org, 860, 860, IMG_BICUBIC_FIXED);
imagejpeg($rsr_scl, "imagebfb.jpg");
imagedestroy($rsr_org);
imagedestroy($rsr_scl);

$scl_info = getimagesize("imagebfb.jpg");
echo $scl_info[3];

?>