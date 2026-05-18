<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post Details</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, Helvetica, sans-serif;
    }

    body {
      background: #f4f6f9;
      padding: 30px;
      color: #333;
    }

    .container {
      max-width: 900px;
      margin: 0 auto;
    }

    .page-title {
      margin-bottom: 25px;
      text-align: center;
    }

    .page-title h2 {
      font-size: 32px;
      color: #222;
    }

    .post-card {
      background: white;
      border-radius: 16px;
      padding: 20px;
      margin-bottom: 25px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      transition: 0.3s;
    }

    .post-card:hover {
      transform: translateY(-3px);
    }

    .post-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
      border-bottom: 1px solid #eee;
      padding-bottom: 12px;
    }

    .post-title {
      font-size: 22px;
      font-weight: bold;
      color: #222;
    }

    .post-date {
      font-size: 14px;
      color: #777;
    }

    .post-content {
      font-size: 16px;
      line-height: 1.7;
      color: #555;
      margin-bottom: 20px;
      word-break: break-word;
    }

    .post-actions {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }

    .post-actions button {
      border: none;
      padding: 10px 18px;
      border-radius: 10px;
      cursor: pointer;
      font-weight: bold;
      transition: 0.3s;
    }

    .like-btn {
      background: #28a745;
      color: white;
    }

    .like-btn:hover {
      background: #218838;
    }

    .comment-btn {
      background: #007bff;
      color: white;
    }

    .comment-btn:hover {
      background: #0069d9;
    }

    .share-btn {
      background: #6c757d;
      color: white;
    }

    .share-btn:hover {
      background: #5a6268;
    }

    .empty-posts {
      background: white;
      padding: 30px;
      border-radius: 16px;
      text-align: center;
      color: #777;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    @media (max-width: 768px) {
      body {
        padding: 15px;
      }

      .post-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
      }

      .post-title {
        font-size: 20px;
      }

      .post-actions {
        width: 100%;
      }

      .post-actions button {
        flex: 1;
      }
    }
  </style>
</head>

<body>

  <div class="container">

    <div class="page-title">
      <h2>Recent Posts</h2>
    </div>

    @if(isset($posts) && count($posts) > 0)

    @foreach($posts as $post)

    <div class="post-card">

      <div class="post-header">
        <div class="post-title">
          {{ $post->title }}
        </div>

        <div class="post-date">
          {{ $post->created_at }}
        </div>
      </div>

      <div class="post-content">
        {{ $post->content }}
      </div>

      <div class="post-actions">

        <button class="like-btn">
          👍 Gostei
        </button>

        <button class="comment-btn">
          💬 Comentar
        </button>

        <button class="share-btn">
          📤 Compartilhar
        </button>

      </div>

    </div>

    @endforeach

    @else

    <div class="empty-posts">
      <h3>No posts found.</h3>
    </div>

    @endif

  </div>

</body>

</html>