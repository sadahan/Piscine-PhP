SELECT title, summary FROM film
WHERE LOCATE('42', title) > 0 OR LOCATE('42', summary) > 0
ORDER BY duration ASC;