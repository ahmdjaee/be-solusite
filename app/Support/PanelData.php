<?php

namespace App\Support;

class PanelData
{
    public static function navigation(): array
    {
        return [
            'Core' => [
                ['label' => 'Dashboard',     'route' => 'dashboard',  'icon' => 'bi-speedometer2'],
                ['label' => 'Orders',        'route' => 'orders',     'icon' => 'bi-bag-check',        'badge' => '18'],
                ['label' => 'Products',      'route' => 'products',   'icon' => 'bi-box-seam'],
                ['label' => 'Customers',     'route' => 'customers',  'icon' => 'bi-person-lines-fill'],
                ['label' => 'Invoices',      'route' => 'invoices',   'icon' => 'bi-receipt'],
                ['label' => 'Tickets',       'route' => 'tickets',    'icon' => 'bi-life-preserver',   'badge' => '9'],
                ['label' => 'Reports',       'route' => 'reports',    'icon' => 'bi-bar-chart'],
            ],
            'Operations' => [
                ['label' => 'Shipments',     'route' => 'shipments',  'icon' => 'bi-truck'],
                ['label' => 'Returns',       'route' => 'returns',    'icon' => 'bi-arrow-return-left'],
                ['label' => 'Warehouse',     'route' => 'warehouse',  'icon' => 'bi-building'],
                ['label' => 'Coupons',       'route' => 'coupons',    'icon' => 'bi-tags'],
            ],
            'Communication' => [
                ['label' => 'Inbox',         'route' => 'inbox',          'icon' => 'bi-envelope',     'badge' => '5'],
                ['label' => 'Chat',          'route' => 'chat',           'icon' => 'bi-chat-dots'],
                ['label' => 'Notifications', 'route' => 'notifications',  'icon' => 'bi-bell'],
            ],
            'Admin' => [
                ['label' => 'Users',         'route' => 'users',      'icon' => 'bi-people'],
                ['label' => 'Roles',         'route' => 'roles',      'icon' => 'bi-shield-lock'],
                ['label' => 'Settings',      'route' => 'settings',   'icon' => 'bi-gear'],
                ['label' => 'Audit Log',     'route' => 'audit',      'icon' => 'bi-clock-history'],
            ],
            'Workspace' => [
                ['label' => 'Kanban',        'route' => 'kanban',     'icon' => 'bi-kanban'],
                ['label' => 'Calendar',      'route' => 'calendar',   'icon' => 'bi-calendar3'],
            ],
            'Pages' => [
                ['label' => 'Pricing',       'route' => 'pricing',    'icon' => 'bi-credit-card'],
                ['label' => 'Blank',         'route' => 'blank',      'icon' => 'bi-file-earmark'],
                ['label' => 'Coming Soon',   'route' => 'coming-soon', 'icon' => 'bi-hourglass-split'],
                ['label' => 'Maintenance',   'route' => 'maintenance', 'icon' => 'bi-tools'],
                ['label' => 'Error 404',     'route' => 'error.404',  'icon' => 'bi-exclamation-diamond'],
                ['label' => 'Error 500',     'route' => 'error.500',  'icon' => 'bi-bug'],
            ],
            'Auth' => [
                ['label' => 'Login',         'route' => 'login',         'icon' => 'bi-box-arrow-in-right'],
                ['label' => 'Register',      'route' => 'register',      'icon' => 'bi-person-plus'],
                ['label' => 'Forgot Password', 'route' => 'forgot-password', 'icon' => 'bi-key'],
                ['label' => 'Reset Password', 'route' => 'reset-password', 'icon' => 'bi-lock-fill'],
                ['label' => 'Email Verify',  'route' => 'email-verify',  'icon' => 'bi-envelope-check'],
                ['label' => 'Lock Screen',   'route' => 'lock-screen',   'icon' => 'bi-lock'],
                ['label' => 'Two Factor',    'route' => 'two-factor',    'icon' => 'bi-shield-check'],
            ],
            'Template' => [
                ['label' => 'Profile',       'route' => 'profile',    'icon' => 'bi-person-circle'],
                ['label' => 'E-Commerce',    'route' => 'ecommerce',  'icon' => 'bi-shop'],
                ['label' => 'UI Kit',        'route' => 'ui-kit',     'icon' => 'bi-palette'],
                ['label' => 'Documentation', 'route' => 'documentation', 'icon' => 'bi-journal-code'],
            ],
        ];
    }

    public static function dashboardMetrics(): array
    {
        return [
            ['label' => 'Orders Today', 'value' => '1,248', 'description' => '184 orders ready to ship', 'icon' => 'bi-bag-check', 'trend' => '12.4%', 'trend_icon' => 'bi-arrow-up'],
            ['label' => 'Revenue', 'value' => '$642K', 'description' => 'Gross sales this month', 'icon' => 'bi-cash-stack', 'tone' => 'success', 'trend' => '8.7%', 'trend_icon' => 'bi-arrow-up'],
            ['label' => 'Low Stock', 'value' => '27', 'description' => 'Needs restock this week', 'icon' => 'bi-box2-heart', 'tone' => 'warning', 'trend' => '3.1%', 'trend_icon' => 'bi-arrow-down', 'trend_tone' => 'down'],
            ['label' => 'Support SLA', 'value' => '38m', 'description' => 'Average response time', 'icon' => 'bi-headset', 'tone' => 'danger', 'trend' => '94%', 'trend_icon' => 'bi-check2'],
        ];
    }

    public static function orderMetrics(): array
    {
        return [
            ['label' => 'New Orders', 'value' => '184', 'description' => 'Today'],
            ['label' => 'Paid', 'value' => '126', 'description' => 'Ready to process', 'tone' => 'success'],
            ['label' => 'Packed', 'value' => '42', 'description' => 'Waiting for pickup', 'tone' => 'warning'],
            ['label' => 'On Hold', 'value' => '16', 'description' => 'Needs review', 'tone' => 'danger'],
        ];
    }

    public static function productMetrics(): array
    {
        return [
            ['label' => 'Total SKUs', 'value' => '2,418', 'description' => '148 new products this month'],
            ['label' => 'Active Products', 'value' => '1,902', 'description' => '78.6% of the catalog', 'tone' => 'success'],
            ['label' => 'Low Stock', 'value' => '27', 'description' => 'Supplier PO needed', 'tone' => 'warning'],
            ['label' => 'Draft Review', 'value' => '14', 'description' => 'Waiting for content approval', 'tone' => 'danger'],
        ];
    }

    public static function userMetrics(): array
    {
        return [
            ['label' => 'Total Users', 'value' => '842', 'description' => '42 active today'],
            ['label' => 'Verified', 'value' => '796', 'description' => 'Email and MFA completed', 'tone' => 'success'],
            ['label' => 'Pending Invites', 'value' => '18', 'description' => 'Invitations not accepted yet', 'tone' => 'warning'],
            ['label' => 'Locked', 'value' => '4', 'description' => 'Needs security review', 'tone' => 'danger'],
        ];
    }

    public static function customerMetrics(): array
    {
        return [
            ['label' => 'Active Accounts', 'value' => '3,284', 'description' => '184 enterprise accounts'],
            ['label' => 'Retention', 'value' => '91.6%', 'description' => 'Up 4.2% this quarter', 'tone' => 'success'],
            ['label' => 'At Risk', 'value' => '37', 'description' => 'Needs CSM follow-up', 'tone' => 'warning'],
            ['label' => 'Churned', 'value' => '12', 'description' => 'Last 30 days', 'tone' => 'danger'],
        ];
    }

    public static function invoiceMetrics(): array
    {
        return [
            ['label' => 'Outstanding', 'value' => '$218K', 'description' => '32 unpaid invoices'],
            ['label' => 'Paid This Month', 'value' => '$642K', 'description' => 'From 418 invoices', 'tone' => 'success'],
            ['label' => 'Due Soon', 'value' => '19', 'description' => 'Due within 7 days', 'tone' => 'warning'],
            ['label' => 'Overdue', 'value' => '6', 'description' => 'Needs escalation', 'tone' => 'danger'],
        ];
    }

