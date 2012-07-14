<?php
if (!defined('IS_VALID_PHPMYFAQ')) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']));
    exit();
}

$rating = new PMF_Rating();

$all = $rating->getScoreboard();

$table = '<table>';

$table .= '<tr><th colspan="2">Name</th><th>Score</th></tr>'.PHP_EOL;

foreach ($all as $id => $data) {
    $row = sprintf(
        '  <tr>
    <td>%s (%d)</td>
    <td>&nbsp;</td>
    <td>%d</td>
  </tr>'.PHP_EOL,
    $data['name'],
    $id,
    $data['score']
    );

    $table .= $row;
}

$table .= '</table';


$tpl->processTemplate(
    'writeContent',
    array(
        'scoreboard' => $table,
    )
);
$tpl->includeTemplate('writeContent', 'index');
