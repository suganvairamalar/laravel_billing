$(document).ready(function(){

	 $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

$(document).on('click','#sign_in',function(e){
	e.preventDefault();
	location.href = '/user_login_view';  
});

$(document).on('click','#sign_up',function(e){
	e.preventDefault();
	location.href = '/user_register_view';  
});

$('#user_form').on('click','#user_action_button',function(e){
		e.preventDefault();
		 if($('#user_action_button').val()=='ADD'){
				/*alert("Hi");
				return;*/
				 $.ajax({
		            url:'/user_register_add_data',
		            method:'POST',
		            data:$('#user_form').serialize(),
		            dataType:"json",
		            success:function(data)
		              {
		               /* console.log(data);
		            return;*/
		               var html = '';
		                  if(data.errors){
		                    html = '<div class="alert alert-danger">';
		                    for(var count = 0; count < data.errors.length; count++){
		                      html += '<p>' + data.errors[count] + '</p>';
		                      }
		                      html += '</div>';
		                    }
		                    if(data.success){
		                    html = '<div class="alert alert-success">' + data.success + '</div>';
		                    //$('#position_form')[0].reset();
		                    //$("#position_form").trigger("reset");
		                    //location.href = '/user_home',
		                    //$('#user_form')[0].reset();
		                    location.href = '/user_home_view';                   
		                  }
		                  
		                  $('#user_form_result').html(html);
		              }
          	});
		 }


});

/*$('#login_form').on('click','#login_submit_button',function(e){
	e.preventDefault();
	//alert("Hi");
	//return;

	$.ajax({
		url:'/user_check_login_data',
		method:'POST',
		data:$('#login_form').serialize(),
		dataType:"json",
		success:function(data){
			var html ='';
			if(data.errors){
				 html = '<div class="alert alert-danger">';
		                    for(var count = 0; count < data.errors.length; count++){
		                      html += '<p>' + data.errors[count] + '</p>';
		                      }
		                      html += '</div>';
			}
				

			$('#login_form_result').html(html);
		}
	});
});*/


});