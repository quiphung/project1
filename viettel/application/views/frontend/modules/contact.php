<?php if(isset($thongbao)): ?>
<div class="thongbaoct">
<?=$thongbao?>
</div>
<?php endif; ?>
<?php if(isset($thongbao2)): ?>
<div class="thongbaotc">
<?=$thongbao2?>
</div>
<?php endif; ?>
<form method="post" class="contact">
  	<div class="form-group">
    	<label for="Inputtieude">Tiêu đề</label>
    	<input type="text" class="form-control" name="title" id="Inputtieude" placeholder="Vui lòng nhập tiêu đề" value="<?php if(!isset($thongbao2)){echo (set_value('title'))?set_value('title'):'';} ?>">
  	</div>
	<div class="form-group">
    	<label for="InputEmail">Email</label>
    	<input type="text" class="form-control" name="email" id="InputEmail" placeholder="Vui lòng nhập email" value="<?php if(!isset($thongbao2)){ echo (set_value('email'))?set_value('email'):'';} ?>">
  	</div>
  	<div class="form-group">
    	<label for="InputPhone">Phone</label>
    	<input type="text" class="form-control" name="phone" id="InputPhone" placeholder="Vui lòng nhập số điện thoại" value="<?php if(!isset($thongbao2)){ echo (set_value('phone'))?set_value('phone'):'';} ?>">
  	</div>
  	<div class="form-group">
    	<label for="InputMessage">Message</label>
    	<textarea class="form-control" name="message" id="InputMessage" placeholder="Vui lòng nhập nội dung" rows=6><?php if(!isset($thongbao2)){ echo (set_value('message'))?set_value('message'):'';} ?></textarea>
  	</div>
  	<div class="form-group">
    	<label for="InputCaptcha">Captcha</label>
    	<input type="text" class="form-control" name="captcha" id="InputCaptcha" placeholder="Vui lòng nhập mã captcha" value="<?php if(!isset($thongbao2)){echo (set_value('captcha'))?set_value('captcha'):'';} ?>">
  	</div>
  	<div class="captchat">
  		<?=$this->session->userdata('captchaimg')?>
  		<span id='resetcaptcha' class="glyphicon glyphicon-refresh"></span>
  	</div>
  <button type="submit" class="btn btn-default">Send</button>
</form>
<script>
	$(document).ready(function(){
		$('#resetcaptcha').click(function(){
			url = '<?=base_url()?>baiviet/resetcaptcha';
			$.ajax({
				url : url,
				success : function(d){
					$('#imgcaptcha').remove();
					$('.captchat').prepend(d);
				},
			});
			return false;
		});
	})
</script>
