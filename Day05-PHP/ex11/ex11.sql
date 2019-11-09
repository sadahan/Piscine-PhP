SELECT UPPER(last_name) AS NAME, first_name, price
FROM member
         INNER JOIN subscription ON member.id_sub = subscription.id_sub
         INNER JOIN user_card ON user_card.id_user = member.id_user_card
WHERE price > 42
ORDER by last_name ASC, first_name ASC;