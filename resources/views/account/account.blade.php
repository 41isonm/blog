<body>

  <div class="register-container">

    <div class="register-card">

      <div class="card-header">
        <h2>Criar Conta</h2>
        <p>Preencha os dados para começar</p>
      </div>

      @if($errors->any())
      <div class="error-box">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <div class="card-body">

        <form method="POST" action="{{ route('account') }}">
          @csrf

          <div class="input-group">
            <label for="name">Nome</label>
            <input
              type="text"
              id="name"
              name="name"
              placeholder="Digite seu nome"
              required>
          </div>

          <div class="input-group">
            <label for="email">E-mail</label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="Digite seu e-mail"
              required>
          </div>

          <div class="input-group">
            <label for="password">Senha</label>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Digite sua senha"
              required>
          </div>

          <button type="submit" class="btn">
            Criar Conta
          </button>

          <div class="login-link">
            Já possui uma conta?
            <a href="/login">Entrar</a>
          </div>

        </form>

      </div>
    </div>
  </div>

</body>

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

  .register-container {
    width: 100%;
    max-width: 420px;
  }

  .register-card {
    background: #fff;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    animation: fadeIn 0.5s ease;
  }

  .card-header {
    padding: 35px 25px 20px;
    text-align: center;
    background: #ffffff;
  }

  .card-header h2 {
    font-size: 30px;
    color: #333;
    margin-bottom: 8px;
  }

  .card-header p {
    color: #777;
    font-size: 14px;
  }

  .card-body {
    padding: 25px;
  }

  .input-group {
    margin-bottom: 18px;
  }

  .input-group label {
    display: block;
    margin-bottom: 6px;
    color: #444;
    font-size: 14px;
    font-weight: bold;
  }

  .input-group input {
    width: 100%;
    padding: 13px;
    border: 1px solid #ccc;
    border-radius: 10px;
    outline: none;
    transition: 0.3s;
    font-size: 15px;
  }

  .input-group input:focus {
    border-color: #28a745;
    box-shadow: 0 0 8px rgba(40, 167, 69, 0.3);
  }

  .btn {
    width: 100%;
    padding: 13px;
    border: none;
    border-radius: 10px;
    background: #28a745;
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
    margin-top: 5px;
  }

  .btn:hover {
    background: #218838;
    transform: translateY(-2px);
  }

  .login-link {
    margin-top: 20px;
    text-align: center;
    font-size: 14px;
    color: #555;
  }

  .login-link a {
    color: #28a745;
    text-decoration: none;
    font-weight: bold;
  }

  .login-link a:hover {
    text-decoration: underline;
  }

  .error-box {
    background: #ffe5e5;
    color: #d60000;
    padding: 12px;
    margin: 0 25px;
    border-radius: 10px;
    font-size: 14px;
  }

  .error-box ul {
    padding-left: 18px;
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