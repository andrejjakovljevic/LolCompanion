<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterGuest implements FilterInterface
{
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) 
    {
        
    }

    public function before(RequestInterface $request, $arguments = null) 
    {
        $ses = session();
        if ($ses->has('user'))
        {
            return redirect()->to(site_url('LoggedUser'));
        }
    }

}