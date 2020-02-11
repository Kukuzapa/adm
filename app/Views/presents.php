<?php
	if (($user_id > 0) /*&& ($user['active'])*/) {
		?>
		<p>
			Привет, <a href="http://www.gwars.ru/info.php?id=<?=$user['id'];?>"><?=$user['nickname'];?></a>!
			В этом году вам надо отправить подарок по следующему адресу:
		</p>
		
		<dl class="row border-bottom">
			<dt class="col-sm-2">Куда:</dt>
			<dd class="col-sm-10"><?=$victim['address'];?></dd>
			
			<dt class="col-sm-2">Кому:</dt>
			<dd class="col-sm-10"><?=$victim['name'];?></dd>
			
			<dt class="col-sm-2">Пожелания:</dt>
			<dd class="col-sm-10"><?=$victim['interests'];?></dd>
		</dl>
		
		<p>
			А здесь, пожалуйста, не забудьте отметить, что вы получили подарок. А то дед Мороз, спать не ложиться, волнуется.
		</p>
		<p>
			Также, если вы отправили подарок внучеку, сделайте об этом отметку и, по возможности, введите трек-номер посылки.
			Что это такое и как его найти можно почитать по этой <a href="https://www.pochta.ru/support/popular-questions/tracking/products-location" target="_blank">ссылке</a>, на сайте самой быстрой почты мира.
		</p>
		<p>
			А если, пожелания внучека слишком абстрактны, или, напротив, конкретизированы, но чересчур глобальны, вы можете написать внучку записку.
		</p>
		
		<form method="post" action="/update_user/<?=$user_id?>">
			<div class="row mt-5">
				<input type="hidden" name="change_state" value="yes">
				<input type="hidden" name="victim" value="<?=$victim['id'];?>">
				<input type="hidden" name="user" value="<?=$user_id?>">
				<div class="col-4">
					<div class="custom-control custom-switch">
						<input type="checkbox" class="custom-control-input" id="customSwitch1" name="received" value="<?=$user['received'];?>"<?php if ($user['received']) { ?> checked="checked"<?php } ?>>
						<label class="custom-control-label" for="customSwitch1">Я уже получил подарок!</label>
						
					</div>
				</div>
				<div class="col-4">
					<div class="custom-control custom-switch">
						<input type="checkbox" class="custom-control-input" id="customSwitch2" name="sent" value="<?=$user['sent'];?>"<?php if ($user['sent']) { ?> checked="checked"<?php } ?>>
						<label class="custom-control-label" for="customSwitch2">Я отправил подарок. Я хороший!</label>
					</div>
				</div>
				<div class="col-4">
					<div class="form-group">
						<input <?php if (!$user['sent']) {echo 'disabled';} ?> type="text" class="form-control form-control-sm" id="postcode" name="postcode" placeholder="Трек-номер подарка" value="<?=$user['postcode'];?>">
					</div>
				</div>
				<div class="form-group col-12">
					<textarea class="form-control" id="interests" name="message" rows="2" placeholder="Письмо внучеку"></textarea>
				</div>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Отправить данные на полюс.</button>
		</form>
		
		<script>
			$('#customSwitch2').change(function () {
				console.log(this.checked);
				if (this.checked) {
					//$("textarea").prop('disabled', true);
					$("#postcode").prop('disabled', false);
				} else {
					$("#postcode").prop('disabled', true);
				}
			})
		</script>
		
		<?php
		if ($i_victim['sent'] == 0) {
			echo "Вам, к слову, ещё ничего не отправили.";
		}
		else {
			echo "Подарок для вас в пути, наберитесь терпения и начинайте испытывать глубочайшее уважение к сотрудникам почты!";
		}
		if ($i_victim['postcode'] != '') {
			echo "<br/>Код для трекинга: <b><a target=\"_blank\" href=\"https://www.pochta.ru/tracking#".$i_victim['postcode']."\">".$i_victim['postcode']."</a></b><br/><br/>";
		}
		
		if ($victim['received'] == 0) {
			echo "Отправленный вами подарок ещё в пути, ну или ваша жертва забыла нажать здесь правильную кнопку.";
		}
		else {
			echo "Отправленный вами подарок наконец-то дошел до адресата, миссия выполнена!";
		}
	}
	else {
		?>
		<p>Подарковорот уже во всю идёт. К сожалению, вы опоздали. Заходите на следующий год.</p>
		<?php
	}
?>