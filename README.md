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

**Instal Vue 3**

```terminal
npm install vue@next vue-loader@next
```

**Instal Vue Router 3**

```terminal
npm install vue-router

```

**In your rotuer.js**

```javascript
import { createRouter, createWebHistory } from "vue-router";

const routes = [{
        path: "/",
        name: "Home",
        component: require('./Home.vue').default
    },
    {
        path: "/:pathMatch(.*)*",
        name: "PageNotFound",
        component: require('./components/PageNotFound.vue').default
    }];

const router = createRouter({
    history: createWebHistory(process.env.BASH_URL),
    routes,
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active"
});

export default router;
```


**And then Install NPM Dependencies**

```terminal
npm install 
npm run dev
npm run watch
```

**Insert this code to your resources/views/home.blade.php**

```html
<div id="app"></div>

<script src="{{ mix('/js/app.js') }}"></script>
```


**Instal Vue Ckeditor-5**
```terminal
npm install --save @ckeditor/ckeditor5-vue @ckeditor/ckeditor5-build-classic
```

```javascript

Vue.createApp( { /* options */ } ).use( CKEditor ).mount( /* DOM element */ );

<ckeditor tag-name="textarea" id="editor" aria-placeholder="Body" :editor="editor" v-model="forms.body" :config="editorConfig"></ckeditor>

<script>

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

data(){
    return{
        editor: ClassicEditor,
        editorConfig: {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote','|', 'undo', 'redo', ],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading2', view: 'h2', title: 'Heading 1', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 2', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 3', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 4', class: 'ck-heading_heading5' }
                ]
            }
        }
    }
}
</script>

```


**Run PHP Artisan serve**

```terminal
php aritsan serve
```
 