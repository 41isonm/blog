<style>
  .sidebar {
    width: 250px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    padding: 20px;
    height: fit-content;
    position: sticky;
    top: 20px;
  }

  .sidebar h3 {
    color: #222;
    margin: 0 0 20px 0;
    font-size: 18px;
    border-bottom: 2px solid #f0f0f0;
    padding-bottom: 12px;
  }

  .sidebar-menu {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .sidebar-menu li {
    margin-bottom: 12px;
  }

  .sidebar-menu a {
    display: flex;
    align-items: center;
    padding: 12px 16px;
    color: #333;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.3s ease;
    font-weight: 500;
    gap: 12px;
  }

  .sidebar-menu a:hover {
    background: #f0f0f0;
    color: #28a745;
    transform: translateX(4px);
  }

  .sidebar-menu a.active {
    background: #28a745;
    color: white;
  }

  .sidebar-icon {
    width: 20px;
    height: 20px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }

  @media (max-width: 768px) {
    .sidebar {
      width: 100%;
      margin-bottom: 30px;
      position: relative;
      top: 0;
    }
  }
</style>

<div class="sidebar">
  <h3>📌 Navigation</h3>

  <ul class="sidebar-menu">
    <li>
      <a href="#my-posts" class="sidebar-link {{ request()->input('tab') === 'my-posts' || !request()->input('tab') ? 'active' : '' }}"
        onclick="document.querySelector('[data-tab=my-posts]').scrollIntoView({behavior: 'smooth'}); this.classList.add('active'); document.querySelectorAll('.sidebar-link').forEach(l => l !== this && l.classList.remove('active'));">
        <span class="sidebar-icon">📝</span>
        <span>My Posts</span>
      </a>
    </li>

    <li>
      <a href="#all-posts" class="sidebar-link"
        onclick="document.querySelector('[data-tab=all-posts]').scrollIntoView({behavior: 'smooth'}); this.classList.add('active'); document.querySelectorAll('.sidebar-link').forEach(l => l !== this && l.classList.remove('active'));">
        <span class="sidebar-icon">🌍</span>
        <span>All Posts</span>
      </a>
    </li>

    <li>
      <a href="/create" class="sidebar-link">
        <span class="sidebar-icon">✨</span>
        <span>Create New</span>
      </a>
    </li>
  </ul>
</div>