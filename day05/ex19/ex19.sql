SELECT DATEDIFF(max(`date_last_film`), min(`date_last_film`)) AS 'uptime'
FROM `member`;
