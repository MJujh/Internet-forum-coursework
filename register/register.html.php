<html>
<head>
    <title>Register</title>
    <style>
        body {
            background: linear-gradient(to bottom, #232946 0%, #121629 100%);
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .register-container {
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 8px 32px rgba(60, 120, 200, 0.12);
            max-width: 400px;
            margin: 60px auto;
            padding: 40px 32px 32px 32px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .register-icon {
            background: #f2f7fa;
            border-radius: 16px;
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
            font-size: 32px;
            color: #3a7bd5;
        }
        .register-title {
            font-size: 1.6rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: #222;
        }
        .register-desc {
            color: #6b7a90;
            font-size: 1rem;
            margin-bottom: 28px;
            text-align: center;
        }
        .register-form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .register-input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #e3e8ee;
            border-radius: 8px;
            font-size: 1rem;
            background: #f7fafc;
            outline: none;
            transition: border 0.2s;
        }
        .register-input:focus {
            border: 1.5px solid #3a7bd5;
        }
        .register-btn {
            width: 100%;
            padding: 13px 0;
            background: #222;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 500;
            margin-top: 10px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .register-btn:hover {
            background: #3a7bd5;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-icon">&#x1F464;</div>
        <div class="register-title">Create your account</div>
        <div class="register-desc">Sign up to ask questions, share knowledge, and join the community for free.</div>
        <form class="register-form" action="" method="post">
            <input class="register-input" type="text" name="name" id="name" placeholder="Name" required>
            <input class="register-input" type="email" name="email" id="email" placeholder="Email" required>
            <input class="register-input" type="password" name="password" id="password" placeholder="Password" required>
            <button class="register-btn" type="submit">Register</button>
        </form>
    </div>
</body>
</html>
