# SQL

## Toute les sélections de learner avec skills

```sql
SELECT `learner`.`id`, `learner`.`lastname`, `learner`.`firstname`, `learner`.`age`, `learner`.`gender`, 
`prom`.`label`, `skill`.`label` FROM `learner`
JOIN `prom`
ON `prom_id` = `prom`.`id`
JOIN `learner_skill`
ON `learner`.`id` = `learner_id`
JOIN `skill`
ON `learner_skill`.`skill_id` = `skill`.`id`
```

## Toute les sélections de learner avec skills + skill_group

```sql
SELECT `learner`.`id`, `learner`.`lastname`, `learner`.`firstname`, `learner`.`age`, `learner`.`gender`, 
`prom`.`label`, `skill`.`label`,  `skill_group`.`code` FROM `learner`
JOIN `prom`
ON `prom_id` = `prom`.`id`
JOIN `learner_skill`
ON `learner`.`id` = `learner_id`
JOIN `skill`
ON `learner_skill`.`skill_id` = `skill`.`id`
JOIN `skill_group`
ON `skill`.`skill_group_id` = `skill_group`.`id`
```
