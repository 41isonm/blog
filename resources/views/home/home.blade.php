<x-header />

<style>
  body {
    background: #f5f7fa;
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    padding: 0;
  }

  .container {
    max-width: 1000px;
    margin: 40px auto;
    padding: 20px;
  }

  .hero {
    background: white;
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    text-align: center;
    margin-bottom: 30px;
  }

  .hero h1 {
    color: #222;
    margin-bottom: 10px;
    font-size: 32px;
  }

  .hero p {
    color: #666;
    margin-bottom: 25px;
    font-size: 16px;
  }

  .create-btn {
    display: inline-block;
    padding: 12px 22px;
    background: #28a745;
    color: white;
    text-decoration: none;
    border-radius: 10px;
    font-weight: bold;
    transition: 0.3s;
  }

  .create-btn:hover {
    background: #218838;
    transform: translateY(-2px);
  }

  .posts-wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px;
  }

  .posts-section {
    background: white;
    padding: 25px;
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  }

  .posts-section h2 {
    margin-bottom: 20px;
    color: #333;
    border-bottom: 2px solid #f0f0f0;
    padding-bottom: 10px;
  }

  .posts-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .empty-message {
    color: #888;
    font-size: 15px;
  }

  @media (max-width: 768px) {
    .container {
      padding: 15px;
    }

    .hero h1 {
      font-size: 26px;
    }

    .posts-wrapper {
      grid-template-columns: 1fr;
    }
  }
</style>

@php
$myPosts = $posts->filter(function ($post) {
return $post->user_id == session('user_id');
});

$otherPosts = $posts->filter(function ($post) {
return $post->user_id != session('user_id');
});
@endphp

<div class="container">

  <div class="hero">
    <h1>Welcome to the Blog</h1>

    <p>
      Share your ideas, experiences and thoughts with everyone.
    </p>

    <a href="/create" class="create-btn">
      Create New Post
    </a>
  </div>

  <div class="posts-wrapper">

    {{-- MY POSTS --}}
    <div class="posts-section">

      <h2>My Posts</h2>

      @if($myPosts->count() > 0)

      <ul class="posts-list">
        <x-details
          :posts="$myPosts"
          :reactionCounts="$reactionCounts"
          :commentsByPost="$commentsByPost" />
      </ul>

      @else
      <p class="empty-message">
        You haven't created any posts yet.
      </p>
      @endif

    </div>

    {{-- OTHER POSTS --}}
    <div class="posts-section">

      <h2>All Posts</h2>

      @if($otherPosts->count() > 0)

      <ul class="posts-list">
        <x-details
          :posts="$otherPosts"
          :reactionCounts="$reactionCounts"
          :commentsByPost="$commentsByPost" />
      </ul>

      @else
      <p class="empty-message">
        No posts available.
      </p>
      @endif

    </div>

  </div>

</div>