    public static function ticketMetrics(): array
    {
        return [
            ['label' => 'Open Tickets', 'value' => '128', 'description' => '9 high priority'],
            ['label' => 'Resolved', 'value' => '486', 'description' => 'Last 30 days', 'tone' => 'success'],
            ['label' => 'SLA Watch', 'value' => '14', 'description' => 'Close to breach', 'tone' => 'warning'],
            ['label' => 'Escalated', 'value' => '5', 'description' => 'Engineering review', 'tone' => 'danger'],
        ];
    }

    public static function reportMetrics(): array
    {
        return [
            ['label' => 'Conversion Rate', 'value' => '7.8%', 'description' => 'Up 1.2% from last week'],
            ['label' => 'Average Order', 'value' => '$318', 'description' => 'Average transaction value', 'tone' => 'success'],
            ['label' => 'Refund Rate', 'value' => '1.1%', 'description' => 'Stable over 30 days', 'tone' => 'warning'],
            ['label' => 'Cart Drop', 'value' => '14%', 'description' => 'Down 2.8% after campaign', 'tone' => 'danger'],
        ];
    }

    public static function roleMetrics(): array
    {
        return [
            ['label' => 'Roles', 'value' => '8', 'description' => 'Active in workspace'],
            ['label' => 'Permissions', 'value' => '64', 'description' => 'Modules and actions', 'tone' => 'success'],
            ['label' => 'Policy Review', 'value' => '3', 'description' => 'Needs approval', 'tone' => 'warning'],
        ];
    }

    public static function storefrontProductDetail(int $id): array
    {
        $base = collect(self::storefrontProducts())->firstWhere('id', $id) ?? self::storefrontProducts()[0];

        $reviewCount = $base['reviews'];

        return array_merge($base, [
            'sku' => 'SKU-'.str_pad($base['id'], 5, '0', STR_PAD_LEFT),
            'review_count' => $reviewCount,
            'description' => 'Crafted for everyday performance and long-lasting comfort, the '.$base['name'].' combines premium materials with intuitive design. Engineered to meet the demands of modern lifestyles, this product delivers outstanding value and exceptional build quality that stands the test of time.',
            'highlights' => [
                'Premium-grade materials for long-lasting durability',
                'Ergonomic design optimised for daily use',
                'Compatibility with major ecosystems and platforms',
                '12-month manufacturer warranty included',
                'Carbon-neutral packaging and shipping',
            ],
            'specs' => [
                ['label' => 'SKU',       'value' => 'SKU-'.str_pad($base['id'], 5, '0', STR_PAD_LEFT)],
                ['label' => 'Weight',    'value' => '320 g'],
                ['label' => 'Warranty',  'value' => '12 months'],
                ['label' => 'Origin',    'value' => 'Singapore'],
                ['label' => 'Material',  'value' => 'Recycled aluminium / ABS'],
                ['label' => 'In Box',    'value' => '1× Product, 1× Manual, 1× Cable'],
            ],
            'colors' => ['#1e293b', '#2563eb', '#7c3aed', '#059669', '#dc2626'],
            'sizes' => ['XS', 'S', 'M', 'L', 'XL'],
            'stock_qty' => 214,
            'sold' => $base['reviews'],
            'shipping' => 'Free standard shipping · Arrives in 3–5 business days',
            'returns' => '30-day hassle-free returns',
            'reviews' => [
                ['author' => 'Jordan M.',  'rating' => 5, 'date' => 'May 28, 2026', 'verified' => true,  'title' => 'Exactly what I needed',         'body' => 'Surpassed all my expectations. The build quality is exceptional and it arrived well-packaged. Would absolutely buy again.'],
                ['author' => 'Priya S.',   'rating' => 4, 'date' => 'May 14, 2026', 'verified' => true,  'title' => 'Great product, minor gripes',    'body' => 'Works perfectly for my use case. Setup was straightforward and performance is solid. Docking off one star for the manual being hard to follow.'],
                ['author' => 'Tomas K.',  'rating' => 5, 'date' => 'Apr 30, 2026', 'verified' => false, 'title' => 'Best purchase this year',       'body' => 'I researched this category for weeks and this came out on top in every test I ran. Premium feel, zero complaints so far.'],
                ['author' => 'Aiko N.',   'rating' => 4, 'date' => 'Apr 12, 2026', 'verified' => true,  'title' => 'Solid, does the job',           'body' => 'Good quality. Delivery was fast. The colour matched the photos exactly which I always appreciate.'],
                ['author' => 'Marcus B.', 'rating' => 3, 'date' => 'Mar 25, 2026', 'verified' => true,  'title' => 'Decent but not perfect',        'body' => "Works as described. I had slightly higher expectations given the price point but it's a fair deal overall."],
            ],
            'rating_breakdown' => [5 => 68, 4 => 20, 3 => 7, 2 => 3, 1 => 2],
        ]);
    }

    public static function storefrontCategories(): array
    {
        return [
            ['label' => 'All',           'count' => 248, 'icon' => 'bi-grid-3x3-gap'],
            ['label' => 'Electronics',   'count' => 84,  'icon' => 'bi-cpu'],
            ['label' => 'Apparel',       'count' => 62,  'icon' => 'bi-bag'],
            ['label' => 'Home & Living', 'count' => 48,  'icon' => 'bi-house'],
            ['label' => 'Beauty',        'count' => 32,  'icon' => 'bi-stars'],
            ['label' => 'Sports',        'count' => 22,  'icon' => 'bi-trophy'],
        ];
    }

