$(document).ready(function(){
		
		$(document).on('click','.del',function(){
			var del = $(this).attr('tablename');
			$.ajax({
				url:'system/deleteCategory.php',
				type:'POST',
				data:{'tablename':del},
				success:function(data){
					$('#showdata').html(data);
				}
			});
			window.location.href='insertCategory.php';
		});
		
		$(document).on('click','.insert',function(){
			var tablename = $(this).attr('tablename');
				redirect(tablename);
		});
		
		$.ajax({
			url:'system/listCategory.php',
			type:'GET',
			success: function(data){
				$('#Categories').html(data);
			}
		});
		
		$('#submit').click(function(){
			var categoryname = $('#categoryname').val();
			$.ajax({
				url:'system/insertCategory.php',
				type:'POST',
				data:{'categoryname':categoryname},
				success:function(data){
					$('#showdata').html(data);
				}
			});
			window.location.href='insertCategory.php';
		});
	});
	
	function redirect(tb){
		window.location.href="insertData.php?category="+tb;
	}