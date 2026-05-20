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
      transition: box-shadow .25s, transform .25s;
    }

    .post-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 28px rgba(0, 0, 0, .11);
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

    /* Pill de curtidas na linha de meta */
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
      letter-spacing: .02em;
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

    /* Actions bar */
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
      transition: background .2s, transform .15s;
      white-space: nowrap;
    }

    .btn:active {
      transform: scale(.96);
    }

    /* Like button com contador embutido */
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

    /* Empty state */
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

  <header class="page-header">
    <h1>Posts Recentes</h1>
    @if(isset($posts) && count($posts) > 0)
    <span class="post-count">{{ count($posts) }} {{ count($posts) === 1 ? 'post' : 'posts' }}</span>
    @endif
  </header>

  <main class="feed">

    @if(isset($posts) && count($posts) > 0 && isset($reactionCounts))
    @foreach($posts as $index => $post)

    {{-- $reactionCounts vem do controller: [ post_id => total ] --}}
    @php $count = $reactionCounts[$post->id] ?? 0; @endphp

    <article class="post-card">
      <div class="card-body">

        <div class="post-meta">
          <span class="post-index">#{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
          <span class="meta-dot">·</span>
          <span class="post-date">{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y, H:i') }}</span>

          {{-- Pill só aparece quando há pelo menos 1 curtida --}}
          @if($count > 0)
          <span class="meta-dot">·</span>
          <span class="reaction-pill">
            ❤️ {{ $count }} {{ $count === 1 ? 'curtida' : 'curtidas' }}
          </span>
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

        <button type="button" class="btn btn-comment">💬 Comentar</button>

        <span class="actions-spacer"></span>

        <button type="button" class="btn btn-share">📤 Compartilhar</button>

      </div>
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

</body>

</html>