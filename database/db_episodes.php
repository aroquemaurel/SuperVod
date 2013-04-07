<?php
require_once('database/connect.php');
require_once('util.php');

function getEpisodes($piIdSerie) {
    return fetch_all_objects(mysql_query("select * from episodes where episodes.cs = ".$piIdSerie."
                                        order by saison, numero"));
}
