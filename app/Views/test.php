<!DOCTYPE html>
<html lang="en">
<head>
	<title>GW-Zone.Ru :: Анонимный Дед Мороз</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="игра, онлайн-игра, онлайн, on, line">
	<meta name="description" content="">


	<!-- styles -->
	<link href="/public/bootstrap/css/bootstrap.css?2" rel="stylesheet" type="text/css" media="all">
	<!-- <link href="/public/bootstrap/css/bootstrap-united.css" rel="stylesheet" type="text/css" media="all"> -->
	<link href="/public/bootstrap/css/bootstrap-responsive.css?2" rel="stylesheet">
	<link href="/public/css/main.css?2" rel="stylesheet" type="text/css" media="all">
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<!--[if lt IE 10]>
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxtransport-xdomainrequest/1.0.1/jquery.xdomainrequest.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="/public/bootstrap/js/bootstrap.min.js?2"></script>
	<script type="text/javascript" src="/public/js/common/common.js?2"></script>
</head>

<body>
<!-- navigation bar -->
<div class="navbar navbar-inverse">
	<div class="navbar-inner">
		<div class="container">
			<div class="pull-right"><nobr>Участники: <!--?=count($active_filled_users);?--></nobr></div>

			<div>
                <?php
                
				if (!empty($user_id)) {
					?>
					<a href="http://www.gwars.ru/info.php?id=<?=$user['id'];?>"><b><?=$user['nickname'];?></b></a>
					<a class="btn btn-small btn-success" href='/logout' style="z-index: 111111;">Выйти</a>
					<?php
				}
				else {
					?>
					<button class="btn btn-small btn-success"
                            onClick='document.location="/login"; return false;'>Авторизоваться через Ganjawars</button>
					<?php
					if ($err == 1) {
						echo "<font color='red'><b>Во время авторизации произошла ошибка. Так быть не должно.</b></font>";
					}
					if ($err == 2) {
						echo "<font color='red'><b>Сожалеем, но к акции допускаются игроки, получившие 20 боевой уровень.</b></font>";
					}
					if ($err == 3) {
						echo "<font color='red'><b>Сожалеем, но в акции вы сможете принять участие лишь на будущий год.</b></font>";
					}
					if ($err == 5) {
						echo "<font color='red'><b>Сожалеем, но вы не допущены к участию в акции. Пожалуйста, заполните паспорт в игре и приходите на следующий год.</b></font>";
					}
					?>
					<br/>
					<small>Чтобы авторизоваться тут, нужно авторизоваться в игре.</small>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</div>
<!-- /navigation bar -->

<!-- content -->
<div class="container">

	<h1 class="text-center">Анонимный Дед Мороз - 2019</h1>
	
	<?= view_cell('\App\Controllers\Home::test') ?>
        
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>&nbsp;</td>
			<td width="100%"><div align="left" style="text-align: justify;"><img src="pics/santa.png" width="114" height="165" align="left" style="padding-right: 20px; padding-bottom: 20px;"><br>
					Возможно вы заметили &#8212; под новый год многие сайты каким-то образом
					перекрашиваются, на них вдруг появляются елки, какие-то падающие снежинки,
					веселые деды морозы и подобная фигня. Иногда мы чувствуем себя так, как
					будто одни мы тут до сих пор помним, что новый год &#8212; это подарки,
					сюрпризы, неожиданные вещи и веселье, а не новые гифы и снежинки
					на логотипе. </div>

				<p align="left" style="text-align: justify;">Именно поэтому мы организовали тут Клуб Анонимных Дедов
					Морозов на gw-zone.ru. Суть клуба очень проста &#8212; вы вносите свой почтовый
					адрес, на который вам можно прислать подарок и подтверждаете, что готовы
					отправить кому-то подарок в ответ. Регистрация участников продлится до 1
					декабря. После этого электронно-вычислительная машина перетасовывает адреса,
					и каждому зарегистрированному участнику достается адрес какого-то другого
					человека из интернета, на который он отправит новогодний подарок и постарается
					обрадовать его.</p>
				<table width="100%" border="0" cellspacing="2" cellpadding="2">
					<tr>
						<td width="458" valign="top"><p align="left" style="text-align: justify;">Бюджет подарка мы, конечно,
								никому навязывать не будем, но помните, что вы тоже получите подарок.
								Возможно, от такого же щедрого человека, как вы сами. <br>
								<br>
								В общем, мы предлагаем вам зарегистрироваться тут, а потом отправить
								какую-то приятную безделушку или вообще что угодно какому-то другому
								человеку с сайта, не зная, кто он. А в ответ получить такой же сюрприз,
								и тоже неизвестно от кого. Если не для этого придумали интернет,
								то я даже не знаю, о чем эти военные думали.</p>
							<p align="left">Единственное &#8212; имейте в виду, мы тут собрались
								со всего мира, так что вам может достаться зарегистрированный пользователь
								из Турбокистана, или какого-нибудь, я не знаю, Сан-Франциско. Но
								нет причин пугаться, международные посылки &#8212; это совсем не
								страшно, не особо трудно и совсем недорого. Кроме того &#8212; и
								вы в своей глуши можете достаться кому-то, так что все честно.<br>
							</p>
							<?php
							// Админка
							if (/*in_array($user_id, $admin_ids)*/!empty($isAdmin) && $isAdmin) {
								?>
								<hr/>
								<button onClick='document.location="/?super_state=0"; return false;'>Выключено</button>
								<button onClick='document.location="/?super_state=1"; return false;'>Регистрация</button>
								<button onClick='document.location="/?super_state=2"; return false;'>Считается</button>
								<button onClick='document.location="/?super_state=3"; return false;'>Подарки!</button>
								&nbsp;&nbsp;
								<button onClick='document.location="/?super_calc=yes"; return false;' disabled2="disabled">Перемешать</button>
								<button onClick='document.location="/?super_send=yes"; return false;' disabled2="disabled">Выслать письма</button>
								<button onClick='document.location="/?super_delete=yes"; return false;' disabled2="disabled"><b>Чистка</b></button>
								<hr/>
								<?php
							}
							?>
						</td>
						<td width="20" valign="top"><img src="pics/vline.gif" width="19" height="270"></td>
						<td width="292" valign="top"><span class="greetings"><h4>Расписание:</h4>
            <br>
            С 3 декабря:<br>
            </span><strong>Запись участников</strong><span class="greetings"><br>

            <br>
            9 декабря:<br>
            </span><strong>Конец записи</strong><span class="greetings"><br>
            Каждому участнику выдается один<br>
            случайный адрес другого зарегистрированного<br>
            участника с сайта.<br>

            <br>
            С 9 по 31 декабря:<br>
            </span><strong>Подарки!</strong><span class="greetings"><br>
            <br>
            C 1 Января и пока почта не доставит:<br>
            </span><strong>Ещё подарки!</strong></td>
					</tr>
					</tr>
					</tr>

				</table>

				<br>
				<hr noshade size="1">

				<br>
				<div align="left">
					<table width="100%" border="0" cellspacing="2" cellpadding="2">
						<tr>
							<td width="100%" valign="top">

								<?php
								switch ($state) {
									case 0:
										//include "stopped.php";
                                        ?>
										<?= view_cell('\App\Controllers\Home::test') ?>
                                        <h4>С нетерпением ждём праздника</h4>
                                        <p>Дедушка мороз ещё не оправился от прошлого Нового Года.<br>
                                            Напоминаем, что с 3 декабря откроется форма регистрации и можно будет оставить свой адрес и пожелания вашему АДМ.<br>
                                        </p>
										<?php break;

									case 1:
										include "regform.php";
										break;

									case 2:
										include "calc.php";
										break;

									case 3:
										include "presents.php";
										break;

									default:
										include "stopped.php";
										break;
								}
								?>

								<hr noshade size="1">

								<?php
								if (!count($active_users)) {
									?>
									<h4>Список участников:</h4>
									<br><br>Ещё пока никто не подписался :(
									<?php
								}
								else {
									?>
									<table id="table-stats" cellpadding="0" cellspacing="0">
										<tr>
											<td class="row1" colspan="2">всего <span class="huge"><?=count($active_filled_users);?></span> <?php $getPlural?> играет в это. Из них &mdash;</td>
										</tr>

										<tr>
											<td class="row2"><span class="huge"><?=$sent;?></span><br />уже отправили</td>
											<td class="row2"><span class="huge"><?=$received;?></span><br />получили подарок</td>
										</tr>

									</table>

									<h4>Список участников:</h4>

									<table width="100%" border="0" cellspacing="2" cellpadding="2">
										<?php
										$c = 0;
										foreach ($active_filled_users as $i=>$u) {
											if ((($c+3) % 3) == 0) {
												echo "<tr>";
											}
											echo '<td width="33%" valign="top"><small><a href="http://www.gwars.ru/info.php?id='.$u['id'].'">'.$u['nickname'].'</a></small></td>';
											if ((($c+1) % 3) == 0) {
												echo "</tr>";
											}
											$c++;
										}
										?>
									</table>
									<?php
								}
								?>

								<hr noshade size="1">

								<h4>Вопросы и ответы:</h4>
								<br>
								Какой же это анонимный клуб, если я тут ввожу домашний адрес, имя,
								фамилию и вообще? Чего вы?<br>
								<table width="100%" border="0" cellspacing="3" cellpadding="3">
									<tr>
										<td width="8%">&nbsp;</td>
										<td width="92%"><em>Если все пойдет по плану - вы получите подарок
												от какого-нибудь &quot;Алексея Новикова из Киева&quot;, а
												отправите, я не знаю, &quot;Егору Мануйлову в город Омск&quot;.
												Это мы и назвали анонимностью. Ну, реально, кто эти люди?
												Мы их не знаем. </em></td>

									</tr>
								</table> <br>
								<br>

								А что если к третьему декабря зарегистрируется нечетное число участников?
								<table width="100%" border="0" cellspacing="3" cellpadding="3">
									<tr>
										<td width="8%">&nbsp;</td>
										<td width="92%"><i>Ничего, какая разница? Если три человека, то первый пришлет второму, второй третьему, а третий - первому. Полярность тут пофигу.</i></td>
									</tr>
								</table>
								<br>



							</td>
							<td width="20" valign="top"><img src="pics/vline.gif" width="19" height="400"></td>

							<td width="335" valign="top">


							</td>

						</tr>
					</table>

			<td>&nbsp;</td>
		</tr>
	</table>

	<div class="clearfooter"></div>
</div>

<!--? /*
<div style="display:none;"><script type="text/javascript">(function(w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter666220 = new Ya.Metrika({id:666220, clickmap:true, accurateTrackBounce:true, webvisor:true}); } catch(e) { } }); })(window, "yandex_metrika_callbacks");</script></div><script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript" defer="defer"></script><noscript><div><img src="//mc.yandex.ru/watch/666220" style="position:absolute; left:-9999px;" alt=""/></div></noscript>
<script type="text/javascript">
			var _lsIsLoadGA=(typeof(window._gaq)=='undefined') ? false : true ;

			  var _gaq = _gaq || [];
			  _gaq.push(['lscounter._setAccount', 'UA-28922093-1']);
			  _gaq.push(['lscounter._trackPageview']);

			if (!_lsIsLoadGA) {
			  (function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			  })();
			}
</script>
*/ ?-->

</div>
<!-- /content -->

</body>
</html>