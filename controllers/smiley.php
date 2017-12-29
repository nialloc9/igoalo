<?php
function smilify($subject)
{
    $smilies = array(
        ':|'  => 'mellow',
        ':-|' => 'mellow',
        ':-o' => 'ohmy',
        ':-O' => 'ohmy',
        ':o'  => 'ohmy',
        ':O'  => 'ohmy',
        ';)'  => 'wink',
        ';-)' => 'wink',
        ':p'  => 'tongue',
        ':-p' => 'tongue',
        ':P'  => 'tongue',
        ':-P' => 'tongue',
        ':D'  => 'biggrin',
        ':-D' => 'biggrin',
        '8)'  => 'cool',
        '8-)' => 'cool',
        '^_^' => 'smile',
        ':)'  => 'smile',
        ':-)' => 'smile',
        ':('  => 'sad',
        ':-(' => 'sad',
        '8ol' => 'angry',
        '(l)' => 'love',
        '(L)' => 'love',
    );

    $sizes = array(
        'biggrin' => 18,
        'cool' => 20,
        'haha' => 20,
        'mellow' => 20,
        'ohmy' => 20,
        'sad' => 20,
        'smile' => 18,
        'tongue' => 20,
        'wink' => 20,
        'love' => 20,
        'angry' => 20,
    );

    $replace = array();
    foreach ($smilies as $smiley => $imgName)
    {
        $size = $sizes[$imgName];
        array_push($replace, '<img src="images/smiley/'.$imgName.'.ico" alt="'.$smiley.'" width="'.$size.'" height="'.$size.'" />');
    }
    $subject = str_replace(array_keys($smilies), $replace, $subject);
}
?>