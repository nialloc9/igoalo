<?php
session_start();
header('Content-type: image/jpeg');

$text = $_SESSION['secure'];
$font_size = 30;

$image_width = 110;
$image_height= 40;

$image = imagecreate($image_width, $image_height);
imagecolorallocate($image, 255, 255, 255);

$text_color = imagecolorallocate($image, 0, 0, 0);

for($x=1; $x<=30; $x++){
    $x1 = rand(1, 100);
    $y1 = rand(1, 100);
    $x2 = rand(1, 100);
    $y2 = rand(1, 100);

    imageline($image, $x1, $y1, $x2, $y2, $text_color);
}



imagettftext($image, $font_size, 0 , 15, 30, $text_color, 'font.ttf', $text);
imagejpeg($image);

?>



<!-- 
    First we must change the generateCaptchaImage file to an image file using the header() function.
    Then we must tell the browser that the value we will store in the session will be called secure.
    We then must make the image canvass that the captcha image will be on. We do this with imagecreate() 
    function which needs the width and height that the image is going to be. Then we set the image background 
    color. We have set it to white here.
    
    Next we must set the color for the text which we use black. Then we need to use the imagettftext() function
    which creates an image of text. It takes   parameters:
    1. The image used
    2. The font size.
    3. The angle it is at.
    4. How far from the x axis it is.
    5. How far from the y axis it is.
    6. The text color
    7. The font file. For this you must copy over a font file into the same directory as the generate file. Type font into the serch bar to find these on your computer. Remeber to open it and save it as a ttf file.
    8. The text you want to put in.
    
    And last we call the imagejpeg() function which will finalise the imag eand output it to the page. Again the image can be saved 
    by adding a second parameter which is the name you want the file saved as.
    
    Next we need to generate something to mask the number so that bots can't read it but humans still can.
    The functionw we use for this is the imageline() function which takes   parameters:
    1. The image your working with.
    2. The cordinates that are random so that they are splashed across our image in no order.
    3. The color of the lines.
    
    We make the coordinates random by using a for loop that will loop around and create an x1 x2 y1 and y2 30 times.
    We will use the rand() function each time for each coordinate to create random numbers each time between 1 and 100.
    This will create 30 lines to cover the numbers to protect them.
-->