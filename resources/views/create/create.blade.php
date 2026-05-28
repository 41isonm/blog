<x-header />

<style>
  body {
    background: #f5f7fa;
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    padding: 0;
  }

  .main-wrapper {
    max-width: 1400px;
    margin: 0 auto;
    padding: 20px;
    display: grid;
    grid-template-columns: 250px 1fr;
    gap: 30px;
  }

  .content-area {
    width: 100%;
  }

  .form-container {
    background: white;
    padding: 40px;
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  }

  .form-container h1 {
    color: #222;
    margin-top: 0;
    margin-bottom: 30px;
    font-size: 28px;
  }

  .form-group {
    margin-bottom: 25px;
  }

  .form-group label {
    display: block;
    color: #333;
    font-weight: 600;
    margin-bottom: 8px;
    font-size: 15px;
  }

  .form-group input,
  .form-group textarea {
    width: 100%;
    padding: 12px 16px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 15px;
    box-sizing: border-box;
    transition: 0.3s;
  }

  .form-group input:focus,
  .form-group textarea:focus {
    outline: none;
    border-color: #28a745;
    box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.1);
  }

  .form-group textarea {
    resize: vertical;
    min-height: 250px;
  }

  .button-group {
    display: flex;
    gap: 15px;
    margin-top: 30px;
  }

  .btn {
    padding: 12px 30px;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    transition: 0.3s;
  }

  .btn-primary {
    background: #28a745;
    color: white;
  }

  .btn-primary:hover {
    background: #218838;
    transform: translateY(-2px);
  }

  .btn-secondary {
    background: #6c757d;
    color: white;
  }

  .btn-secondary:hover {
    background: #5a6268;
    transform: translateY(-2px);
  }

  .success-message {
    background: #d4edda;
    color: #155724;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    border: 1px solid #c3e6cb;
    display: none;
  }

  .success-message.show {
    display: block;
    animation: slideDown 0.3s ease;
  }

  @keyframes slideDown {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @media (max-width: 1024px) {
    .main-wrapper {
      grid-template-columns: 1fr;
      gap: 20px;
    }
  }

  @media (max-width: 768px) {
    .main-wrapper {
      padding: 15px;
    }

    .form-container {
      padding: 25px;
    }

    .form-container h1 {
      font-size: 24px;
    }

    .button-group {
      flex-direction: column;
    }
  }
</style>

<div class="main-wrapper">

  {{-- SIDEBAR --}}
  <aside>
    <x-sidebar />
  </aside>

  {{-- MAIN CONTENT --}}
  <div class="content-area">

    <div class="form-container">
      <h1>✨ Create New Post</h1>

      @if(session('success'))
      <div class="success-message show">
        {{ session('success') }}
      </div>
      @endif

      <form id="create-form" action="/register" method="post">
        @csrf

        <div class="form-group">
          <label for="title">Title</label>
          <input
            id="title"
            name="title"
            type="text"
            placeholder="Enter your post title..."
            required />
        </div>

        <div class="form-group">
          <label for="content">Content</label>
          <textarea
            id="content"
            name="content"
            placeholder="Write your post content here..."
            required></textarea>
        </div>

        <div class="button-group">
          <button type="submit" class="btn btn-primary">Create Post</button>
          <a href="/home" class="btn btn-secondary" style="text-decoration: none; display: inline-flex; align-items: center;">Cancel</a>
        </div>
      </form>
    </div>

  </div>

</div>