    public static function storefrontProducts(): array
    {
        return [
            ['id' => 1, 'name' => 'Wireless Pro Earbuds X3',      'category' => 'Electronics',   'price' => 99.99,  'old_price' => 129.99, 'rating' => 4.8, 'reviews' => 1842, 'badge' => 'Bestseller', 'badge_tone' => 'primary', 'icon' => 'bi-headphones',        'bg' => '#eff6ff', 'color' => '#2563eb'],
            ['id' => 2, 'name' => 'Smart Watch Series 7',          'category' => 'Electronics',   'price' => 249.00, 'old_price' => null,   'rating' => 4.6, 'reviews' => 924,  'badge' => 'New',        'badge_tone' => 'success', 'icon' => 'bi-smartwatch',        'bg' => '#1e293b', 'color' => '#e2e8f0'],
            ['id' => 3, 'name' => 'Portable Bluetooth Speaker',    'category' => 'Electronics',   'price' => 59.99,  'old_price' => 79.99,  'rating' => 4.5, 'reviews' => 612,  'badge' => '',           'badge_tone' => '',        'icon' => 'bi-speaker-fill',      'bg' => '#f5f3ff', 'color' => '#7c3aed'],
            ['id' => 4, 'name' => 'UltraSlim Laptop Stand',        'category' => 'Electronics',   'price' => 79.99,  'old_price' => null,   'rating' => 4.7, 'reviews' => 1204, 'badge' => '',           'badge_tone' => '',        'icon' => 'bi-laptop',            'bg' => '#ecfeff', 'color' => '#0891b2'],
            ['id' => 5, 'name' => 'Wireless Charging Pad',         'category' => 'Electronics',   'price' => 39.99,  'old_price' => 49.99,  'rating' => 4.3, 'reviews' => 831,  'badge' => '',           'badge_tone' => '',        'icon' => 'bi-lightning-charge',  'bg' => '#eff6ff', 'color' => '#3b82f6'],
            ['id' => 6, 'name' => 'Merino Wool Crew Sweater',      'category' => 'Apparel',       'price' => 79.99,  'old_price' => 109.99, 'rating' => 4.6, 'reviews' => 986,  'badge' => 'Sale',       'badge_tone' => 'danger',  'icon' => 'bi-badge-vo',          'bg' => '#f0fdf4', 'color' => '#059669'],
            ['id' => 7, 'name' => 'Classic Denim Jacket',          'category' => 'Apparel',       'price' => 119.00, 'old_price' => null,   'rating' => 4.4, 'reviews' => 578,  'badge' => '',           'badge_tone' => '',        'icon' => 'bi-bag-heart',         'bg' => '#eff6ff', 'color' => '#1d4ed8'],
            ['id' => 8, 'name' => 'Running Compression Socks',     'category' => 'Sports',        'price' => 24.99,  'old_price' => null,   'rating' => 4.3, 'reviews' => 588,  'badge' => 'Low Stock',  'badge_tone' => 'warning', 'icon' => 'bi-person-walking',    'bg' => '#fff1f2', 'color' => '#dc2626'],
            ['id' => 9, 'name' => 'Aromatherapy Diffuser Set',     'category' => 'Home & Living', 'price' => 69.99,  'old_price' => 89.99,  'rating' => 4.5, 'reviews' => 874,  'badge' => 'Sale',       'badge_tone' => 'danger',  'icon' => 'bi-flower1',           'bg' => '#fffbeb', 'color' => '#d97706'],
            ['id' => 10, 'name' => 'Bamboo Cutting Board Set',      'category' => 'Home & Living', 'price' => 59.99,  'old_price' => null,   'rating' => 4.4, 'reviews' => 612,  'badge' => '',           'badge_tone' => '',        'icon' => 'bi-house-heart',       'bg' => '#f7fee7', 'color' => '#65a30d'],
            ['id' => 11, 'name' => 'Minimalist LED Desk Lamp',      'category' => 'Home & Living', 'price' => 89.99,  'old_price' => 119.99, 'rating' => 4.6, 'reviews' => 512,  'badge' => 'Sale',       'badge_tone' => 'danger',  'icon' => 'bi-lightbulb',         'bg' => '#fefce8', 'color' => '#ca8a04'],
            ['id' => 12, 'name' => 'Vitamin C Serum 30ml',          'category' => 'Beauty',        'price' => 69.99,  'old_price' => null,   'rating' => 4.7, 'reviews' => 698,  'badge' => 'Bestseller', 'badge_tone' => 'primary', 'icon' => 'bi-droplet-fill',      'bg' => '#fdf2f8', 'color' => '#db2777'],
            ['id' => 13, 'name' => 'Hyaluronic Acid Moisturizer',   'category' => 'Beauty',        'price' => 49.99,  'old_price' => 59.99,  'rating' => 4.5, 'reviews' => 445,  'badge' => '',           'badge_tone' => '',        'icon' => 'bi-droplet',           'bg' => '#fdf4ff', 'color' => '#9333ea'],
            ['id' => 14, 'name' => 'Smart Water Bottle 1L',         'category' => 'Sports',        'price' => 69.99,  'old_price' => 89.99,  'rating' => 4.5, 'reviews' => 762,  'badge' => 'Sale',       'badge_tone' => 'danger',  'icon' => 'bi-cup-straw',         'bg' => '#ecfdf5', 'color' => '#10b981'],
            ['id' => 15, 'name' => 'Yoga Mat Premium 6mm',          'category' => 'Sports',        'price' => 49.99,  'old_price' => null,   'rating' => 4.6, 'reviews' => 389,  'badge' => 'New',        'badge_tone' => 'success', 'icon' => 'bi-heart-pulse',       'bg' => '#fef9c3', 'color' => '#a16207'],
            ['id' => 16, 'name' => 'Scented Soy Wax Candle Set',    'category' => 'Home & Living', 'price' => 34.99,  'old_price' => null,   'rating' => 4.8, 'reviews' => 1026, 'badge' => 'Bestseller', 'badge_tone' => 'primary', 'icon' => 'bi-fire',              'bg' => '#fff7ed', 'color' => '#ea580c'],
        ];
    }

    public static function ecommerceMetrics(): array
    {
        return [
            ['label' => 'Gross Revenue',     'value' => '$1.28M',  'description' => '+18.4% vs last month',     'icon' => 'bi-cash-stack',        'tone' => ''],
            ['label' => 'Total Orders',       'value' => '8,492',   'description' => '184 orders today',         'icon' => 'bi-bag-check',         'tone' => ''],
            ['label' => 'Active Customers',   'value' => '3,284',   'description' => '412 new this month',       'icon' => 'bi-people',            'tone' => 'success'],
            ['label' => 'Conversion Rate',    'value' => '3.8%',    'description' => '+0.6% from last month',    'icon' => 'bi-funnel',            'tone' => 'success'],
            ['label' => 'Avg. Order Value',   'value' => '$156',    'description' => 'Up from $141 last month',  'icon' => 'bi-receipt',           'tone' => 'warning'],
            ['label' => 'Return Rate',        'value' => '2.4%',    'description' => 'Below 3% target',          'icon' => 'bi-arrow-return-left', 'tone' => 'warning'],
        ];
    }

    public static function ecommerceChart(): array
    {
        return [
            'title' => 'Sales Trend',
            'subtitle' => 'Monthly GMV over the last 12 months',
            'type' => 'bar',
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'datasets' => [
                ['label' => 'GMV ($K)', 'data' => [88, 104, 96, 122, 118, 143, 132, 168, 151, 179, 162, 195], 'gradient' => true],
            ],
        ];
    }

    public static function ecommerceCategoryChart(): array
    {
        return [
            'type' => 'doughnut',
            'labels' => ['Electronics', 'Apparel', 'Home & Living', 'Beauty', 'Sports', 'Others'],
            'datasets' => [[
                'data' => [34, 22, 18, 12, 9, 5],
                'colors' => ['#2563eb', '#8b5cf6', '#06b6d4', '#f59e0b', '#22c55e', '#94a3b8'],
            ]],
            'legend' => true,
        ];
    }

    public static function ecommerceTopProducts(): array
    {
        return [
            ['rank' => 1, 'name' => 'Wireless Pro Earbuds X3',   'category' => 'Electronics', 'sold' => 1842, 'revenue' => '$184,200', 'stock' => 214, 'stock_pct' => 72, 'trend' => 'up'],
            ['rank' => 2, 'name' => 'UltraSlim Laptop Stand',    'category' => 'Accessories', 'sold' => 1204, 'revenue' => '$96,320',  'stock' => 88,  'stock_pct' => 29, 'trend' => 'up'],
            ['rank' => 3, 'name' => 'Merino Wool Crew Sweater',  'category' => 'Apparel',     'sold' => 986,  'revenue' => '$78,880',  'stock' => 312, 'stock_pct' => 85, 'trend' => 'up'],
            ['rank' => 4, 'name' => 'Aromatherapy Diffuser Set', 'category' => 'Home & Living', 'sold' => 874, 'revenue' => '$61,180',  'stock' => 56,  'stock_pct' => 18, 'trend' => 'down'],
            ['rank' => 5, 'name' => 'Smart Water Bottle 1L',     'category' => 'Sports',      'sold' => 762,  'revenue' => '$53,340',  'stock' => 490, 'stock_pct' => 92, 'trend' => 'up'],
            ['rank' => 6, 'name' => 'Vitamin C Serum 30ml',      'category' => 'Beauty',      'sold' => 698,  'revenue' => '$48,860',  'stock' => 145, 'stock_pct' => 48, 'trend' => 'up'],
            ['rank' => 7, 'name' => 'Bamboo Cutting Board Set',  'category' => 'Home & Living', 'sold' => 612, 'revenue' => '$36,720',  'stock' => 230, 'stock_pct' => 64, 'trend' => 'down'],
            ['rank' => 8, 'name' => 'Running Compression Socks', 'category' => 'Sports',      'sold' => 588,  'revenue' => '$29,400',  'stock' => 18,  'stock_pct' => 6,  'trend' => 'up'],
        ];
    }

