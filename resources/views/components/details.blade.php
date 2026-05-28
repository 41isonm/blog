<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Posts Recentes</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    *,
    *::before,
    *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    :root {
      --bg: #f0ede8;
      --surface: #ffffff;
      --accent: #c0392b;
      --accent-dk: #96281b;
      --accent-lt: #fdecea;
      --blue: #1a56db;
      --blue-dk: #1341b0;
      --blue-lt: #eef2fd;
      --slate: #4b5563;
      --slate-lt: #9ca3af;
      --text: #1c1c1c;
      --border: #e5e0d8;
      --shadow: 0 2px 16px rgba(0, 0, 0, .07);
      --radius: 14px;
    }

    body {
      background: var(--bg);
      min-height: 100vh;
      padding: 48px 20px 64px;
      font-family: 'DM Sans', sans-serif;
      color: var(--text);
    }

    .page-header {
      max-width: 780px;
      margin: 0 auto 40px;
      display: flex;
      align-items: baseline;
      gap: 14px;
      border-bottom: 2px solid var(--text);
      padding-bottom: 18px;
    }

    .page-header h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(28px, 5vw, 42px);
      letter-spacing: -.5px;
      line-height: 1;
    }

    .post-count {
      font-size: 13px;
      font-weight: 600;
      color: var(--slate-lt);
      letter-spacing: .08em;
      text-transform: uppercase;
      margin-left: auto;
    }

    .feed {
      max-width: 780px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      gap: 24px;
    }

    .post-card {
      background: var(--surface);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      box-shadow: var(--shadow);
      overflow: hidden;
    }

    .card-body {
      padding: 28px 30px 22px;
    }

    .post-meta {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 12px;
      flex-wrap: wrap;
    }

    .post-index {
      font-size: 11px;
      font-weight: 700;
      color: var(--accent);
      letter-spacing: .12em;
      text-transform: uppercase;
    }

    .meta-dot {
      color: var(--border);
    }

    .post-date {
      font-size: 13px;
      color: var(--slate-lt);
    }

    .reaction-pill {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      background: var(--accent-lt);
      color: var(--accent-dk);
      font-size: 12px;
      font-weight: 700;
      padding: 3px 10px;
      border-radius: 99px;
      border: 1px solid #f5c2be;
    }

    .post-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(19px, 3vw, 24px);
      line-height: 1.3;
      color: var(--text);
      margin-bottom: 14px;
    }

    .post-content {
      font-size: 15px;
      line-height: 1.75;
      color: var(--slate);
      word-break: break-word;
    }

    .card-footer {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 14px 30px;
      border-top: 1px solid var(--border);
      background: #faf9f7;
      flex-wrap: wrap;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      padding: 9px 18px;
      border: none;
      border-radius: 8px;
      font-family: 'DM Sans', sans-serif;
      font-size: 13px;
      font-weight: 600;
      cursor: pointer;
      text-decoration: none;
      white-space: nowrap;
    }

    .btn-like {
      background: var(--accent);
      color: #fff;
    }

    .btn-like:hover {
      background: var(--accent-dk);
    }

    .like-divider {
      width: 1px;
      height: 15px;
      background: rgba(255, 255, 255, .4);
      margin: 0 3px;
    }

    .like-count {
      font-size: 13px;
      font-weight: 700;
      background: rgba(0, 0, 0, .18);
      padding: 1px 7px;
      border-radius: 99px;
      min-width: 22px;
      text-align: center;
    }

    .btn-comment {
      background: var(--blue);
      color: #fff;
    }

    .btn-comment:hover {
      background: var(--blue-dk);
    }

    .btn-comment.active {
      background: var(--blue-dk);
    }

    .btn-share {
      background: transparent;
      color: var(--slate);
      border: 1.5px solid var(--border);
    }

    .btn-share:hover {
      background: var(--border);
      color: var(--text);
    }

    .like-form {
      display: contents;
    }

    .actions-spacer {
      flex: 1;
    }

    /* Seção de comentários — visível ou não via classe PHP */
    .comments-section {
      border-top: 1px solid var(--border);
      background: #f7f5f2;
    }

    .comments-inner {
      padding: 20px 30px 24px;
    }

    .comments-header {
      font-size: 12px;
      font-weight: 700;
      color: var(--slate-lt);
      letter-spacing: .1em;
      text-transform: uppercase;
      margin-bottom: 16px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .comments-header::after {
      content: '';
      flex: 1;
      height: 1px;
      background: var(--border);
    }

    .comment-list {
      display: flex;
      flex-direction: column;
      gap: 12px;
      margin-bottom: 20px;
    }

    .comment-item {
      display: flex;
      gap: 12px;
    }

    .comment-avatar {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: var(--blue-lt);
      border: 1.5px solid #c7d7f9;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 13px;
      font-weight: 700;
      color: var(--blue);
      flex-shrink: 0;
      text-transform: uppercase;
    }

    .comment-bubble {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 0 10px 10px 10px;
      padding: 10px 14px;
      flex: 1;
    }

    .comment-meta {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 5px;
    }

    .comment-author {
      font-size: 13px;
      font-weight: 600;
      color: var(--text);
    }

    .comment-time {
      font-size: 11px;
      color: var(--slate-lt);
    }

    .comment-reactions {
      display: flex;
      gap: 6px;
      margin-top: 10px;
      flex-wrap: wrap;
    }

    .reaction-btn {
      display: inline-flex;
      align-items: center;
      gap: 4px;
      padding: 4px 10px;
      background: var(--surface);
      border: 1.5px solid var(--border);
      border-radius: 99px;
      font-size: 12px;
      cursor: pointer;
      transition: all 0.2s;
      font-weight: 600;
      color: var(--slate);
    }

    .reaction-btn:hover {
      border-color: var(--blue);
      background: var(--blue-lt);
      color: var(--blue);
    }

    .reaction-btn.active {
      background: var(--blue-lt);
      border-color: var(--blue);
      color: var(--blue);
    }

    .reaction-count {
      font-size: 11px;
      color: var(--slate-lt);
    }

    .no-comments {
      text-align: center;
      padding: 20px 0;
      color: var(--slate-lt);
      font-size: 13px;
      margin-bottom: 20px;
    }

    .no-comments span {
      font-size: 22px;
      display: block;
      margin-bottom: 6px;
    }

    .comment-form {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .comment-form-row {
      display: flex;
      gap: 10px;
      align-items: flex-start;
    }

    .comment-form-avatar {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: var(--accent-lt);
      border: 1.5px solid #f5c2be;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 13px;
      font-weight: 700;
      color: var(--accent);
      flex-shrink: 0;
    }

    .comment-input-wrap {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .comment-textarea {
      width: 100%;
      min-height: 72px;
      padding: 10px 14px;
      border: 1.5px solid var(--border);
      border-radius: 10px;
      font-family: 'DM Sans', sans-serif;
      font-size: 14px;
      color: var(--text);
      background: var(--surface);
      resize: vertical;
      line-height: 1.6;
    }

    .comment-textarea:focus {
      outline: none;
      border-color: var(--blue);
      box-shadow: 0 0 0 3px rgba(26, 86, 219, .08);
    }

    .comment-textarea::placeholder {
      color: var(--slate-lt);
    }

    .comment-form-actions {
      display: flex;
      justify-content: flex-end;
    }

    .btn-submit-comment {
      background: var(--blue);
      color: #fff;
      padding: 8px 20px;
      font-size: 13px;
    }

    .btn-submit-comment:hover {
      background: var(--blue-dk);
    }

    .flash {
      max-width: 780px;
      margin: 0 auto 20px;
      padding: 12px 18px;
      border-radius: 10px;
      font-size: 14px;
      font-weight: 500;
    }

    .flash-success {
      background: #ecfdf5;
      color: #065f46;
      border: 1px solid #a7f3d0;
    }

    .flash-error {
      background: var(--accent-lt);
      color: var(--accent-dk);
      border: 1px solid #f5c2be;
    }

    .empty-state {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 60px 30px;
      text-align: center;
      color: var(--slate-lt);
    }

    .empty-state .empty-icon {
      font-size: 40px;
      margin-bottom: 14px;
    }

    .empty-state h3 {
      font-family: 'Playfair Display', serif;
      font-size: 22px;
      color: var(--slate);
      margin-bottom: 6px;
    }

    .empty-state p {
      font-size: 14px;
    }

    @media (max-width: 600px) {
      body {
        padding: 28px 12px 48px;
      }

      .card-body {
        padding: 22px 18px 16px;
      }

      .card-footer {
        padding: 12px 18px;
      }

      .comments-inner {
        padding: 16px 18px 20px;
      }

      .btn {
        flex: 1;
        justify-content: center;
      }

      .actions-spacer {
        display: none;
      }
    }
  </style>
</head>

<body>

  @if(session('success'))
  <div class="flash flash-success">✅ {{ session('success') }}</div>
  @endif
  @if(session('error'))
  <div class="flash flash-error">⚠️ {{ session('error') }}</div>
  @endif

  @php

  $openPost = request()->query('open');
  @endphp

  <header class="page-header">
    <h1>Posts Recentes</h1>
    @if(isset($posts) && count($posts) > 0)
    <span class="post-count">{{ count($posts) }} {{ count($posts) === 1 ? 'post' : 'posts' }}</span>
    @endif
  </header>

  <main class="feed">

    @if(isset($posts) && count($posts) > 0 && isset($reactionCounts))
    @foreach($posts as $index => $post)

    @php
    $count = $reactionCounts[$post->id] ?? 0;
    $comments = $commentsByPost->get((string) $post->id) ?? collect();
    $commentCount = count($comments);
    $isOpen = (string) $openPost === (string) $post->id;

    $toggleUrl = $isOpen
    ? url('/home')
    : url('/home') . '?open=' . $post->id;
    @endphp

    <article class="post-card">

      <div class="card-body">
        <div class="post-meta">
          <span class="post-index">#{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
          <span class="meta-dot">·</span>
          <span class="post-date">{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y, H:i') }}</span>

          @if($count > 0)
          <span class="meta-dot">·</span>
          <span class="reaction-pill">❤️ {{ $count }} {{ $count === 1 ? 'curtida' : 'curtidas' }}</span>
          @endif
        </div>

        <h2 class="post-title">{{ $post->title }}</h2>
        <p class="post-content">{{ $post->content }}</p>
      </div>

      <div class="card-footer">

        <form action="{{ route('createreaction') }}" method="POST" class="like-form">
          @csrf
          <input type="hidden" name="post_id" value="{{ $post->id }}">
          <button type="submit" class="btn btn-like">
            👍 Gostei
            @if($count > 0)
            <span class="like-divider"></span>
            <span class="like-count">{{ $count }}</span>
            @endif
          </button>
        </form>

        {{-- Link puro — zero JS. PHP lê ?open= e decide o que renderizar --}}
        <a href="{{ $toggleUrl }}" class="btn btn-comment {{ $isOpen ? 'active' : '' }}">
          💬
          @if($commentCount > 0)
          {{ $commentCount }} {{ $commentCount === 1 ? 'comentário' : 'comentários' }}
          @else
          Comentar
          @endif
        </a>

        <span class="actions-spacer"></span>
        <span class="btn btn-share">📤 Compartilhar</span>

      </div>

      @if($isOpen)
      <div class="comments-section">
        <div class="comments-inner">

          <p class="comments-header">
            {{ $commentCount }} {{ $commentCount === 1 ? 'comentário' : 'comentários' }}
          </p>

          @if($commentCount > 0)
          <div class="comment-list">
            @foreach($comments as $comment)
            @php
            $authorName = $comment->user_name ?? 'Anônimo';
            $initial = mb_strtoupper(mb_substr($authorName, 0, 1));
            $commentReactionCount = $commentReactionCounts[$comment->id] ?? 0;
            $userHasReacted = $userCommentReactions[$comment->id] ?? false;
            @endphp
            <div class="comment-item">
              <div class="comment-avatar">{{ $initial }}</div>
              <div class="comment-bubble">
                <div class="comment-meta">
                  <span class="comment-author">{{ $authorName }}</span>
                  <span class="comment-time">
                    {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                  </span>
                </div>
                <p class="comment-text">{{ $comment->content }}</p>
                <div class="comment-reactions">
                  <button
                    type="button"
                    class="reaction-btn {{ $userHasReacted ? 'active' : '' }}"
                    data-comment-id="{{ $comment->id }}"
                    data-user-id="{{ session('user_id') }}"
                    onclick="toggleCommentReaction(this)">
                    👍
                    @if($commentReactionCount > 0)
                    <span class="reaction-count">{{ $commentReactionCount }}</span>
                    @endif
                  </button>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          @else
          <div class="no-comments">
            <span>💬</span>
            Nenhum comentário ainda. Seja o primeiro!
          </div>
          @endif

          @php $userInitial = mb_strtoupper(mb_substr(session('user_name', 'U'), 0, 1)); @endphp

          <form action="{{ route('comments.store') }}" method="POST" class="comment-form">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="hidden" name="user_id" value="{{ session('user_id') }}">
            <input type="hidden" name="user_name" value="{{ session('user_name') }}">

            <div class="comment-form-row">
              <div class="comment-form-avatar">{{ $userInitial }}</div>
              <div class="comment-input-wrap">
                <textarea
                  name="content"
                  class="comment-textarea"
                  placeholder="Escreva um comentário..."
                  required
                  maxlength="1000"></textarea>
                <div class="comment-form-actions">
                  <button type="submit" class="btn btn-submit-comment">✉️ Publicar</button>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
      @endif

    </article>

    @endforeach
    @else
    <div class="empty-state">
      <div class="empty-icon">📭</div>
      <h3>Nenhum post encontrado</h3>
      <p>Quando houver publicações, elas aparecerão aqui.</p>
    </div>
    @endif

  </main>

  <script>
    async function toggleCommentReaction(button) {
      const commentId = button.dataset.commentId;
      const userId = button.dataset.userId;

      if (!userId || userId === '') {
        alert('Você precisa estar autenticado para reagir.');
        return;
      }

      try {
        const response = await fetch('{{ route("comments-reaction.store") }}', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}'
          },
          body: JSON.stringify({
            comment_id: commentId,
            user_id: userId,
            reaction: '👍'
          })
        });

        const data = await response.json();

        if (data.success) {
          button.classList.toggle('active');

          const countSpan = button.querySelector('.reaction-count');
          if (data.reaction) {
            if (!countSpan) {
              const span = document.createElement('span');
              span.className = 'reaction-count';
              span.textContent = '1';
              button.appendChild(span);
            }
          } else {
            if (countSpan) {
              const currentCount = parseInt(countSpan.textContent) || 1;
              if (currentCount <= 1) {
                countSpan.remove();
              } else {
                countSpan.textContent = currentCount - 1;
              }
            }
          }

          updateCommentReactionCounts([commentId]);
        }
      } catch (error) {
        console.error('Erro ao reagir:', error);
        alert('Erro ao processar reação. Tente novamente.');
      }
    }

    async function updateCommentReactionCounts(commentIds) {
      try {
        const response = await fetch('{{ route("comments-reaction.counts") }}', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}'
          },
          body: JSON.stringify({
            comment_ids: commentIds
          })
        });

        const counts = await response.json();

        commentIds.forEach(commentId => {
          const buttons = document.querySelectorAll(`[data-comment-id="${commentId}"]`);
          buttons.forEach(button => {
            let countSpan = button.querySelector('.reaction-count');
            const count = counts[commentId] || 0;

            if (count > 0) {
              if (!countSpan) {
                countSpan = document.createElement('span');
                countSpan.className = 'reaction-count';
                button.appendChild(countSpan);
              }
              countSpan.textContent = count;
            } else {
              if (countSpan) countSpan.remove();
            }
          });
        });
      } catch (error) {
        console.error('Erro ao atualizar contagens:', error);
      }
    }
  </script>

</body>

</html>