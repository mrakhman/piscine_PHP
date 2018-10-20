SELECT upper(`last_name`) AS 'NAME', `first_name`, `price`
FROM `member`
INNER JOIN `subscription`
ON `subscription`.`id_sub` = `member`.`id_sub`
INNER JOIN `user_card`
ON `member`.`id_member` = `user_card`.`id_user`
WHERE `subscription`.`price` > 42
ORDER BY `user_card`.`last_name`, `user_card`.`first_name`;
