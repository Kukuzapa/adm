<!DOCTYPE html>
<html lang="en">
<head>
	<title>GW-Zone.Ru :: Анонимный Дед Мороз</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="игра, онлайн-игра, онлайн, on, line">
	<meta name="description" content="">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
	<nav class="navbar navbar-dark bg-dark">
		<form class="form-inline">
			<?php if (empty($user_id)):?>
				<a class="btn btn-success" href="http://www.gwars.ru/cross-server-login.php?site_id=11&url=http://login.gw-zone.ru/adm2019/" role="button">Авторизоваться через Ganjawars</a>
			<?php else: ?>
				<a class="navbar-brand" href="http://www.gwars.ru/info.php?id=<?=$user['id'];?>" target="_blank"><b><?=$user['nickname'];?></b></a>
			<?php endif; ?>
		</form>
		
		<span class="navbar-text text-danger"><b>
			<?php
				switch ($err) {
					case 1: echo 'Во время авторизации произошла ошибка. Так быть не должно.';break;
					case 2: echo 'Сожалеем, но к акции допускаются игроки, получившие 20 боевой уровень.';break;
					case 3: echo 'Сожалеем, но в акции вы сможете принять участие лишь на будущий год.';break;
					case 5: echo 'Сожалеем, но вы не допущены к участию в акции. Пожалуйста, заполните паспорт в игре и приходите на следующий год.';break;
			} ?>
		</b></span>
		
		<form class="form-inline">
			<?php if(!empty($messages_from_grandpa)):?>
				<button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#exampleModal2">Общение с дедушкой</button>
			<?php endif; ?>
			
			<?php if(!empty($messages_to_grandson)):?>
				<button type="button" class="btn btn-secondary mr-3" data-toggle="modal" data-target="#exampleModal1">Общение с внучеком</button>
			<?php endif; ?>
			
			<?php if (!empty($user_id)):?>
				<a class="btn btn-success" href="/logout" role="button">Выйти</a>
			<?php endif; ?>
		</form>
		
		
	</nav>

	<div class="container">
		<h1 class="text-center">Анонимный Дед Мороз - 2020</h1>
		
		
		<?php if($isAdmin):?>
			<div class="d-flex justify-content-around border-top border-bottom mt-3 mb-3 pt-3 pb-3">
				<a class="btn btn-success" href="/state/0" role="button">Выключено</a>
				<a class="btn btn-success" href="/state/1" role="button">Регистрация</a>
				<a class="btn btn-success" href="/state/2" role="button">Считается</a>
				<a class="btn btn-success" href="/state/3" role="button">Подарки!</a>
				<a class="btn btn-success" href="/calc" role="button">Перемешать</a>
				<a class="btn btn-success" href="/send" role="button">Выслать письма</a>
				<a class="btn btn-success" href="/delete" role="button">Чистка</a>
			</div>
		<?php endif; ?>
		
		<div class="row">
			<div class="col-3">С 15 декабря запись участников</div>
			<div class="col-5">22 декабря - конец записи<br>Каждому участнику выдается один
				случайный адрес другого зарегистрированного
				участника с сайта.</div>
			<div class="col-4">С 23 декабря и пока почта не доставит - <strong>Подарки!!!</strong></div>
			
			<div class="col-12 mt-5">
				<img src="pics/santa.png" class="rounded float-left mr-3">
				<p>Возможно вы заметили &#8212; под новый год многие сайты каким-то образом
					перекрашиваются, на них вдруг появляются елки, какие-то падающие снежинки,
					веселые деды морозы и подобная фигня. Иногда мы чувствуем себя так, как
					будто одни мы тут до сих пор помним, что новый год &#8212; это подарки,
					сюрпризы, неожиданные вещи и веселье, а не новые гифы и снежинки
					на логотипе.</p>
				<p>Именно поэтому мы организовали тут Клуб Анонимных Дедов
					Морозов на gw-zone.ru. Суть клуба очень проста &#8212; вы вносите свой почтовый
					адрес, на который вам можно прислать подарок и подтверждаете, что готовы
					отправить кому-то подарок в ответ. Регистрация участников продлится до 1
					декабря. После этого электронно-вычислительная машина перетасовывает адреса,
					и каждому зарегистрированному участнику достается адрес какого-то другого
					человека из интернета, на который он отправит новогодний подарок и постарается
					обрадовать его.</p>
				<p>Бюджет подарка мы, конечно,
					никому навязывать не будем, но помните, что вы тоже получите подарок.
					Возможно, от такого же щедрого человека, как вы сами.</p>
				<p>В общем, мы предлагаем вам зарегистрироваться тут, а потом отправить
					какую-то приятную безделушку или вообще что угодно какому-то другому
					человеку с сайта, не зная, кто он. А в ответ получить такой же сюрприз,
					и тоже неизвестно от кого. Если не для этого придумали интернет,
					то я даже не знаю, о чем эти военные думали.</p>
				<p>Единственное &#8212; имейте в виду, мы тут собрались
					со всего мира, так что вам может достаться зарегистрированный пользователь
					из Турбокистана, или какого-нибудь, я не знаю, Сан-Франциско. Но
					нет причин пугаться, международные посылки &#8212; это совсем не
					страшно, не особо трудно и совсем недорого. Кроме того &#8212; и
					вы в своей глуши можете достаться кому-то, так что все честно.</p>
			</div>
			
			<div class="col-12 mt-3 border-top">
				<?= view_cell('\App\Controllers\Home::getStateContent',['state' => $state]) ?>
			</div>
			
			<div class="col-12 mt-3 border-top">
				<h4>Список участников:</h4>
				<div class="row">
					<?php
						if (!count($active_users)) {
							?>
								<div class="col-12">Ещё пока никто не подписался :(</div>
							<?php
						} else { ?>
								<div class="col-12">
									<h5>всего <strong><?=count($active_filled_users);?></strong> <?=$getPlural?> играет в это.</h5>
									<p>Из них - <?=$sent;?> уже отправили, а <?=$received;?> получили подарок.</p>
								</div>
							<?php foreach ($active_filled_users as $i=>$u) {
								?>
								<div class="col-4"><a href="http://www.gwars.ru/info.php?id=<?=$u['id']?>" target="_blank"><h5><?=$u['nickname']?></h5></a></div>
								<?php
							}
						}
					?>
				</div>
			</div>
			
			<div class="col-12 mt-3 border-top mb-5">
				<h4>Вопросы и ответы:</h4>
				<blockquote class="blockquote">
					<p class="mb-0">Какой же это анонимный клуб, если я тут ввожу домашний адрес, имя,
						фамилию и вообще? Чего вы?</p>
					<footer class="blockquote-footer">Если все пойдет по плану - вы получите подарок
						от какого-нибудь &quot;Алексея Новикова из Киева&quot;, а
						отправите, я не знаю, &quot;Егору Мануйлову в город Омск&quot;.
						Это мы и назвали анонимностью. Ну, реально, кто эти люди?
						Мы их не знаем.</footer>
				</blockquote>
				<blockquote class="blockquote">
					<p class="mb-0">А что если зарегистрируется нечетное число участников?</p>
					<footer class="blockquote-footer">Ничего, какая разница? Если три человека, то первый пришлет второму, второй третьему, а третий - первому. Полярность тут пофигу.</footer>
				</blockquote>
			</div>
		</div>
	</div>

	<?php if(!empty($messages_to_grandson)):?>
		<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Переписка с внучеком</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div id="to_grandson_message_list" class="d-flex flex-column">
							<?php foreach ($messages_to_grandson as $msg){?>
							<?php if ($msg['sender']==$user_id):?>
								<div class='alert alert-primary d-flex flex-row' role='alert'><?=$msg['message']?></div>
							<?php else: ?>
								<div class='alert alert-secondary d-flex flex-row-reverse' role='alert'><?=$msg['message']?></div>
							<?php endif; } ?>
						</div>
						<form>
							<input type="hidden" id="to_grandson_sender" value="<?=$user_id?>">
							<input type="hidden" id="to_grandson_receiver" value="<?=$victim['id']?>">
							<div class="form-group">
								<textarea class="form-control" id="to_grandson_message" rows="2" placeholder="Письмо внучеку"></textarea>
								<div class="invalid-feedback">
									Зачастую бывает так, что мы жалеем о сказанном. Такая проблема может возникнуть у любого из нас.
									И слово, сказанное не подумав, может сыграть с нами злую шутку и обернуться против нас же самих.
									Так, что я, лично, полностью вас поддерживаю и уважаю ваш выбор. Но зачем тогда жмакать на отправить??
								</div>
							</div>
							<button class="btn btn-primary btn-block col-12" id="to_grandson_send">Отправить данные на полюс.</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php if(!empty($messages_from_grandpa)):?>
		<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Переписка с дедушкой</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div id="to_grandpa_message_list" class="d-flex flex-column">
							<?php foreach ($messages_from_grandpa as $msg){?>
							<?php if ($msg['sender']==$user_id):?>
								<div class='alert alert-primary d-flex flex-row' role='alert'><?=$msg['message']?></div>
							<?php else: ?>
								<div class='alert alert-secondary d-flex flex-row-reverse' role='alert'><?=$msg['message']?></div>
							<?php endif; } ?>
						</div>
						
						<form>
							<input type="hidden" id="to_grandpa_sender" value="<?=$user_id?>">
							<input type="hidden" id="to_grandpa_receiver" value="<?=$messages_from_grandpa[0]['santa']?>">
							<div class="form-group">
								<textarea class="form-control" id="to_grandpa_message" rows="2" placeholder="Письмо дедушке"></textarea>
								<div class="invalid-feedback">
									Зачастую бывает так, что мы жалеем о сказанном. Такая проблема может возникнуть у любого из нас.
									И слово, сказанное не подумав, может сыграть с нами злую шутку и обернуться против нас же самих.
									Так, что я, лично, полностью вас поддерживаю и уважаю ваш выбор. Но зачем тогда жмакать на отправить??
								</div>
							</div>
							<button class="btn btn-primary btn-block col-12" id="to_grandpa_send">Отправить данные на полюс.</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<script>
		$('#to_grandpa_send').click(function(){
			if (!$('#to_grandpa_message').val()){
				$('#to_grandpa_message').removeClass('is-valid');
				$('#to_grandpa_message').addClass('is-invalid');
			} else {
				$('#to_grandpa_message').removeClass('is-invalid');
				$('#to_grandpa_message').addClass('is-valid');
				$.ajax({
					url: '/test',
					data: {
						sender: $('#to_grandpa_sender').val(),
						message: $('#to_grandpa_message').val(),
						receiver: $('#to_grandpa_receiver').val(),
						santa: $('#to_grandpa_receiver').val(),
						to_grandson_message: false
					},
					success: function (data) {
						$("#to_grandpa_message").val('');
						$("#to_grandpa_message_list").html('');
						$("#to_grandpa_message_list").html(data);
					}
				});
			}
			return false;
		});
		
		$('#to_grandson_send').click(function(){
			if (!$('#to_grandson_message').val()){
				$('#to_grandson_message').removeClass('is-valid');
				$('#to_grandson_message').addClass('is-invalid');
			} else {
				$('#to_grandson_message').removeClass('is-invalid');
				$('#to_grandson_message').addClass('is-valid');
				$.ajax({
					url: '/test',
					data: {
						sender: $('#to_grandson_sender').val(),
						message: $('#to_grandson_message').val(),
						receiver: $('#to_grandson_receiver').val(),
						santa: $('#to_grandson_sender').val(),
						to_grandson_message: true
					},
					success: function (data) {
						$("#to_grandson_message").val('');
						$("#to_grandson_message_list").html('');
						$("#to_grandson_message_list").html(data);
					}
				});
			}
			return false;
		});
	</script>
</body>
</html>