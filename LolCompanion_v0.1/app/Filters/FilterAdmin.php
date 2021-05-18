<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterAdmin implements FilterInterface
{
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) 
    {
        
    }

    public function before(RequestInterface $request, $arguments = null) 
    {
        $ses = session();
        if (!$ses->has('user'))
        {
            return redirect()->to(site_url('Guest'));
        }
        if ($ses->has('user') && $ses->user->role!=0)
        {
            return redirect()->to(site_url('LoggedUser'));
        }
    }

}
?>