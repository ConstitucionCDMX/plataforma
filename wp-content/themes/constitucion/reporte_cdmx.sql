SELECT reference_code, GROUP_CONCAT( answer separator '|' ) 
FROM cc_sondeo_cdmx_user_answers
WHERE question_id IN ( 1, 2, 3, 7, 8, 25, 26, 28, 29, 32 )
AND reference_code IN ( 
	SELECT reference_code from cc_sondeo_cdmx_user_answers
	WHERE question_id = 1
	AND answer = 'CDMX'
)
GROUP BY reference_code
ORDER BY reference_code

GROUP_CONCAT( reference_code separator ',' )

SELECT reference_code, question_id, answer  FROM `cc_sondeo_cdmx_user_answers` 
WHERE question_id =1
AND answer = 'CDMX'
AND reference_code IN (SELECT reference_code FROM `cc_sondeo_cdmx_user_answers` where question_id = 4 AND answer <> '-' )
ORDER BY reference_code, question_id

SELECT reference_code, count(reference_code) FROM cc_sondeo_cdmx_user_answers
WHERE revisada = 1
group by reference_code
having count(reference_code) > 43

SELECT * FROM cc_sondeo_cdmx_user_answers
WHERE reference_code = 'CM596XMM6X'
AND answer <> '-'
order by id, question_id