    public static function ecommerceActivity(): array
    {
        return [
            ['icon' => 'bi-bag-check',        'title' => 'Order ORD-20952 placed',    'desc' => 'PT Nusantara Retail · $2,480',    'time' => '2 min ago',   'tone' => 'success'],
            ['icon' => 'bi-credit-card',       'title' => 'Payment captured',          'desc' => 'INV-2026-0511 · $1,200',          'time' => '8 min ago',   'tone' => ''],
            ['icon' => 'bi-arrow-return-left', 'title' => 'Return requested',          'desc' => 'ORD-20948 · Earbuds X3',          'time' => '22 min ago',  'tone' => 'warning'],
            ['icon' => 'bi-truck',             'title' => 'Shipment dispatched',        'desc' => 'ORD-20940 via JNE Express',       'time' => '41 min ago',  'tone' => ''],
            ['icon' => 'bi-star-fill',         'title' => 'New review — 5★',           'desc' => 'Merino Wool Sweater · Andy R.',   'time' => '1 hr ago',    'tone' => 'success'],
            ['icon' => 'bi-person-plus',       'title' => 'New customer registered',   'desc' => 'CV Maju Bersama Tbk.',            'time' => '2 hr ago',    'tone' => ''],
            ['icon' => 'bi-exclamation-triangle', 'title' => 'Chargeback alert',        'desc' => 'ORD-20921 · $318 disputed',       'time' => '3 hr ago',    'tone' => 'danger'],
        ];
    }

    public static function ecommerceStockAlerts(): array
    {
        return [
            ['name' => 'Running Compression Socks', 'stock' => 18,  'pct' => 6,  'tone' => 'danger'],
            ['name' => 'Aromatherapy Diffuser Set',  'stock' => 56,  'pct' => 18, 'tone' => 'danger'],
            ['name' => 'UltraSlim Laptop Stand',     'stock' => 88,  'pct' => 29, 'tone' => 'warning'],
            ['name' => 'Vitamin C Serum 30ml',       'stock' => 145, 'pct' => 48, 'tone' => 'warning'],
        ];
    }

    public static function ecommerceChannels(): array
    {
        return [
            ['label' => 'Website',     'pct' => 48, 'revenue' => '$614K'],
            ['label' => 'Marketplace', 'pct' => 32, 'revenue' => '$410K'],
            ['label' => 'Retail',      'pct' => 12, 'revenue' => '$154K'],
            ['label' => 'Wholesale',   'pct' => 8,  'revenue' => '$102K'],
        ];
    }

    public static function orders(): array
    {
        return [
            ['id' => '#ORD-12091', 'date' => 'Apr 30, 2026 10:42', 'customer' => 'Nadia Putri',    'channel' => 'Website',     'status' => 'Paid',     'badge' => 'success', 'payment' => 'BCA VA',       'courier' => 'JNE REG',      'total' => '$1,240', 'owner' => 'Sinta', 'avatar' => 'SN'],
            ['id' => '#ORD-12090', 'date' => 'Apr 30, 2026 09:58', 'customer' => 'Sagara Ltd.',    'channel' => 'Marketplace', 'status' => 'Packed',   'badge' => 'warning', 'payment' => 'Transfer',     'courier' => 'SiCepat',      'total' => '$8,920', 'owner' => 'Andy',  'avatar' => 'AR'],
            ['id' => '#ORD-12089', 'date' => 'Apr 29, 2026 18:24', 'customer' => 'Laras W.',       'channel' => 'Retail',      'status' => 'Shipped',  'badge' => 'info',    'payment' => 'QRIS',         'courier' => 'Instant',      'total' => '$540',   'owner' => 'Lia',   'avatar' => 'LM'],
            ['id' => '#ORD-12088', 'date' => 'Apr 29, 2026 16:10', 'customer' => 'Mandiri Co.',    'channel' => 'Website',     'status' => 'Hold',     'badge' => 'danger',  'payment' => 'Invoice',      'courier' => 'JNE Trucking', 'total' => '$3,150', 'owner' => 'Budi',  'avatar' => 'BP'],
            ['id' => '#ORD-12087', 'date' => 'Apr 28, 2026 13:47', 'customer' => 'Rafi Ahmad',     'channel' => 'Marketplace', 'status' => 'Paid',     'badge' => 'success', 'payment' => 'Wallet',       'courier' => 'SiCepat',      'total' => '$730',   'owner' => 'Sinta', 'avatar' => 'SN'],
            ['id' => '#ORD-12086', 'date' => 'Apr 28, 2026 11:05', 'customer' => 'Dea Permata',    'channel' => 'Website',     'status' => 'Packed',   'badge' => 'warning', 'payment' => 'Card',         'courier' => 'JNE YES',      'total' => '$2,180', 'owner' => 'Andy',  'avatar' => 'AR'],
            ['id' => '#ORD-12085', 'date' => 'Apr 27, 2026 17:30', 'customer' => 'Toko Maju',      'channel' => 'Wholesale',   'status' => 'Paid',     'badge' => 'success', 'payment' => 'Transfer',     'courier' => 'JNE REG',      'total' => '$5,600', 'owner' => 'Lia',   'avatar' => 'LM'],
            ['id' => '#ORD-12084', 'date' => 'Apr 27, 2026 14:18', 'customer' => 'Rina Sari',      'channel' => 'Website',     'status' => 'Shipped',  'badge' => 'info',    'payment' => 'QRIS',         'courier' => 'SiCepat',      'total' => '$890',   'owner' => 'Sinta', 'avatar' => 'SN'],
            ['id' => '#ORD-12083', 'date' => 'Apr 26, 2026 11:55', 'customer' => 'Global Mart',    'channel' => 'Marketplace', 'status' => 'Hold',     'badge' => 'danger',  'payment' => 'Invoice',      'courier' => 'JNE Trucking', 'total' => '$4,320', 'owner' => 'Budi',  'avatar' => 'BP'],
            ['id' => '#ORD-12082', 'date' => 'Apr 26, 2026 09:22', 'customer' => 'Farhan Dwi',     'channel' => 'Website',     'status' => 'Paid',     'badge' => 'success', 'payment' => 'Card',         'courier' => 'JNE YES',      'total' => '$1,750', 'owner' => 'Andy',  'avatar' => 'AR'],
            ['id' => '#ORD-12081', 'date' => 'Apr 25, 2026 16:44', 'customer' => 'Serba Ada',      'channel' => 'Retail',      'status' => 'Delivered', 'badge' => 'success', 'payment' => 'Cash',         'courier' => 'Instant',      'total' => '$670',   'owner' => 'Lia',   'avatar' => 'LM'],
            ['id' => '#ORD-12080', 'date' => 'Apr 25, 2026 13:07', 'customer' => 'Yuni Lestari',   'channel' => 'Marketplace', 'status' => 'Packed',   'badge' => 'warning', 'payment' => 'Wallet',       'courier' => 'SiCepat',      'total' => '$2,950', 'owner' => 'Sinta', 'avatar' => 'SN'],
            ['id' => '#ORD-12079', 'date' => 'Apr 24, 2026 10:33', 'customer' => 'Barata Group',   'channel' => 'Wholesale',   'status' => 'Paid',     'badge' => 'success', 'payment' => 'Transfer',     'courier' => 'JNE Trucking', 'total' => '$9,840', 'owner' => 'Budi',  'avatar' => 'BP'],
            ['id' => '#ORD-12078', 'date' => 'Apr 24, 2026 08:15', 'customer' => 'Mega Shoppers',  'channel' => 'Website',     'status' => 'Cancelled', 'badge' => 'danger',  'payment' => 'BCA VA',       'courier' => '—',            'total' => '$1,120', 'owner' => 'Andy',  'avatar' => 'AR'],
            ['id' => '#ORD-12077', 'date' => 'Apr 23, 2026 19:50', 'customer' => 'Siti Hartini',   'channel' => 'Retail',      'status' => 'Delivered', 'badge' => 'success', 'payment' => 'Cash',         'courier' => 'Instant',      'total' => '$430',   'owner' => 'Lia',   'avatar' => 'LM'],
            ['id' => '#ORD-12076', 'date' => 'Apr 23, 2026 14:29', 'customer' => 'Prima Store',    'channel' => 'Marketplace', 'status' => 'Shipped',  'badge' => 'info',    'payment' => 'QRIS',         'courier' => 'SiCepat',      'total' => '$3,780', 'owner' => 'Sinta', 'avatar' => 'SN'],
            ['id' => '#ORD-12075', 'date' => 'Apr 22, 2026 11:10', 'customer' => 'Hendra Jaya',    'channel' => 'Website',     'status' => 'Paid',     'badge' => 'success', 'payment' => 'Card',         'courier' => 'JNE REG',      'total' => '$2,560', 'owner' => 'Budi',  'avatar' => 'BP'],
            ['id' => '#ORD-12074', 'date' => 'Apr 22, 2026 08:48', 'customer' => 'Kartika Corp.',  'channel' => 'Wholesale',   'status' => 'Packed',   'badge' => 'warning', 'payment' => 'Invoice',      'courier' => 'JNE Trucking', 'total' => '$7,200', 'owner' => 'Andy',  'avatar' => 'AR'],
            ['id' => '#ORD-12073', 'date' => 'Apr 21, 2026 17:02', 'customer' => 'Wira Usaha',     'channel' => 'Retail',      'status' => 'Delivered', 'badge' => 'success', 'payment' => 'Cash',         'courier' => 'Instant',      'total' => '$310',   'owner' => 'Lia',   'avatar' => 'LM'],
            ['id' => '#ORD-12072', 'date' => 'Apr 21, 2026 13:25', 'customer' => 'Cahya Digital',  'channel' => 'Website',     'status' => 'Hold',     'badge' => 'danger',  'payment' => 'BCA VA',       'courier' => 'JNE YES',      'total' => '$980',   'owner' => 'Sinta', 'avatar' => 'SN'],
            ['id' => '#ORD-12071', 'date' => 'Apr 20, 2026 10:14', 'customer' => 'Lintas Mart',    'channel' => 'Marketplace', 'status' => 'Paid',     'badge' => 'success', 'payment' => 'Wallet',       'courier' => 'SiCepat',      'total' => '$1,640', 'owner' => 'Budi',  'avatar' => 'BP'],
            ['id' => '#ORD-12070', 'date' => 'Apr 20, 2026 08:55', 'customer' => 'Anisa Rahma',    'channel' => 'Website',     'status' => 'Shipped',  'badge' => 'info',    'payment' => 'QRIS',         'courier' => 'JNE REG',      'total' => '$2,090', 'owner' => 'Andy',  'avatar' => 'AR'],
        ];
    }

