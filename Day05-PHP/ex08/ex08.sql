SELECT last_name, first_name, DATE(birthdate) AS birthdate FROM user_card
WHERE birthdate >= '1989-01-01' AND birthdate < '1990-01-01'
ORDER BY last_name ASC;