	//index.php
	$(document).ready(function(){
		$("#reg").click(function(event){
			event.preventDefault();
			var Name = $('#Name').val();
			var Email = $('#Email').val();
			var Password = $('#Password').val();
			if(Name == '')
			{
				document.getElementById("c").innerHTML = "Enter your Name";
			}
			else if(Email == '')
			{
				document.getElementById("c").innerHTML = "Enter your Email";
			}
			else if(Password == '')
			{
				document.getElementById("c").innerHTML = "Enter a Password";
			}
			else if(Password.length < 6)
			{
				document.getElementById("c").innerHTML = "Minimum lenght of Password is 6";
			}
			else{
			$.ajax({
			url:"ajax.php",
			method:"post",
			data:$('form').serialize()+"&par2=2",
			success: function(res){
				//$('.c').html(res);
				//console.log(res);
				if(res=='1')
				{
					//$('.c').html("<p style='color:green;'>Inserted</p>");
					//header('location:welcome.php');
					window.location.href = 'welcome.php';
				}
				else if(res=='e'){
				$('#c').html("<p style='color:red;'>Email already exist</p>");
				}
				else{
					$('#c').html("<p style='color:red;'>Database connection failed</p>");
				}
			}
		})

		}


		})

	})
//login.php

$(document).ready(function(){
		$("#login").click(function(event){

			event.preventDefault();
			$.ajax({
			url:"ajax.php",
			//url:"../design/js/ajax.php",
			method:"post",
			data:$('form').serialize()+"&par3=3",
			success: function(res){
				//console.log(res)
				//$('.c').html(res);
				if(res=='1')
				{
					//$('.c').html("<p style='color:green;'>Inserted</p>");
					window.location.href = 'admin_welcome.php';
				}
				else if(res=='0')
				{
					window.location.href = 'welcome.php';
				}
				else if(res=='00'){
				$('.c').html("<p style='color:red;'>Email and Password dosn't match!</p>");
				}
				else
					$('.c').html("<p style='color:red;'>You are banned</p>");
			}
		})
		})
	})


//welcome.php && admin_welcome.php

 $(document).ready(function(){
         	//var btn = '#'+$("footer").siblings().attr('id');
         	$("button#comnt").click(function(event){
         		event.preventDefault();
         		var parent = '#'+$(this).parent().attr('id');
         		//console.log(parent);
         		$.ajax({
         		url:"ajax.php",
         		method:"post",
         		data:$(parent).serialize()+"&par1=1",
         		
         		success: function(s){
                  //console.log(s);
         			var show = parent+'c';
                  //console.log(show);
         			$('.msz').val(' ');
         			//$('.cs').html(strMessage);
         			$(show).html(s);
         		}
         	})
         	})
         })

 $(document).ready(function(){
            //var btn = '#'+$("footer").siblings().attr('id');
            $("#post").click(function(event){
               event.preventDefault();
               var cat = $('#cat').val();
               var qsn = $('#qsn').val();
               if(cat == '' || qsn=='')
               {
                  document.getElementById("p").innerHTML = "<p style='color:red;'>Field empty</p>";
               }
               else{
               $.ajax({
               url:"ajax.php",
               method:"post",
               data:$("#pf").serialize()+"&par4=1",
               success: function(s){
                  $('#cat').val(' ');
                  $('#qsn').val(' ');
                  alert(s);
               }
            })
            }
            })
         })