    public static function recentOrders(): array
    {
        return array_slice(self::orders(), 0, 5);
    }

    public static function products(): array
    {
        return [
            ['name' => 'Blue Hoodie Premium', 'sku' => 'PRD-1001', 'category' => 'Fashion', 'stock' => 42, 'stock_percent' => 68, 'status' => 'Active', 'badge' => 'success', 'channel' => 'Website, Retail', 'price' => '$249'],
            ['name' => 'Desk Lamp Nordic', 'sku' => 'PRD-1002', 'category' => 'Home', 'stock' => 18, 'stock_percent' => 24, 'status' => 'Review', 'badge' => 'warning', 'channel' => 'Marketplace', 'price' => '$179'],
            ['name' => 'Travel Mug Vacuum', 'sku' => 'PRD-1003', 'category' => 'Kitchen', 'stock' => 0, 'stock_percent' => 0, 'status' => 'Out of Stock', 'badge' => 'danger', 'channel' => 'Website', 'price' => '$89'],
            ['name' => 'Wireless Mouse Slim', 'sku' => 'PRD-1004', 'category' => 'Gadget', 'stock' => 76, 'stock_percent' => 91, 'status' => 'Active', 'badge' => 'success', 'channel' => 'Website, Marketplace', 'price' => '$129'],
            ['name' => 'Planner Book 2026', 'sku' => 'PRD-1005', 'category' => 'Stationery', 'stock' => 34, 'stock_percent' => 44, 'status' => 'Draft', 'badge' => 'info', 'channel' => 'Retail', 'price' => '$69'],
            ['name' => 'Running Cap Aero', 'sku' => 'PRD-1006', 'category' => 'Sport', 'stock' => 58, 'stock_percent' => 73, 'status' => 'Active', 'badge' => 'success', 'channel' => 'Website', 'price' => '$99'],
            ['name' => 'Cable Organizer Kit', 'sku' => 'PRD-1007', 'category' => 'Gadget', 'stock' => 12, 'stock_percent' => 18, 'status' => 'Low Stock', 'badge' => 'warning', 'channel' => 'Marketplace', 'price' => '$49'],
            ['name' => 'Smart Scale Mini', 'sku' => 'PRD-1008', 'category' => 'Home', 'stock' => 25, 'stock_percent' => 39, 'status' => 'Active', 'badge' => 'success', 'channel' => 'Retail, Website', 'price' => '$219'],
        ];
    }

    public static function users(): array
    {
        return [
            ['initials' => 'AR', 'name' => 'Andy Rahman', 'email' => 'andy@example.com', 'role' => 'Admin', 'team' => 'Operations', 'status' => 'Active', 'status_tone' => 'success', 'last_login' => 'Apr 30, 2026 10:42'],
            ['initials' => 'SN', 'name' => 'Sinta Nabila', 'email' => 'sinta@example.com', 'role' => 'Editor', 'team' => 'Catalog', 'status' => 'Active', 'status_tone' => 'success', 'last_login' => 'Apr 30, 2026 09:12'],
            ['initials' => 'BP', 'name' => 'Budi Pratama', 'email' => 'budi@example.com', 'role' => 'Support', 'team' => 'Customer Success', 'status' => 'Pending', 'status_tone' => 'warning', 'last_login' => 'Apr 29, 2026 18:04'],
            ['initials' => 'LM', 'name' => 'Lia Maharani', 'email' => 'lia@example.com', 'role' => 'Finance', 'team' => 'Finance', 'status' => 'Active', 'status_tone' => 'success', 'last_login' => 'Apr 29, 2026 15:30'],
            ['initials' => 'RK', 'name' => 'Rama Kurnia', 'email' => 'rama@example.com', 'role' => 'Warehouse', 'team' => 'Fulfillment', 'status' => 'Locked', 'status_tone' => 'danger', 'last_login' => 'Apr 26, 2026 11:18'],
            ['initials' => 'DM', 'name' => 'Dewi Melati', 'email' => 'dewi@example.com', 'role' => 'Manager', 'team' => 'Sales', 'status' => 'Active', 'status_tone' => 'success', 'last_login' => 'Apr 30, 2026 08:51'],
        ];
    }

    public static function customers(): array
    {
        return [
            ['name' => 'Nusantara Retail', 'segment' => 'Enterprise', 'health' => 'Healthy', 'health_tone' => 'success', 'owner' => 'Dewi', 'mrr' => '$48.2K', 'last_contact' => 'Apr 30, 2026', 'next_action' => 'QBR deck'],
            ['name' => 'Sagara Mart', 'segment' => 'Marketplace', 'health' => 'Watch', 'health_tone' => 'warning', 'owner' => 'Andy', 'mrr' => '$22.8K', 'last_contact' => 'Apr 29, 2026', 'next_action' => 'Review refund'],
            ['name' => 'Urban Goods', 'segment' => 'Growth', 'health' => 'Healthy', 'health_tone' => 'success', 'owner' => 'Sinta', 'mrr' => '$16.4K', 'last_contact' => 'Apr 28, 2026', 'next_action' => 'Upsell API'],
            ['name' => 'Mandiri Digital', 'segment' => 'SMB', 'health' => 'At Risk', 'health_tone' => 'danger', 'owner' => 'Budi', 'mrr' => '$8.7K', 'last_contact' => 'Apr 25, 2026', 'next_action' => 'Recovery call'],
            ['name' => 'Lintas Retail', 'segment' => 'Enterprise', 'health' => 'Healthy', 'health_tone' => 'success', 'owner' => 'Lia', 'mrr' => '$37.1K', 'last_contact' => 'Apr 30, 2026', 'next_action' => 'Renewal'],
            ['name' => 'Kopi Timur Group', 'segment' => 'Growth', 'health' => 'Watch', 'health_tone' => 'warning', 'owner' => 'Dewi', 'mrr' => '$12.9K', 'last_contact' => 'Apr 27, 2026', 'next_action' => 'Training'],
        ];
    }

