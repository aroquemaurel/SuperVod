-- Retourne toutes les séries avec pour chaque série le nombre de saison
-- et le nombre d'épisodes
select distinct noms, series.image, series.cs, types, max(saison) AS nb_saisons, count(numero) as nb_episodes
from series
left join episodes
on series.cs = episodes.cs
group by types, noms 
