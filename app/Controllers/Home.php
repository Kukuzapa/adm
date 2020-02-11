<?php namespace App\Controllers;
	use App\Models\Settings_model;
	use CodeIgniter\HTTP\Response;

	class Home extends BaseController
	{
		public function __construct()
		{
			$this->db = \Config\Database::connect();
			$this->builder = $this->db->table('users');
		}

		private $anonymous = array(
			'id' => 0,
			'nickname' => 'Бендер Родригез',
			'name' => 'Бендер Родригез',
			'address' => 'New New York ;)',
			'email' => '',
			'interests' => 'Сгибать, убивать всех человеков.',
			'received' => 0,
			'sent' => 0,
			'victim' => 0,
			'active' => 0,
			'banned' => 0,
			'postcode' => '',
		);
		
		public function test()
		{
			$msg = $this->db->table('messages');
			
			$sender = !empty($_GET['sender']) ? htmlspecialchars($_GET['sender'], ENT_COMPAT, 'UTF-8') : '';
			$receiver = !empty($_GET['receiver']) ? htmlspecialchars($_GET['receiver'], ENT_COMPAT, 'UTF-8') : '';
			$santa = !empty($_GET['santa']) ? htmlspecialchars($_GET['santa'], ENT_COMPAT, 'UTF-8') : '';
			$message = !empty($_GET['message']) ? htmlspecialchars($_GET['message'], ENT_COMPAT, 'UTF-8') : null;
			
			$data = ['message' => $message, 'sender'  => $sender, 'receiver'  => $receiver, 'santa'=>$santa ];
			$msg->insert($data);
			$html = '';
			
			if (!empty($_GET['to_grandson_message'])){
				$list = $msg->getWhere(['santa'=>$santa])->getResultArray();
				foreach ($list as $lst){
					if ($lst['sender'] == $sender){
						$html = $html . "<div class='alert alert-primary d-flex flex-row' role='alert'>{$lst['message']}</div>";
					} else {
						$html = $html . "<div class='alert alert-secondary d-flex flex-row-reverse' role='alert'>{$lst['message']}</div>";
					}
				}
			} else {
				$list = $msg->getWhere('santa!='.$santa.' and (sender='.$sender.' or receiver='.$receiver.')')->getResultArray();
				foreach ($list as $lst){
					if ($lst['sender'] == $sender){
						$html = $html . "<div class='alert alert-primary d-flex flex-row' role='alert'>{$lst['message']}</div>";
					} else {
						$html = $html . "<div class='alert alert-secondary d-flex flex-row-reverse' role='alert'>{$lst['message']}</div>";
					}
				}
			}
			
			echo $html;
		}
		
		public function send()
		{
			$active_filled_users_white = $this->builder->getWhere('email is not null and active = 1 and black = 0')->getResultArray();
			$victim = [];
			
			$isError = false;
			
			$email = \Config\Services::email();
			
			$config['mailType'] = 'text';
			$config['SMTPHost'] = 'mail.yandex.ru';
			$config['SMTPUser'] = 'something';
			$config['SMTPPass'] = 'something';
			$config['SMTPPort'] = 'something';
			
			$email->initialize($config);
			
			foreach ($active_filled_users_white as $i=>$u) {
				
				if ($u['victim'] > 0) {
					$victim = $this->builder->getWhere(['id'=>$u['victim']])->getRowArray();
					
					$message = "
Привет, ".$u['nickname']."
Бендер прислал тебе письмо!
Путём сложных подсчётов я выбрал тебе внучка (или внучку).
Именно ему (или ей) необходимо отправить подарок в этом году.

Куда: ".$victim['address']."

Кому: ".$victim['name']."

Его пожелания: ".$victim['interests']."

С наилучшими пожеланиями, его королевский ёж, Бендер Родригез.

P.S. Если письмо потеряется, не страшно. Оно всё равно бессмысленно.

Адрес внуковнучки есть на сайте: http://adm.gw-zone.ru

Если что не ясно - спрашивайте на форуме: http://www.ganjawars.ru/messages.php?fid=27&tid=324344";
				} else {
					$victim = $this->anonymous;
				}
				$email->setFrom('something', 'Бендер');
				$email->setTo($u['email']);
				$email->setSubject('АДМ 2020');
				$email->setMessage($message);
				
				if (! $email->send(false))
				{
					$isError = true;
					print_r($email->printDebugger());
				}
			}
			
			if (!$isError) return redirect('/');
		}
		
		public function delete()
		{
			$this->db->table('messages')->truncate();
			
			$this->builder->truncate();

			return redirect('/');
		}
		
		public function calc()
		{
			$active_filled_users_white = $this->builder->getWhere('email is not null and active = 1 and black = 0')->getResultArray();
			$active_filled_users_black = $this->builder->getWhere('email is not null and active = 1 and black = 1')->getResultArray();
			
			$user_ids = array();
			foreach ($active_filled_users_white as $i=>$u) {
				$user_ids[] = $u['id'];
			}
			shuffle($user_ids);
			
			foreach ($active_filled_users_white as $i=>$u) {
				$random_user_id = 0;
				while (($random_user_id == 0) && (count($user_ids) > 0)) {
					if ($user_ids[0] != $u['id']) {
						$random_user_id = array_shift($user_ids);
						$data = [ 'victim' => $random_user_id ];
						$this->builder->where('id', $u['id']);
						$this->builder->update($data);
					}
					else {
						shuffle($user_ids);
					}
				}
			}
			
			$user_ids = array();
			foreach ($active_filled_users_black as $i=>$u) {
				$user_ids[] = $u['id'];
			}
			shuffle($user_ids);
			
			foreach ($active_filled_users_black as $i=>$u) {
				$random_user_id = 0;
				while (($random_user_id == 0) && (count($user_ids) > 0)) {
					if ($user_ids[0] != $u['id']) {
						$random_user_id = array_shift($user_ids);
						$data = [ 'victim' => $random_user_id ];
						$this->builder->where('id', $u['id']);
						$this->builder->update($data);
					}
					else {
						shuffle($user_ids);
					}
				}
			}
			
			return redirect('/');
		}
		
		public function state($state)
		{
			$this->db->query("UPDATE settings SET value={$state} WHERE name='state'");
			return redirect('/');
		}
		
		public function getStateContent($state = 0)
		{
			switch ($state) {
				case 0: return view('stopped');
				case 1: return view('regform');
				case 2: return view('calc');
				case 3: return view('presents');
				default: return view('stopped');
			}
		}
		
		private function getPlural($num, $texts) {
			$n = $num % 100;
			$n1 = $num % 10;
			if ($n > 10 && $n < 20) return $texts[2];
			if ($n1 > 1 && $n1 < 5) return $texts[1];
			if ($n1 == 1) return $texts[0];
			return $texts[2];
		}

		public function logout()
		{
			$session = session();
			$session->destroy();
			return redirect('/');
		}
		
		public function updateUser($id)
		{
			if (!empty($_POST['reg'])) {
				$name = !empty($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_COMPAT, 'UTF-8') : '';
				$email = !empty($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_COMPAT, 'UTF-8') : '';
				$interests = !empty($_POST['interests']) ? htmlspecialchars($_POST['interests'], ENT_COMPAT, 'UTF-8') : '';
				$address = !empty($_POST['address']) ? htmlspecialchars($_POST['address'], ENT_COMPAT, 'UTF-8') : '';
				$data = array( 'name' => $name, 'email' => $email, 'address' => $address, 'interests' => $interests );
				$this->builder->where('id', $id);
				$this->builder->update($data);
			}
			
			if (!empty($_POST['cancel'])) {
				$data = array( 'email' => null, 'address' => null, 'interests' => null );
				$this->builder->where('id', $id);
				$this->builder->update($data);
			}
			
			if (!empty($_POST['change_state'])) {
				$received = isset($_POST['received']) ? 1 : 0;
				$sent = isset($_POST['sent']) ? 1 : 0;
				$postcode = !empty($_POST['postcode']) ? htmlspecialchars($_POST['postcode'], ENT_COMPAT, 'UTF-8') : '';
				$data = array( 'received' => $received, 'sent' => $sent, 'postcode' => $postcode );
				$this->builder->where('id', $id);
				$this->builder->update($data);
			}
			
			$message = !empty($_POST['message']) ? htmlspecialchars($_POST['message'], ENT_COMPAT, 'UTF-8') : null;
			
			
			if (!empty($message)){
				$victim = !empty($_POST['victim']) ? htmlspecialchars($_POST['victim'], ENT_COMPAT, 'UTF-8') : '';
				$user = !empty($_POST['user']) ? htmlspecialchars($_POST['user'], ENT_COMPAT, 'UTF-8') : '';
				$msg = $this->db->table('messages');
				$data = ['message' => $message, 'sender'  => $user, 'receiver'  => $victim, 'santa'=>$user ];
				$msg->insert($data);
			}

			return redirect('/');
		}

		public function index()
		{
			$builder = $this->db->table('users');
			$msg = $this->db->table('messages');
			
			$state = $this->db->query("select value from settings where name = 'state'")->getResult()[0]->value;
			
			$session = session();
			$id     = $session->id;
			$login  = urldecode(iconv("cp1251", "UTF-8", $session->login));
			$secret = $session->secret;
			
			$err = $session->err;
			
			if ($err) $session->destroy();
			
			$checkLogin = ( md5("something".iconv("UTF-8", "cp1251", $login).$id ) == $secret );
			
			$pageData = [];
			$pageData['isAdmin'] = false;
			
			if ($checkLogin) {
				$active = ($state == 1 || $state == 2 || $state == 3)?1:0;
				
				$checkUser = $builder->selectCount('*')->where("id = {$id}")->countAllResults();
				$data = array( 'id' => $id, 'nickname' => $login, 'active' => $active );
				
				if ($checkUser) {
					$builder->where('id', $id);
					$builder->update($data);
				} else {
					$builder->insert($data);
				}
				
				$user = $builder->getWhere(['id'=>$id])->getRowArray();
				$victim = $builder->getWhere(['id'=>$user['victim']])->getRowArray();
				$pageData['victim'] = (empty($victim))?$this->anonymous:$victim;
				$i_victim = $builder->getWhere(['victim'=>$id])->getRowArray();
				$pageData['i_victim'] = (empty($i_victim))?$this->anonymous:$i_victim;
				$pageData['isAdmin'] = (in_array($id, [2337906,16948,104806,2336272,2336535/*,2337105*/]))?true:false;
				$pageData['user'] = $user;
				
				$pageData['messages_to_grandson'] = $msg->getWhere(['santa'=>$id])->getResultArray();
				$pageData['messages_from_grandpa'] = $msg->getWhere('santa!='.$id.' and (sender='.$id.' or receiver='.$id.')')->getResultArray();
			}
			
			$sent = $builder->selectCount('*')->where('sent = 1 and active = 1')->countAllResults();
			$received = $builder->selectCount('*')->where('received = 1 and active = 1')->countAllResults();
			$active_users = $builder->getWhere('active = 1')->getResultArray();
			$active_filled_users = $builder->getWhere('email is not null and active = 1')->getResultArray();

			$pageData['user_id'] = (!empty($id))?$id:0;
			$pageData['state'] = $state;
			$pageData['active_users'] = $active_users;
			$pageData['active_filled_users'] = $active_filled_users;
			$pageData['err'] = $err;
			$pageData['sent'] = $sent;
			$pageData['received'] = $received;
			$pageData['getPlural'] = $this->getPlural($active_users, array('человек', 'человекa', 'человек'));
			
			return view('main',$pageData);
		}
		
		public function login()
		{
		/**
		 * Кросс-серверная авторизация GanjaWars.RU
		 *
		 * Кнопка авторизации ведёт сюда:
		 * http://www.gwars.ru/cross-server-login.php?site_id=11&url=http://login.gw-zone.ru/
		 *
		 * Если ключи сошлись, то вызываем авторизацию юзера, а если нет - ошибка
		 */
			$session = session();
			$user = array();
			
			$site_id = 11;
			$site[11] = "something"; // gw-zone.ru
			
			$sign_received = $_GET['sign'];
			$sign2_received = $_GET['sign2'];
			$user["user_id"] = $_GET['user_id'];
			$user['name'] = $_GET['name'];
			$user["levels"]["fighter"] = $_GET['level'];
			$user["synd"]["main"] = $_GET['synd'];
			
			$isAdmin = (in_array($user["user_id"],[2337906,16948,104806,2336272,2336535,2325790/*,2337105*/]))?true:false;
			// Если вызвали правильно, то проверяем ключи
			if (($user["user_id"] > 0) && ($user["name"] != "") && ($sign_received != "") && ($sign2_received != "")) {
				// Выссчитываем значения ключей
				$sign_string = $site[$site_id] . $user["name"] . $user["user_id"];
				$sign2_string = $site[$site_id] . $user["levels"]["fighter"] . ($user["synd"]["main"] + 0) . $user["user_id"];
				$sign = md5($sign_string);
				$sign2 = md5($sign2_string);
				// Проверяем
				if (($sign == $sign_received) && ($sign2 == $sign2_received)) {
					if ((int)$user["user_id"] > 2390000 && !$isAdmin) {
						$session->set([ 'err' => 3 ]);
						return redirect('/');
					
					} elseif ($user["levels"]["fighter"] < 20 && !$isAdmin) {
						$session->set([ 'err' => 2 ]);
						return redirect('/');
					} else {
						$session->set([
							'id' => $user["user_id"],
							'login' => $user['name'],
							'secret' => $sign
						]);
						return redirect('/');
					}
				} else {
					$session->set([ 'err' => 1 ]);
					return redirect('/');
				}
			}
		}
	}