    public static function invoices(): array
    {
        return [
            ['number' => 'INV-2026-0418', 'customer' => 'Nusantara Retail', 'date' => 'Apr 30, 2026', 'due' => 'May 14, 2026', 'status' => 'Paid', 'badge' => 'success', 'amount' => '$48,200'],
            ['number' => 'INV-2026-0417', 'customer' => 'Lintas Retail', 'date' => 'Apr 30, 2026', 'due' => 'May 13, 2026', 'status' => 'Sent', 'badge' => 'info', 'amount' => '$37,100'],
            ['number' => 'INV-2026-0416', 'customer' => 'Sagara Mart', 'date' => 'Apr 29, 2026', 'due' => 'May 7, 2026', 'status' => 'Due Soon', 'badge' => 'warning', 'amount' => '$22,800'],
            ['number' => 'INV-2026-0415', 'customer' => 'Urban Goods', 'date' => 'Apr 28, 2026', 'due' => 'May 12, 2026', 'status' => 'Paid', 'badge' => 'success', 'amount' => '$16,400'],
            ['number' => 'INV-2026-0414', 'customer' => 'Mandiri Digital', 'date' => 'Apr 24, 2026', 'due' => 'Apr 30, 2026', 'status' => 'Overdue', 'badge' => 'danger', 'amount' => '$8,700'],
            ['number' => 'INV-2026-0413', 'customer' => 'Kopi Timur Group', 'date' => 'Apr 22, 2026', 'due' => 'May 6, 2026', 'status' => 'Sent', 'badge' => 'info', 'amount' => '$12,900'],
        ];
    }

    public static function tickets(): array
    {
        return [
            ['id' => '#TCK-9842', 'subject' => 'Webhook order.created delay', 'customer' => 'Nusantara Retail', 'priority' => 'High', 'badge' => 'danger', 'status' => 'Escalated', 'owner' => 'Rama', 'sla' => '42m'],
            ['id' => '#TCK-9841', 'subject' => 'Invoice PDF logo alignment', 'customer' => 'Sagara Mart', 'priority' => 'Medium', 'badge' => 'warning', 'status' => 'Open', 'owner' => 'Budi', 'sla' => '2h 15m'],
            ['id' => '#TCK-9840', 'subject' => 'Finance role cannot export', 'customer' => 'Lintas Retail', 'priority' => 'High', 'badge' => 'danger', 'status' => 'In Progress', 'owner' => 'Sinta', 'sla' => '1h 05m'],
            ['id' => '#TCK-9839', 'subject' => 'Need onboarding session', 'customer' => 'Urban Goods', 'priority' => 'Low', 'badge' => 'info', 'status' => 'Scheduled', 'owner' => 'Dewi', 'sla' => '1d'],
            ['id' => '#TCK-9838', 'subject' => 'Marketplace stock mismatch', 'customer' => 'Mandiri Digital', 'priority' => 'Medium', 'badge' => 'warning', 'status' => 'Open', 'owner' => 'Andy', 'sla' => '3h 20m'],
        ];
    }

    public static function ticketLanes(): array
    {
        return [
            ['label' => 'Open', 'count' => 47, 'tone' => 'info', 'items' => ['Billing copy request', 'Catalog sync review', 'Account invite issue']],
            ['label' => 'In Progress', 'count' => 62, 'tone' => 'warning', 'items' => ['Webhook delay', 'Export permission', 'Courier mapping']],
            ['label' => 'Escalated', 'count' => 5, 'tone' => 'danger', 'items' => ['SLA breach watch', 'API rate limit', 'Payment reconcile']],
            ['label' => 'Resolved', 'count' => 486, 'tone' => 'success', 'items' => ['MFA reset', 'Invoice download', 'Stock import']],
        ];
    }

    public static function revenueChart(): array
    {
        return [
            'title' => 'Revenue Trend',
            'subtitle' => 'Monthly performance over the last 12 months',
            'type' => 'bar',
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'datasets' => [
                ['label' => 'Revenue ($K)', 'data' => [42, 55, 48, 66, 63, 78, 71, 89, 76, 94, 83, 96], 'gradient' => true],
            ],
        ];
    }

    public static function channelChart(): array
    {
        return [
            'title' => 'Channel Revenue',
            'subtitle' => 'Revenue breakdown by channel — last 12 months',
            'type' => 'bar',
            'legend' => true,
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'datasets' => [
                ['label' => 'Website',     'data' => [22, 30, 25, 38, 34, 44, 42, 54, 46, 58, 50, 60], 'color' => '#1769e0'],
                ['label' => 'Marketplace', 'data' => [14, 18, 16, 18, 21, 24, 20, 28, 22, 26, 24, 28], 'color' => '#22c55e'],
                ['label' => 'Retail',      'data' => [8, 10, 9, 12, 10, 14, 11, 13, 12, 14, 12, 14],   'color' => '#f59e0b'],
                ['label' => 'Wholesale',   'data' => [6, 7, 6, 8, 7, 9, 8, 10, 8, 10, 9, 10],          'color' => '#94a3b8'],
            ],
        ];
    }

    public static function quickActions(): array
    {
        return [
            ['label' => 'Fulfillment', 'description' => '184 ready to ship', 'route' => 'orders', 'icon' => 'bi-truck'],
            ['label' => 'Inventory', 'description' => '27 low-stock items', 'route' => 'products', 'icon' => 'bi-box', 'tone' => 'warning'],
            ['label' => 'Approvals', 'description' => '6 pending', 'route' => 'users', 'icon' => 'bi-person-check', 'tone' => 'success'],
            ['label' => 'Insights', 'description' => '4 new alerts', 'route' => 'reports', 'icon' => 'bi-graph-up', 'tone' => 'danger'],
        ];
    }

    public static function timeline(): array
    {
        return [
            ['icon' => 'bi-check2', 'title' => 'Shipment batch #B-842 completed', 'description' => '12 minutes ago by Sinta'],
            ['icon' => 'bi-shield-check', 'title' => 'Finance role policy updated', 'description' => '38 minutes ago by Admin'],
            ['icon' => 'bi-receipt', 'title' => 'Enterprise invoice issued', 'description' => '1 hour ago for Nusantara Retail'],
        ];
    }

    public static function salesFunnel(): array
    {
        return [
            ['label' => 'Visitors', 'value' => '142,800', 'percent' => 96],
            ['label' => 'Add to Cart', 'value' => '31,420', 'percent' => 72],
            ['label' => 'Checkout', 'value' => '18,906', 'percent' => 48],
            ['label' => 'Paid', 'value' => '11,149', 'percent' => 32],
        ];
    }

