<?php  

function time_elapsed_string($datetime, $full = false) {
    $now = new \DateTime;
    $ago = new \DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'ႏွစ္',
        'm' => 'လ',
        'w' => 'ပါတ္',
        'd' => 'ရက္',
        'h' => 'နာရီ ',
        'i' => 'မီနစ္ ',
        's' => 'စကၠန္႕',
    );

    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? ' လြန္ခဲ႔ေသာ '.implode(', ', $string) : 'ယခုတင္သည္';
}

function showTime($datetime)
{
	$time = date('F d, Y h:m A',strtotime($datetime));

	$post = date('Y-m-d h:m:s A',strtotime($datetime));

    $ago = time_elapsed_string($post);

    $time = $time.'( '.$ago.' )';

	return $time;
}

?>