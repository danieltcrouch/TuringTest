#***************************************

#Update_World_Results_After_Insert
#world_users
#AFTER
#INSERT

UPDATE world_results
SET ans1 = (
	SELECT world_users.ans1
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
	GROUP BY world_users.ans1
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans2 = (
	SELECT world_users.ans2
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
	GROUP BY world_users.ans2
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans3 = (
	SELECT world_users.ans3
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
	GROUP BY world_users.ans3
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans4 = (
	SELECT world_users.ans4
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
	GROUP BY world_users.ans4
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans5 = (
	SELECT world_users.ans5
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
	GROUP BY world_users.ans5
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans6 = (
	SELECT world_users.ans6
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
	GROUP BY world_users.ans6
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans7 = (
	SELECT world_users.ans7
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
	GROUP BY world_users.ans7
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans8 = (
	SELECT world_users.ans8
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
	GROUP BY world_users.ans8
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans9 = (
	SELECT world_users.ans9
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
	GROUP BY world_users.ans9
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans10 = (
	SELECT world_users.ans10
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
	GROUP BY world_users.ans10
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
userCount = (
	SELECT COUNT(*) 
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
)
WHERE groupId = NEW.groupId

#***************************************

#Update_World_Results_After_Update
#world_users
#AFTER
#UPDATE

BEGIN

UPDATE world_results
SET ans1 = (
	SELECT world_users.ans1
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
	GROUP BY world_users.ans1
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans2 = (
	SELECT world_users.ans2
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
	GROUP BY world_users.ans2
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans3 = (
	SELECT world_users.ans3
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
	GROUP BY world_users.ans3
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans4 = (
	SELECT world_users.ans4
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
	GROUP BY world_users.ans4
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans5 = (
	SELECT world_users.ans5
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
	GROUP BY world_users.ans5
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans6 = (
	SELECT world_users.ans6
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
	GROUP BY world_users.ans6
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans7 = (
	SELECT world_users.ans7
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
	GROUP BY world_users.ans7
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans8 = (
	SELECT world_users.ans8
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
	GROUP BY world_users.ans8
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans9 = (
	SELECT world_users.ans9
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
	GROUP BY world_users.ans9
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans10 = (
	SELECT world_users.ans10
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
	GROUP BY world_users.ans10
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
userCount = (
	SELECT COUNT(*)
	FROM world_users
	WHERE world_users.groupId = NEW.groupId
)
WHERE groupId = NEW.groupId;

UPDATE world_results
SET ans1 = (
	SELECT world_users.ans1
	FROM world_users
	WHERE world_users.groupId = OLD.groupId
	GROUP BY world_users.ans1
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans2 = (
	SELECT world_users.ans2
	FROM world_users
	WHERE world_users.groupId = OLD.groupId
	GROUP BY world_users.ans2
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans3 = (
	SELECT world_users.ans3
	FROM world_users
	WHERE world_users.groupId = OLD.groupId
	GROUP BY world_users.ans3
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans4 = (
	SELECT world_users.ans4
	FROM world_users
	WHERE world_users.groupId = OLD.groupId
	GROUP BY world_users.ans4
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans5 = (
	SELECT world_users.ans5
	FROM world_users
	WHERE world_users.groupId = OLD.groupId
	GROUP BY world_users.ans5
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans6 = (
	SELECT world_users.ans6
	FROM world_users
	WHERE world_users.groupId = OLD.groupId
	GROUP BY world_users.ans6
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans7 = (
	SELECT world_users.ans7
	FROM world_users
	WHERE world_users.groupId = OLD.groupId
	GROUP BY world_users.ans7
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans8 = (
	SELECT world_users.ans8
	FROM world_users
	WHERE world_users.groupId = OLD.groupId
	GROUP BY world_users.ans8
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans9 = (
	SELECT world_users.ans9
	FROM world_users
	WHERE world_users.groupId = OLD.groupId
	GROUP BY world_users.ans9
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans10 = (
	SELECT world_users.ans10
	FROM world_users
	WHERE world_users.groupId = OLD.groupId
	GROUP BY world_users.ans10
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
userCount = (
	SELECT COUNT(*)
	FROM world_users
	WHERE world_users.groupId = OLD.groupId
)
WHERE groupId = OLD.groupId;

END

#***************************************

#Update_World_Results_Before_Insert
#world_users
#BEFORE
#INSERT

INSERT IGNORE INTO world_results (groupId)
VALUES (NEW.groupId)

#***************************************

#Update_World_Results_Before_Update
#world_users
#BEFORE
#UPDATE

BEGIN

INSERT IGNORE INTO world_results (groupId)
VALUES (NEW.groupId);

IF ( SELECT count(*) FROM world_users WHERE world_users.groupId = OLD.groupId AND userId <> OLD.userId ) = 0 AND NEW.userId <> OLD.userId
THEN
	DELETE FROM world_results WHERE groupId = OLD.groupId;
END IF;

END

#***************************************

#Update_World_Test_Percent_On_Insert
#world_results
#AFTER
#INSERT

UPDATE world_tests
SET world_tests.percentCorrect = (
	SELECT 
		IF( world_tests.ans1  = world_results.ans1, 10, 0 ) +
		IF( world_tests.ans2  = world_results.ans2, 10, 0 ) +
		IF( world_tests.ans3  = world_results.ans3, 10, 0 ) +
		IF( world_tests.ans4  = world_results.ans4, 10, 0 ) +
		IF( world_tests.ans5  = world_results.ans5, 10, 0 ) +
		IF( world_tests.ans6  = world_results.ans6, 10, 0 ) +
		IF( world_tests.ans7  = world_results.ans7, 10, 0 ) +
		IF( world_tests.ans8  = world_results.ans8, 10, 0 ) +
		IF( world_tests.ans9  = world_results.ans9, 10, 0 ) +
		IF( world_tests.ans10 = world_results.ans10, 10, 0 )
	FROM world_results
	WHERE	world_results.groupId = world_tests.groupId
)
WHERE world_tests.groupId = NEW.groupId

#***************************************

#Update_World_Test_Percent_On_Update
#world_results
#AFTER
#UPDATE

UPDATE world_tests
SET world_tests.percentCorrect = (
	SELECT
		IF( world_tests.ans1  = world_results.ans1, 10, 0 ) +
		IF( world_tests.ans2  = world_results.ans2, 10, 0 ) +
		IF( world_tests.ans3  = world_results.ans3, 10, 0 ) +
		IF( world_tests.ans4  = world_results.ans4, 10, 0 ) +
		IF( world_tests.ans5  = world_results.ans5, 10, 0 ) +
		IF( world_tests.ans6  = world_results.ans6, 10, 0 ) +
		IF( world_tests.ans7  = world_results.ans7, 10, 0 ) +
		IF( world_tests.ans8  = world_results.ans8, 10, 0 ) +
		IF( world_tests.ans9  = world_results.ans9, 10, 0 ) +
		IF( world_tests.ans10 = world_results.ans10, 10, 0 )
	FROM world_results
	WHERE	world_results.groupId = world_tests.groupId
)
WHERE world_tests.groupId = NEW.groupId

#***************************************