    public static function topProducts(): array
    {
        return [
            ['name' => 'Blue Hoodie Premium', 'category' => 'Fashion', 'revenue' => '$148.2K', 'orders' => 842, 'margin' => '42%', 'trend' => '18%', 'trend_tone' => 'up'],
            ['name' => 'Wireless Mouse Slim', 'category' => 'Gadget', 'revenue' => '$91.7K', 'orders' => 706, 'margin' => '36%', 'trend' => '11%', 'trend_tone' => 'up'],
            ['name' => 'Desk Lamp Nordic', 'category' => 'Home', 'revenue' => '$82.4K', 'orders' => 461, 'margin' => '31%', 'trend' => '4%', 'trend_tone' => 'down'],
            ['name' => 'Smart Scale Mini', 'category' => 'Home', 'revenue' => '$77.9K', 'orders' => 356, 'margin' => '39%', 'trend' => '9%', 'trend_tone' => 'up'],
            ['name' => 'Planner Book 2026', 'category' => 'Stationery', 'revenue' => '$44.1K', 'orders' => 639, 'margin' => '47%', 'trend' => '22%', 'trend_tone' => 'up'],
        ];
    }

    public static function permissions(): array
    {
        return [
            ['module' => 'Dashboard', 'description' => 'View metrics and alerts', 'access' => [true, true, true, true]],
            ['module' => 'Orders', 'description' => 'Create, update, fulfill', 'access' => [true, true, false, true]],
            ['module' => 'Products', 'description' => 'Catalog and inventory', 'access' => [true, true, true, false]],
            ['module' => 'Reports', 'description' => 'Revenue and export', 'access' => [true, true, false, false]],
            ['module' => 'Settings', 'description' => 'Security, API, billing', 'access' => [true, false, false, false]],
        ];
    }

    public static function auditEvents(): array
    {
        return [
            ['time' => 'Apr 30, 2026 10:42', 'actor' => 'Admin Demo', 'event' => 'Created API token', 'ip' => '103.12.44.91', 'severity' => 'Medium', 'severity_tone' => 'warning', 'status' => 'Success', 'status_tone' => 'success'],
            ['time' => 'Apr 30, 2026 10:18', 'actor' => 'Sinta Nabila', 'event' => 'Updated product PRD-1001', 'ip' => '103.12.44.44', 'severity' => 'Low', 'severity_tone' => 'info', 'status' => 'Success', 'status_tone' => 'success'],
            ['time' => 'Apr 30, 2026 09:52', 'actor' => 'System', 'event' => 'Blocked login attempt', 'ip' => '45.88.12.8', 'severity' => 'High', 'severity_tone' => 'danger', 'status' => 'Blocked', 'status_tone' => 'danger'],
            ['time' => 'Apr 29, 2026 20:14', 'actor' => 'Lia Maharani', 'event' => 'Exported invoice report', 'ip' => '103.12.44.88', 'severity' => 'Medium', 'severity_tone' => 'warning', 'status' => 'Success', 'status_tone' => 'success'],
            ['time' => 'Apr 29, 2026 18:31', 'actor' => 'Andy Rahman', 'event' => 'Changed role permission', 'ip' => '103.12.44.91', 'severity' => 'Medium', 'severity_tone' => 'warning', 'status' => 'Success', 'status_tone' => 'success'],
            ['time' => 'Apr 29, 2026 15:03', 'actor' => 'Budi Pratama', 'event' => 'Password reset requested', 'ip' => '103.12.44.61', 'severity' => 'Low', 'severity_tone' => 'info', 'status' => 'Pending', 'status_tone' => 'warning'],
        ];
    }

    public static function profileActivities(): array
    {
        return [
            ['icon' => 'bi-shield-check', 'title' => 'MFA verified', 'description' => 'Secure login from Jakarta, 11:04'],
            ['icon' => 'bi-person-gear', 'title' => 'Profile updated', 'description' => 'Display role and timezone saved'],
            ['icon' => 'bi-key', 'title' => 'API key rotated', 'description' => 'Previous token was disabled automatically'],
            ['icon' => 'bi-file-earmark-arrow-down', 'title' => 'Report exported', 'description' => 'April 2026 revenue report generated as CSV'],
        ];
    }

    public static function documentationSections(): array
    {
        return [
            [
                'icon' => 'bi-rocket-takeoff',
                'title' => 'Quick Start',
                'items' => [
                    'Install PHP dependencies with composer install when vendor dependencies are not available.',
                    'Copy .env.example to .env, update APP_URL, and run php artisan key:generate.',
                    'Preview the template with php artisan serve and open the generated local URL.',
                    'Run php artisan test before packaging or delivering a customized version.',
                ],
                'code' => "composer install\ncp .env.example .env\nphp artisan key:generate\nphp artisan serve",
            ],
            [
                'icon' => 'bi-folder2-open',
                'title' => 'Template Structure',
                'items' => [
                    'resources/views/layouts contains the application and authentication layouts.',
                    'resources/views/partials contains sidebar and topbar chrome shared by panel pages.',
                    'resources/views/components contains Blade components such as table-card, metric-grid, badge, chart-bars, and filter-bar.',
                    'resources/views/panel contains all dashboard, commerce, CRM, billing, support, admin, workspace, UI kit, and documentation pages.',
                    'App\\Support\\PanelData contains demo arrays that can be replaced by Eloquent models, API resources, or service classes.',
                ],
            ],
            [
                'icon' => 'bi-palette',
                'title' => 'Design System',
                'items' => [
                    'Base font size is 14px through html font-size 87.5%; component code uses rem-based tokens.',
                    'The primary font is Geist, loaded in resources/views/layouts/app.blade.php and resources/views/layouts/auth.blade.php.',
                    'Core tokens such as colors, radius, control heights, icon sizes, and shadows live in public/assets/css/app.css.',
                    'Create actions should be placed at the far right of card or table action groups.',
                    'Use outline buttons for secondary actions and primary buttons for create, save, and final actions.',
                ],
            ],
            [
                'icon' => 'bi-ui-checks-grid',
                'title' => 'Components',
                'items' => [
                    'Use x-table-card for data-heavy sections with contextual actions in the card header.',
                    'Use x-filter-bar for responsive filter rows above tables.',
                    'Use x-metric-grid for KPI cards and x-badge or x-status-dot for compact states.',
                    'Use data-control="select2" on selects that need searchable or multiple selection behavior.',
                    'Use data-table on tables that need sorting, searching, and pagination through simple-datatables.',
                ],
            ],
            [
                'icon' => 'bi-diagram-3',
                'title' => 'Navigation And Routes',
                'items' => [
                    'Sidebar groups are generated by PanelData::navigation() and route names.',
                    'Page links use named routes so URLs can change without editing every Blade file.',
                    'Legacy HTML redirects are defined in routes/web.php for buyers migrating from static versions.',
                    'Topbar actions are global only; page-level actions belong inside card or table headers.',
                ],
            ],
            [
                'icon' => 'bi-plug',
                'title' => 'JavaScript Integrations',
                'items' => [
                    'Bootstrap powers dropdowns, modals, tooltips, tabs, accordions, and offcanvas-like sidebar behavior.',
                    'Select2 is initialized from public/assets/js/app.js and styled in public/assets/css/app.css.',
                    'simple-datatables initializes tables marked with data-table.',
                    'Chart.js powers dashboard and report charts through reusable chart sections.',
                    'Theme, sidebar collapse, password toggles, toasts, and check-all controls are handled in app.js.',
                ],
            ],
            [
                'icon' => 'bi-brush',
                'title' => 'Customization',
                'items' => [
                    'Change brand labels and navigation copy in PanelData::navigation() and the sidebar partial.',
                    'Adjust colors, radius, shadows, and spacing in CSS variables at the top of public/assets/css/app.css.',
                    'Replace demo arrays in PanelData with database-backed queries or API resource payloads.',
                    'Keep page-specific actions in table-card actions and avoid adding feature actions back into the topbar.',
                    'Use the UI Kit page as the visual source of truth before adding new screens.',
                ],
            ],
            [
                'icon' => 'bi-box-seam',
                'title' => 'Packaging Checklist',
                'items' => [
                    'Remove local cache files and do not include environment secrets in the package.',
                    'Run php artisan test and vendor/bin/pint --test before release.',
                    'Confirm all pages render through php artisan route:list and browser preview.',
                    'Include screenshots, documentation, changelog, and clear support notes in the final Envato package.',
                ],
            ],
            [
                'icon' => 'bi-clock-history',
                'title' => 'Release Notes',
                'items' => [
                    'v1.0.0 Laravel 12 admin panel with dashboard, commerce, CRM, billing, support, admin, auth, workspace pages, UI kit, and documentation.',
                    'Includes Geist typography, Select2 styling, simple-datatables, dark mode, responsive sidebar, and reusable Blade components.',
                    'Future versions should document changed files, migration notes, and compatibility updates.',
                ],
            ],
        ];
    }

