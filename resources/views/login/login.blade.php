<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, Helvetica, sans-serif;
    }

    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #F2E3BB, #e6c97a);
      padding: 20px;
    }

    .login-container {
      width: 100%;
      max-width: 380px;
      background: #fff;
      padding: 35px;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      animation: fadeIn 0.5s ease;
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 10px;
      color: #333;
      font-size: 30px;
    }

    .login-container p {
      text-align: center;
      color: #777;
      margin-bottom: 25px;
      font-size: 14px;
    }

    .error-box {
      background: #ffe5e5;
      color: #d60000;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 20px;
      font-size: 14px;
    }

    .error-box ul {
      padding-left: 18px;
    }

    .form-group {
      margin-bottom: 18px;
    }

    .form-group label {
      display: block;
      margin-bottom: 6px;
      color: #444;
      font-weight: bold;
      font-size: 14px;
    }

    .form-group input {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 10px;
      outline: none;
      transition: 0.3s;
      font-size: 15px;
    }

    .form-group input:focus {
      border-color: #28a745;
      box-shadow: 0 0 8px rgba(40, 167, 69, 0.3);
    }

    .options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      font-size: 14px;
    }

    .options a {
      text-decoration: none;
      color: #28a745;
      font-weight: bold;
    }

    .options a:hover {
      text-decoration: underline;
    }

    .btn {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 10px;
      background: #28a745;
      color: white;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn:hover {
      background: #218838;
      transform: translateY(-2px);
    }

    .register {
      margin-top: 20px;
      text-align: center;
      font-size: 14px;
      color: #555;
    }

    .register a {
      color: #28a745;
      text-decoration: none;
      font-weight: bold;
    }

    .register a:hover {
      text-decoration: underline;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>

  <div class="login-container">

    <h2>Bem-vindo</h2>
    <p>Faça login para continuar</p>

    @if($errors->any())
    <div class="error-box">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="form-group">
        <label for="email">E-mail</label>
        <input
          type="email"
          id="email"
          name="email"
          placeholder="Digite seu e-mail"
          required>
      </div>

      <div class="form-group">
        <label for="password">Senha</label>
        <input
          type="password"
          id="password"
          name="password"
          placeholder="Digite sua senha"
          required>
      </div>

      <div class="options">
        <label>
          <input type="checkbox" name="remember">
          Lembrar-me
        </label>

        <a href="#">Esqueceu a senha?</a>
      </div>

      <button type="submit" class="btn">
        Entrar
      </button>

      <div class="register">
        Não possui conta?
        <a href="/account">Criar conta</a>
      </div>

    </form>
  </div>

</body>

</html>