<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">





    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --accent: #e74c3c;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --success: #2ecc71;
            --warning: #f39c12;
            --danger: #e74c3c;
            --gray: #95a5a6;
            --sidebar-width: 250px;
        }

        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Styles */
        .header {
            background: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo h1 {
            font-size: 24px;
            color: var(--primary);
        }

        .logo span {
            color: var(--secondary);
        }

        .logo i {
            font-size: 28px;
            color: var(--secondary);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-info {
            text-align: right;
        }

        .user-info h4 {
            color: var(--dark);
            font-weight: 600;
        }

        .user-info p {
            color: var(--gray);
            font-size: 13px;
        }

        .user-img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid var(--secondary);
        }

        .user-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Main Content Layout */
        .main-container {
            display: flex;
            flex: 1;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--primary);
            /* color: white; */
            height: calc(100vh - 70px);
            position: sticky;
            top: 70px;
            transition: all 0.3s ease;
        }

        .nav-links {
            list-style: none;
            padding: 20px 0;
        }

        .nav-links li {
            margin-bottom: 5px;
            padding: 0 15px;
        }

        .nav-links a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .nav-links a:hover,
        .nav-links a.active {
            background: rgba(255, 255, 255, 0.1);
        }

        .nav-links i {
            margin-right: 10px;
            font-size: 18px;
            width: 25px;
            text-align: center;
        }

        /* Content Area Styles */
        .content {
            flex: 1;
            padding: 30px;
        }

        .page-title {
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-title h2 {
            font-size: 28px;
            color: var(--dark);
            font-weight: 600;
        }

        .page-title p {
            color: var(--gray);
        }

        /* Dashboard Cards */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .card-header h3 {
            font-size: 16px;
            color: #666;
        }

        .card-header i {
            font-size: 24px;
            color: var(--secondary);
        }

        .card-content h2 {
            font-size: 32px;
            margin-bottom: 5px;
            color: var(--dark);
        }

        .card-content p {
            color: var(--gray);
            font-size: 14px;
        }
/* properteis listing */

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        a.add-button {
            display: inline-block;
            margin-bottom: 15px;
            padding: 8px 12px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        /* Properties Section */
        .properties {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .section-header h2 {
            font-size: 20px;
            color: var(--dark);
        }

        /* .btn {
            background: var(--secondary);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: background 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
        } */

        .btn:hover {
            background: #2980b9;
        }

        .property-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .property-card {
            border: 1px solid #eee;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .property-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .property-img {
            height: 180px;
            overflow: hidden;
        }

        .property-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .property-card:hover .property-img img {
            transform: scale(1.05);
        }

        .property-details {
            padding: 15px;
        }

        .property-details h3 {
            font-size: 18px;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .property-details p {
            color: #666;
            font-size: 14px;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .property-details .price {
            color: var(--secondary);
            font-weight: 600;
            font-size: 18px;
            margin-top: 10px;
        }

        .status {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
            margin-top: 5px;
        }

        .status.occupied {
            background: #ffe4e4;
            color: var(--danger);
        }

        .status.vacant {
            background: #e4ffe7;
            color: var(--success);
        }

        /* ====== Add Property Form Styles ====== */
        form {
            background: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            max-width: 700px;
            margin: 0 auto;
        }

        form h2 {
            font-size: 24px;
            color: var(--primary);
            margin-bottom: 20px;
            text-align: center;
            font-weight: 600;
        }

        form input,
        form textarea,
        form select {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
            transition: all 0.3s ease;
            outline: none;
            background: #fafafa;
        }

        form input:focus,
        form textarea:focus,
        form select:focus {
            border-color: var(--secondary);
            background: #fff;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }

        form textarea {
            resize: vertical;
            min-height: 120px;
        }

        /* form button {
            width: 100%;
            padding: 12px;
            background: var(--secondary);
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        } */

        form button:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }

        form button:active {
            transform: scale(0.98);
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .property-list {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }

            .nav-links a span {
                display: none;
            }

            .nav-links i {
                margin-right: 0;
                font-size: 20px;
            }

            .dashboard-cards {
                grid-template-columns: 1fr;
            }

            .property-list {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .header {
                padding: 15px;
            }

            .logo h1 {
                font-size: 20px;
            }

            .user-info h4 {
                font-size: 14px;
            }

            .user-info p {
                display: none;
            }

            .content {
                padding: 15px;
            }
        }
    </style>

</head>

<body>
    <!-- Header -->
    @include('layouts.header')

    <div class="main-container">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Content -->
        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer')

    <script>
        // Active link script
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-links a');

            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    navLinks.forEach(item => item.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>

</html>
