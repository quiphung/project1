$(document).ready(function(){
	$('.dmnext').click(function(){
		//$(this).parent('.delistcontrol').parent('.dlsub').children('.content').html(' ');
		//$(this).parent('.delistcontrol').parent('.dlsub').children('.content').append('<div style="text-align:center;"><img src="'+base_url+'template/frontend/images/loading.gif" height="50"></div>');
		id 	= 	$(this).parent('.delistcontrol').find('input').val();
		url =	base_url+'baiviet/ajaxdmbv/'+id; 
		$(this).parent('.delistcontrol').parent('.dlsub').children('.content').load(url);
		return false;
	});
})
$(document).ready(function(){
	$('.dmprev').click(function(){
		//$(this).parent('.delistcontrol').parent('.dlsub').children('.content').html(' ');
		//$(this).parent('.delistcontrol').parent('.dlsub').children('.content').append('<div style="text-align:center;"><img src="'+base_url+'template/frontend/images/loading.gif" height="50"></div>');
		id 	= 	$(this).parent('.delistcontrol').find('input').val();
		url =	base_url+'baiviet/ajaxdmbvprev/'+id; 
		$(this).parent('.delistcontrol').parent('.dlsub').children('.content').load(url);
		return false;
	});
})
$(document).ready(function(){
	$('.nextbv').click(function(){
		id 	= 	$(this).parent('.controlnewsone').find('input').val();
		url =	base_url+'baiviet/ajaxcmbv/'+id; 
		$(this).parent('.controlnewsone').parent('.newsone').children('.content').load(url);
		return false;
	})
})
$(document).ready(function(){
	$('.prevbv').click(function(){
		id 	= 	$(this).parent('.controlnewsone').find('input').val();
		url =	base_url+'baiviet/ajaxcmbvprev/'+id; 
		$(this).parent('.controlnewsone').parent('.newsone').children('.content').load(url);
		return false;
	})
})
$(document).ready(function(){
	$('.searchform').submit(function(){
		key = $(this).serialize();
		url = base_url+'tim-kiem/';
		url2 = base_url+'baiviet/searchajax';
		$.post(url2,key,function(d){
			window.location.href = url;
		})
		return false;
	})	
})
$(document).ready(function(){
	$('.searchmenu input.inputsearch').keyup(function(){
		if($(this).val()==''){
			$('.result').hide(100);
		}
		else{
			key = $('.searchmenu').serialize();
			url = base_url+'baiviet/searchkeydown';
			$.post(url,key,function(d){
				$('.result').show(100);
				$('.resultlink').html(d); 
			}); 
		}
	})	
}) 