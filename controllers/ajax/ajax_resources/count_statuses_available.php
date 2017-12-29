<?php
$results = Status::paginate(0, 10, $page_id, $db);
$count = Status::statuses($page_id, $db);

$nbr = Status::count_statuses($page_id, $db);

$group_nbr = Status::group_count_statuses(htmlspecialchars($group['id']), $db);
?>