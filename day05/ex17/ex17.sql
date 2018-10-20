SELECT count(*) AS 'nb_susc', FLOOR(avg(`price`)) AS 'av_susc', MOD(sum(`duration_sub`), 42) AS 'ft'
FROM `subscription`;
