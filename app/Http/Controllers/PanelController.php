<?php

namespace App\Http\Controllers;

use App\Support\PanelData;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class PanelController extends Controller
{
    public function dashboard(): View
    {
        return view('panel.dashboard', [
            'title' => 'Dashboard',
            'subtitle' => 'April 30, 2026, operational overview',
            'searchPlaceholder' => 'Search orders, products, users',
            'metrics' => PanelData::dashboardMetrics(),
            'recentOrders' => PanelData::recentOrders(),
            'chart' => PanelData::revenueChart(),
            'quickActions' => PanelData::quickActions(),
            'timeline' => PanelData::timeline(),
            'donut' => PanelData::dashboardDonut(),
            'sparklines' => PanelData::dashboardSparklines(),
        ]);
    }

    public function orders(): View
    {
        return view('panel.orders', [
            'title' => 'Orders',
            'subtitle' => 'Payment, packing, and fulfillment pipeline',
            'searchPlaceholder' => 'Search orders or customers',
            'metrics' => PanelData::orderMetrics(),
            'orders' => PanelData::orders(),
        ]);
    }

    public function products(): View
    {
        return view('panel.products', [
            'title' => 'Products',
            'subtitle' => 'Catalog, pricing, stock, and publishing',
            'searchPlaceholder' => 'Search SKU or product name',
            'metrics' => PanelData::productMetrics(),
            'products' => PanelData::products(),
        ]);
    }

    public function customers(): View
    {
        return view('panel.customers', [
            'title' => 'Customers',
            'subtitle' => 'CRM, segmentation, account health, and retention pipeline',
            'searchPlaceholder' => 'Search customers, segments, or owners',
            'metrics' => PanelData::customerMetrics(),
            'customers' => PanelData::customers(),
        ]);
    }

    public function invoices(): View
    {
        return view('panel.invoices', [
            'title' => 'Invoices',
            'subtitle' => 'Billing, payment status, and enterprise invoices',
            'searchPlaceholder' => 'Search invoices or customers',
            'metrics' => PanelData::invoiceMetrics(),
            'invoices' => PanelData::invoices(),
        ]);
    }

    public function tickets(): View
    {
        return view('panel.tickets', [
            'title' => 'Support Tickets',
            'subtitle' => 'Support SLAs, issue priority, and team assignments',
            'searchPlaceholder' => 'Search tickets, customers, or owners',
            'metrics' => PanelData::ticketMetrics(),
            'tickets' => PanelData::tickets(),
            'ticketLanes' => PanelData::ticketLanes(),
        ]);
    }

    public function users(): View
    {
        return view('panel.users', [
            'title' => 'Users',
            'subtitle' => 'Accounts, roles, login status, and team access',
            'searchPlaceholder' => 'Search names, emails, roles',
            'metrics' => PanelData::userMetrics(),
            'users' => PanelData::users(),
        ]);
    }

    public function reports(): View
    {
        return view('panel.reports', [
            'title' => 'Reports',
            'subtitle' => 'Revenue, channel, and product performance analytics',
            'searchPlaceholder' => 'Search metrics or reports',
            'metrics' => PanelData::reportMetrics(),
            'chart' => PanelData::channelChart(),
            'funnel' => PanelData::salesFunnel(),
            'topProducts' => PanelData::topProducts(),
        ]);
    }

    public function roles(): View
    {
        return view('panel.roles', [
            'title' => 'Roles',
            'subtitle' => 'Permission matrix for every role',
            'searchPlaceholder' => 'Search roles or permissions',
            'metrics' => PanelData::roleMetrics(),
            'permissions' => PanelData::permissions(),
        ]);
    }

    public function settings(): View
    {
        return view('panel.settings', [
            'title' => 'Settings',
            'subtitle' => 'Application preferences, security, and integrations',
            'searchPlaceholder' => 'Search settings',
        ]);
    }

    public function audit(): View
    {
        return view('panel.audit', [
            'title' => 'Audit Log',
            'subtitle' => 'User, API, and security policy activity trails',
            'searchPlaceholder' => 'Search events or users',
            'events' => PanelData::auditEvents(),
        ]);
    }

    public function profile(): View
    {
        return view('panel.profile', [
            'title' => 'Profile',
            'subtitle' => 'Admin account, activity, security, and access preferences',
            'searchPlaceholder' => 'Search activity or preferences',
            'activities' => PanelData::profileActivities(),
        ]);
    }

    public function uiKit(): View
    {
        return view('panel.ui-kit', [
            'title' => 'UI Kit',
            'subtitle' => 'Core components, states, forms, badges, and reusable patterns',
            'searchPlaceholder' => 'Search components',
            'metrics' => PanelData::dashboardMetrics(),
        ]);
    }

    public function documentation(): View
    {
        return view('panel.documentation', [
            'title' => 'Documentation',
            'subtitle' => 'Installation guide, file structure, customization, and releases',
            'searchPlaceholder' => 'Search documentation',
            'sections' => PanelData::documentationSections(),
        ]);
    }

    public function invoiceDetail(string $id): View
    {
        return view('panel.invoice-detail', [
            'title' => $id,
            'subtitle' => 'Invoice details and payment information',
            'searchPlaceholder' => 'Search invoices',
            'invoice' => PanelData::invoiceDetail($id),
        ]);
    }

    public function kanban(): View
    {
        return view('panel.kanban', [
            'title' => 'Kanban',
            'subtitle' => 'Task board with drag-and-drop lanes',
            'searchPlaceholder' => 'Search tasks',
            'columns' => PanelData::kanbanBoard(),
        ]);
    }

    public function calendar(): View
    {
        $year = 2026;
        $month = 5;
        $firstDay = mktime(0, 0, 0, $month, 1, $year);
        $events = PanelData::calendarEvents();
        $calendarEvents = array_map(function (array $event, int $index) use ($year, $month): array {
            return [
                'id' => 'event-'.$index,
                'title' => $event['title'],
                'start' => sprintf('%d-%02d-%02d', $year, $month, $event['day']),
                'allDay' => true,
                'classNames' => [$event['class']],
                'extendedProps' => [
                    'label' => $event['label'],
                ],
            ];
        }, $events, array_keys($events));

        return view('panel.calendar', [
            'title' => 'Calendar',
            'subtitle' => 'Monthly schedule — May 2026',
            'searchPlaceholder' => 'Search events',
            'initialDate' => date('Y-m-d', $firstDay),
            'monthLabel' => date('F Y', $firstDay),
            'monthShort' => date('M', $firstDay),
            'events' => $events,
            'calendarEvents' => $calendarEvents,
        ]);
    }

    public function forgotPassword(): View
    {
        return view('auth.forgot-password', ['title' => 'Forgot Password']);
    }

    public function resetPassword(): View
    {
        return view('auth.reset-password', ['title' => 'Reset Password']);
    }

    public function error404(): Response
    {
        return response(view('errors.404'), 404);
    }

    public function error500(): Response
    {
        return response(view('errors.500'), 500);
    }

    public function shipments(): View
    {
        return view('panel.shipments', ['title' => 'Shipments', 'subtitle' => 'Track and manage outbound deliveries', 'searchPlaceholder' => 'Search shipments']);
    }

    public function returns(): View
    {
        return view('panel.returns', ['title' => 'Returns', 'subtitle' => 'RMA requests and refund processing', 'searchPlaceholder' => 'Search returns']);
    }

    public function warehouse(): View
    {
        return view('panel.warehouse', ['title' => 'Warehouse', 'subtitle' => 'Stock locations, zones, and inventory health', 'searchPlaceholder' => 'Search warehouse']);
    }

    public function coupons(): View
    {
        return view('panel.coupons', ['title' => 'Coupons', 'subtitle' => 'Promo codes, discounts, and campaign rules', 'searchPlaceholder' => 'Search coupons']);
    }

    public function inbox(): View
    {
        return view('panel.inbox', ['title' => 'Inbox', 'subtitle' => 'Internal messages and customer replies', 'searchPlaceholder' => 'Search inbox']);
    }

    public function chat(): View
    {
        return view('panel.chat', ['title' => 'Chat', 'subtitle' => 'Live support and team conversations', 'searchPlaceholder' => 'Search conversations']);
    }

    public function notifications(): View
    {
        return view('panel.notifications', ['title' => 'Notifications', 'subtitle' => 'Activity alerts and system events', 'searchPlaceholder' => 'Search notifications']);
    }

    public function pricing(): View
    {
        return view('panel.pricing', ['title' => 'Pricing', 'subtitle' => 'Plans, tiers, and subscription options', 'searchPlaceholder' => 'Search plans']);
    }

    public function blank(): View
    {
        return view('panel.blank', ['title' => 'Blank Page', 'subtitle' => 'Starter template for new pages', 'searchPlaceholder' => 'Search']);
    }

    public function comingSoon(): View
    {
        return view('panel.coming-soon', ['title' => 'Coming Soon']);
    }

    public function maintenance(): View
    {
        return view('panel.maintenance', ['title' => 'Maintenance']);
    }

    public function emailVerify(): View
    {
        return view('auth.email-verify', ['title' => 'Verify Email']);
    }

    public function lockScreen(): View
    {
        return view('auth.lock-screen', ['title' => 'Lock Screen']);
    }

    public function ecommerceDetail(int $id): View
    {
        $product = PanelData::storefrontProductDetail($id);

        return view('panel.ecommerce-detail', [
            'title' => $product['name'],
            'subtitle' => $product['category'].' · '.$product['sku'],
            'searchPlaceholder' => 'Search products',
            'product' => $product,
            'related' => collect(PanelData::storefrontProducts())->where('id', '!=', $id)->take(4)->values()->all(),
        ]);
    }

    public function ecommerce(): View
    {
        return view('panel.ecommerce', [
            'title' => 'Shop',
            'subtitle' => 'Browse products, filter by category, and add to cart',
            'searchPlaceholder' => 'Search products, brands, categories',
            'categories' => PanelData::storefrontCategories(),
            'products' => PanelData::storefrontProducts(),
        ]);
    }

    public function twoFactor(): View
    {
        return view('auth.two-factor', ['title' => 'Two-Factor Auth']);
    }

    public function login(): View
    {
        return view('auth.login', ['title' => 'Login']);
    }

    public function register(): View
    {
        return view('auth.register', ['title' => 'Register']);
    }
}
