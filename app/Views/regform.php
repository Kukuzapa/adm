<?php
	if ($user_id > 0) {
		?>
		<div class="row">
			<div class="col-12">
				<p>Для тех, кто проигнорировал или не понял то, что написано выше, разъясню протыми словами:</p>
				<p><b>Мы здесь играем в настоящие подарки. То есть все, кто зарегистрируется в акции, должен будет:</b></p>
				
				<ol>
					<li>Заполнить форму ниже, в которой необходимо написать Фамилию, Имя и Отчество, настоящий почтовый адрес с индексом, а также немного слов о своих интересах(кстати, вы всегда можете переотправить данную форму).</li>
					<li>Дождаться окончания жеребьевки, в ходе которой наш робот случайным образом перемешает все карточки с адресами и выдаст вам какой-то из них,</li>
					<li>Отправить подарок на адрес, который вам достанется,</li>
					<li>Помнить, что ваш адрес достанется кому-то, кто на него точно так же, как и вы, отправавит подарок.</li>
				</ol>
				
				<p>Если же вы поняли, что взяли шапку не по себе, то до окончания регистрации, можете отказаться от участия в мероприятии.</p>
				
			</div>
			<div class="col-12">
				<form method=post action="/update_user/<?=$user_id?>">
					<div class="row">
						<div class="col-6">
							<h6 class="text-center">Форма</h6>
							<input type="text" class="form-control" name="reg" value="reg" hidden>
							<div class="form-group">
								<input type="text" class="form-control regfields" id="name" name="name" placeholder="Фамилия Имя Отчество" value="<?=$user['name'];?>" required>
								<small class="form-text text-muted">Введите здесь ваши полные фамилию имя и отчество. Игроки, заполнившие только имя или не указавшие отчество к участию не будут допущены.</small>
								<div class="invalid-feedback">
									Вы ведь ознакомились с пожеланиями по введенному ФИО?
								</div>
							</div>
							<div class="form-group">
								<input type="email" class="form-control regfields" id="email" name="email" placeholder="Адрес электропочты" value="<?=$user['email'];?>" required>
								<small class="form-text text-muted">Введите здесь действительный адрес электронной почты. На него мы будем присылать разного рода уведомления о ходе акции. Например, о том, что пора отправлять подарок. Ну и адрес укажем, куда, разумеется.</small>
								<div class="invalid-feedback">
									Неплохое коммюнике, а теперь введите адрес электронной почты.
								</div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control regfields" id="address" name="address" placeholder="Почтовый адрес" value="<?=$user['address'];?>" required>
								<small class="form-text text-muted">Введите здесь ваш почтовый адрес.</small>
								<div class="invalid-feedback">
									А все таки куда дед Мороз отправит подарок?
								</div>
							</div>
							<div class="form-group">
								<textarea class="form-control regfields" id="interests" name="interests" rows="2" placeholder="Ваши интересы"><?=$user['interests'];?></textarea>
								<div class="invalid-feedback">
									Напишите хотя-бы про марки. Их все в детстве собирали!
								</div>
							</div>
						</div>
						<div class="col-6">
							<h6 class="text-center">и примечания к заполнению</h6>
							<ul style="list-style-type: none">
								<li>
									Фамилия Имя Отчество
									<ul style="list-style-type: none">
										<li><small>Правильный пример: <span class="text-success">Ползункова Маргарита Михайловна</span></small></li>
										<li><small>Неправильный пример: <span class="text-danger">Алексеев Андрей</span></small></li>
										<li><small>Совсем неправильный пример: <span class="text-danger">Сергей</span></small></li>
										<li><small>Пожизненный запрет на участие в акции: <span class="text-danger">NAGIBATOR 2000 и иже с ними</span></small></li>
									</ul>
								</li>
								<li>
									Почтовый адрес
									<ul style="list-style-type: none">
										<li><small>Дедушка живет в России и подскажет вам при вводе адреса, если и вы живете там же.</small></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<?php if(empty($user['address'])):?>
						<button type="submit" class="btn btn-success btn-block" id="register">Я пришлю кому-нибудь подарок!(а кто нибудь пришлет мне!!)</button>
					<?php else: ?>
						<button type="submit" class="btn btn-success btn-block" id="register">Я забыл упомянуть свой интерес в коллекционных винах.</button>
					<?php endif; ?>
					
				</form>
				<?php if(!empty($user['address'])):?>
					<form method=post action="/update_user/<?=$user_id?>" class="mt-3">
						<input type="text" class="form-control" name="cancel" value="cancel" hidden>
						<button type="submit" class="btn btn-danger btn-block">Я передумал и отказываюсь</button>
					</form>
				<?php endif; ?>
			</div>
		</div>

		<link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@19.8.0/dist/css/suggestions.min.css" rel="stylesheet" />
		<script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@19.8.0/dist/js/jquery.suggestions.min.js"></script>
		
		<script>
			$("#address").suggestions({
				token: "f3e82dde9f36f53343d203b127b1c2cfccc54e56",
				type: "ADDRESS",
				/* Вызывается, когда пользователь выбирает одну из подсказок */
				onSelect: function(suggestion) {
					//console.log(suggestion);
				}
			});
			
			$('#register').click(function (event) {
				var isValid = true;
				
				console.log('test');
				
				$('.regfields').each(function () {
					var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,6}\.)?[a-z]{2,6}$/i;
					if (!$(this).val() || ($(this).attr('id') == 'email' && !pattern.test($(this).val()))){
						$(this).removeClass('is-valid');
						$(this).addClass('is-invalid');
						console.log($(this).attr('id'));
						isValid = false;
					} else {
						$(this).removeClass('is-invalid');
						$(this).addClass('is-valid');
					}
				})
				
				console.log(isValid);
				if (!isValid) event.preventDefault();
			});
		</script>
		

		<?php
	}
	else {
		if ($state == 1) {
			?>
			<p>Авторизуйтесь и участвуйте!</p>
			<?php
		}
		else {
			?>
			<p>Увы, регистрация завершена. Приходите через год.</p>
			<?php
		}
	}
?>
