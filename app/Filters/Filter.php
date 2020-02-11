<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Filter implements FilterInterface
{
	public function before(RequestInterface $request)
	{
		$session = session();
		$id     = $session->id;
		$login  = urldecode(iconv("cp1251", "UTF-8", $session->login));
		$secret = $session->secret;
		$checkLogin = ( md5("something".iconv("UTF-8", "cp1251", $login).$id ) == $secret );
		$method = $request->uri->getSegment(1);
		$isAdmin = (in_array($id,[2337906,16948,104806,2336272,2336535/*,2337105*/]))?true:false;
		if (!$checkLogin || (in_array($method,['state','calc','send','delete']) && !$isAdmin)) {
			$session->destroy();
			return redirect('/');
		}
	}
	
	//--------------------------------------------------------------------
	
	public function after(RequestInterface $request, ResponseInterface $response)
	{
		// Do something here
	}
}