#***************************************

#Update_Idea_Actuals_After_Update
#tt_idea_users
#AFTER
#UPDATE

BEGIN

UPDATE tt_idea_actuals
SET ans1 = (
	SELECT tt_idea_users.ans1
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
	GROUP BY tt_idea_users.ans1
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans2 = (
	SELECT tt_idea_users.ans2
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
	GROUP BY tt_idea_users.ans2
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans3 = (
	SELECT tt_idea_users.ans3
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
	GROUP BY tt_idea_users.ans3
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans4 = (
	SELECT tt_idea_users.ans4
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
	GROUP BY tt_idea_users.ans4
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans5 = (
	SELECT tt_idea_users.ans5
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
	GROUP BY tt_idea_users.ans5
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans6 = (
	SELECT tt_idea_users.ans6
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
	GROUP BY tt_idea_users.ans6
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans7 = (
	SELECT tt_idea_users.ans7
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
	GROUP BY tt_idea_users.ans7
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans8 = (
	SELECT tt_idea_users.ans8
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
	GROUP BY tt_idea_users.ans8
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans9 = (
	SELECT tt_idea_users.ans9
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
	GROUP BY tt_idea_users.ans9
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans10 = (
	SELECT tt_idea_users.ans10
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
	GROUP BY tt_idea_users.ans10
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
userCount = (
	SELECT COUNT(*) 
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
)
WHERE groupId = NEW.groupId;

UPDATE tt_idea_actuals
SET ans1 = (
	SELECT tt_idea_users.ans1
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = OLD.groupId
	GROUP BY tt_idea_users.ans1
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans2 = (
	SELECT tt_idea_users.ans2
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = OLD.groupId
	GROUP BY tt_idea_users.ans2
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans3 = (
	SELECT tt_idea_users.ans3
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = OLD.groupId
	GROUP BY tt_idea_users.ans3
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans4 = (
	SELECT tt_idea_users.ans4
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = OLD.groupId
	GROUP BY tt_idea_users.ans4
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans5 = (
	SELECT tt_idea_users.ans5
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = OLD.groupId
	GROUP BY tt_idea_users.ans5
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans6 = (
	SELECT tt_idea_users.ans6
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = OLD.groupId
	GROUP BY tt_idea_users.ans6
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans7 = (
	SELECT tt_idea_users.ans7
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = OLD.groupId
	GROUP BY tt_idea_users.ans7
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans8 = (
	SELECT tt_idea_users.ans8
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = OLD.groupId
	GROUP BY tt_idea_users.ans8
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans9 = (
	SELECT tt_idea_users.ans9
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = OLD.groupId
	GROUP BY tt_idea_users.ans9
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans10 = (
	SELECT tt_idea_users.ans10
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = OLD.groupId
	GROUP BY tt_idea_users.ans10
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
userCount = (
	SELECT COUNT(*) 
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = OLD.groupId
)
WHERE groupId = OLD.groupId;

END

#***************************************

#Update_Idea_Actuals_After_Insert
#tt_idea_users
#AFTER
#INSERT

UPDATE tt_idea_actuals
SET ans1 = (
	SELECT tt_idea_users.ans1
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
	GROUP BY tt_idea_users.ans1
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans2 = (
	SELECT tt_idea_users.ans2
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
	GROUP BY tt_idea_users.ans2
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans3 = (
	SELECT tt_idea_users.ans3
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
	GROUP BY tt_idea_users.ans3
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans4 = (
	SELECT tt_idea_users.ans4
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
	GROUP BY tt_idea_users.ans4
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans5 = (
	SELECT tt_idea_users.ans5
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
	GROUP BY tt_idea_users.ans5
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans6 = (
	SELECT tt_idea_users.ans6
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
	GROUP BY tt_idea_users.ans6
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans7 = (
	SELECT tt_idea_users.ans7
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
	GROUP BY tt_idea_users.ans7
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans8 = (
	SELECT tt_idea_users.ans8
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
	GROUP BY tt_idea_users.ans8
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans9 = (
	SELECT tt_idea_users.ans9
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
	GROUP BY tt_idea_users.ans9
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
ans10 = (
	SELECT tt_idea_users.ans10
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
	GROUP BY tt_idea_users.ans10
	ORDER BY COUNT(*) DESC
	LIMIT 1
),
userCount = (
	SELECT COUNT(*) 
	FROM tt_idea_users
	WHERE tt_idea_users.groupId = NEW.groupId
)
WHERE groupId = NEW.groupId;

#***************************************

#Update_Idea_Actuals_Before_Insert
#tt_idea_users
#BEFORE
#INSERT

INSERT IGNORE INTO tt_idea_actuals (groupId)
VALUES (NEW.groupId)

#***************************************

#Update_Idea_Actuals_Before_Update
#tt_idea_users
#BEFORE
#UPDATE

BEGIN

INSERT IGNORE INTO tt_idea_actuals (groupId)
VALUES (NEW.groupId);

IF ( SELECT count(*) FROM tt_idea_users WHERE tt_idea_users.groupId = OLD.groupId AND userId <> OLD.userId ) = 0 AND NEW.userId <> OLD.userId
THEN
	DELETE FROM tt_idea_actuals WHERE groupId = OLD.groupId;
END IF;

END

#***************************************

#Update_Idea_Test_Percent_On_Insert
#tt_idea_actuals
#AFTER
#INSERT

UPDATE tt_idea_tests
SET tt_idea_tests.percentCorrect = (
	SELECT 
		IF( tt_idea_tests.ans1  = tt_idea_actuals.ans1, 10, 0 ) +
		IF( tt_idea_tests.ans2  = tt_idea_actuals.ans2, 10, 0 ) +
		IF( tt_idea_tests.ans3  = tt_idea_actuals.ans3, 10, 0 ) +
		IF( tt_idea_tests.ans4  = tt_idea_actuals.ans4, 10, 0 ) +
		IF( tt_idea_tests.ans5  = tt_idea_actuals.ans5, 10, 0 ) +
		IF( tt_idea_tests.ans6  = tt_idea_actuals.ans6, 10, 0 ) +
		IF( tt_idea_tests.ans7  = tt_idea_actuals.ans7, 10, 0 ) +
		IF( tt_idea_tests.ans8  = tt_idea_actuals.ans8, 10, 0 ) +
		IF( tt_idea_tests.ans9  = tt_idea_actuals.ans9, 10, 0 ) +
		IF( tt_idea_tests.ans10 = tt_idea_actuals.ans10, 10, 0 )
	FROM tt_idea_actuals
	WHERE	tt_idea_actuals.groupId = tt_idea_tests.groupId
)
WHERE tt_idea_tests.groupId = NEW.groupId

#***************************************

#Update_Idea_Test_Percent_On_Update
#tt_idea_actuals
#AFTER
#UPDATE

UPDATE tt_idea_tests
SET tt_idea_tests.percentCorrect = (
	SELECT
		IF( tt_idea_tests.ans1  = tt_idea_actuals.ans1, 10, 0 ) +
		IF( tt_idea_tests.ans2  = tt_idea_actuals.ans2, 10, 0 ) +
		IF( tt_idea_tests.ans3  = tt_idea_actuals.ans3, 10, 0 ) +
		IF( tt_idea_tests.ans4  = tt_idea_actuals.ans4, 10, 0 ) +
		IF( tt_idea_tests.ans5  = tt_idea_actuals.ans5, 10, 0 ) +
		IF( tt_idea_tests.ans6  = tt_idea_actuals.ans6, 10, 0 ) +
		IF( tt_idea_tests.ans7  = tt_idea_actuals.ans7, 10, 0 ) +
		IF( tt_idea_tests.ans8  = tt_idea_actuals.ans8, 10, 0 ) +
		IF( tt_idea_tests.ans9  = tt_idea_actuals.ans9, 10, 0 ) +
		IF( tt_idea_tests.ans10 = tt_idea_actuals.ans10, 10, 0 )
	FROM tt_idea_actuals
	WHERE	tt_idea_actuals.groupId = tt_idea_tests.groupId
)
WHERE tt_idea_tests.groupId = NEW.groupId

#***************************************