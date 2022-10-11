# Laravel + Vue

**Create New Project**

```terminal
 laravel new ProjectName
```

**Install Laravel/Ui & UI Vue**

```terminal
composer require laravel/ui
php artisan ui vue
```

**And then Install NPM Dependencies**

```terminal
npm install 
npm run dev
npm run watch
```

**Instal Vue 3**

```terminal
npm install vue@next vue-loader@next
```

**Insert this code to your resources/views/home.blade.php**

```html
<div id="app">
  <example-component />
</div>
<script src="{{ mix('/js/app.js') }}"></script>
```

**Run PHP Artisan serve**

```terminal
php aritsan serve
```
 