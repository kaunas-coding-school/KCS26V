# 1] Uzduotis
SELECT count(u.id) AS kiekis FROM users as u
        LEFT JOIN states as s
        ON s.id = u.state
where s.title = 'Suspended';

# 2] Kiek yra aktyviu grupiu
SELECT count(g.id) AS kiekis
FROM states as s
        RIGHT JOIN gruops as g
        ON g.state = s.id
where s.title = 'Active';

# 3] Personu vardai pavardes ir kuriuose miestuose ar sal;yse jie gyvena
SELECT p.first_name, p.last_name, a.city, c.title
FROM persons as p
         LEFT JOIN address as a on a.id = p.address_id
         LEFT JOIN countries as c on c.iso = a.country_iso;

# 4] uzduotis
SELECT g.code, COUNT(p.id) AS kiekis
FROM gruops as g
         LEFT JOIN states AS s ON g.state = s.id
         LEFT JOIN person2gruop AS p2g ON p2g.gruop_id = g.id
         LEFT JOIN persons AS p ON p.id = p2g.person_id
WHERE s.title = 'Active'
GROUP BY g.`code`;

# 5a] uzduotis
SELECT p.*, g.code
FROM gruops as g
         LEFT JOIN person2gruop AS p2g ON p2g.gruop_id = g.id
         LEFT JOIN persons AS p ON p.id = p2g.person_id
WHERE g.code LIKE '%D';

# 5b] uzduotis
SELECT COUNT(p.id) as kiekis
FROM gruops as g
         LEFT JOIN person2gruop AS p2g ON p2g.gruop_id = g.id
         LEFT JOIN persons AS p ON p.id = p2g.person_id
WHERE g.code LIKE '%D';

# 6a] uzduotis
SELECT COUNT(p.id) as kiekis,
       CASE
           WHEN g.code LIKE '%D' THEN 'Vakariniai'
           WHEN g.code LIKE '%V' THEN 'Dieniniai'
           END AS tipas
FROM gruops as g
         LEFT JOIN person2gruop AS p2g ON p2g.gruop_id = g.id
         LEFT JOIN persons AS p ON p.id = p2g.person_id
GROUP BY tipas;

# 6b] uzduotis
SELECT COUNT(p.id) as kiekis,
       CASE
           WHEN g.code LIKE '%D' THEN 'Vakariniai'
           WHEN g.code LIKE '%V' THEN 'Dieniniai'
           END AS tipas
FROM gruops as g
         LEFT JOIN states AS s ON g.state = s.id
         LEFT JOIN person2gruop AS p2g ON p2g.gruop_id = g.id
         LEFT JOIN persons AS p ON p.id = p2g.person_id
WHERE s.title = 'Active'
GROUP BY tipas;

# 7] uzduotis
select count(a.kiek) Studentu_kiekis
FROM (select count(id) as kiek from person2gruop
      group by person_id
      Having count(person_id) > 1) as a