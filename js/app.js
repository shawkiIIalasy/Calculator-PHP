

function addNumber(s)
		{
			var equation=cal.display.value;
			var last=equation[equation.length-1];
			if(last=='X'||last=='Y'||last=='Z')
			{
				exit();
			}
			cal.display.value+=s;
			cal1.display.value+=s;
		}
		function addO(s)
		{
			var equation=cal.display.value;
			var last=equation[equation.length-1];
			var n=equation.length-1;
			if(cal.display.value =='')
			{
				cal.display.value+='0'+s;
				exit();
			}
			if(last=='X'||last=='Y'||last=='Z')
			{
				cal.display.value+=s;
				cal1.display.value+=s;
				exit();
			}
			if(isNaN(last))
			{

				exit();
			}
			cal.display.value+=s;
			cal1.display.value+=s;
		}
		function addVar(s)
		{
			var equation=cal.display.value;
			var last=equation[equation.length-1];
			var n=equation.length-1;
			if(last=='X'||last=='Y'||last=='Z')exit();
			if(!isNaN(last))
			{
				cal.display.value+='*'+s;
				cal1.display.value+='*'+s;
				exit();
			}
			cal.display.value+=s;
			cal1.display.value+=s;
		}
		function clear1(s)
		{
			var equation=cal.display.value;
			var last=equation[equation.length-1];
			var n=equation.length-1;
			cal.display.value=s;
			cal1.display.value=s;
		}
		function delete1(s)
		{
			var equation=cal.display.value;
			var last=equation[equation.length-1];
			var x='';
			for (var i=0; i<equation.length-1; i++) {
  				 x=x+equation[i];}

  			cal.display.value=x;
  			cal1.display.value=x;

  		}