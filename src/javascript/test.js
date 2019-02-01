function startTuringTest( elements, type, group )
{
	var turingTest = new TuringTest( elements, type, group );
	turingTest.initialize();
}

var TuringTest = function( elements, type, group )
{
	var object = this;
	object.PERSONAL_GROUP = "you";

	object.initialize = function()
	{
		setDisplayByType();
		setHandlers();
	};

	function setDisplayByType()
	{
		if ( group === object.PERSONAL_GROUP )
		{
            elements.personalInstructions.show();
            elements.groupChoiceSection.show();
            elements.acceptsEmails.parent('div').show();
            elements.findButton.parent('div').show();
		}
		else
		{
            elements.groupInstructions.show();
            elements.groupChoiceSection.hide();
            elements.acceptsEmails.parent('div').hide();
            elements.findButton.parent('div').hide();
		}
	}

	function setHandlers()
	{
		elements.idInput.on( "keydown", function ( e ) {
			if ( e.keyCode === 13 ) {
				e.preventDefault();
				submitAnswer();
			}
		});
		elements.submitButton.on( "click", submitAnswer );
		elements.findButton.on( "click", find );
	}

	function submitAnswer()
	{
		elements.answers.val( getAnswers() );
		elements.groupChoice.val( getGroupChoice() );

		if ( isValidForm() )
		{
			elements.group.val( group );
			elements.type.val( type );
			elements.submitForm.submit();
		}
	}

	function getAnswers()
	{
		var answers = "";
		for ( var i = 1; i <= 10; i++ )
		{
			var name = getQuestionName( i );
			var radio = elements.questionsSection.find('input[name="' + name + '"]:checked')[0];
			answers += radio ? radio.value : "";
		}
		return answers;
	}

	function getQuestionName( index )
	{
		var questionName = "q" + index;
		if ( type === "idea" )
		{
			questionName += (group === object.PERSONAL_GROUP ? getGroupChoice() : group) === "con" ? "-con" : "-lib";
		}
	    return questionName;
	}

	function getGroupChoice()
	{
		var groupChoice;
		if ( type === "idea" && getSelectedRadioButton( "ideology" ) )
		{
			groupChoice = getSelectedRadioButton( "ideology" ).id;
		}
		else
		{
			groupChoice = elements.groupChoiceSection.find( 'input[name="group"]:checked' ).val();
		}
	    return groupChoice;
	}

	function isValidForm()
	{
		var isValid = true;

        if ( !(elements.answers.val().length === 10) )
        {
            isValid = false;
            showToaster( "You must answer all questions" );
        }
		else if ( !elements.idInput.val() )
		{
			isValid = false;
			showToaster( "You must enter an identifier" );
		}
        else if ( group === object.PERSONAL_GROUP && !elements.groupChoice.val() )
		{
			isValid = false;
			showToaster( "You must select a " + object.getTypeTitle( type ) );
		}

		return isValid;
    }

	function find()
	{
	    showPrompt( "Find Yourself", "If you&rsquo;ve taken the test before, enter your email address to load previous answers:", findCallback, "Email Address" );
	}

	function findCallback( id )
	{
		if ( id != null )
		{
            $.post(
				"php/database.php",
				{
					userId: id,
					type: type,
					action: "getPersonal"
				},
				function( response ) {
					var responseObject = JSON.parse( response );
					setAnswers( responseObject['answers'] );
					setGroup( responseObject['groupId'], type );
					elements.acceptsEmails.prop( "checked", responseObject.acceptsEmails );
					elements.idInput.val( id );
			    }
			);
		}
	}

	function setAnswers( answers )
	{
		for ( var i = 1; i <= 10; i++ )
		{
			var name = getQuestionName( i );
			var radios = elements.questionsSection.find( "input[name='" + name + "']" );
			for ( var j = 0; j < radios.length; j++ )
			{
				var radio = radios[j];
				if( radio.value === answers.charAt( i - 1 ) )
				{
					radio.checked = true;
				}
			}
		}
	}

	function setGroup( groupId, type )
	{
		if ( type === "idea" )
		{
			$('#' + groupId)[0].click();
		}
		else
        {
            var radios = elements.groupChoiceSection.find( "input[name='group']" );
            for ( var i = 0; i < radios.length; i++ )
            {
                var radio = radios[i];
                if ( radio.value === groupId )
                {
                    radio.checked = true;
                }
            }
        }
	}

	object.getTypeTitle = function( type )
	{
		var title = "Type";
		if ( type === "denom" )
		{
			title = "Denomination";
		}
		else if ( type === "world" )
		{
			title = "World Religion";
		}
		else if ( type === "idea" )
		{
			title = "Religious Ideology";
		}
		return title;
	};
};