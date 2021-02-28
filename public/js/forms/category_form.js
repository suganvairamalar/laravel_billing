$(document).ready(function(){

	$.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
	
	var _token = $('input[name="_token"]').val();
	$(document).on('click','#category_add',function(e){
		e.preventDefault();
		var category_name = $('#category_name').val();
			$.ajax({
				url:'/category_add_data',
				method:'post',
				data:{category_name:category_name,_token:_token},
				dataType:'json',
				success:function(data){
					var html ='';
					if(data.errors){
						html = '<div class="alert alert-danger">';
						for (var count = 0; count < data.errors.length; count++) {
							 html += '<p>' + data.errors[count] + '</p>';
						}
						html+= '</div>';
					}
					if(data.success){
						html = '<div class="alert alert-success">' + data.success + '</div>';
						location.reload(); 
					}
					$("#category_form_result").html(html);
				}
			});
	});

	$(document).on('click','.edit',function(e){
		e.preventDefault();
		var id = $(this).attr('id');
		var category_name = $("#"+id).html();
			$.ajax({
				url:'/category_update_data',
				method:'post',
				data:{category_name:category_name,id:id,_token:_token},
				dataType:'json',
				success:function(data){
					var html ='';
					if(data.errors){
						html = '<div class="alert alert-danger">';
						for (var count = 0; count < data.errors.length; count++) {
							 html += '<p>' + data.errors[count] + '</p>';
						}
						html+= '</div>';
					}
					if(data.success){
						html = '<div class="alert alert-success">' + data.success + '</div>';
						location.reload(); 
					}
					$("#category_form_result").html(html);
				}
			});
	});

	$('.categoryname').blur(function(e){
		e.preventDefault();
		var id = $(this).attr('id');
		var category_name = $("#"+id).html();
			$.ajax({
				url:'/category_update_data',
				method:'post',
				data:{category_name:category_name,id:id,_token:_token},
				dataType:'json',
				success:function(data){
					var html ='';
					if(data.errors){
						html = '<div class="alert alert-danger">';
						for (var count = 0; count < data.errors.length; count++) {
							 html += '<p>' + data.errors[count] + '</p>';
						}
						html+= '</div>';
					}
					if(data.success){
						html = '<div class="alert alert-success">' + data.success + '</div>';
						location.reload(); 
					}
					$("#category_form_result").html(html);
				}
			});
	});


	var category_id;
  $(document).on('click', '.delete', function(){
        category_id = $(this).attr('id');
        $('#category_confirm_Modal').modal('show');
  });

  $('#category_ok_button').click(function(){
        $.ajax({
          url:'/category_delete_data/'+category_id,
          beforeSend:function(){
            $('#category_ok_button').text('Deleting.....');
          },
          success:function(data){
            setTimeout(function(){
              $('#category_confirm_Modal').modal('hide');
              location.reload();
            },2000);
          }
        });
  });


  //$('#category_search_form').on('click','#category_search_submit',function(){
  	//above code not working so i change code below like
  	$(document).on('click','#category_search_submit',function(){
    if($('#search').val()==''){
    	alert("enter to search");
    	return false;

    }
  	
            var _token = $('#token').val();
            $value = $('#search').val();
            $.ajax({
               type:'GET',
               url:'/categories',
               data:{'search':$value,_token:_token},
               success: function(data){
                console.log(data);
               }
            });
   });


});