<?php

namespace Tests\Feature;

use Tests\TestCase;

class PanelRoutesTest extends TestCase
{
    public function test_public_root_redirects_to_admin_entry(): void
    {
        $this->get('/')->assertRedirect('/admin');
        $this->get('/admin')->assertRedirect('/login');
        $this->get('/login')->assertOk();
    }

    public function test_template_demo_paths_are_hidden(): void
    {
        foreach ([
            '/orders',
            '/products',
            '/customers',
            '/invoices',
            '/support/tickets',
            '/users',
            '/reports',
            '/roles',
            '/settings',
            '/audit-log',
            '/profile',
            '/ui-kit',
            '/documentation',
            '/register',
            '/index.html',
            '/orders.html',
            '/crud.html',
            '/users.html',
            '/reports.html',
            '/roles.html',
            '/settings.html',
            '/audit.html',
            '/login.html',
            '/register.html',
        ] as $uri) {
            $this->get($uri)->assertNotFound();
        }
    }
}
