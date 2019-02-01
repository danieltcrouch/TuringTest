#***************************************

#Update_Denom_Results_After_Insert
#denom_users
#AFTER
#INSERT

UPDATE denom_results
SET ans1 = (
	SELECT denom_users.ans1
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
	GROUP BY denom_users.ans1
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans2 = (
	SELECT denom_users.ans2
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
	GROUP BY denom_users.ans2
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans3 = (
	SELECT denom_users.ans3
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
	GROUP BY denom_users.ans3
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans4 = (
	SELECT denom_users.ans4
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
	GROUP BY denom_users.ans4
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans5 = (
	SELECT denom_users.ans5
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
	GROUP BY denom_users.ans5
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans6 = (
	SELECT denom_users.ans6
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
	GROUP BY denom_users.ans6
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans7 = (
	SELECT denom_users.ans7
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
	GROUP BY denom_users.ans7
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans8 = (
	SELECT denom_users.ans8
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
	GROUP BY denom_users.ans8
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans9 = (
	SELECT denom_users.ans9
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
	GROUP BY denom_users.ans9
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans10 = (
	SELECT denom_users.ans10
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
	GROUP BY denom_users.ans10
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
userCount = (
	SELECT COUNT(*) 
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
)
WHERE groupId = NEW.groupId

#***************************************

#Update_Denom_Results_After_Update
#denom_users
#AFTER
#UPDATE

BEGIN

UPDATE denom_results
SET ans1 = (
	SELECT denom_users.ans1
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
	GROUP BY denom_users.ans1
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans2 = (
	SELECT denom_users.ans2
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
	GROUP BY denom_users.ans2
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans3 = (
	SELECT denom_users.ans3
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
	GROUP BY denom_users.ans3
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans4 = (
	SELECT denom_users.ans4
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
	GROUP BY denom_users.ans4
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans5 = (
	SELECT denom_users.ans5
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
	GROUP BY denom_users.ans5
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans6 = (
	SELECT denom_users.ans6
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
	GROUP BY denom_users.ans6
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans7 = (
	SELECT denom_users.ans7
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
	GROUP BY denom_users.ans7
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans8 = (
	SELECT denom_users.ans8
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
	GROUP BY denom_users.ans8
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans9 = (
	SELECT denom_users.ans9
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
	GROUP BY denom_users.ans9
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans10 = (
	SELECT denom_users.ans10
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
	GROUP BY denom_users.ans10
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
userCount = (
	SELECT COUNT(*)
	FROM denom_users
	WHERE denom_users.groupId = NEW.groupId
)
WHERE groupId = NEW.groupId;

UPDATE denom_results
SET ans1 = (
	SELECT denom_users.ans1
	FROM denom_users
	WHERE denom_users.groupId = OLD.groupId
	GROUP BY denom_users.ans1
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans2 = (
	SELECT denom_users.ans2
	FROM denom_users
	WHERE denom_users.groupId = OLD.groupId
	GROUP BY denom_users.ans2
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans3 = (
	SELECT denom_users.ans3
	FROM denom_users
	WHERE denom_users.groupId = OLD.groupId
	GROUP BY denom_users.ans3
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans4 = (
	SELECT denom_users.ans4
	FROM denom_users
	WHERE denom_users.groupId = OLD.groupId
	GROUP BY denom_users.ans4
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans5 = (
	SELECT denom_users.ans5
	FROM denom_users
	WHERE denom_users.groupId = OLD.groupId
	GROUP BY denom_users.ans5
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans6 = (
	SELECT denom_users.ans6
	FROM denom_users
	WHERE denom_users.groupId = OLD.groupId
	GROUP BY denom_users.ans6
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans7 = (
	SELECT denom_users.ans7
	FROM denom_users
	WHERE denom_users.groupId = OLD.groupId
	GROUP BY denom_users.ans7
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans8 = (
	SELECT denom_users.ans8
	FROM denom_users
	WHERE denom_users.groupId = OLD.groupId
	GROUP BY denom_users.ans8
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans9 = (
	SELECT denom_users.ans9
	FROM denom_users
	WHERE denom_users.groupId = OLD.groupId
	GROUP BY denom_users.ans9
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans10 = (
	SELECT denom_users.ans10
	FROM denom_users
	WHERE denom_users.groupId = OLD.groupId
	GROUP BY denom_users.ans10
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
userCount = (
	SELECT COUNT(*)
	FROM denom_users
	WHERE denom_users.groupId = OLD.groupId
)
WHERE groupId = OLD.groupId;

END

#***************************************

#Update_Denom_Results_Before_Insert
#denom_users
#BEFORE
#INSERT

INSERT IGNORE INTO denom_results (groupId)
VALUES (NEW.groupId)

#***************************************

#Update_Denom_Results_Before_Update
#denom_users
#BEFORE
#UPDATE

BEGIN

INSERT IGNORE INTO denom_results (groupId)
VALUES (NEW.groupId);

IF ( SELECT count(*) FROM denom_users WHERE denom_users.groupId = OLD.groupId AND userId <> OLD.userId ) = 0 AND NEW.userId <> OLD.userId
THEN
	DELETE FROM denom_results WHERE groupId = OLD.groupId;
END IF;

END

#***************************************

#Update_Denom_Test_Percent_On_Insert
#denom_results
#AFTER
#INSERT

UPDATE denom_tests
SET denom_tests.percentCorrect = (
	SELECT 
		IF( denom_tests.ans1  = denom_results.ans1, 10, 0 ) +
		IF( denom_tests.ans2  = denom_results.ans2, 10, 0 ) +
		IF( denom_tests.ans3  = denom_results.ans3, 10, 0 ) +
		IF( denom_tests.ans4  = denom_results.ans4, 10, 0 ) +
		IF( denom_tests.ans5  = denom_results.ans5, 10, 0 ) +
		IF( denom_tests.ans6  = denom_results.ans6, 10, 0 ) +
		IF( denom_tests.ans7  = denom_results.ans7, 10, 0 ) +
		IF( denom_tests.ans8  = denom_results.ans8, 10, 0 ) +
		IF( denom_tests.ans9  = denom_results.ans9, 10, 0 ) +
		IF( denom_tests.ans10 = denom_results.ans10, 10, 0 )
	FROM denom_results
	WHERE	denom_results.groupId = denom_tests.groupId
)
WHERE denom_tests.groupId = NEW.groupId

#***************************************

#Update_Denom_Test_Percent_On_Update
#denom_results
#AFTER
#UPDATE

UPDATE denom_tests
SET denom_tests.percentCorrect = (
	SELECT
		IF( denom_tests.ans1  = denom_results.ans1, 10, 0 ) +
		IF( denom_tests.ans2  = denom_results.ans2, 10, 0 ) +
		IF( denom_tests.ans3  = denom_results.ans3, 10, 0 ) +
		IF( denom_tests.ans4  = denom_results.ans4, 10, 0 ) +
		IF( denom_tests.ans5  = denom_results.ans5, 10, 0 ) +
		IF( denom_tests.ans6  = denom_results.ans6, 10, 0 ) +
		IF( denom_tests.ans7  = denom_results.ans7, 10, 0 ) +
		IF( denom_tests.ans8  = denom_results.ans8, 10, 0 ) +
		IF( denom_tests.ans9  = denom_results.ans9, 10, 0 ) +
		IF( denom_tests.ans10 = denom_results.ans10, 10, 0 )
	FROM denom_results
	WHERE	denom_results.groupId = denom_tests.groupId
)
WHERE denom_tests.groupId = NEW.groupId

#***************************************