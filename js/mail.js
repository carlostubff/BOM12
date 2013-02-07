//FORM VALIDATION 
function validate(formulario) 
{
// get the form and its input elements
	var form = document.forms[formulario],
    inputs = form.elements;
    // if no autofocus, put the focus in the first field
    if (!Modernizr.input.autofocus) 
	{
    	inputs[0].focus();
    }
    // if required not supported, emulate it
    if (!Modernizr.input.required) 
	{
    	form.onsubmit = function() 
		{
        	var required = [], att, val;
            // loop through input elements looking for required
            for (var i = 0; i < inputs.length; i++) 
			{
            	att = inputs[i].getAttribute('required');
                // if required, get the value and trim whitespace
                if (att != null) 
				{
                	val = inputs[i].value;
                    // if the value is empty, add to required array
                    if (val.replace(/^\s+|\s+$/g, '') == '') 
					{
                        required.push(inputs[i].name);
                    }
                }
            }
            // show alert if required array contains any elements
            if (required.length > 0) 
			{
            	alert('Los siguientes campos son obligatorios: ' +
                required.join(', '));
                // prevent the form from being submitted
                return false;
            }
        };
    }
}

//SEND CONTACT FORM VIA AJAX
// Note: Your form's inputs must have the attribute required="required"
$('#contact').submit(function(event) //Your form ID
{
	event.preventDefault();
	if(!Modernizr.input.required) // If the browser doesnt support required fields
	{
		if(validate('contacto')) //put your form name
		{
			//list of your input fields
			var name = $('input#name').val();
			var email = $('input#email').val();
			var msg = $('input#msg').val();
			var datastring = 'name=' + name + '&email=' + email + 'msg=' + msg;
			$.ajax
  			({
				type: "POST",
				url: "includes/mail.php",
				data: datastring,
				success: function(data)
				{
					if (data == 1)
					{
						//email sent
					}
					else
					{
						//email fail
						console.log(data);
					}
					// cleaning input fields
					$('input#name').val("");
					$('input#email').val("");
					$('input#msg').val("");
				},
				error: function()
				{
					//Error communicating with the php file
					$('input#name').val("");
					$('input#email').val("");
					$('input#msg').val("");
				}
  			});
		}
	}
	else //If the browser support required fields :)
	{
		var name = $('input#name').val();
		var email = $('input#email').val();
		var msg = $('input#msg').val();
		var datastring = 'name=' + name + '&email=' + email + 'msg=' + msg;
		$.ajax
  		({
			type: "POST",
			url: "includes/mail.php",
			data: datastring,
			success: function(data)
			{
				// cleaning input fields
				$('input#name').val("");
				$('input#email').val("");
				$('input#msg').val("");
			},
			error: function()
			{
				//Error communicating with the php file
				$('input#name').val("");
				$('input#email').val("");
				$('input#msg').val("");
			}
  		});
	}
});