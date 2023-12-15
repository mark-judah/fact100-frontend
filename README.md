<!DOCTYPE html>
<html>

<body>

<h1>Fact100 - Laravel Frontend</h1>

<p>Fact100 is a personal blog built using Laravel for the frontend, employing Livewire for rendering the UI.</p>

<h2>Client-Side Features</h2>
<ul>
  <li>Viewing new and archived blog posts</li>
  <li>Liking, commenting, and subscribing to blogs</li>
  <li>Search functionality for finding specific blogs</li>
</ul>

<h2>Admin Panel Features</h2>
<ul>
  <li>Create and edit posts, blog categories, users, and subscribers</li>
  <li>Charts displaying most-liked posts, most-viewed posts, views per category, and reader demographics</li>
  <li>User visits logging using Laravel job queues</li>
</ul>

<h2>Backend Integration</h2>
<p>The frontend communicates with the Lumen backend, available at: <a href="https://github.com/mark-judah/fact100-backend" target="_blank">Fact100 Backend Repository</a>.</p>

<h2>Setup Instructions</h2>
<h3>Prerequisites</h3>
<ul>
  <li>PHP installed</li>
  <li>Composer installed</li>
  <li>Laravel CLI</li>
  <li>Web server (e.g., Apache, Nginx)</li>
</ul>

<h3>Steps to Set Up the Laravel Project</h3>
<ol>
  <li>Clone the Fact100 frontend repository:</li>
  <pre><code>
  git clone https://github.com/your-username/fact100-frontend.git
  </code></pre>

  <li>Navigate to the project directory:</li>
  <pre><code>
  cd fact100-frontend
  </code></pre>

  <li>Install dependencies:</li>
  <pre><code>
  composer install
  </code></pre>

  <li>Create a copy of the .env.example file and name it .env:</li>
  <pre><code>
  cp .env.example .env
  </code></pre>

  <li>Generate an application key:</li>
  <pre><code>
  php artisan key:generate
  </code></pre>

  <li>Run migrations and seeders (if any):</li>
  <pre><code>
  php artisan migrate --seed
  </code></pre>

  <li>Start the Laravel development server:</li>
  <pre><code>
  php artisan serve
  </code></pre>
</ol>

<p>You can now access the Fact100 blog by visiting <code>http://localhost:8000</code> in your web browser.</p>



</body>
</html>
