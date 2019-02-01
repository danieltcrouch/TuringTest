#***************************************

#Update_Idea_Results_After_Insert
#idea_users
#AFTER
#INSERT

UPDATE idea_results
SET ans1 = (
	SELECT idea_users.ans1
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
	GROUP BY idea_users.ans1
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans2 = (
	SELECT idea_users.ans2
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
	GROUP BY idea_users.ans2
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans3 = (
	SELECT idea_users.ans3
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
	GROUP BY idea_users.ans3
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans4 = (
	SELECT idea_users.ans4
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
	GROUP BY idea_users.ans4
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans5 = (
	SELECT idea_users.ans5
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
	GROUP BY idea_users.ans5
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans6 = (
	SELECT idea_users.ans6
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
	GROUP BY idea_users.ans6
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans7 = (
	SELECT idea_users.ans7
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
	GROUP BY idea_users.ans7
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans8 = (
	SELECT idea_users.ans8
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
	GROUP BY idea_users.ans8
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans9 = (
	SELECT idea_users.ans9
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
	GROUP BY idea_users.ans9
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans10 = (
	SELECT idea_users.ans10
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
	GROUP BY idea_users.ans10
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
userCount = (
	SELECT COUNT(*)
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
)
WHERE groupId = NEW.groupId

#***************************************

#Update_Idea_Results_After_Update
#idea_users
#AFTER
#UPDATE

BEGIN

UPDATE idea_results
SET ans1 = (
	SELECT idea_users.ans1
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
	GROUP BY idea_users.ans1
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans2 = (
	SELECT idea_users.ans2
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
	GROUP BY idea_users.ans2
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans3 = (
	SELECT idea_users.ans3
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
	GROUP BY idea_users.ans3
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans4 = (
	SELECT idea_users.ans4
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
	GROUP BY idea_users.ans4
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans5 = (
	SELECT idea_users.ans5
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
	GROUP BY idea_users.ans5
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans6 = (
	SELECT idea_users.ans6
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
	GROUP BY idea_users.ans6
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans7 = (
	SELECT idea_users.ans7
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
	GROUP BY idea_users.ans7
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans8 = (
	SELECT idea_users.ans8
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
	GROUP BY idea_users.ans8
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans9 = (
	SELECT idea_users.ans9
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
	GROUP BY idea_users.ans9
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans10 = (
	SELECT idea_users.ans10
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
	GROUP BY idea_users.ans10
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
userCount = (
	SELECT COUNT(*)
	FROM idea_users
	WHERE idea_users.groupId = NEW.groupId
)
WHERE groupId = NEW.groupId;

UPDATE idea_results
SET ans1 = (
	SELECT idea_users.ans1
	FROM idea_users
	WHERE idea_users.groupId = OLD.groupId
	GROUP BY idea_users.ans1
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans2 = (
	SELECT idea_users.ans2
	FROM idea_users
	WHERE idea_users.groupId = OLD.groupId
	GROUP BY idea_users.ans2
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans3 = (
	SELECT idea_users.ans3
	FROM idea_users
	WHERE idea_users.groupId = OLD.groupId
	GROUP BY idea_users.ans3
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans4 = (
	SELECT idea_users.ans4
	FROM idea_users
	WHERE idea_users.groupId = OLD.groupId
	GROUP BY idea_users.ans4
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans5 = (
	SELECT idea_users.ans5
	FROM idea_users
	WHERE idea_users.groupId = OLD.groupId
	GROUP BY idea_users.ans5
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans6 = (
	SELECT idea_users.ans6
	FROM idea_users
	WHERE idea_users.groupId = OLD.groupId
	GROUP BY idea_users.ans6
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans7 = (
	SELECT idea_users.ans7
	FROM idea_users
	WHERE idea_users.groupId = OLD.groupId
	GROUP BY idea_users.ans7
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans8 = (
	SELECT idea_users.ans8
	FROM idea_users
	WHERE idea_users.groupId = OLD.groupId
	GROUP BY idea_users.ans8
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans9 = (
	SELECT idea_users.ans9
	FROM idea_users
	WHERE idea_users.groupId = OLD.groupId
	GROUP BY idea_users.ans9
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans10 = (
	SELECT idea_users.ans10
	FROM idea_users
	WHERE idea_users.groupId = OLD.groupId
	GROUP BY idea_users.ans10
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
userCount = (
	SELECT COUNT(*)
	FROM idea_users
	WHERE idea_users.groupId = OLD.groupId
)
WHERE groupId = OLD.groupId;

END

#***************************************

#Update_Idea_Results_Before_Insert
#idea_users
#BEFORE
#INSERT

INSERT IGNORE INTO idea_results (groupId)
VALUES (NEW.groupId)

#***************************************

#Update_Idea_Results_Before_Update
#idea_users
#BEFORE
#UPDATE

BEGIN

INSERT IGNORE INTO idea_results (groupId)
VALUES (NEW.groupId);

IF ( SELECT count(*) FROM idea_users WHERE idea_users.groupId = OLD.groupId AND userId <> OLD.userId ) = 0 AND NEW.userId <> OLD.userId
THEN
	DELETE FROM idea_results WHERE groupId = OLD.groupId;
END IF;

END

#***************************************

#Update_Idea_Test_Percent_On_Insert
#idea_results
#AFTER
#INSERT

UPDATE idea_tests
SET idea_tests.percentCorrect = (
	SELECT 
		IF( idea_tests.ans1  = idea_results.ans1, 10, 0 ) +
		IF( idea_tests.ans2  = idea_results.ans2, 10, 0 ) +
		IF( idea_tests.ans3  = idea_results.ans3, 10, 0 ) +
		IF( idea_tests.ans4  = idea_results.ans4, 10, 0 ) +
		IF( idea_tests.ans5  = idea_results.ans5, 10, 0 ) +
		IF( idea_tests.ans6  = idea_results.ans6, 10, 0 ) +
		IF( idea_tests.ans7  = idea_results.ans7, 10, 0 ) +
		IF( idea_tests.ans8  = idea_results.ans8, 10, 0 ) +
		IF( idea_tests.ans9  = idea_results.ans9, 10, 0 ) +
		IF( idea_tests.ans10 = idea_results.ans10, 10, 0 )
	FROM idea_results
	WHERE	idea_results.groupId = idea_tests.groupId
)
WHERE idea_tests.groupId = NEW.groupId

#***************************************

#Update_Idea_Test_Percent_On_Update
#idea_results
#AFTER
#UPDATE

UPDATE idea_tests
SET idea_tests.percentCorrect = (
	SELECT
		IF( idea_tests.ans1  = idea_results.ans1, 10, 0 ) +
		IF( idea_tests.ans2  = idea_results.ans2, 10, 0 ) +
		IF( idea_tests.ans3  = idea_results.ans3, 10, 0 ) +
		IF( idea_tests.ans4  = idea_results.ans4, 10, 0 ) +
		IF( idea_tests.ans5  = idea_results.ans5, 10, 0 ) +
		IF( idea_tests.ans6  = idea_results.ans6, 10, 0 ) +
		IF( idea_tests.ans7  = idea_results.ans7, 10, 0 ) +
		IF( idea_tests.ans8  = idea_results.ans8, 10, 0 ) +
		IF( idea_tests.ans9  = idea_results.ans9, 10, 0 ) +
		IF( idea_tests.ans10 = idea_results.ans10, 10, 0 )
	FROM idea_results
	WHERE	idea_results.groupId = idea_tests.groupId
)
WHERE idea_tests.groupId = NEW.groupId

#***************************************