    public static function invoiceDetail(string $id): array
    {
        $map = [
            'INV-2026-0418' => ['customer' => 'Nusantara Retail', 'date' => 'Apr 30, 2026', 'due' => 'May 14, 2026', 'status' => 'Paid', 'badge' => 'success', 'subtotal' => '$44,200', 'tax_rate' => '11%', 'tax' => '$4,000', 'amount' => '$48,200', 'items' => [['name' => 'Platform License Fee', 'desc' => 'Annual SaaS subscription Q2 2026', 'qty' => 1, 'price' => '$38,200', 'total' => '$38,200'], ['name' => 'Support SLA Add-on', 'desc' => '24/7 priority support tier', 'qty' => 1, 'price' => '$6,000', 'total' => '$6,000']]],
            'INV-2026-0417' => ['customer' => 'Lintas Retail', 'date' => 'Apr 30, 2026', 'due' => 'May 13, 2026', 'status' => 'Sent', 'badge' => 'info', 'subtotal' => '$33,423', 'tax_rate' => '11%', 'tax' => '$3,677', 'amount' => '$37,100', 'items' => [['name' => 'Operations Suite License', 'desc' => 'Q2 2026 renewal', 'qty' => 1, 'price' => '$28,000', 'total' => '$28,000'], ['name' => 'Onboarding Package', 'desc' => '2 sessions included', 'qty' => 1, 'price' => '$5,423', 'total' => '$5,423']]],
            'INV-2026-0416' => ['customer' => 'Sagara Mart', 'date' => 'Apr 29, 2026', 'due' => 'May 7, 2026', 'status' => 'Due Soon', 'badge' => 'warning', 'subtotal' => '$20,541', 'tax_rate' => '11%', 'tax' => '$2,259', 'amount' => '$22,800', 'items' => [['name' => 'Starter License', 'desc' => 'Jan–Jun 2026', 'qty' => 1, 'price' => '$18,000', 'total' => '$18,000'], ['name' => 'Data Migration', 'desc' => 'One-time setup', 'qty' => 1, 'price' => '$2,541', 'total' => '$2,541']]],
        ];
        $invoice = $map[$id] ?? $map['INV-2026-0418'];
        $invoice['number'] = $id;

        return $invoice;
    }

    public static function kanbanBoard(): array
    {
        return [
            ['id' => 'backlog', 'title' => 'Backlog', 'color' => 'var(--app-muted)', 'cards' => [
                ['title' => 'Add bulk export for orders', 'tag' => 'Feature', 'tag_class' => 'ev-blue', 'assignee' => 'DW', 'due' => 'May 20'],
                ['title' => 'Revamp customer health score', 'tag' => 'Improvement', 'tag_class' => 'ev-amber', 'assignee' => 'SR', 'due' => 'Jun 1'],
                ['title' => 'Integrate Shopee channel', 'tag' => 'Integration', 'tag_class' => 'ev-green', 'assignee' => 'AR', 'due' => 'Jun 15'],
            ]],
            ['id' => 'in-progress', 'title' => 'In Progress', 'color' => 'var(--app-blue)', 'cards' => [
                ['title' => 'Webhook retry mechanism', 'tag' => 'Bug Fix', 'tag_class' => 'ev-red', 'assignee' => 'RM', 'due' => 'May 2'],
                ['title' => 'Dashboard performance audit', 'tag' => 'Improvement', 'tag_class' => 'ev-amber', 'assignee' => 'DW', 'due' => 'May 5'],
                ['title' => 'PDF invoice template', 'tag' => 'Feature', 'tag_class' => 'ev-blue', 'assignee' => 'BP', 'due' => 'May 7'],
            ]],
            ['id' => 'review', 'title' => 'In Review', 'color' => 'var(--app-amber)', 'cards' => [
                ['title' => 'Role permission matrix update', 'tag' => 'Security', 'tag_class' => 'ev-red', 'assignee' => 'LM', 'due' => 'Apr 30'],
                ['title' => 'Select2 mobile fix', 'tag' => 'Bug Fix', 'tag_class' => 'ev-amber', 'assignee' => 'SN', 'due' => 'May 1'],
            ]],
            ['id' => 'done', 'title' => 'Done', 'color' => 'var(--app-green)', 'cards' => [
                ['title' => 'MFA enforcement policy', 'tag' => 'Security', 'tag_class' => 'ev-green', 'assignee' => 'AD', 'due' => 'Apr 28'],
                ['title' => 'Datatable pagination restyle', 'tag' => 'UI', 'tag_class' => 'ev-blue', 'assignee' => 'DW', 'due' => 'Apr 27'],
                ['title' => 'Audit log search filter', 'tag' => 'Feature', 'tag_class' => 'ev-blue', 'assignee' => 'BP', 'due' => 'Apr 26'],
            ]],
        ];
    }

    public static function calendarEvents(): array
    {
        return [
            ['day' => 1,  'title' => 'Q2 Kickoff',      'class' => 'ev-blue',  'label' => 'Meeting'],
            ['day' => 3,  'title' => 'Invoice Due',      'class' => 'ev-amber', 'label' => 'Finance'],
            ['day' => 5,  'title' => 'Support Standup',  'class' => 'ev-green', 'label' => 'Operations'],
            ['day' => 7,  'title' => 'Board Review',     'class' => 'ev-blue',  'label' => 'Meeting'],
            ['day' => 10, 'title' => 'SLA Audit',        'class' => 'ev-red',   'label' => 'Urgent'],
            ['day' => 12, 'title' => 'Team Retro',       'class' => 'ev-green', 'label' => 'Operations'],
            ['day' => 14, 'title' => 'Product Demo',     'class' => 'ev-blue',  'label' => 'Meeting'],
            ['day' => 15, 'title' => 'Payroll Run',      'class' => 'ev-amber', 'label' => 'Finance'],
            ['day' => 17, 'title' => 'Security Review',  'class' => 'ev-red',   'label' => 'Urgent'],
            ['day' => 20, 'title' => 'Invoice Due',      'class' => 'ev-amber', 'label' => 'Finance'],
            ['day' => 21, 'title' => 'Sprint Planning',  'class' => 'ev-blue',  'label' => 'Meeting'],
            ['day' => 24, 'title' => 'Vendor Call',      'class' => 'ev-green', 'label' => 'Operations'],
            ['day' => 28, 'title' => 'Month Close',      'class' => 'ev-amber', 'label' => 'Finance'],
            ['day' => 30, 'title' => 'Stakeholder Demo', 'class' => 'ev-blue',  'label' => 'Meeting'],
        ];
    }

    public static function dashboardDonut(): array
    {
        return [
            ['label' => 'Website',     'value' => 38, 'color' => '#1769e0'],
            ['label' => 'Marketplace', 'value' => 31, 'color' => '#22c55e'],
            ['label' => 'Retail',      'value' => 19, 'color' => '#f59e0b'],
            ['label' => 'Wholesale',   'value' => 12, 'color' => '#94a3b8'],
        ];
    }

    public static function dashboardSparklines(): array
    {
        return [
            ['label' => 'Orders Fulfilled', 'pct' => 84],
            ['label' => 'SLA Compliance',   'pct' => 94],
            ['label' => 'Stock Health',      'pct' => 72],
            ['label' => 'Invoice Paid',      'pct' => 88],
            ['label' => 'Customer Retained', 'pct' => 91],
        ];
    }
}
